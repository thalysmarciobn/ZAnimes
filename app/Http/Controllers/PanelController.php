<?php
namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\Genres;
use App\Models\Animes;
use App\Models\AnimesSeasons;
use App\Models\AnimesSeasonsEpisodes;

class PanelController extends Controller
{

    public function panel() {
        return view('pages.panel.panel', [
            'genres' => Genres::get(),
            'animes' => Animes::get(),
            'seasons' => AnimesSeasons::get(),
            'episodes' => AnimesSeasonsEpisodes::get(),
            'users' => User::get()
        ]);
    }

    public function animes(Request $request) {
        return view('pages.panel.animes.animes', [
            'animes' => Animes::paginate(10)
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
                    'image' => "/cover.jpg?" . str_random(20),
                    'author' => $request->input('author'),
                    'status' => $request->input('status'),
                    'year' => $request->input('year'),
                    'genres' => implode(",", $request->input('genre')),
                    'userid' => Auth::user()->id
                ]);
                if ($anime->save()) {
                    $image = $request->file('image');
                    if (!File::exists(public_path('uploads/animes/', 0777, true, true))) {
                        File::makeDirectory(public_path('uploads/animes/', 0777, true, true));
                    }
                    if (!File::exists(public_path('uploads/animes/' . $anime->slug_name, 0777, true, true))) {
                        File::makeDirectory(public_path('uploads/animes/' . $anime->slug_name, 0777, true, true));
                    }
                    if (!File::exists(public_path('uploads/animes/' . $anime->slug_name . '/episodes', 0777, true, true))) {
                        File::makeDirectory(public_path('uploads/animes/' . $anime->slug_name . '/episodes', 0777, true, true));
                    }
                    Image::make($image->getRealPath())->resize(340, 510)->save(public_path('uploads/animes/' . $anime->slug_name . '/cover.jpg'))->encode('jpg', 80);
                    return redirect()->route('panel-anime-edit', ['slug' => $anime->slug_name]);
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
        if (Auth::user()->editor <= 1) {
            abort_if($anime->userid != Auth::user()->id, 404);
        }
        if ($request->has('delete')) {
            $anime->episodes()->delete();
            $anime->seasons()->delete();
            $anime->delete();
            File::deleteDirectory(public_path('uploads/animes/' . $slug));
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
            if ($request->has('genre'))
            {
                $anime->genres = implode(",", $request->input('genre'));
            }
            $anime->status = $request->input('status');
            $anime->sinopse = $request->input('sinopse');
            if ($request->hasFile('image'))
            {
                $image = $request->file('image');
                Image::make($image->getRealPath())->resize(340, 510)->save(public_path("uploads/animes/" . $anime->slug_name . "/cover.jpg"))->encode('jpg', 80);
                $anime->image = "cover.jpg?t=" . str_random(20) . time();
            }
            $anime->save();
            return redirect()->route('panel-anime-edit', ['slug' => $anime->slug_name])->with('success', '\'' . $anime->name . '\' edited.');
        } else if ($request->has('title') && $request->has('season')) {
            $request->validate([
                'title' => 'required|max:255',
                'season' => 'integer'
            ]);
            if (AnimesSeasons::where('anime', $anime->id)->where('season', $request->input('season'))->doesntExist()) {
                $season = new AnimesSeasons([
                    'anime' => $anime->id,
                    'title' => $request->input('title'),
                    'season' => $request->input('season')
                ]);
                if ($anime->seasons()->save($season)) {
                    return redirect()->route('panel-anime-edit-season', ['slug' => $anime->slug_name, 'season' => $request->input('season')])->with('success', 'Season \'' . $season->title . '\' added.');
                }
            }
        }
        $anime_genres = array();
        foreach(explode(',', $anime->genres) as $genre)
        {
            array_push($anime_genres, $genre);
        }
        return view('pages.panel.animes.edit', [
            'anime' => $anime,
            'anime_genres' => $anime_genres,
            'genres' => Genres::get()
        ]);
    }

    public function editSeason(Request $request, $slug, $season) {
        $anime = Animes::where('slug_name', $slug)->firstOrFail();
        if (Auth::user()->editor <= 1) {
            abort_if($anime->userid != Auth::user()->id, 404);
        }
        $season = AnimesSeasons::where('anime', $anime->id)->where('season', $season)->firstOrFail();
        if ($request->has('delete')) {
            $season->episodes()->delete();
            $season->delete();
            return redirect()->route('panel-anime-edit', ['slug' => $anime->slug_name])->with('success', 'Season \'' . $season->title . '\' deleted.');
        } else if ($request->has('title') && $request->has('episode') && $request->has('video') && $request->has('poster') && $request->has('prev')) {
            $request->validate([
                'title' => 'required|max:255',
                'episode' => 'integer',
                'poster' => 'required|max:255',
                'prev' => 'required|max:255'
            ]);
            if (AnimesSeasonsEpisodes::where('season', $season->id)->where('episode', $request->input('episode'))->doesntExist()) {
                $result = shell_exec('..\FFmpeg\bin\ffmpeg -i ' . $request->input('video') . ' 2>&1');
                preg_match('/(?<=Duration: )(\d{2}:\d{2}:\d{2})\.\d{2}/', $result, $match);
                $episode = new AnimesSeasonsEpisodes([
                    'title' => $request->input('title'),
                    'prev' => $request->input('prev'),
                    'episode' => $request->input('episode'),
                    'video' => $request->input('video'),
                    'image' => $anime->slug_name . "/episodes/" . $season->season . "_" . $request->input('episode') . ".jpg?" . str_random(20),
                    'poster' => $anime->slug_name . "/episodes/" . $season->season . "_" . $request->input('episode') . "_poster.jpg?" . str_random(20),
                    'hidden' => $anime->status,
                    'anime' => $anime->id,
                    'season' => $season->id,
                    'duration' => $match[1]
                ]);
                if ($request->input('poster') != "") {
                    Image::make($request->input('poster'))->resize(185, 105)->save(public_path("uploads/animes/" . $anime->slug_name . "/episodes/" . $season->season . "_" . $request->input('episode') . ".jpg"))->encode('jpg', 80);
                    Image::make($request->input('poster'))->resize(640, 360)->save(public_path("uploads/animes/" . $anime->slug_name . "/episodes/" . $season->season . "_" . $request->input('episode') . "_poster.jpg"))->encode('jpg', 80);
                }
                if ($anime->episodes()->save($episode)) {
                    return redirect()->route('panel-anime-edit-season', ['slug' => $anime->slug_name, 'season' => $season->season])->with('success', 'Episode \'' . $request->input('title') . '\' added.');
                }
            }
        } else if ($request->has('name')) {
            $request->validate([
                'name' => 'required|max:255'
            ]);
            $season->title = $request->input('name');
            if ($season->save()) {
                return redirect()->route('panel-anime-edit-season', ['slug' => $anime->slug_name, 'season' => $season->season])->with('success', 'Season \'' . $season->title . '\' edited.');
            }
        }
        return view('pages.panel.animes.season', [
            'anime' => $anime,
            'season' => $season,
            'episodes' => $season->episodes()->get()
        ]);
    }

    public function editEpisode(Request $request, $slug, $season_i, $episode_i) {
        $anime = Animes::where('slug_name', $slug)->firstOrFail();
        if (Auth::user()->editor <= 1) {
            abort_if($anime->userid != Auth::user()->id, 404);
        }
        $season = AnimesSeasons::where('anime', $anime->id)->where('season', $season_i)->firstOrFail();
        $episode = AnimesSeasonsEpisodes::where('season', $season->id)->where('episode', $episode_i)->firstOrFail();
        if ($request->has('title') && $request->has('prev')) {
            $request->validate([
                'title' => 'required|max:255',
                'prev' => 'required|max:255'
            ]);
            $episode->title = $request->input('title');
            $episode->prev = $request->input('prev');
            if ($request->has('video') && $request->input('video') != $episode->video) {
                $episode->video = $request->input('video');
                $result = shell_exec('..\FFmpeg\bin\ffmpeg -i ' . $episode->video . ' 2>&1');
                preg_match('/(?<=Duration: )(\d{2}:\d{2}:\d{2})\.\d{2}/', $result, $match);
                $episode->duration = $match[1];
            }
            if ($request->has('poster') && $request->input('poster') != "") {
                    Image::make($request->input('poster'))->resize(185, 105)->save(public_path("uploads/animes/" . $anime->slug_name . "/episodes/" . $season->season . "_" . $episode->episode . ".jpg"))->encode('jpg', 80);
                    $episode->image = $anime->slug_name . "/episodes/" . $season->season . "_" . $episode->episode . ".jpg?" . str_random(20);

                    Image::make($request->input('poster'))->resize(640, 360)->save(public_path("uploads/animes/" . $anime->slug_name . "/episodes/" . $season->season . "_" . $episode->episode . "_poster.jpg"))->encode('jpg', 80);
                    $episode->poster = $anime->slug_name . "/episodes/" . $season->season . "_" . $episode->episode . "_poster.jpg?" . str_random(20);
            }
            if ($episode->save()) {
                return redirect()->route('panel-anime-edit-season-episode', ['slug' => $anime->slug_name, 'season' => $season->season, 'episode' => $episode_i])->with('success', 'Episode \'' . $episode->title . '\' edited.');
            }
        }
        return view('pages.panel.animes.episode', [
            'anime' => $anime,
            'season' => $season,
            'episode' => $episode
        ]);
    }
}