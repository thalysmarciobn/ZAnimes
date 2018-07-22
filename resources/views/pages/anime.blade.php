@extends('layouts.pages')

@section('title', $anime->name)

@section('og_title', __('head.anime.og_title', ['anime' => $anime->name]))
@section('og_description', __('head.anime.og_description', ['anime' => $anime->name, 'description' => $anime->sinopse]))
@section('og_image', ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image))

@section('header')
    <div class="c-search-header__wrapper">
        <div class="container">
            <div class="c-breadcrumb-wrapper">
                <div class="container">
                    <div class="col-md-12">
                        <div class="c-breadcrumb">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{ route('home') }}">
                                        @lang('pages.menu.home')
                                    </a>
                                </li>
                                <li>
                                    Anime
                                </li>
                                <li class="active">
                                    {{ $anime->name }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('container')


    <div class="widget col-md-12">
        <div class="c-widget-content style-1">
            <div class="c-blog__heading style-2 font-heading">
                <h4>@lang('anime.episodes')</h4>
            </div>
            <div class="widget-content">
                <div id="seasons">
                    <div class="listing-chapters_wrap">
                        <div class="main version-chap loaded episodes">
                            @foreach($anime->seasons as $season)

                            <div class="parent has-child">
                                @if($anime->seasons->count() > 1)
                                    <a href="javascript:void(0)" class="has-child menu active">{{ $season->title }}</a>
                                @endif
                                <div class="sub-chap list-chap" @if (!$loop->first) style="display: none;"@endif>
                                    @foreach($season->episodes as $episode)
                                        <div class="col-md-3 episode">
                                            <div class="anime">
                                                <div class="episode">

                                                    <div class="data">
                                                        <div class="thumb c-image-hover">
                                                            <a href="{{ route('anime.episode', ['anime_slug' => $anime->slug_name, 'episode' => $episode->episode, 'episode_slug' => $episode->slug, 'season' => $episode->season_id]) }}">
                                                                <img width="100px" height="60px" data-src="{{ ZAnimesControl::url('animes/' . $episode->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $episode->image) }}"  class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}"  alt="{{ $episode->name }}"/>
                                                                <div class="duration">{{ str_replace('00:', '', gmdate("H:i:s", $episode->duration)) }}</div>
                                                            </a>
                                                        </div>
                                                        <div class="episode_progress">
                                                            @auth
                                                                <div class="ep_progress" style="width:{{ ZAnimesControl::porcentage($episode->current) }}%;"></div>
                                                            @else

                                                                <div class="ep_progress" style="width:0;"></div>
                                                            @endauth
                                                        </div>
                                                        <h3>
                                                            <a href="{{ route('anime.episode', ['anime_slug' => $episode->season->anime->slug_name, 'episode' => $episode->episode, 'episode_slug' => $episode->slug, 'season' => $episode->season_id]) }}">@lang('pages.episode'): {{ $episode->episode }}</a>
                                                        </h3>
                                                    </div>

                                                    <div class="extra">
                                                        <div class="name">{{ $episode->title }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="widget col-md-12">
        <div class="c-widget-wrap">
            <div class="popular-slider style-1" data-style="style-1" data-count="5">
                <div class="c-blog__heading style-1 font-heading">
                    <h4>@lang('anime.also_liked')</h4>
                </div>
                <div class="slider__container" role="toolbar">
                    @foreach ($similar as $anim)
                        <div class="slider__item">
                            <div class="anime">
                                <a title="{{ $anim->title }}" href="{{ route('anime.default', ['anime_slug' => $anim->slug_name]) }}">
                                    <div class="poster">
                                        <img data-src="{{ ZAnimesControl::url('animes/' . $anim->slug_name . '/' . $anim->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $anim->slug_name . '/' . $anim->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive lazyload" src="{{ asset('images/video_empty.png') }}" style="padding-top:180px; " alt="{{ $anim->name }}"/>
                                    </div>
                                    <div class="info">
                                        <div class="title">{{ $anim->name }}</div>
                                        <div class="eps">@lang('home.episodes', ['count' => $anim->episodes->count()])</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@stop

@section('sidebar')
    <div class="widget col-md-12 default no-icon heading-style-1 c-popular">
        <div class="row">
            <div class="c-page__content">

                <div class="c-blog__heading style-2 font-heading">
                    <h4>{{ $anime->name }}</h4>
                </div>
                <div class="widget-content">
                    <div class="item-thumb">
                        <img data-src="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}" style="padding-top:180px; " alt="{{ $anime->name }}"/>
                    </div>
                    <div class="manga-action">
                        <div class="add-bookmark">
                            <div class="action_icon">
                                <a href="#" data-action="bookmark" data-post="302" data-chapter="" data-page="" title="Bookmark">
                                    <i class="ion-android-bookmark"></i></a></div><div class="action_detail">
                                <span>Bookmark This</span>
                            </div>
                        </div>
                        <div class="add-bookmark">
                            <div class="action_icon">
                                <a href="#" data-action="bookmark" data-post="302" data-chapter="" data-page="" title="Bookmark">
                                    <i class="ion-android-star"></i></a></div><div class="action_detail">
                                <span>Bookmark This</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="manga-info">
                    <h4>@lang('anime.info')</h4>
                    <div class="item-summary">
                        <div class="post-content">
                            <div class="post-content_item">
                                <div class="summary-heading">
                                    <h5>
                                        @lang('anime.author')
                                    </h5>
                                </div>
                                <div class="summary-content">
                                    {{ $anime->author }}
                                </div>
                            </div>
                            <div class="post-content_item">
                                <div class="summary-heading">
                                    <h5>
                                        @lang('anime.status')
                                    </h5>
                                </div>
                                <div class="summary-content">
                                    @if ($anime->status == 1)
                                        @lang('anime.completed')
                                    @else
                                        @lang('anime.on_going')
                                    @endif
                                </div>
                            </div>
                            <div class="post-content_item">
                                <div class="summary-heading">
                                    <h5>
                                        @lang('anime.year')
                                    </h5>
                                </div>
                                <div class="summary-content">
                                    {{ $anime->year }}
                                </div>
                            </div>
                            <div class="post-content_item">
                                <div class="summary-heading">
                                    <h5>
                                        @lang('anime.poster')
                                    </h5>
                                </div>
                                <div class="summary-content">
                                    <a href="{{ route('profile', ['name' => $anime->creator->name]) }}">{{ $anime->creator->name }}</a>
                                </div>
                            </div>
                            <div class="post-content_item">
                                <div class="summary-heading">
                                    <h5>
                                        @lang('anime.genres')
                                    </h5>
                                </div>
                                <div class="summary-content">
                                    <div class="genres-content">
                                        @foreach($anime->genres as $genre)
                                            {{ $genre->name }}@if (!$loop->last), @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4>@lang('anime.about')</h4>
                    <div class="description-summary">
                        <div class="summary__content" style="height: 120px;">
                            <p>{{ $anime->sinopse }}</p>

                        </div>
                        <div class="c-content-readmore">
                            <span class="btn btn-link content-readmore less" style="display: inline-block;">Mostrar mais  </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
