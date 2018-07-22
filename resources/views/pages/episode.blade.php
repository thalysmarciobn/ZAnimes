@extends('layouts.pages_full')

@section('title', $episode->title . ' - ' . $episode->season->anime->name)


@section('og_title', __('head.episode.og_title', ['anime' => $episode->season->anime->name, 'episode' => $episode->episode, 'season' => $episode->season->title]))
@section('og_description', __('head.episode.og_description', ['anime' => $episode->season->anime->name, 'episode' => $episode->episode, 'season' => $episode->season->title, 'description' => $episode->prev]))
@section('og_image', ZAnimesControl::url('animes/' . $episode->poster))

@section('header')

@stop

@section('container')
    <div class="widget col-md-12">
        <div class="row">
            <div class="widget col-md-12 col-lg-8">
                <div class="c-widget-wrap">

                    <div class="player embed-responsive embed-responsive-16by9">
                        <div id="player" style="position: absolute;width: 100%;height: 100%;">
                            <video id="video-player" height="100%" class="video-js vjs-default-skin"  poster="{{ ZAnimesControl::url('animes/' . $episode->poster) }}" style="width: 100%; height: 100%"></video>
                        </div>
                    </div>
                    <div class="c-blog__heading style-2 episode">
                        <h4><b><a href="{{ route('anime.default', ['anime_slug' => $episode->season->anime->slug_name]) }}">{{ $episode->season->anime->name }}</a></b> - {{ $episode->title }}</h4>

                        <div class="action-icon">
                            <ul class="action_list_icon list-inline">
                                <li>
                                    <a href="#" class="wp-manga-action-button" data-action="bookmark" data-post="302" data-chapter="1328" data-page="" title="Bookmark"><i class="ion-android-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="widget col-md-12 col-lg-4">
                <div class="c-page__content">

                    <div class="c-blog__heading style-2 font-heading">
                        <h4>
                            @lang('watch.episode', ['episode' => $episode->episode])
                        </h4>
                    </div>

                    <div class="description-summary">
                        <div class="summary__content" style="height: 120px;">
                            <p>{{ $episode->prev }}</p>

                        </div>
                        <div class="c-content-readmore">
                            <span class="btn btn-link content-readmore less" style="display: inline-block;">Mostrar mais  </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget col-md-12 col-lg-4 default no-icon heading-style-1 c-popular pull-right">
                @include('inc.similar_animes')
            </div>
            <div class="widget col-md-12 col-lg-8">
                <div class="widget col-md-9">
                    <div class="row">
                        assa
                    </div>
                </div>
                <div class="widget col-md-3">
                    <div class="row pull-right">
                        <span>@lang('watch.comments', ['comments' => $episode->comments_count])</span>
                    </div>
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
                    <h4>
                        @lang('watch.episode', ['episode' => $episode->episode])
                    </h4>
                </div>

                <div class="description-summary">
                    <div class="summary__content" style="height: 120px;">
                        <p>{{ $episode->prev }}</p>

                    </div>
                    <div class="c-content-readmore">
                        <span class="btn btn-link content-readmore less" style="display: inline-block;">Mostrar mais  </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget col-md-12 default no-icon heading-style-1 c-popular">
        <div class="row">
            @include('inc.similar_animes')
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
