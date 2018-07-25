@extends('layouts.full')

@section('title', $episode->title . ' - ' . $episode->season->anime->name)


@section('og_title', __('head.episode.og_title', ['anime' => $episode->season->anime->name, 'episode' => $episode->episode, 'season' => $episode->season->title]))
@section('og_description', __('head.episode.og_description', ['anime' => $episode->season->anime->name, 'episode' => $episode->episode, 'season' => $episode->season->title, 'description' => $episode->prev]))
@section('og_image', ZAnimesControl::url('animes/' . $episode->image))

@section('header')

@stop

@section('content')
    <div class="episode_loc">
        <div class="container">
            <div class="col-12">
                <div class="video col-12">
                    <div class="row">
                        <div class="c-widget-wrap">
                            <div class="c-blog__heading style-2 episode">
                                <h4><b><a href="{{ route('anime.default', ['anime_slug' => $episode->season->anime->slug_name]) }}">{{ $episode->season->anime->name }}</a></b> - {{ $episode->title }}</h4>
                            </div>
                        </div>

                        <div class="col-12 c_player">

                            <div class="c-widget-wrap">
                                <div class="player embed-responsive embed-responsive-21by9">
                                    <div class="embed-responsive-item" id="player" style="position: absolute;width: 100%;height: 100%;">
                                        <video id="video-player" height="100%" class="video-js vjs-default-skin"  poster="{{ ZAnimesControl::url('animes/' . $episode->image) }}" style="width: 100%; height: 100%"></video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-12">
            <div class="popular-slider style-4 episodes" data-style="style-4" data-count="5" data-initial="{{ $initial[1] }}">
                <div class="list_5 slider__container" role="toolbar">
                    @foreach ($episodes as $_episode)
                        <div class="slider__item">
                            <div class="anime @if($loop->iteration == $initial[0]) active @endif ">
                                <div class="episode">
                                    <div class="data">
                                        <div class="thumb c-image-hover">
                                            <a href="{{ route('anime.episode', ['anime_slug' => $_episode->season->anime->slug_name, 'episode' => $_episode->episode, 'episode_slug' => $_episode->slug, 'season' => $_episode->season_id]) }}">
                                                <img data-src="{{ ZAnimesControl::url('animes/' . $_episode->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $_episode->image) }}"  class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}"  alt="{{ $_episode->name }}"/>
                                                <div class="duration">{{ str_replace('00:', '', gmdate("H:i:s", $_episode->duration)) }}</div>
                                            </a>
                                        </div>
                                        @auth
                                            <div class="episode_progress">
                                                <div class="ep_progress" style="width:{{ ZAnimesControl::porcentage($_episode->current) }}%;"></div>
                                            </div>
                                        @endauth
                                        <h3>
                                            <a href="{{ route('anime.episode', ['anime_slug' => $_episode->season->anime->slug_name, 'episode' => $_episode->episode, 'episode_slug' => $_episode->slug, 'season' => $_episode->season_id]) }}">T:{{ $_episode->season->season }} @lang('pages.episode'): {{ $_episode->episode }}</a>
                                        </h3>
                                    </div>
                                    <div class="extra">
                                        <div class="name">{{ $_episode->title }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12">

            <div class="c-widget-wrap">
                <div class="popular-slider style-1" data-style="style-1" data-count="7">
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
    </div>
@stop

@section('footer')
    <link href="{{ asset('watch/css/videojs.suggestedVideoEndcap.css') }}?{{ time() }}" rel="stylesheet">
    <link href="{{ asset('watch/css/video-js.min.css') }}?{{ time() }}" rel="stylesheet">
    <link href="{{ asset('watch/css/videojs-resolution-switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('watch/css/videojs-skin-colors.css') }}" rel="stylesheet">

    <script src="{{ asset('watch/js/video.min.js') }}"></script>
    <script src="{{ asset('watch/js/videojs.hotkeys.js') }}"></script>
    <script src="{{ asset('watch/js/videojs-resolution-switcher.js') }}"></script>
    <script src="{{ asset('watch/js/videojs.suggestedVideoEndcap.js') }}?{{ time() }}"></script>

    <script src="{{ asset('watch/remember.js') }}"></script>
    <script type='text/javascript' src="{{ route('watch', array('key' => ZAnimesControl::hashing($episode->season_id, $episode->episode), 'id' => $episode->id, 'slug' => $episode->slug)) }}"></script>
@stop
