@extends('layouts.pages_full')

@section('title', $user->name)


@section('header')
    <div class="profile">
        <div class="page-listing-item shortcode-manga-chapter">
            <div class="container">
                <div class="col-md-12">
                    <div class="wall">
                        <a class="avatar" data-toggle="modal" data-target="#avatarModel" href="#">
                            <div class="image">
                                @if($me)
                                    <img width="120" height="120" src="{{ ZAnimesControl::url('avatars/default.jpg') }}" srcset="{{ $user->avatar_pending }}" data-src="{{ $user->avatar_pending }}" data-srcset="{{ $user->avatar_pending }}" height="50" width="50">
                                @else
                                    <img width="120" height="120" src="{{ ZAnimesControl::url('avatars/default.jpg') }}" srcset="{{ $user->avatar }}" data-src="{{ $user->avatar }}" data-srcset="{{ $user->avatar }}" height="50" width="50">
                                @endif
                            </div>
                        </a>
                        <div class="menu">
                            asa
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($me)
        <!-- Modal -->
        <div class="modal fade" id="avatarModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('profile.avatar.title')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('user.avatar') }}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <div id="image-container">
                                    <img src="http://cdn.zanimes.com/avatars/default.jpg">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" id="image-file" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">@lang('profile.avatar.save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@stop

@section('container')
    @if ($me && $user->avatar_pending != $user->avatar)
    <div class="widget col-md-12">
        <div class="alert alert-warning" role="warning"> <p>@lang('profile.avatar.pending')</p> </div>
    </div>
    @endif
    @if ($user->editor)
    <div class="widget col-md-12">
        <div class="c-widget-wrap">
            <div class="popular-slider style-1" data-style="style-3" data-count="7">
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

@section('footer')
    <script src="{{ asset('crop/jquery.js') }}"></script>
    <script src="{{ asset('crop/default.js') }}"></script>
@stop
