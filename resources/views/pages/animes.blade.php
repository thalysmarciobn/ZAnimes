@extends('layouts.pages_full')

@section('title', __('pages.home-title'))

@section('body', 'archive search search-results ')

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
                                    <li class="active">
                                        @lang('pages.menu-animes')
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-content">
                <form role="search" method="get" class="search-form">
                    <label>
                        <span class="screen-reader-text">@lang('animes.search_for')</span>
                        <input type="search" class="search-field" placeholder="@lang('animes.search')" name="procura">
                        <script>
                            jQuery(document).ready(function ($) {
                                $('form.search-form input.search-field[name="procura"]').keyup(function () {
                                    var s = $('form.search-form input.search-field[name="procura"]').val();
                                    $('form.search-advanced-form input[name="procura"]').val(s);
                                });
                            });
                        </script>
                    </label>
                    <input type="submit" class="search-submit" value="Search">
                </form>
                <a class="btn-search-adv collapsed" data-toggle="collapse" data-target="#search-advanced">
                    @lang('animes.advanced') <span class="icon-search-adv"></span>
                </a>
            </div>
            <div class="collapse" id="search-advanced">
                <form action="{{ url()->full() }}" method="get" role="form" class="search-advanced-form">
                    <input type="hidden" name="procura" value="">
                    <div class="form-group checkbox-group row">
                        @foreach ($genres as $genre)
                            <div class="checkbox col-xs-6 col-sm-4 col-md-2 ">
                                <input id="{{ $genre->slug }}" value="{{ $genre->slug }}" name="genre[]" type="checkbox">
                                <label for="{{ $genre->slug }}"> {{ $genre->name }} </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <span>@lang('animes.author')</span>
                        <input type="text" class="form-control" name="autor" placeholder="@lang('animes.author')">
                    </div>
                    <div class="form-group">
                        <span>@lang('animes.release')</span>
                        <input type="text" class="form-control" name="release" placeholder="@lang('animes.year_release')">
                    </div>
                    <div class="form-group">
                        <span>@lang('animes.content')</span>
                        <div class="checkbox-inline">
                            <input id="complete" type="checkbox" name="status:1">
                            <label for="complete">@lang('animes.completed')</label>
                        </div>
                        <div class="checkbox-inline">
                            <input id="on-going" type="checkbox" name="status:0">
                            <label for="on-going">@lang('animes.on_going')</label>
                        </div>
                    </div>
                    <div class="form-group group-btn">
                        <button type="submit" class="c-btn c-btn_style-1 search-adv-submit">@lang('animes.search')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('container')
    <div class="main-col-inner">
        <div class="search-wrap">
            <div class="tab-wrap">
                <div class="c-blog__heading style-2 font-heading">
                    <h4>
                        @lang('animes.animes_filtered', ['count' => $animes->total()])
                    </h4>
                    <div class="c-nav-tabs">
                        <span>@lang('animes.order_by')</span>
                        <ul class="c-tabs-content">
                            <li @if(request()->get(__('animes.type')) == "") class="active"@endif>
                                <a href="{{ route('animes') }}">
                                    A-Z
                                </a>
                            </li>
                            <li @if(request()->get(__('animes.type')) == __('animes._recents')) class="active"@endif>
                                <a href="{{ route('animes') }}?tipo=@lang('animes._recents')">
                                    @lang('animes.recents')
                                </a>
                            </li>
                            <li @if(request()->get('tipo') == __('animes._news')) class="active"@endif>
                                <a href="{{ route('animes') }}?tipo=novos">
                                    @lang('animes.news')
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content-wrap">
                <div role="tabpanel" class="c-tabs-item">
                    @foreach ($animes as $anime)
                        <div class="c-tabs-item__content">
                            <div class="col-lg-1 col-md-2 col-sm-2">
                                <div class="row">
                                    <div class="tab-thumb c-image-hover">
                                        <a href="{{ route('anime', ['anime_slug' => $anime->slug_name]) }}" title="{{ $anime->title }}">
                                            <img width="193" height="278" data-src="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }} 193w, {{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }} 125w" data-sizes="(max-width: 193px) 100vw, 193px" class="img-responsive effect-fade lazyloaded" src="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" style="padding-top:278px; " sizes="(max-width: 193px) 100vw, 193px" srcset="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }} 193w, {{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }} 125w">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-11 col-md-10 col-sm-10">
                                <div class="tab-summary">
                                    <div class="post-title">
                                        <h4><a title="{{ $anime->title }}" href="{{ route('anime', ['anime_slug' => $anime->slug_name]) }}">{{ $anime->name }}</a></h4>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-content_item mg_author">
                                            <div class="summary-heading">
                                                <h5>
                                                    @lang('animes.author')
                                                </h5>
                                            </div>
                                            <div class="summary-content">
                                                {{ $anime->author }}
                                            </div>
                                        </div>
                                        <div class="post-content_item mg_status">
                                            <div class="summary-heading">
                                                <h5>
                                                    @lang('animes.content')
                                                </h5>
                                            </div>
                                            <div class="summary-content">
                                                @if($anime->status == 1)
                                                    @lang('animes.completed')
                                                @else
                                                    @lang('animes.on_going')
                                                @endif
                                            </div>
                                        </div>
                                        <div class="post-content_item mg_release">
                                            <div class="summary-heading">
                                                <h5>
                                                    @lang('animes.release')
                                                </h5>
                                            </div>
                                            <div class="summary-content release-year">
                                                {{ $anime->year }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-meta">
                                    @foreach(explode(',', $anime->genres) as $genre)
                                        <span class="genre">{{ ZAnimesControl::genre($genre) }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $animes->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@stop