@extends('layouts.pages')

@section('title', __('home.title'))

@section('header')
    <div class="c-search-header__wrapper">
        <div class="container">
            <div class="c-breadcrumb-wrapper">
                <div class="col-md-12">
                    <div class="row">
                        <div class="c-widget-wrap">
                            <div class="popular-slider style-1" data-style="style-1" data-count="7">
                                <div class="c-blog__heading style-2 font-heading">
                                    <h4>@lang('home.releases')</h4>
                                </div>
                                <div class="slider__container" role="toolbar">
                                    @foreach ($releases as $release)
                                        <div class="slider__item">
                                            <div class="anime c-image-hover">
                                                <a title="{{ $release->title }}" href="{{ route('anime', ['anime_slug' => $release->slug_name]) }}">
                                                    <div class="info">
                                                        <div class="title">{{ $release->name }}</div>
                                                        <div class="year">{{ $release->year }}</div>
                                                    </div>
                                                    <div class="poster">
                                                        <img data-src="{{ ZAnimesControl::url('animes/' . $release->slug_name . '/' . $release->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $release->slug_name . '/' . $release->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}" style="padding-top:180px; " alt="{{ $release->name }}"/>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('container')

    <div class="widget col-md-12">
        <div class="row">
            <div class="c-widget-wrap">
                <div class="popular-slider style-1" data-style="style-2" data-count="4">
                    <div class="c-blog__heading style-1 font-heading">
                        <h4>@lang('home.latest-releases')</h4>
                    </div>
                    <div class="slider__container" role="toolbar">
                        @foreach ($releases_episodes as $release_episode)
                            <div class="slider__item">
                                <div class="anime">
                                    <div class="episode">
                                        <div class="thumb c-image-hover">
                                            <a href="{{ route('episode', ['anime_slug' => $release_episode->season->anime->slug_name, 'episode' => $release_episode->episode, 'episode_slug' => $release_episode->slug, 'season' => $release_episode->id]) }}">
                                                <img  data-src="{{ ZAnimesControl::url('animes/' . $release_episode->slug_name . '/' . $release_episode->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $release_episode->slug_name . '/' . $release_episode->image) }}"  class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}"  alt="{{ $release_episode->name }}"/>
                                                <div class="duration">{{ str_replace('00:', '', $release_episode->duration) }}</div>
                                            </a>
                                        </div>
                                        <div class="data">
                                            <h3>
                                                <a href="{{ route('episode', ['anime_slug' => $release_episode->season->anime->slug_name, 'episode' => $release_episode->episode, 'episode_slug' => $release_episode->slug, 'season' => $release_episode->id]) }}">@lang('pages.episode'): {{ $release_episode->episode }}</a>
                                            </h3>
                                        </div>
                                        <div class="extra">
                                            <div class="name">{{ $release_episode->season->anime->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget col-md-12">
        <div class="row">
            <div class="c-widget-wrap">
                <div class="popular-slider style-1" data-style="style-2" data-count="4">
                    <div class="c-blog__heading style-1 font-heading">
                        <h4>@lang('home.latest-animes')</h4>
                    </div>
                    <div class="slider__container" role="toolbar">
                        @foreach ($latests as $latest)
                            <div class="slider__item">
                                <div class="anime c-image-hover">
                                    <a title="{{ $latest->title }}" href="{{ route('anime', ['anime_slug' => $latest->slug_name]) }}">
                                        <div class="info">
                                            <div class="title">{{ $latest->name }}</div>
                                            <div class="year">{{ $latest->year }}</div>
                                        </div>
                                        <div class="poster">
                                            <img data-src="{{ ZAnimesControl::url('animes/' . $latest->slug_name . '/' . $latest->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $latest->slug_name . '/' . $latest->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}" style="padding-top:180px; " alt="{{ $latest->name }}"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="widget col-md-12">
        <div class="row">
            <div class="c-widget-wrap">
                <div class="popular-slider style-1" data-style="style-2" data-count="4">
                    <div class="c-blog__heading style-1 font-heading">
                        <h4>@lang('home.being-watched-at-this-moment')</h4>
                    </div>
                    <div class="slider__container" role="toolbar">
                        @foreach ($episodes_views as $episode_view)
                            <div class="slider__item">
                                <div class="anime">
                                    <div class="episode">
                                        <div class="thumb c-image-hover">
                                            <a href="{{ route('episode', ['anime_slug' => $episode_view->season->anime->slug_name, 'episode' => $episode_view->episode, 'episode_slug' => $episode_view->slug, 'season' => $episode_view->id]) }}">
                                                <img  data-src="{{ ZAnimesControl::url('animes/' . $episode_view->slug_name . '/' . $episode_view->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $episode_view->slug_name . '/' . $episode_view->image) }}"  class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}"  alt="{{ $episode_view->name }}"/>
                                                <div class="duration">{{ str_replace('00:', '', $episode_view->duration) }}</div>
                                            </a>
                                        </div>
                                        <div class="data">
                                            <h3>
                                                <a href="{{ route('episode', ['anime_slug' => $episode_view->season->anime->slug_name, 'episode' => $episode_view->episode, 'episode_slug' => $episode_view->slug, 'season' => $episode_view->id]) }}">@lang('pages.episode'): {{ $episode_view->episode }}</a>
                                            </h3>
                                        </div>
                                        <div class="extra">
                                            <div class="name">{{ $episode_view->season->anime->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('sidebar')
    <div class="widget col-xs-12 col-md-12 default no-icon heading-style-1 c-popular">
        <div class="c-widget-content style-1">
            <div class="c-blog__heading style-2 font-heading">
                <h4>@lang('home.most-accesseds-in-the-month')</h4>
            </div>
            <div id="home-toprank-list-1" class="top5__list" data-genre="gl">
                @foreach ($monthly as $anime)
                    <li class="top5__item">
                        <div class="top5__link">
                            <div class="top5__ranking">{{ $loop->iteration }}</div>
                            <div class="popular-img widget-thumbnail">
                                <img data-src="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-sizes="(max-width: 50px) 75vw, 50px" class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}">
                            </div>
                            <div class="top5__title"><a href="{{ $anime->title }}" href="{{ route('anime', ['anime_slug' => $anime->slug_name]) }}">{{ $anime->name }}</a></div>
                            <div class="top5__author">
                                <span class="artist-link" data-artist="misspm">{{ $anime->author }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </div>
        </div>
    </div>
@stop