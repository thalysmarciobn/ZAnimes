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


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-8">
                    <div class="c-widget-wrap">
                        <div class="c-blog__heading style-2 episode">
                            <h4><b><a href="{{ route('anime.default', ['anime_slug' => $episode->season->anime->slug_name]) }}">{{ $episode->season->anime->name }}</a></b> - {{ $episode->title }}</h4>
                        </div>
                    </div>
                    <div class="c-widget-wrap">
                        <div class="player embed-responsive embed-responsive-16by9">
                            <div class="embed-responsive-item" id="player" style="position: absolute;width: 100%;height: 100%;">
                                <video id="video-player" height="100%" class="video-js vjs-default-skin"  poster="{{ ZAnimesControl::url('animes/' . $episode->image) }}" style="width: 100%; height: 100%"></video>
                            </div>
                        </div>
                        <div class="player-menu">
                            <div class="item alert">
                                <a data-toggle="modal" data-target="#alert-problem" href="#">
                                    <i class="ion ion-ios-warning"></i> <span>@lang('watch.report_problem')</span>
                                </a>
                            </div>
                            <div class="item right">
                                <span>{{ $episode->views_count }} Visualizações</span>
                            </div>
                        </div>
                    </div>

                    <div class="c-widget-wrap">
                        <div class="alert alert-info" role="info">
                            <h4>@lang('watch.episode', ['episode' => $episode->episode])</h4>
                            {{ $episode->prev }}
                        </div>
                    </div>
                    <div class="popular-slider style-4 episodes" data-style="style-4" data-items="{{ $episodes->count() }}" data-count="5" data-initial="{{ $initial }}">
                        <div class="list_5 slider__container" role="toolbar">
                            @foreach ($episodes as $_episode)
                                <div class="slider__item">
                                    <div class="anime @if($loop->iteration == $initial) active @endif ">
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
                                                        <div class="ep_progress @if(optional($episode->current)->completed) completed @endif " style="width:{{ ZAnimesControl::porcentage($_episode->current) }}%;"></div>
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
                <div class="widget col-lg-4 default no-icon heading-style-1 c-popular">
                    @include('inc.similar_animes')
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="alert-problem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('watch.report_problem')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        EM CONSTRUÇÃO
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">@lang('profile.avatar.save')</button>
                    </div>
                </form>
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
