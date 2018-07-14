<?php

namespace App;

use Illuminate\Support\Facades\Storage;

class ZAnimesControl {

    public static function put($path, $data) {
        Storage::disk('cdn')->put($path, $data);
    }

    public static function deleteDirectory($directory) {
        Storage::disk('cdn')->deleteDirectory($directory);
    }

    public static function url($path) {
        return config("app.cdn") . "/" . $path;
    }

    public static function hashing($x, $y) {
        return strrev(strtoupper(substr(hash('sha512', $y . strtolower($x)), strlen($x), 30)));
    }
}