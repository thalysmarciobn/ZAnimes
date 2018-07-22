@extends('layouts.pages_full')

@section('title', __('season.title'))

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
                                            @lang('pages.menu.home')
                                        </a>
                                    </li>
                                    <li class="active">
                                        @lang('pages.menu.season')
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
    <div class="widget col-md-12">
        <div class="row">
            <div class="c-widget-wrap">
                <div class="c-blog__heading style-2 font-heading">
                    <h4>
                        @lang('season.title')
                    </h4>
                </div>
                <div class="tab-content-wrap calendar">

                    <ol class="days">
                        @foreach($week as $day)
                        <li class="day">
                            <div class="head">
                                @if (\Carbon\Carbon::now()->isDayOfWeek($day->id))
                                    <h2>@lang('season.today')</h2>
                                @else
                                    <h2>{{ $day->slug }}</h2>
                                @endif
                                <h4>Animes: {{ $day->animes->count() }}</h4>
                            </div>
                            <ul class="animes">
                                @foreach($day->animes as $data)
                                    <li>
                                        <div class="name">{{ $data->anime->name }}</div>
                                        <div class="poster">
                                            <img data-src="{{ ZAnimesControl::url('animes/' . $data->anime->slug_name . '/' . $data->anime->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $data->anime->slug_name . '/' . $data->anime->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive lazyload" src="{{ asset('images/video_empty.png') }}" style="padding-top:180px; " alt="{{ $data->anime->name }}"/>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop
