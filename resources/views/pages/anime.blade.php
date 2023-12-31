@extends('layouts.pages_full')

@section('title', $anime->name)

@section('og_title', __('head.anime.og_title', ['anime' => $anime->name]))
@section('og_description', __('head.anime.og_description', ['anime' => $anime->name, 'description' => $anime->sinopse]))
@section('og_image', ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image))

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
                            <li class="breadcrumb-item active" aria-current="page">{{ $anime->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@stop

@section('container')
    <div class="float-lg-right widget col-lg-4 default no-icon heading-style-1 c-popular">
        <div class="c-page__content">
            <div class="c-blog__heading style-2 font-heading">
                <h4>{{ $anime->name }}</h4>
            </div>
            <div class="widget-content">
                <div class="item-thumb">
                    <img data-src="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-fluid lazyload effect-fade" alt="{{ $anime->name }}"/>
                </div>
                <div class="manga-action">
                    <div class="add-bookmark">
                        <div class="action_icon">
                            <a href="#" data-action="bookmark" data-post="302" data-chapter="" data-page="" title="Bookmark">
                                <i class="ion ion-md-bookmark"></i></a></div><div class="action_detail">
                            <span>Bookmark This</span>
                        </div>
                    </div>
                    <div class="add-bookmark">
                        <div class="action_icon">
                            <a href="#" data-action="bookmark" data-post="302" data-chapter="" data-page="" title="Bookmark">
                                <i class="ion ion-md-bookmark"></i></a></div><div class="action_detail">
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
                                    @lang('anime.studio')
                                </h5>
                            </div>
                            <div class="summary-content">
                                {{ $anime->studio }}
                            </div>
                        </div>
                        <div class="post-content_item">
                            <div class="summary-heading">
                                <h5>
                                    @lang('anime.age_group')
                                </h5>
                            </div>
                            <div class="summary-content">
                                {{ $anime->age_group }}
                            </div>
                        </div>
                        <div class="post-content_item">
                            <div class="summary-heading">
                                <h5>
                                    @lang('anime.uploader')
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
                    {{ $anime->sinopse }}
                </div>
            </div>
        </div>
    </div>
    <div class="float-lg-left widget col-lg-8">
        <div class="style-1">
            <div class="c-blog__heading style-2 font-heading">
                <h4>@lang('anime.episodes')</h4>
            </div>
            <div class="widget-content">
                <div id="seasons">
                    <div class="listing-chapters_wrap">
                        <div class="main version-chap loaded episodes">
                            <div id="accordion">
                                @foreach($anime->seasons as $season)
                                    <div @if($anime->seasons->count() == 1 && $loop->first)style="display: none" @endif id="heading{{ $season->id }}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link menu" data-toggle="collapse" data-target="#collapse{{ $season->id }}" aria-expanded=" @if ($loop->first) true @else false @endif" aria-controls="collapse{{ $season->id }}">
                                                {{ $season->title }}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse{{ $season->id }}" class="collapse @if ($loop->first) show @endif " aria-labelledby="heading{{ $season->id }}" data-parent="#accordion">
                                        <div class="col-md-12">
                                            <div class="row">
                                                @foreach($season->episodes as $episode)
                                                    <div class="col-md-3 episode">
                                                        <div class="anime">
                                                            <div class="episode">
                                                                <div class="data">
                                                                    <div class="thumb c-image-hover">
                                                                        <a href="{{ route('anime.episode', ['anime_slug' => $anime->slug_name, 'episode' => $episode->episode, 'episode_slug' => $episode->slug, 'season' => $episode->season_id]) }}">
                                                                            <img width="100px" height="60px" data-src="{{ ZAnimesControl::url('animes/' . $episode->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $episode->image) }}"  class="img-fluid lazyload effect-fade" alt="{{ $episode->name }}"/>
                                                                            <div class="duration">{{ str_replace('00:', '', gmdate("H:i:s", $episode->duration)) }}</div>
                                                                        </a>
                                                                    </div>
                                                                    @auth
                                                                        <div class="episode_progress">
                                                                            <div class="ep_progress" style="width:{{ ZAnimesControl::porcentage($episode->current) }}%;"></div>
                                                                        </div>
                                                                    @endauth
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
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="c-widget-wrap">
            <div class="popular-slider style-1 anims" data-style="style-1" data-count="4">
                <div class="c-blog__heading style-1 font-heading">
                    <h4>@lang('anime.also_liked')</h4>
                </div>
                <div class="slider__container" role="toolbar">
                    @foreach ($similar as $anim)
                        <div class="slider__item">
                            <div class="anime">
                                <a title="{{ $anim->title }}" href="{{ route('anime.default', ['anime_slug' => $anim->slug_name]) }}">
                                    <div class="poster">
                                        <img data-src="{{ ZAnimesControl::url('animes/' . $anim->slug_name . '/' . $anim->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $anim->slug_name . '/' . $anim->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive lazyload" alt="{{ $anim->name }}"/>
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
