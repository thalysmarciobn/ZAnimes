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
            'animes' => Animes::get()
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
        if ($request->has('name') && $request->has('author') && $request->has('year') && $request->has('status') && $request->has('sinopse')) {
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
        }
        $anime_genres = array();
        foreach(explode(',', $anime->genres) as $genre)
        {
            array_push($anime_genres, $genre);
        }
        if ($request->has('title') && $request->has('season')) {
            $request->validate([
                'title' => 'required|max:255',
                'season' => 'integer'
            ]);
            if (AnimesSeasons::getSeasonByAnime($anime->id)->where('season', $request->input('season'))->doesntExist()) {
                $season = new AnimesSeasons([
                    'anime' => $anime->id,
                    'title' => $request->input('title'),
                    'season' => $request->input('season')
                ]);
                if ($anime->seasons()->save($season)) {
                    return redirect()->route('panel-anime-edit', ['slug' => $anime->slug_name])->with('success', 'Season \'' . $season->title . '\' added.');
                }
            }
        }
        return view('pages.panel.animes.edit', [
            'anime' => $anime,
            'anime_genres' => $anime_genres,
            'genres' => Genres::get()
        ]);
    }

    public function editSeason(Request $request, $slug, $season) {
        $anime = Animes::where('slug_name', $slug)->firstOrFail();
        $season = AnimesSeasons::getSeason($anime->id, $season)->firstOrFail();
        if ($request->has('name'))
        {
            $request->validate([
                'name' => 'required|max:255'
            ]);
            if ($request->has('delete')) {
                $season->episodes()->delete();
                $season->delete();
                return redirect()->route('panel-anime-edit', ['slug' => $anime->slug_name])->with('success', 'Season \'' . $season->title . '\' deleted.');
            }
            $season->title = $request->input('name');
            $season->save();
        }
        return view('pages.panel.animes.season', [
            'anime' => $anime,
            'season' => $season
        ]);
    }
}