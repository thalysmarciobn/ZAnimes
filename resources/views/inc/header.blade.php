<header class="site-header">
    <div class="c-header__top">
        <ul class="search-main-menu">
            <li>
                <form id="blog-post-search" action="http://demo.mangabooth.com/" method="get">
                    <input type="text" placeholder="Search..." name="s" value="">
                    <input type="submit" value="Search">
                    <div class="loader-inner line-scale">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </form>
            </li>
        </ul>
        <div class="main-navigation style-1 ">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-navigation_wrap">
                            <div class="wrap_branding">
                                <a class="logo" href="{{ route('home') }}" title="{{ config('app.name', 'Laravel') }}">
                                    <img class="img-responsive" src="./images/logo.png" alt="xx"/>
                                </a>
                            </div>

                            <div class="main-menu">
                                <ul class="nav navbar-nav main-navbar">
                                    <li class="menu-item"><a href="{{ route('home') }}">@lang('pages.menu-home')</a></li>
                                    <li class="menu-item"><a href="{{ route('home') }}">@lang('pages.menu-animes')</a></li>
                                    <li class="menu-item"><a href="{{ route('home') }}">@lang('pages.menu-dmca')</a></li>

                                </ul>
                            </div>

                            <div class="search-navigation search-sidebar">
                                <div id="manga-search-3" class="widget col-xs-12 col-md-12 default no-icon manga-widget widget-manga-search">
                                    <div class="widget__inner manga-widget widget-manga-search__inner c-widget-wrap"><div class="widget-content">
                                            <div class="search-navigation__wrap">
                                                <ul class="main-menu-search nav-menu">
                                                    <li class="menu-search">
                                                        <a href="javascript:;" class="open-search-main-menu"> <i class="ion-ios-search-strong"></i>
                                                            <i class="ion-android-close"></i> </a>
                                                        <ul class="search-main-menu">
                                                            <li>
                                                                <form class="manga-search-form search-form" action="http://demo.mangabooth.com/" method="get">
                                                                    <input class="manga-search-field" type="text" placeholder="Search..." name="s" value="">
                                                                    <input type="hidden" name="post_type" value="wp-manga"> <i class="ion-ios-search-strong"></i>
                                                                    <div class="loader-inner ball-clip-rotate-multiple">
                                                                        <div></div>
                                                                        <div></div>
                                                                    </div>
                                                                    <input type="submit" value="Search">
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <div class="link-adv-search">
                                                    <a href="http://demo.mangabooth.com/?s=&#038;post_type=wp-manga">Advanced</a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="c-togle__menu">
                                <button type="button" class="menu_icon__open">
                                    <span></span> <span></span> <span></span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="mobile-menu menu-collapse off-canvas">
        <div class="close-nav">
            <button class="menu_icon__close">
                <span></span> <span></span>
            </button>
        </div>
        <nav class="off-menu">
            <ul id="menu-main-menu-1" class="nav navbar-nav main-navbar">
                <li id="nav-menu-item-27" class="main-menu-item menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children parent dropdown">
                    <a href="{{ route('home') }}">@lang('pages.menu-home')</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="c-sub-header-nav with-border  ">
        <div class="container ">
            <div class="c-sub-nav_wrap">
                <div class="sub-nav_content">
                    <ul class="sub-nav_list list-inline second-menu">
                        <li id="menu-item-54" class="menu-item"><a href="http://demo.mangabooth.com/manga-genre/romance/">Romance</a></li>
                        <li id="menu-item-54" class="menu-item"><a href="http://demo.mangabooth.com/manga-genre/comedy/">Comédia</a></li>
                        <li id="menu-item-54" class="menu-item"><a href="http://demo.mangabooth.com/manga-genre/shoujo/">Shoujo</a></li>
                        <li id="menu-item-54" class="menu-item"><a href="http://demo.mangabooth.com/manga-genre/drama/">Drama</a></li>
                        <li id="menu-item-54" class="menu-item"><a href="http://demo.mangabooth.com/manga-genre/school-life/">Vida Escolar</a></li>
                        <li id="menu-item-54" class="menu-item"><a href="http://demo.mangabooth.com/manga-genre/shounen/">Shounen</a></li>
                        <li id="menu-item-54" class="menu-item"><a href="http://demo.mangabooth.com/manga-genre/action/">Ação</a></li>

                    </ul>
                </div>
                <div class="c-modal_item">
                    @guest
                        <a href="{{ route('login') }}" class="btn-active-modal">@lang('pages.login')</a>
                        <a href="{{ route('register') }}" class="btn-active-modal">@lang('pages.register')</a>
                    @endguest
                    @auth
                        <div class="c-user_item">
                            <span>Olá, {{ Auth::user()->name }}</span>
                            <div class="c-user_avatar">
                                <img alt="" src="http://1.gravatar.com/avatar/1f2281df65a4de28c1547e09710b68c0?s=50&amp;d=mm&amp;r=g" srcset="http://1.gravatar.com/avatar/1f2281df65a4de28c1547e09710b68c0?s=100&amp;d=mm&amp;r=g 2x" class="avatar avatar-50 photo" height="50" width="50">
                                <ul class="c-user_menu">
                                    @if(Auth::user()->editor)
                                        <li>
                                            <a href="{{ route('panel') }}">@lang('pages.panel')</a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="">@lang('pages.my-list')</a>
                                    </li>
                                    <li>
                                        <a href="">@lang('pages.settings')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}">@lang('pages.logout')</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endauth
                </div>

            </div>
        </div>
    </div>
</header>