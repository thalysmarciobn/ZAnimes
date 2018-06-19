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
                                    <li class="menu-item"><a href="{{ route('home') }}">HOME</a></li>
                                    <li class="menu-item"><a href="{{ route('home') }}">ANIMES</a></li>
                                    <li class="menu-item"><a href="{{ route('home') }}">DMCA</a></li>

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
            <ul id="menu-main-menu-1" class="nav navbar-nav main-navbar"><li id="nav-menu-item-27" class="main-menu-item menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children parent dropdown"><a href="/" class="menu-link dropdown-toggle disabled main-menu-link" data-toggle="dropdown">HOME </a>
                    <ul class="dropdown-menu menu-depth-1">
                        <li id="nav-menu-item-25" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="http://demo.mangabooth.com/home-2/" class="menu-link  sub-menu-link">HOME 2 </a></li>
                        <li id="nav-menu-item-24" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="http://demo.mangabooth.com/home-3/" class="menu-link  sub-menu-link">HOME 3 </a></li>
                        <li id="nav-menu-item-341" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-337 current_page_item"><a href="http://demo.mangabooth.com/home-4/" class="menu-link  sub-menu-link">HOME 4 &#8211; REV SLIDER </a></li>
                        <li id="nav-menu-item-402" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="http://demo.mangabooth.com/home-dark/" class="menu-link  sub-menu-link">HOME DARK </a></li>
                        <li id="nav-menu-item-500" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="http://demo.mangabooth.com/home-single-manga/" class="menu-link  sub-menu-link">SINGLE MANGA </a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <div class="c-sub-header-nav with-border  ">
        <div class="container ">
            <div class="c-sub-nav_wrap">
                <div class="sub-nav_content">
                    <ul class="sub-nav_list list-inline second-menu">
                        <li id="menu-item-54" class="menu-item menu-item-type-taxonomy menu-item-object-wp-manga-genre menu-item-54"><a href="http://demo.mangabooth.com/manga-genre/romance/">Romance</a></li>
                        <li id="menu-item-32" class="menu-item menu-item-type-taxonomy menu-item-object-wp-manga-genre menu-item-32"><a href="http://demo.mangabooth.com/manga-genre/comedy/">Comédia</a></li>
                        <li id="menu-item-58" class="menu-item menu-item-type-taxonomy menu-item-object-wp-manga-genre menu-item-58"><a href="http://demo.mangabooth.com/manga-genre/shoujo/">Shoujo</a></li>
                        <li id="menu-item-36" class="menu-item menu-item-type-taxonomy menu-item-object-wp-manga-genre menu-item-36"><a href="http://demo.mangabooth.com/manga-genre/drama/">Drama</a></li>
                        <li id="menu-item-55" class="menu-item menu-item-type-taxonomy menu-item-object-wp-manga-genre menu-item-55"><a href="http://demo.mangabooth.com/manga-genre/school-life/">Vida Escolar</a></li>
                        <li id="menu-item-60" class="menu-item menu-item-type-taxonomy menu-item-object-wp-manga-genre menu-item-60"><a href="http://demo.mangabooth.com/manga-genre/shounen/">Shounen</a></li>
                        <li id="menu-item-28" class="menu-item menu-item-type-taxonomy menu-item-object-wp-manga-genre menu-item-28"><a href="http://demo.mangabooth.com/manga-genre/action/">Ação</a></li>

                    </ul>
                </div>
                <div class="c-modal_item">
                    @guest
                    <a href="{{ route('login') }}" class="btn-active-modal">Entrar</a>
                    <a href="{{ route('register') }}" class="btn-active-modal">Cadastro</a>
                    @endguest
                    @auth
                        <div class="c-user_item">
                            <span>Olá, {{ Auth::user()->name }}</span>
                            <div class="c-user_avatar">
                                <img alt="" src="http://1.gravatar.com/avatar/1f2281df65a4de28c1547e09710b68c0?s=50&amp;d=mm&amp;r=g" srcset="http://1.gravatar.com/avatar/1f2281df65a4de28c1547e09710b68c0?s=100&amp;d=mm&amp;r=g 2x" class="avatar avatar-50 photo" height="50" width="50">
                                <ul class="c-user_menu">
                                    <li>
                                        <a href="http://demo.mangabooth.com/user-settings/">User Settings</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}">Logout</a>
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