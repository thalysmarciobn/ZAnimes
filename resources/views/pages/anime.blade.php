@extends('layouts.pages')

@section('title', $anime->name)

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
    </div>

    <div class="page-listing-item shortcode-manga-chapter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="post-title font-title">
                        <h3>
                            {{ $anime->name }}
                        </h3>
                    </div>
                    <div class="manga-info">
                        <div class="item-thumb">
                            <img data-src="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}" style="padding-top:180px; " alt="{{ $anime->name }}"/>
                        </div>
                        <div class="item-summary">
                            <div class="post-content">
                                <div class="post-content_item">
                                    <div class="summary-heading">
                                        <h5>
                                            @lang('anime.genres')
                                        </h5>
                                    </div>
                                    <div class="summary-content">
                                        <div class="genres-content">
                                            @foreach($anime->genres() as $genre)
                                                {{ $genre->name }}@if (!$loop->last), @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
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
                                        {{ $anime->creator->name }}
                                    </div>
                                </div>
                                <div class="post-content_item">
                                    <div class="summary-heading">
                                        <h4>
                                            @lang('anime.sinopse')
                                        </h4>
                                    </div>
                                    <div class="summary-sinopse">
                                        {{ $anime->sinopse }}
                                    </div>
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
    <div class="row">
        <div class="widget col-md-12">
            <div class="c-widget-content style-1">
                <div class="c-blog__heading style-2 font-heading">
                    <h4>@lang('anime.seasons_episodes')</h4>
                </div>
                <div class="widget-content">
                    <div id="seasons">
                        @foreach($anime->seasons as $season)
                        <div class="se-c">
                            <div class="se-q">
                                <span class="se-t se-o">{{ $season->season }}</span>
                                <span class="title">{{ $season->title }}</span>
                            </div>
                            <div class="se-a"@if (!$loop->first) style="display: none;"@endif>
                                <ul class="episodes">
                                    @foreach($season->episodes as $episode)
                                    <li>
                                        <div class="thumb">
                                            <div class="c-image-hover">
                                                <a href="{{ route('episode', ['anime_slug' => $anime->slug_name, 'episode' => $episode->episode, 'episode_slug' => $episode->slug, 'season' => $episode->season_id]) }}">
                                                    <img width="100px" height="60px" data-src="{{ ZAnimesControl::url('animes/' . $episode->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $episode->image) }}"  class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}"  alt="{{ $episode->name }}"/>
                                                </a>
                                            </div>
                                            @auth
                                            <div class="episode_progress">
                                                <div class="ep_progress" style="width:{{ $episode->current(Auth::user()->id, $episode->id) }}%;"></div>
                                            </div>
                                            @endauth
                                        </div>
                                        <div>
                                            <div class="duration">{{ str_replace('00:', '', $episode->duration) }}</div>
                                            <div class="episode">
                                                <a href="{{ route('episode', ['anime_slug' => $anime->slug_name, 'episode' => $episode->episode, 'episode_slug' => $episode->slug, 'season' => $episode->season_id]) }}">@lang('anime.episode', ['episode' => $episode->episode])</a>
                                                <span class="title">{{ $episode->title }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
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
        <div class="row">
            @include('inc.similar_animes')
        </div>
    </div>
@stop

@section('footer')
    <script>
        jQuery(document).ready(function($) {
            $(".se-q").click(function () {
                var container = $(this).parents(".se-c");
                var answer = container.find(".se-a");
                var trigger = container.find(".se-t");
                answer.slideToggle(200);
                if (trigger.hasClass("se-o")) {
                    trigger.removeClass("se-o");
                } else {
                    trigger.addClass("se-o");
                }
            })
        });
    </script>
@stop
