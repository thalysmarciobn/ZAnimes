@extends('layouts.pages_full')

@section('title', $episode->title . ' - ' . $episode->season->anime->name)

@section('header')
    <div class="c-search-header__wrapper">
        <div class="container">
            <div class="c-breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="c-breadcrumb">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="{{ route('home') }}">
                                            @lang('pages.menu-home')
                                        </a>
                                    </li>
                                    <li>
                                        Anime
                                    </li>
                                    <li>
                                        <a href="{{ route('anime', ['slug' => $episode->season->anime->slug_name]) }}">
                                            {{ $episode->season->anime->name }}
                                        </a>
                                    </li>
                                    <li>
                                        {{ $episode->season->title }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-listing-item shortcode-manga-chapter" style="background: #000;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="embed-responsive embed-responsive-16by9">
                        <div id="player" style="position: absolute;width: 100%;height: 100%;">
                            <video id="video-player" height="100%" class="video-js vjs-default-skin"  poster="{{ ZAnimesControl::url('animes/' . $episode->poster) }}" style="width: 100%; height: 100%"></video>
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
                <div class="c-blog__heading style-2 font-heading">
                    <h4><b>{{ $episode->season->anime->name }}</b>: {{ $episode->title }}</h4>
                    <div class="pull-right">
                        <span>@lang('watch.views', ['views' => $episode->views_count])</span>
                        <span>@lang('watch.comments', ['comments' => $episode->comments_count])</span>
                    </div>
                    <span>@lang('watch.episode', ['episode' => $episode->episode])</span>
                </div>

            </div>
        </div>
    </div>
@stop

@section('footer')
    <link href="{{ asset('watch/css/video-js.min.css') }}" rel="stylesheet">
    <link href="{{ asset('watch/css/videojs-resolution-switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('watch/css/videojs.suggestedVideoEndcap.css') }}" rel="stylesheet">
    <link href="{{ asset('watch/css/videojs-skin-colors.css') }}" rel="stylesheet">

    <script src="{{ asset('watch/js/video.min.js') }}"></script>
    <script src="{{ asset('watch/js/videojs.hotkeys.js') }}"></script>
    <script src="{{ asset('watch/js/videojs-resolution-switcher.js') }}"></script>
    <script src="{{ asset('watch/js/videojs.suggestedVideoEndcap.js') }}"></script>

    <script src="{{ asset('watch/remember.js') }}"></script>
    <script type='text/javascript' src="{{ route('watch', array('key' => ZAnimesControl::hashing($episode->season_id, $episode->episode), 'id' => $episode->id, 'slug' => $episode->slug)) }}"></script>
@stop