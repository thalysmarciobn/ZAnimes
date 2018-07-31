@extends('layouts.pages_full')

@section('title', __('home.title'))


@section('og_title', __('head.og_title', ['name' => config('app.name')]))
@section('og_description', __('head.og_description', ['name' => config('app.name')]))
@section('og_image', '')

@section('header')

    <div class="releases">
        <div class="container">
            <div class="c-breadcrumb-wrapper">
                <div class="col-md-12">
                    <div class="c-widget-wrap">
                        <div class="popular-slider style-1" data-style="style-1" data-count="6">
                            <div class="c-blog__heading style-2 font-heading">
                                <h4>@lang('home.releases')</h4>
                            </div>
                            <div class="slider__container" role="toolbar">
                                @foreach ($releases as $release)
                                    <div class="slider__item">
                                        <div class="anime">
                                            <a title="{{ $release->title }}" href="{{ route('anime.default', ['anime_slug' => $release->slug_name]) }}">
                                                <div class="poster">
                                                    <img data-src="{{ ZAnimesControl::url('animes/' . $release->slug_name . '/' . $release->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $release->slug_name . '/' . $release->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-fluid lazyload" alt="{{ $release->name }}"/>
                                                </div>
                                                <div class="info">
                                                    <div class="title">{{ $release->name }}</div>
                                                    <div class="episodes">@lang('home.episodes', ['count' => $release->episodes->count()])</div>
                                                </div>
                                                <div class="shadow"></div>
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
@stop

@section('container')


    <div class="widget col-12">
        <div class="row">
            <div class="widget col-lg-8">
                <div class="popular-slider style-1 eps" data-style="style-1" data-count="4">
                    <div class="c-blog__heading style-2 font-heading">
                        <h4>@lang('home.latest-releases')</h4>
                    </div>
                    <div class="slider__container" role="toolbar">
                        @foreach ($releases_episodes as $release_episode)
                            <div class="slider__item">
                                <div class="anime">
                                    <div class="episode">
                                        <div class="data">
                                            <div class="thumb c-image-hover">
                                                <a href="{{ route('anime.episode', ['anime_slug' => $release_episode->season->anime->slug_name, 'episode' => $release_episode->episode, 'episode_slug' => $release_episode->slug, 'season' => $release_episode->season_id]) }}">
                                                    <img data-src="{{ ZAnimesControl::url('animes/' . $release_episode->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $release_episode->image) }}"  class="img-fluid lazyload effect-fade" alt="{{ $release_episode->name }}"/>
                                                    <div class="duration">{{ str_replace('00:', '', gmdate("H:i:s", $release_episode->duration)) }}</div>
                                                </a>
                                            </div>
                                            @auth
                                                <div class="episode_progress">
                                                    <div class="ep_progress" style="width:{{ ZAnimesControl::porcentage($release_episode->current) }}%;"></div>
                                                </div>
                                            @endauth
                                            <h3>
                                                <a href="{{ route('anime.episode', ['anime_slug' => $release_episode->season->anime->slug_name, 'episode' => $release_episode->episode, 'episode_slug' => $release_episode->slug, 'season' => $release_episode->season_id]) }}">@lang('pages.episode'): {{ $release_episode->episode }}</a>
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

                <div class="popular-slider style-1 anims" data-style="style-1" data-count="4">
                    <div class="c-blog__heading style-2 font-heading">
                        <h4>@lang('home.weekly_recommendation')</h4>
                    </div>
                    <div class="slider__container" role="toolbar">
                        @foreach ($weekly_recommendation as $weekly)
                            <div class="slider__item">
                                <div class="anime">
                                    <a title="{{ $weekly->title }}" href="{{ route('anime.default', ['anime_slug' => $weekly->slug_name]) }}">
                                        <div class="poster">
                                            <img data-src="{{ ZAnimesControl::url('animes/' . $weekly->slug_name . '/' . $weekly->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $weekly->slug_name . '/' . $weekly->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-fluid lazyload" alt="{{ $weekly->name }}"/>
                                        </div>
                                        <div class="info">
                                            <div class="title">{{ $weekly->name }}</div>
                                            <div class="eps">@lang('home.episodes', ['count' => $weekly->episodes->count()])</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="weekly">
                    <div class="c-blog__heading style-2 font-heading">
                        <h4>Animes Em Alta</h4>
                    </div>
                    <div id="trend" class="slide carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($slides as $slide)
                                <li data-target="#trend" data-slide-to="{{ $loop->iteration - 1 }}" class=" @if ($loop->first) active @endif "></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($slides as $slide)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <div class="image" style="--image: url({{ \App\ZAnimesControl::url($slide->image) }})">
                                        <div class="background">
                                            <div class="content">
                                                <div class="container">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                                <a title="{{ $slide->anime->title }}" href="{{ route('anime.default', ['anime_slug' => $slide->anime->slug_name]) }}">
                                                                    <div class="poster img-fluid">
                                                                        <img data-src="{{ ZAnimesControl::url('animes/' . $slide->anime->slug_name . '/' . $slide->anime->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $slide->anime->slug_name . '/' . $slide->anime->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="lazyload"/>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-9 col-md-8 col-sm-12">
                                                                <a title="{{ $slide->anime->title }}" href="{{ route('anime.default', ['anime_slug' => $slide->anime->slug_name]) }}">
                                                                    <h4>{{ $slide->anime->name }}</h4>
                                                                </a>
                                                                <span>
                                                                    {{ $slide->anime->sinopse }}
                                                                </span>
                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#trend" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#trend" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="popular-slider style-1 anims" data-style="style-1" data-count="4">
                    <div class="c-blog__heading style-2 font-heading">
                        <h4>@lang('home.latest-animes')</h4>
                    </div>
                    <div class="slider__container" role="toolbar">
                        @foreach ($latests as $latest)
                            <div class="slider__item">
                                <div class="anime">
                                    <a title="{{ $latest->title }}" href="{{ route('anime.default', ['anime_slug' => $latest->slug_name]) }}">
                                        <div class="poster">
                                            <img data-src="{{ ZAnimesControl::url('animes/' . $latest->slug_name . '/' . $latest->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $latest->slug_name . '/' . $latest->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-fluid lazyload" alt="{{ $latest->name }}"/>
                                        </div>
                                        <div class="info">
                                            <div class="title">{{ $latest->name }}</div>
                                            <div class="eps">@lang('home.episodes', ['count' => $latest->episodes->count()])</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="popular-slider style-1 eps" data-style="style-1" data-count="4">
                    <div class="c-blog__heading style-2 font-heading">
                        <h4>@lang('home.being-watched-at-this-moment')</h4>
                    </div>
                    <div class="slider__container" role="toolbar">
                        @foreach ($episodes_views as $episode_view)
                            <div class="slider__item">
                                <div class="anime">
                                    <div class="episode">
                                        <div class="data">
                                            <div class="thumb c-image-hover">
                                                <a href="{{ route('anime.episode', ['anime_slug' => $episode_view->season->anime->slug_name, 'episode' => $episode_view->episode, 'episode_slug' => $episode_view->slug, 'season' => $episode_view->season_id]) }}">
                                                    <img data-src="{{ ZAnimesControl::url('animes/' . $episode_view->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $episode_view->image) }}"  class="img-fluid lazyload effect-fade" alt="{{ $episode_view->name }}"/>
                                                    <div class="duration">{{ str_replace('00:', '', gmdate("H:i:s", $episode_view->duration)) }}</div>
                                                </a>
                                            </div>
                                            @auth
                                                <div class="episode_progress">
                                                    <div class="ep_progress" style="width:{{ ZAnimesControl::porcentage($episode_view->current) }}%;"></div>
                                                </div>
                                            @endauth
                                            <h3>
                                                <a href="{{ route('anime.episode', ['anime_slug' => $episode_view->season->anime->slug_name, 'episode' => $episode_view->episode, 'episode_slug' => $episode_view->slug, 'season' => $episode_view->season_id]) }}">@lang('pages.episode'): {{ $episode_view->episode }}</a>
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
            <div class="widget col-lg-4 default no-icon heading-style-1 c-popular pull-right">
                @include('inc.top_animes')

                <div class="iframe embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://discordapp.com/widget?id=467563599238529025&theme=dark" width="100%" height="600" allowtransparency="true" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

@stop

