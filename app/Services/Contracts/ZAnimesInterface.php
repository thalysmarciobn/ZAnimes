<?php

namespace App\Services\Contracts;

interface ZAnimesInterface {

    public function slidesAnimesH();

    public function animes();

    public function genres();

    public function monthly($count);

    public function weeklyRecommendation($count);

    public function animesInRelease();

    public function episodesInRelease($take);

    public function recentEpisodesViews($limit);

    public function latestAnimes($limit);

    public function getAnimeOrFail($key, $value);

    public function getSimilarAnimes($anime, $limit);

    public function getEpisodeOrFail($anime_slug, $season, $episode, $episode_slug);

    public function getEpisodes($anime);

    public function getWatchOrFail($session, $key, $id, $slug);

    public function checkWatchAccess($address, $anime_id, $season_id, $episode_id);

    public function addWatchAccess($address, $anime_id, $season_id, $episode_id);

    public function episodeUser($user, $completed, $anime_id, $season_id, $episode_id, $current_time);

    public function getUserEpisode($user, $anime_id, $season_id, $episode_id);

    public function flashEpisodeKey($session, $season, $episode);

    public function paginateAnimes($request, $count);

    public function timeToSeconds($time, $seconds);

    public function getDuration($video);

    public function noobInitial($episodes, $id);
}
