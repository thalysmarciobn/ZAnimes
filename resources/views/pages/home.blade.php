@extends('layouts.pages')

@section('title', __('pages.home-title'))

@section('container')




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


                        <div class=" col-md-12 col-sm-12">
                            <div class="c-widget-wrap">
                                <div class="popular-slider style-1" data-style="style-1" data-count="6">
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
                                                            <div class="season">@lang('pages.episode'): {{ $latest->episode }}</div>
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
                                <div class="popular-slider style-1" data-style="style-1" data-count="6">
                                    <div class="c-blog__heading style-2 font-heading">
                                        <h4>@lang('pages.home-latest-animes')</h4>
                                    </div>
                                    <div class="slider__container" role="toolbar">
                                        @foreach ($latests as $latest)
                                            <div class="slider__item">
                                                <div class="anime c-image-hover">
                                                    <div class="info">
                                                        <div class="title">{{ $latest->name }}</div>
                                                        <div class="year">{{ $latest->year }}</div>
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


                            <div class="row"><div id="manga-recent-5" class="widget col-xs-12 col-md-12   default  no-icon heading-style-1 c-popular manga-widget widget-manga-recent"><div class="widget__inner c-popular manga-widget widget-manga-recent__inner c-widget-wrap">
                                        <div class="c-widget-content style-1 with-button">
                                            <div class="widget-heading font-nav"><h5 class="heading">Populares</h5></div><div class="widget-content">                        <div class="popular-item-wrap">


                                                    <div class="popular-img widget-thumbnail c-image-hover">
                                                        <a title="Manga Video Chapters" href="http://demo.mangabooth.com/manga/massa-consectetur-mattis/">
                                                            <img width="75" height="106" data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-550618-75x106.jpg" class="img-responsive effect-fade lazyloaded" src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-550618-75x106.jpg" style="padding-top:106px; " alt="wallhaven-550618">        </a>
                                                    </div>

                                                    <div class="popular-content">
                                                        <h5 class="widget-title">
                                                            <a title="Manga Video Chapters" href="http://demo.mangabooth.com/manga/massa-consectetur-mattis/">Manga Video Chapters</a>
                                                        </h5>

                                                        <div class="list-chapter">
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/massa-consectetur-mattis/episode-122"> Episode 122 </a>
						</span>
                                                                <span class="post-on font-meta">
								May 10, 2018							</span>
                                                            </div>
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/massa-consectetur-mattis/episode-121"> Episode 121 </a>
						</span>
                                                                <span class="post-on font-meta">
								May 10, 2018							</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="popular-item-wrap">


                                                    <div class="popular-img widget-thumbnail c-image-hover">
                                                        <a title="Manga Text Chapter" href="http://demo.mangabooth.com/manga/manga-text-chapter/">
                                                            <img width="75" height="106" data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-550105-75x106.jpg" class="img-responsive effect-fade lazyloaded" src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-550105-75x106.jpg" style="padding-top:106px; " alt="wallhaven-550105">        </a>
                                                    </div>

                                                    <div class="popular-content">
                                                        <h5 class="widget-title">
                                                            <a title="Manga Text Chapter" href="http://demo.mangabooth.com/manga/manga-text-chapter/">Manga Text Chapter</a>
                                                        </h5>

                                                        <div class="list-chapter">
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/manga-text-chapter/chapter-3"> Chapter 3 </a>
						</span>
                                                                <span class="post-on font-meta">
								Jan 12, 2018							</span>
                                                            </div>
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/manga-text-chapter/chapter-2"> Chapter 2 </a>
						</span>
                                                                <span class="post-on font-meta">
								Jan 12, 2018							</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="popular-item-wrap">


                                                    <div class="popular-img widget-thumbnail c-image-hover">
                                                        <a title="Kahana no Shou" href="http://demo.mangabooth.com/manga/kahana-no-shou/">
                                                            <img width="75" height="106" data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-561840-75x106.jpg" class="img-responsive effect-fade lazyloaded" src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-561840-75x106.jpg" style="padding-top:106px; " alt="wallhaven-561840">        </a>
                                                    </div>

                                                    <div class="popular-content">
                                                        <h5 class="widget-title">
                                                            <a title="Kahana no Shou" href="http://demo.mangabooth.com/manga/kahana-no-shou/">Kahana no Shou</a>
                                                        </h5>

                                                        <div class="list-chapter">
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/kahana-no-shou/volume-1/chapter-6"> Chapter 6 </a>
						</span>
                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/kahana-no-shou/volume-1/chapter-6"> Volume 1 </a>
															</span>
                                                                <span class="post-on font-meta">
								Oct 18, 2017							</span>
                                                            </div>
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/kahana-no-shou/volume-1/chapter-5"> Chapter 5 </a>
						</span>
                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/kahana-no-shou/volume-1/chapter-5"> Volume 1 </a>
															</span>
                                                                <span class="post-on font-meta">
								Oct 18, 2017							</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="popular-item-wrap">


                                                    <div class="popular-img widget-thumbnail c-image-hover">
                                                        <a title="Hitman Reborn Katekyo" href="http://demo.mangabooth.com/manga/hitman-reborn-katekyo/">
                                                            <img width="75" height="106" data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-556142-75x106.jpg" class="img-responsive effect-fade lazyloaded" src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-556142-75x106.jpg" style="padding-top:106px; " alt="wallhaven-556142">        </a>
                                                    </div>

                                                    <div class="popular-content">
                                                        <h5 class="widget-title">
                                                            <a title="Hitman Reborn Katekyo" href="http://demo.mangabooth.com/manga/hitman-reborn-katekyo/">Hitman Reborn Katekyo</a>
                                                        </h5>

                                                        <div class="list-chapter">
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/hitman-reborn-katekyo/volume-4/chapter-4_2"> Chapter 4 </a>
						</span>
                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/hitman-reborn-katekyo/volume-4/chapter-4_2"> Volume 4 </a>
															</span>
                                                                <span class="post-on font-meta">
								Oct 18, 2017							</span>
                                                            </div>
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/hitman-reborn-katekyo/volume-2/chapter-3_3"> Chapter 3 </a>
						</span>
                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/hitman-reborn-katekyo/volume-2/chapter-3_3"> Volume 2 </a>
															</span>
                                                                <span class="post-on font-meta">
								Oct 19, 2017							</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="popular-item-wrap">


                                                    <div class="popular-img widget-thumbnail c-image-hover">
                                                        <a title="Kyojin Shingeki no" href="http://demo.mangabooth.com/manga/kyojin-shingeki-no/">
                                                            <img width="75" height="106" data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-560695-75x106.jpg" class="img-responsive effect-fade lazyloaded" src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-560695-75x106.jpg" style="padding-top:106px; " alt="wallhaven-560695">        </a>
                                                    </div>

                                                    <div class="popular-content">
                                                        <h5 class="widget-title">
                                                            <a title="Kyojin Shingeki no" href="http://demo.mangabooth.com/manga/kyojin-shingeki-no/">Kyojin Shingeki no</a>
                                                        </h5>

                                                        <div class="list-chapter">
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/kyojin-shingeki-no/volume-3/chapter-4_1"> Chapter 4 </a>
						</span>
                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/kyojin-shingeki-no/volume-3/chapter-4_1"> Volume 3 </a>
															</span>
                                                                <span class="post-on font-meta">
								Oct 18, 2017							</span>
                                                            </div>
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/kyojin-shingeki-no/volume-3/chapter-3_2"> Chapter 3 </a>
						</span>
                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/kyojin-shingeki-no/volume-3/chapter-3_2"> Volume 3 </a>
															</span>
                                                                <span class="post-on font-meta">
								Oct 18, 2017							</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="popular-item-wrap">


                                                    <div class="popular-img widget-thumbnail c-image-hover">
                                                        <a title="Jikimisuji" href="http://demo.mangabooth.com/manga/jikimisuji/">
                                                            <img width="75" height="106" data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-523582-75x106.jpg" class="img-responsive effect-fade lazyloaded" src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-523582-75x106.jpg" style="padding-top:106px; " alt="wallhaven-523582">        </a>
                                                    </div>

                                                    <div class="popular-content">
                                                        <h5 class="widget-title">
                                                            <a title="Jikimisuji" href="http://demo.mangabooth.com/manga/jikimisuji/">Jikimisuji</a>
                                                        </h5>

                                                        <div class="list-chapter">
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/jikimisuji/volume-1/chapter-15_1"> Chapter 15 </a>
						</span>
                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/jikimisuji/volume-1/chapter-15_1"> Volume 1 </a>
															</span>
                                                                <span class="post-on font-meta">
								Oct 18, 2017							</span>
                                                            </div>
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/jikimisuji/volume-1/chapter-14_1"> Chapter 14 </a>
						</span>
                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/jikimisuji/volume-1/chapter-14_1"> Volume 1 </a>
															</span>
                                                                <span class="post-on font-meta">
								Oct 18, 2017							</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="popular-item-wrap">


                                                    <div class="popular-img widget-thumbnail c-image-hover">
                                                        <a title="Kagasarete Nairantou" href="http://demo.mangabooth.com/manga/kagasarete-nairantou/">
                                                            <img width="75" height="106" data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-511610-75x106.png" class="img-responsive effect-fade lazyloaded" src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-511610-75x106.png" style="padding-top:106px; " alt="wallhaven-511610">        </a>
                                                    </div>

                                                    <div class="popular-content">
                                                        <h5 class="widget-title">
                                                            <a title="Kagasarete Nairantou" href="http://demo.mangabooth.com/manga/kagasarete-nairantou/">Kagasarete Nairantou</a>
                                                        </h5>

                                                        <div class="list-chapter">
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/kagasarete-nairantou/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/kagasarete-nairantou/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                <span class="post-on font-meta">
								Oct 18, 2017							</span>
                                                            </div>
                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/kagasarete-nairantou/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/kagasarete-nairantou/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                <span class="post-on font-meta">
								Oct 18, 2017							</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <span class="c-wg-button-wrap">
				        <a class="widget-view-more" href="/manga/">Here for more Popular Manga</a>
                    </span>

                                            </div>
                                        </div></div></div></div>


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