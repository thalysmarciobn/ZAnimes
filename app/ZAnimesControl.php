<?php

namespace App;

use App\Models\Animes;
use App\Models\Genres;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ZAnimesControl
{

    public static function put($path, $data) {
        Storage::disk('cdn')->put($path, $data);
    }

    public static function deleteDirectory($directory) {
        Storage::disk('cdn')->deleteDirectory($directory);
    }

    public static function url($path) {
        return config("app.cdn") . "/" . $path;
    }

    public static function genre($slug) {
        return Genres::find($slug)->name;
    }

    public static function genres() {
        return Genres::get();
    }

    public static function getDuration($video)
    {
        try {
            $result = shell_exec('..\FFmpeg\bin\ffmpeg -i ' . $video . ' 2>&1');
            preg_match('/(?<=Duration: )(\d{2}:\d{2}:\d{2})\.\d{2}/', $result, $match);
            return $match[1];
        } catch (\Exception $e) {
            throw new \Exception('Can\'t get video duration.');
        }
    }

    public static function paginateAnimes($request, $count) {
        Validator::make($request->all(), [
            'procura' => 'required|max:255',
            'author' => 'required|max:255',
            'genre' => 'required|max:255',
            'status:0' => 'required|max:255',
            'status:1' => 'required|max:255',
            'status:1' => 'required|max:255',
            __('animes.type') => 'required|max:255'
        ]);
        $anime = Animes::query();
        if ($request->has("procura")) {
            if (!empty($request->procura)) {
                $anime->where('name', 'LIKE', '%' . $request->procura . '%')
                    ->orWhere('slug_name', 'LIKE', '%' . $request->procura . '%');
            }
        }
        switch ($request->get(__('animes.type'))) {
            case __('animes._recents'):
                $anime->orderBy('latest_episode', 'desc');
                break;
            case __('animes._news'):
                $anime->orderBy('created_at', 'desc');
                break;
            default:
                $anime->orderBy('name', 'asc');
                break;
        }
        if ($request->has("author")) {
            $anime->orWhere('author', 'LIKE', '%'. $request->author .'%');
        }
        if ($request->has("genre")) {
            if (is_array($request->genre)) {
                foreach ($request->genre as $genre) {
                    $anime->where("genres", 'LIKE', '%' . $genre . '%');
                }
            }
        }
        if ($request->has("release")) {
            $anime->orWhere('year', $request->release);
        }
        if ($request->has("status:0")) {
            $anime->orWhere('status', 0);
        }
        if ($request->has("status:1")) {
            $anime->orWhere('status', 1);
        }
        $paginate = $anime->paginate($count);
        return $paginate;
    }
}