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
                                        <a href="{{ route('anime', ['anime_slug' => $anime->slug_name]) }}">
                                            {{ $anime->name }}
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('container')
    <div class="page-listing-item shortcode-manga-chapter">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div>
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
                                            Rank
                                        </h5>
                                    </div>
                                    <div class="summary-content">
                                        12nd, it has 494 monthly views
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

@section('sidebar')
    <div class="widget col-xs-12 col-md-12 default no-icon heading-style-1 c-popular">
        <div class="c-widget-content style-1">
            <div class="c-blog__heading style-2 font-heading">
                <h4>@lang('home.most-accesseds-in-the-month')</h4>
            </div>
            <div class="widget-content">
                @foreach ($monthly as $anime)
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