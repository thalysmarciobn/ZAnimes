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
                                            @foreach(explode(',', $anime->genres) as $genre)
                                                {{ ZAnimesControl::genre($genre) }}@if (!$loop->last), @endif
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
                                        <div class="thumb c-image-hover">
                                            <a href="{{ route('episode', ['anime_slug' => $anime->slug_name, 'episode' => $episode->episode, 'episode_slug' => $episode->slug, 'season' => $episode->id]) }}">
                                                <img  data-src="{{ ZAnimesControl::url('animes/' . $episode->slug_name . '/' . $episode->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $episode->slug_name . '/' . $episode->image) }}"  class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}"  alt="{{ $episode->name }}"/>
                                            </a>
                                        </div>
                                        <div class="duration">{{ str_replace('00:', '', $episode->duration) }}</div>
                                        <div class="episode">
                                            <a href="{{ route('episode', ['anime_slug' => $anime->slug_name, 'episode' => $episode->episode, 'episode_slug' => $episode->slug, 'season' => $episode->id]) }}">@lang('anime.episode', ['episode' => $episode->episode])</a>
                                            <span class="title">{{ $episode->title }}</span>
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
        <div class="c-widget-content style-1">
            <div class="c-blog__heading style-2 font-heading">
                <h4>@lang('anime.also_liked')</h4>
            </div>
            <div class="widget-content">
                @foreach ($similar as $anime)
                    <div class="popular-item-wrap">
                        <div class="popular-img widget-thumbnail c-image-hover">
                            <a title="{{ $anime->title }}" href="{{ route('anime', ['anime_slug' => $anime->slug_name]) }}">
                                <img width="50" height="75" data-src="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-sizes="(max-width: 50px) 75vw, 50px" class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}" style="padding-top:180px; " alt="{{ $anime->name }}"/>
                            </a>
                        </div>
                        <div class="popular-content">
                            <h5 class="widget-title">
                                <a title="{{ $anime->name }}" href="{{ route('anime', ['anime_slug' => $anime->slug_name]) }}">{{ $anime->name }}</a>
                            </h5>
                            <div class="list-chapter">
                                <div class="chapter-item">
                                    <span class="post-on font-meta">{{ $anime->author }}</span>
                                    <span class="post-on font-meta">{{ $anime->year }}</span>
                                    <span class="post-on font-meta count">{{ $anime->monthly_views->count() }}  <i class="fa fa-star fa-1x"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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