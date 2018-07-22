<?php
namespace App\Http\Controllers;

use App\Models\LogsStaff;
use App\Models\Week;
use App\Models\WeekAnimes;
use DB;
use Auth;
use App\User;
use App\ZAnimesControl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Genres;
use App\Models\Animes;
use App\Models\AnimesSeasons;
use App\Models\AnimesSeasonsEpisodes;
use App\Models\AnimesSeasonsEpisodesViews;
use App\Services\Contracts\ZAnimesInterface;

class PanelController extends Controller {

    public function panel() {
        $analystic_users = collect();
        $analystic_views = collect();
        foreach(range(-14, 0) as $i) {
            $date = Carbon::now()->addDays($i)->format('Y-m-d H:i:s');
            $analystic_users->put($date, 0);
            $analystic_views->put($date, 0);
        }
        return view('pages.panel.panel', [
            'analystic_users' => $analystic_users->merge(Animes::where('created_at', '>=', $analystic_users->keys()->first())
                ->groupBy('date')
                ->get([
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as "count"')
                ])
                ->pluck('count', 'date')),
            'analystic_views' => $analystic_views->merge(AnimesSeasonsEpisodesViews::where('created_at', '>=', $analystic_views->keys()->first())
                ->groupBy('date')
                ->orderBy('date')
                ->get([
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as "count"')
                ])
                ->pluck('count', 'date')),
            'genres' => Genres::get(),
            'animes' => Animes::get(),
            'seasons' => AnimesSeasons::get(),
            'episodes' => AnimesSeasonsEpisodes::get(),
            'users' => User::get()
        ]);
    }

    public function animes() {
        return view('pages.panel.animes.animes', [
            'animes' => Animes::orderByDesc('created_at')->paginate(30)
        ]);
    }

    public function week() {
        return view('pages.panel.week', [
            'weeks' => Week::all()
        ]);
    }

    public function weekEdit(Request $request, $id_week) {
        $week = Week::findOrFail($id_week);
        if ($request->has('id') && $request->has('action')) {
            $_query = Animes::where('id', $request->id);
            if ($_query->doesntExist()) {
                return redirect('/panel/week/' . $id_week)->with('warning', 'The anime with id \'' . $request->id . '\'. doesn\'t exists');
            }
            if (optional($_query->first())->status != 0) {
                return redirect('/panel/week/' . $id_week)->with('warning', 'The anime with id \'' . $request->id . '\'. isn\'t Ongoing');
            }
            if ($request->action == "Add" && $request->has('hour')) {
                if ($week->animes()->where(['week_id' => $id_week, 'anime_id' => $request->id])->exists()) {
                    return redirect('/panel/week/' . $id_week)->with('warning', 'The anime with id \'' . $request->id . '\'. exists');
                }
                $week->animes()->create(['week_id' => $id_week, 'anime_id' => $request->id, 'hour' => $request->hour]);
            } else {
                if ($week->animes()->where(['week_id' => $id_week, 'anime_id' => $request->id])->doesntExist()) {
                    return redirect('/panel/week/' . $id_week)->with('warning', 'The anime with id \'' . $request->id . '\'. doesn\'t exists');
                }
                $week->animes()->where(['week_id' => $id_week, 'anime_id' => $request->id])->forceDelete();
            }
        }
        return view('pages.panel.week.edit', [
            'week' => $week
        ]);
    }

    public function logs() {
        return view('pages.panel.logs', [
            'logs' => LogsStaff::orderByDesc('created_at')->paginate(30)
        ]);
    }

    public function animesAdd(Request $request)
    {
        if ($request->has('name') && $request->has('author') && $request->has('year') && $request->has('status') && $request->has('sinopse') && $request->has('genre') && $request->hasFile('image')) {
            $request->validate([
                'name' => 'required|max:255',
                'author' => 'required|max:255',
                'year' => 'integer',
                'status' => 'required',
                'sinopse' => 'required',
                'genre' => 'required',
                'image' => 'required'
            ]);
            $slug = str_slug($request->input('name'), '-');
            if (Animes::where('slug_name', $slug)->doesntExist()) {
                $anime = new Animes([
                    'name' => $request->input('name'),
                    'slug_name' => $slug,
                    'sinopse' => $request->input('sinopse'),
                    'image' => "cover.jpg?t=" . str_random(20) . time(),
                    'author' => $request->input('author'),
                    'status' => $request->input('status'),
                    'year' => $request->input('year'),
                    'user_id' => Auth::user()->id
                ]);
                if ($anime->save()) {
                    ZAnimesControl::put("animes/" . $anime->slug_name . "/cover.jpg", Image::make($request->file('image')->getRealPath())->resize(340, 510)->encode('jpg', 80));
                    $anime->staffLog()->save(new LogsStaff(['user_id' => optional(Auth::user())->id, 'message' => 'Has added the anime ' . $anime->id]));
                    $anime->genres()->sync($request->input('genre'));
                    return redirect()->route('panel.animes.edit.default', ['slug' => $anime->slug_name]);
                } else {
                    return redirect('/panel/animes/add')->with('danger', 'Can\'t add \'' . $anime->name . '\'.');
                }
            }
            return redirect('/panel/animes/add')->with('warning', 'The anime with slug \'' . $slug . '\'. exists');
        }
        return view('pages.panel.animes.add', [
            'genres' => Genres::get()
        ]);
    }

    public function editAnime(Request $request, $slug) {
        $anime = Animes::where('slug_name', $slug)->firstOrFail();
        if (Auth::user()->editor <= 1 && $anime->user_id != Auth::user()->id) {
            return view('pages.panel.not-have-permission', [
                'anime' => $anime
            ]);
        }
        if ($request->has('delete')) {
            $anime->episodes()->delete();
            $anime->seasons()->delete();
            $anime->delete();
            ZAnimesControl::deleteDirectory('animes/' . $slug);
            $anime->staffLog()->save(new LogsStaff(['user_id' => optional(Auth::user())->id, 'message' => 'Has deleted the anime ' . $anime->id]));
            return redirect()->route('panel-animes', ['slug' => $anime->slug_name])->with('success', 'Anime \'' . $anime->name . '\' deleted.');
        } else if ($request->has('name') && $request->has('author') && $request->has('year') && $request->has('status') && $request->has('sinopse')) {
            $request->validate([
                'name' => 'required|max:255',
                'author' => 'required|max:255',
                'year' => 'integer',
                'status' => 'required',
                'sinopse' => 'required',
                'genre' => 'required',
            ]);
            $anime->name = $request->input('name');
            $anime->author = $request->input('author');
            $anime->year = $request->input('year');
            if ($request->has('genre')) {
                $anime->genres()->sync($request->input('genre'));
            }
            $anime->status = $request->input('status');
            $anime->sinopse = $request->input('sinopse');
            if ($request->hasFile('image'))
            {
                $anime->image = "cover.jpg?t=" . str_random(20) . time();
                ZAnimesControl::put("animes/" . $anime->slug_name . "/cover.jpg", Image::make($request->file('image')->getRealPath())->resize(340, 510)->encode('jpg', 80));
            }
            if ($anime->save()) {
                $anime->staffLog()->save(new LogsStaff(['user_id' => optional(Auth::user())->id, 'message' => 'Has edited the anime ' . $anime->id]));
                return redirect()->route('panel.animes.edit.default', ['slug' => $anime->slug_name])->with('success', '\'' . $anime->name . '\' edited.');
            }
        } else if ($request->has('title') && $request->has('season')) {
            $request->validate([
                'title' => 'required|max:255',
                'season' => 'integer'
            ]);
            if (AnimesSeasons::where('anime_id', $anime->id)->where('season', $request->input('season'))->doesntExist()) {
                $season = new AnimesSeasons([
                    'anime_id' => $anime->id,
                    'title' => $request->input('title'),
                    'season' => $request->input('season')
                ]);
                if ($anime->seasons()->save($season)) {
                    $anime->staffLog()->save(new LogsStaff(['user_id' => optional(Auth::user())->id, 'message' => 'Has added the season ' . $season->id]));
                    return redirect()->route('panel.animes.edit.season', ['slug' => $anime->slug_name, 'season' => $request->input('season')])->with('success', 'Season \'' . $season->title . '\' added.');
                }
            }
        }
        return view('pages.panel.animes.edit', [
            'anime' => $anime,
            'genres' => Genres::get()
        ]);
    }

    public function editSeason(Request $request, ZAnimesInterface $ZAnimes, $slug, $season) {
        $anime = Animes::where('slug_name', $slug)->firstOrFail();
        if (Auth::user()->editor <= 1 && $anime->user_id != Auth::user()->id) {
            return view('pages.panel.not-have-permission', [
                'anime' => $anime
            ]);
        }
        $season = AnimesSeasons::where('anime_id', $anime->id)->where('season', $season)->firstOrFail();
        if ($request->has('delete')) {
            $season->episodes()->delete();
            $season->delete();
            $anime->staffLog()->save(new LogsStaff(['user_id' => optional(Auth::user())->id, 'message' => 'Has deleted the season ' . $season->id]));
            return redirect()->route('panel.animes.edit.default', ['slug' => $anime->slug_name])->with('success', 'Season \'' . $season->title . '\' deleted.');
        } else if ($request->has('title') && $request->has('episode') && $request->has('video') && $request->has('poster') && $request->has('prev')) {
            if (AnimesSeasonsEpisodes::where('season_id', $season->id)->where('episode', $request->episode)->doesntExist()) {
                try {
                    $episode = new AnimesSeasonsEpisodes([
                        'title' => $request->title,
                        'slug' => str_slug($request->title),
                        'prev' => $request->prev,
                        'episode' => $request->episode,
                        'video' => $request->video,
                        'image' => $anime->slug_name . "/episodes/" . $season->season . "_" . $request->episode . ".jpg?" . str_random(20),
                        'poster' => $anime->slug_name . "/episodes/" . $season->season . "_" . $request->episode . "_poster.jpg?" . str_random(20),
                        'anime_id' => $anime->id,
                        'season_id' => $season->id,
                        'duration' => $ZAnimes->timeToSeconds($ZAnimes->getDuration($request->video))
                    ]);
                    if ($request->poster != "") {
                        $request->poster = str_replace('widestar', 'wide', $request->poster);
                        $request->poster = str_replace('_wide.jpg', '_fwide.jpg', $request->poster);
                        ZAnimesControl::put("animes/" . $anime->slug_name . "/episodes/" . $season->season . "_" . $request->episode . ".jpg", Image::make($request->poster)->resize(185, 105)->encode('jpg', 80));
                        ZAnimesControl::put("animes/" . $anime->slug_name . "/episodes/" . $season->season . "_" . $request->episode . "_poster.jpg", Image::make($request->poster)->resize(640, 360)->encode('jpg', 80));
                    }
                    if ($anime->episodes()->save($episode)) {
                        $anime->staffLog()->save(new LogsStaff(['user_id' => optional(Auth::user())->id, 'message' => 'Has added the episode ' . $episode->id]));
                        return redirect()->route('panel.animes.edit.season', ['slug' => $anime->slug_name, 'season' => $season->season])->with('success', 'Episode \'' . $request->title . '\' added.');
                    }

                } catch (\Exception $e) {
                    return redirect()->route('panel.animes.edit.season', ['slug' => $anime->slug_name, 'season' => $season->season])->with('warning', $e->getMessage());
                }
            }
        } else if ($request->has('name')) {
            $request->validate([
                'name' => 'required|max:255'
            ]);
            $season->title = $request->input('name');
            if ($season->save()) {
                $anime->staffLog()->save(new LogsStaff(['user_id' => optional(Auth::user())->id, 'message' => 'Has edited the season ' . $season->id]));
                return redirect()->route('panel.animes.edit.season', ['slug' => $anime->slug_name, 'season' => $season->season])->with('success', 'Season \'' . $season->title . '\' edited.');
            }
        }
        return view('pages.panel.animes.season', [
            'anime' => $anime,
            'season' => $season,
            'episodes' => $season->episodes()->get()
        ]);
    }

    public function editEpisode(Request $request, ZAnimesInterface $ZAnimes, $slug, $season_i, $episode_i) {
        $anime = Animes::where('slug_name', $slug)->firstOrFail();
        if (Auth::user()->editor <= 1 && $anime->user_id != Auth::user()->id) {
            return view('pages.panel.not-have-permission', [
                'anime' => $anime
            ]);
        }
        $season = AnimesSeasons::where('anime_id', $anime->id)->where('season', $season_i)->firstOrFail();
        $episode = AnimesSeasonsEpisodes::where('season_id', $season->id)->where('episode', $episode_i)->firstOrFail();
        try {
            if ($request->has('delete')) {
                $episode->delete();
                $anime->staffLog()->save(new LogsStaff(['user_id' => optional(Auth::user())->id, 'message' => 'Has deleted the episode ' . $episode->id]));
                return redirect()->route('panel.animes.edit.default', ['slug' => $anime->slug_name])->with('success', 'Season \'' . $season->title . '\' deleted.');
            } else if ($request->has('episode') && $request->has('title') && $request->has('prev')) {
                $episode->title = $request->input('title');
                $episode->slug = str_slug($episode->title);
                $episode->prev = $request->input('prev');
                if ($request->episode != $episode->episode) {
                    if (AnimesSeasonsEpisodes::where('anime_id', $anime->id)->where('season_id', $season->id)->where('episode', $request->episode)->doesntExist()) {
                        $episode->episode = $request->episode;
                    } else {
                        return redirect()->route('panel.animes.edit.episode', ['slug' => $anime->slug_name, 'season' => $season_i, 'episode' => $episode->episode])->with('warning', 'Episode \'' . $episode->title . '\' can\'t use the episode \'' . $request->episode . '\'.');
                    }
                }
                if ($request->has('video') && $request->input('video') != $episode->video) {
                    $episode->video = $request->input('video');
                    $episode->duration = $ZAnimes->timeToSeconds($ZAnimes->getDuration($episode->video));
                }
                if ($request->has('poster') && $request->input('poster') != "") {
                    $request->poster = str_replace('widestar', 'wide', $request->poster);
                    $request->poster = str_replace('_wide.jpg', '_fwide.jpg', $request->poster);
                    ZAnimesControl::put("animes/" . $anime->slug_name . "/episodes/" . $season->season . "_" . $request->episode . ".jpg", Image::make($request->poster)->resize(185, 105)->encode('jpg', 80));
                    ZAnimesControl::put("animes/" . $anime->slug_name . "/episodes/" . $season->season . "_" . $request->episode . "_poster.jpg", Image::make($request->poster)->resize(640, 360)->encode('jpg', 80));
                    $episode->image = $anime->slug_name . "/episodes/" . $season->season . "_" . $episode->episode . ".jpg?" . str_random(20);
                    $episode->poster = $anime->slug_name . "/episodes/" . $season->season . "_" . $episode->episode . "_poster.jpg?" . str_random(20);
                }
                if ($episode->save()) {
                    $anime->latest_episode = Carbon::now();
                    $anime->save();
                    $anime->staffLog()->save(new LogsStaff(['user_id' => optional(Auth::user())->id, 'message' => 'Has edited the episode ' . $episode->id]));
                    return redirect()->route('panel.animes.edit.episode', ['slug' => $anime->slug_name, 'season' => $season_i, 'episode' => $episode->episode])->with('success', 'Episode \'' . $episode->title . '\' edited.');
                }
            }
        } catch (\Exception $e) {
            return redirect()->route('panel.animes.edit.episode', ['slug' => $anime->slug_name, 'season' => $season_i, 'episode' => $episode->episode])->with('warning', $e->getMessage());
        }
        return view('pages.panel.animes.episode', [
            'anime' => $anime,
            'season' => $season,
            'episode' => $episode
        ]);
    }
}
