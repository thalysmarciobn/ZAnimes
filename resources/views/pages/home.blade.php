@extends('layouts.pages')

@section('title', __('pages.home-title'))

@section('container')
    <div class="c-sidebar c-top-second-sidebar" style="background: #eaeaea;">
        <div class="container c-container">
            <div class="row c-row">
                <div class="widget col-xs-12 col-md-12 default heading-style-2">
                    <div class="c-widget-wrap">
                        <div class="popular-slider style-1" data-style="style-1" data-count="4">
                            <div class="c-blog__heading style-2 font-heading">
                                <h4>@lang('pages.home-releases')</h4>
                            </div>
                            <div class="slider__container" role="toolbar">
                                @foreach ($releases as $release)
                                    <div class="slider__item">
                                        <div class="item__wrap ">
                                            <div class="slider__thumb">
                                                <div class="slider__thumb_item c-image-hover">
                                                    <a href="http://demo.mangabooth.com/manga/nasama-okima/">
                                                        <img width="125" height="180"  data-src="{{ asset('uploads/animes/' . $release->slug_name . '/' . $release->image) }}" data-srcset="{{ asset('uploads/animes/' . $release->slug_name . '/' . $release->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:180px; " alt="{{ $release->name }}"/>
                                                        <div class="slider-overlay"></div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="slider__content">
                                                <div class="slider__content_item">
                                                    <div class="post-title font-title">
                                                        <h4>
                                                            <a href="http://demo.mangabooth.com/manga/nasama-okima/">{{ $release->name }}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="post-on font-meta">
                                                        <span>{{ $release->author }}</span>
                                                    </div>
                                                    <div class="chapter-item">
                                                        @foreach ($release->episodes()->limit(2)->get() as $episode)
                                                            <span class="chapter">
                                                                        <a href="http://demo.mangabooth.com/manga/nasama-okima/volume-1/chapter-15">Episódio: {{ $episode->episode }}</a>
                                                                    </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="site-content">



        <div class="c-page-content style-1">
            <div class="content-area">
                <div class="container">
                    <div class="row">

                        @if (session('info'))
                            <div class="alert alert-info" role="info">
                                <h4 class="alert-heading">@lang('pages.info')</h4>
                                <p>{{ session('info') }}</p>
                            </div>
                        @endif


                        <div class="main-col col-md-8 col-sm-8">
                            <div class="c-widget-wrap">
                                <div class="popular-slider style-1" data-style="style-1" data-count="4">
                                    <div class="c-blog__heading style-2 font-heading">
                                        <h4>@lang('pages.home-latest-releases')</h4>
                                    </div>
                                    <div class="slider__container" role="toolbar">
                                        @foreach ($episodes as $latest)
                                            <div class="slider__item">
                                                <div class="anime">
                                                    <div class="episode">
                                                        <div class="thumb c-image-hover">
                                                            <img  data-src="{{ asset('uploads/animes/' . $latest->slug_name . '/' . $latest->image) }}" data-srcset="{{ asset('uploads/animes/' . $latest->slug_name . '/' . $latest->image) }}"  class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg"  alt="{{ $latest->name }}"/>
                                                        </div>
                                                        <div class="data">
                                                            <h3>
                                                                <a href="http://zanimes.com/anime/death-note">{{ $latest->title }}</a>
                                                            </h3>
                                                            <div class="season">{{ $latest->getAnime->name }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="c-widget-wrap">
                                <div class="popular-slider style-1" data-style="style-1" data-count="4">
                                    <div class="c-blog__heading style-2 font-heading">
                                        <h4>@lang('pages.home-latest-animes')</h4>
                                    </div>
                                    <div class="slider__container" role="toolbar">
                                        @foreach ($latests as $latest)
                                            <div class="slider__item">
                                                <div class="anime c-image-hover">
                                                    <div class="info">
                                                        <div class="title">{{ $latest->name }}</div>
                                                        <div class="episodes">Episódios: {{ $latest->episodes()->count() }}</div>
                                                    </div>
                                                    <div class="poster">
                                                        <img  data-src="{{ asset('uploads/animes/' . $latest->slug_name . '/' . $latest->image) }}" data-srcset="{{ asset('uploads/animes/' . $latest->slug_name . '/' . $latest->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:180px; " alt="{{ $latest->name }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="sidebar-col col-md-4 col-sm-4">
                            <div class="c-widget-wrap row">
                                <div class="popular-slider style-1" data-style="style-1" data-count="4">
                                    <div class="c-blog__heading style-2 font-heading">
                                        <h4>MAIS ACESSADOS</h4>
                                    </div>
                                    <div class="slider__container" role="toolbar">
                                        @foreach ($latests as $latest)
                                            <div class="slider__item">
                                                <img  data-src="{{ asset('uploads/animes/' . $latest->slug_name . '/' . $latest->image) }}" data-srcset="{{ asset('uploads/animes/' . $latest->slug_name . '/' . $latest->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:180px; " alt="{{ $latest->name }}"/>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>










    </div>


    <footer class="site-footer">
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="nav-footer"><ul class="list-inline font-nav"><li id="menu-item-76" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a href="/">HOME</a></li>
                                <li id="menu-item-79" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79"><a href="http://demo.mangabooth.com/blog/">BLOG</a></li>
                                <li id="menu-item-78" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78"><a href="http://demo.mangabooth.com/contact/">CONTACT US</a></li>
                                <li id="menu-item-77" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-77"><a href="http://demo.mangabooth.com/about-us/">ABOUT US</a></li>
                                <li id="menu-item-80" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-80"><a href="#">COOKIE POLICY</a></li>
                            </ul></div>
                        <div class="copyright">
                            <p>© 2017 Madara Inc. All rights reserved</p>                            </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <div id="hover-infor"></div>
@stop