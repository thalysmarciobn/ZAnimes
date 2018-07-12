<?php

namespace App\Services\Contracts;

interface ZAnimesInterface {

    public function monthly();

    public function animesInRelease();

    public function episodesInRelease($take);

    public function recentEpisodesViews($limit);

    public function latestAnimes($limit);

    public function getAnimeOrFail($key, $value);

    public function getSimilarAnimes($anime, $limit);
}