@extends('layouts.pages_full')

@section('title', __('season.title'))

@section('header')
    <div class="c-search-header__wrapper">
        <div class="container">
            <div class="c-breadcrumb-wrapper">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">
                                    @lang('pages.menu.home')
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Anime</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('pages.menu.season')</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@stop

@section('container')
    <div class="widget col-md-12">
        <div class="c-widget-wrap">
            <div class="c-blog__heading style-2 font-heading">
                <h4>
                    @lang('season.title')
                </h4>
            </div>
            <div class="tab-content-wrap calendar">

                <ol class="days">
                    @foreach($week as $day)
                        @php($today = \Carbon\Carbon::now()->isDayOfWeek($day->id))
                        <li class="day">
                            <div class="head">
                                @if ($today)
                                    <h2>@lang('season.today')</h2>
                                @else
                                    <h2>{{ $day->slug }}</h2>
                                @endif
                                <h4>Animes: {{ $day->animes->count() }}</h4>
                            </div>
                            <ul class="animes">
                                <div class="content">
                                @foreach($day->animes as $data)
                                    @php($anime = $data->anime)
                                    <li>
                                        <div class="time">{{ $data->hour }}</div>
                                        <div class="name">{{ $anime->name }}</div>
                                        <a title="{{ $anime->title }}" href="{{ route('anime.default', ['anime_slug' => $anime->slug_name]) }}">
                                            <div class="poster">
                                                <img data-src="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive lazyload" alt="{{ $anime->name }}"/>
                                            </div>
                                        </a>
                                        @if ($anime->episodes->count() > 0)
                                            @php($episode = $anime->episodes->first())
                                            <a href="{{ route('anime.episode', ['anime_slug' => $anime->slug_name, 'episode' => $episode->episode, 'episode_slug' => $episode->slug, 'season' => $episode->season_id]) }}">
                                                <div class="latest">
                                                    @lang('season.latest_episode')
                                                </div>
                                            </a>
                                        @endif
                                    </li>
                                @endforeach
                                </div>
                            </ul>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@stop
