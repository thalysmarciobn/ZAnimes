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
            </div>
        </div>
    </div>
@stop

@section('container')
    <div class="widget col-md-12">
        <div class="row">
            <div class="c-widget-wrap">
                <div class="popular-slider style-1" data-style="style-1" data-count="4">
                    <div class="c-blog__heading style-2 font-heading">
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
                <div class="popular-slider style-1" data-style="style-1" data-count="4">
                    <div class="c-blog__heading style-2 font-heading">
                        <h4>@lang('home.being-watched-at-this-moment')</h4>
                    </div>
                    <div class="slider__container" role="toolbar">
                        @foreach ($episodes_views as $latest)
                            <div class="slider__item">
                                <div class="anime">
                                    <div class="episode">
                                        <div class="thumb c-image-hover">
                                            <a href="{{ route('episode', ['anime_slug' => $latest->season->anime->slug_name, 'episode' => $latest->episode, 'episode_slug' => $latest->slug, 'season' => $latest->id]) }}">
                                                <img  data-src="{{ ZAnimesControl::url('animes/' . $latest->slug_name . '/' . $latest->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $latest->slug_name . '/' . $latest->image) }}"  class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}"  alt="{{ $latest->name }}"/>
                                                <div class="duration">{{ str_replace('00:', '', $latest->duration) }}</div>
                                            </a>
                                        </div>
                                        <div class="data">
                                            <h3>
                                                <a href="{{ route('episode', ['anime_slug' => $latest->season->anime->slug_name, 'episode' => $latest->episode, 'episode_slug' => $latest->slug, 'season' => $latest->id]) }}">@lang('pages.episode'): {{ $latest->episode }}</a>
                                            </h3>
                                        </div>
                                        <div class="extra">
                                            <div class="name">{{ $latest->season->anime->name }}</div>
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