@extends('layouts.pages')

@section('title', $user->name)


@section('header')
    <div class="profile">
        <div class="page-listing-item shortcode-manga-chapter">
            <div class="container">
                <div class="col-md-12">
                    <div class="wall">



                        <a class="avatar nav-link dropdown-toggle" href="{{ route('profile', ['name' => $user->name]) }}">
                            <img width="120" height="120" src="{{ ZAnimesControl::url('avatars/default.jpg') }}" srcset="{{ $user->avatar }}" data-src="{{ $user->avatar }}" data-srcset="{{ $user->avatar }}" class="avatar avatar-50 photo" height="50" width="50">
                            @if($me)
                                editar avatar
                            @endif
                        </a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('container')
    @if ($user->editor)
    <div class="widget col-md-12">
        <div class="c-widget-wrap">
            <div class="popular-slider style-1" data-style="style-2" data-count="5">
                <div class="c-blog__heading style-2 font-heading">
                    <h4>@lang('profile.animes_posted')</h4>
                </div>
                <div class="slider__container" role="toolbar">
                    @foreach ($user->animes()->limit(15)->get() as $latest)
                        <div class="slider__item">
                            <div class="anime">
                                <a title="{{ $latest->title }}" href="{{ route('anime.default', ['anime_slug' => $latest->slug_name]) }}">
                                    <div class="poster">
                                        <img data-src="{{ ZAnimesControl::url('animes/' . $latest->slug_name . '/' . $latest->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $latest->slug_name . '/' . $latest->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive lazyload" src="{{ asset('images/video_empty.png') }}" style="padding-top:180px; " alt="{{ $latest->name }}"/>
                                    </div>
                                    <div class="info">
                                        <div class="title">{{ $latest->name }}</div>
                                        <div class="eps">@lang('home.episodes', ['count' => $latest->episodes->count()])</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

@stop

@section('sidebar')
    <div class="widget col-xs-12 col-md-12 default no-icon heading-style-1 c-popular">
        <div class="row">
        </div>
    </div>
@stop
