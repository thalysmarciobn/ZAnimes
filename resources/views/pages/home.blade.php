<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel='stylesheet' id='apss-font-awesome-css' href='{{ asset('css/font-awesome/font-awesome.min.css?ver=4.3.5') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='apss-font-opensans-css' href='//fonts.googleapis.com/css?family=Open+Sans&#038;ver=4.9.6' type='text/css' media='all' />
    <link rel='stylesheet' id='apss-frontend-css-css' href='{{ asset('css/frontend.css?ver=4.3.5') }}' type='text/css' media='all' />

    <link rel='stylesheet' id='rs-plugin-settings-css' href='{{ asset('css/settings.css?ver=5.4.6.2') }}' type='text/css' media='all' />

    <link rel='stylesheet' id='google-fonts-css' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100i%2C200%2C200i%2C300%2C300i%2C400%2C400i%2C500%2C500i%2C600%2C600i%2C700%2C700i%2C800%2C800i%2C900%2C900i&#038;ver=4.9.6' type='text/css' media='all' />

    <link rel='stylesheet' id='fontawesome-css' href='{{ asset('css/font-awesome/fontawesome-all.min.css?ver=5.0.6') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='ionicons-css' href='{{ asset('css/ionicons.min.css?ver=4.9.6') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css' href='{{ asset('css/bootstrap.min.css?ver=4.9.6') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='slick-css' href='{{ asset('css/slick/slick.css?ver=4.9.6') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='slick-theme-css' href='{{ asset('css/slick/slick-theme.css?ver=4.9.6') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='loaders-css' href='{{ asset('css/loaders.min.css?ver=4.9.6') }}' type='text/css' media='all' />

    <link rel='stylesheet' id='madara-css-css' href='{{ asset('css/style.css?ver=4.9.6') }}' type='text/css' media='all' />

    <script type='text/javascript' src='http://demo.mangabooth.com/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
    <script type='text/javascript' src='http://demo.mangabooth.com/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js?ver=5.4.6.2'></script>
    <script type='text/javascript' src='http://demo.mangabooth.com/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js?ver=5.4.6.2'></script>

    <script type="text/javascript">function setREVStartSize(e){
            try{ var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;
                if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})
            }catch(d){console.log("Failure at Presize of Slider:"+d)}
        };</script>



</head>

<body class="page-template page-template-page-templates page vc_responsive">



<div class="wrap">
    <div class="body-wrap">
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
                                            <img class="img-responsive" src="" alt="xx"/>
                                        </a>
                                    </div>

                                    <div class="main-menu">
                                        <ul class="nav navbar-nav main-navbar">
                                            <li class="menu-item"><a href="{{ route('home') }}">HOME</a></li>
                                            <li class="menu-item"><a href="{{ route('home') }}">ANIMES</a></li>
                                            <li class="menu-item"><a href="{{ route('home') }}">LANÇAMENTOS</a></li>

                                        </ul>
                                    </div>

                                    <div class="search-navigation search-sidebar">


                                        <div id="manga-search-3" class="widget col-xs-12 col-md-12   default no-icon  manga-widget widget-manga-search"><div class="widget__inner manga-widget widget-manga-search__inner c-widget-wrap"><div class="widget-content">
                                                    <div class="search-navigation__wrap">

                                                        <script>
                                                            jQuery(document).ready(function ($) {
                                                                if ($('.c-header__top .manga-search-form').length !== 0 && $('.c-header__top .manga-search-form.search-form').length !== 0) {

                                                                    $('form#blog-post-search').append('<input type="hidden" name="post_type" value="wp-manga">');

                                                                    $('form#blog-post-search').addClass("manga-search-form");

                                                                    $('form#blog-post-search input[name="s"]').addClass("manga-search-field");

                                                                }
                                                            });
                                                        </script>
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

                                                </div></div></div>


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
                        <li id="nav-menu-item-110" class="main-menu-item menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children parent dropdown"><a href="http://demo.mangabooth.com/manga/" class="menu-link dropdown-toggle disabled main-menu-link" data-toggle="dropdown">MANGA </a>
                            <ul class="dropdown-menu menu-depth-1">
                                <li id="nav-menu-item-410" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="/manga/?genres_collapse=on" class="menu-link  sub-menu-link">ARCHIVES &#8211; SHOW GENRES </a></li>
                                <li id="nav-menu-item-409" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="/manga" class="menu-link  sub-menu-link">ARCHIVES &#8211; HIDE GENRES </a></li>
                                <li id="nav-menu-item-386" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-wp-manga"><a href="http://demo.mangabooth.com/manga/hajime-boyfriend/" class="menu-link  sub-menu-link">SINGLE MANGA </a></li>
                                <li id="nav-menu-item-403" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children parent dropdown-submenu"><a href="#" class="menu-link  sub-menu-link">MANGA READING </a>
                                    <ul class="dropdown-menu menu-depth-2">
                                        <li id="nav-menu-item-453" class="sub-menu-item menu-item-depth-2 menu-item menu-item-type-custom menu-item-object-custom"><a href="/manga/massa-consectetur-mattis/" class="menu-link  sub-menu-link">VIDEO CHAPTER </a></li>
                                        <li id="nav-menu-item-457" class="sub-menu-item menu-item-depth-2 menu-item menu-item-type-custom menu-item-object-custom"><a href="http://demo.mangabooth.com/manga/manga-text-chapter/" class="menu-link  sub-menu-link">TEXT CHAPTER </a></li>
                                        <li id="nav-menu-item-404" class="sub-menu-item menu-item-depth-2 menu-item menu-item-type-custom menu-item-object-custom"><a href="/manga/ykataza-yin-wang-shynakimiz/?display=wp-manga&amp;chapter=chapter-1&amp;style=paged" class="menu-link  sub-menu-link">LIGHT VERSION </a></li>
                                        <li id="nav-menu-item-405" class="sub-menu-item menu-item-depth-2 menu-item menu-item-type-custom menu-item-object-custom"><a href="/manga/dakimi-katawi-yakimimono-hajimazu-kyousou/?display=wp-manga&amp;chapter=chapter-1&amp;style=list&amp;body_schema=dark" class="menu-link  sub-menu-link">DARK VERSION </a></li>
                                        <li id="nav-menu-item-346" class="sub-menu-item menu-item-depth-2 menu-item menu-item-type-custom menu-item-object-custom"><a href="/manga/miharu-rokujou/?display=wp-manga&amp;chapter=chapter-1_1&amp;style=list" class="menu-link  sub-menu-link">LIST STYLE </a></li>
                                        <li id="nav-menu-item-345" class="sub-menu-item menu-item-depth-2 menu-item menu-item-type-custom menu-item-object-custom"><a href="/manga/miharu-rokujou/?display=wp-manga&amp;chapter=chapter-1_1&amp;style=paged" class="menu-link  sub-menu-link">PAGED STYLE </a></li>
                                        <li id="nav-menu-item-413" class="sub-menu-item menu-item-depth-2 menu-item menu-item-type-custom menu-item-object-custom"><a href="/manga/kahana-no-shou/?host=local&amp;display=wp-manga&amp;chapter=chapter-1&amp;style=paged" class="menu-link  sub-menu-link">MULTI HOST </a></li>
                                        <li id="nav-menu-item-387" class="sub-menu-item menu-item-depth-2 menu-item menu-item-type-custom menu-item-object-custom"><a href="/manga/hajime-boyfriend/?display=wp-manga&amp;chapter=chapter-1&amp;style=paged" class="menu-link  sub-menu-link">HOST LOCAL </a></li>
                                        <li id="nav-menu-item-388" class="sub-menu-item menu-item-depth-2 menu-item menu-item-type-custom menu-item-object-custom"><a href="/manga/nasama-okima/?display=wp-manga&amp;chapter=chapter-2&amp;style=paged" class="menu-link  sub-menu-link">HOST AMAZON </a></li>
                                        <li id="nav-menu-item-407" class="sub-menu-item menu-item-depth-2 menu-item menu-item-type-custom menu-item-object-custom"><a href="/manga/kagasarete-nairantou/?display=wp-manga&amp;chapter=chapter-1&amp;style=paged" class="menu-link  sub-menu-link">HOST PICASA </a></li>
                                        <li id="nav-menu-item-408" class="sub-menu-item menu-item-depth-2 menu-item menu-item-type-custom menu-item-object-custom"><a href="/manga/kahana-no-shou/?display=wp-manga&amp;chapter=chapter-1&amp;style=paged" class="menu-link  sub-menu-link">HOST IMGUR </a></li>

                                    </ul>
                                </li>
                                <li id="nav-menu-item-347" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="/?s=&amp;post_type=wp-manga" class="menu-link  sub-menu-link">MANGA ADVANCED SEARCH </a></li>

                            </ul>
                        </li>
                        <li id="nav-menu-item-23" class="main-menu-item menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page"><a href="http://demo.mangabooth.com/blog/" class="menu-link  main-menu-link">BLOG </a></li>
                        <li id="nav-menu-item-75" class="main-menu-item menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children parent dropdown"><a href="http://demo.mangabooth.com/about-us/" class="menu-link dropdown-toggle disabled main-menu-link" data-toggle="dropdown">ABOUT US </a>
                            <ul class="dropdown-menu menu-depth-1">
                                <li id="nav-menu-item-22" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="http://demo.mangabooth.com/contact/" class="menu-link  sub-menu-link">CONTACT US </a></li>

                            </ul>
                        </li>
                        <li id="nav-menu-item-596" class="main-menu-item menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children parent dropdown"><a href="http://demo.mangabooth.com/shop/" class="menu-link dropdown-toggle disabled main-menu-link" data-toggle="dropdown"><i class="fas fa-shopping-bag"></i>  SHOP </a>
                            <ul class="dropdown-menu menu-depth-1">
                                <li id="nav-menu-item-595" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="http://demo.mangabooth.com/cart/" class="menu-link  sub-menu-link"><i class="fas fa-shopping-cart"></i> CART </a></li>
                                <li id="nav-menu-item-594" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="http://demo.mangabooth.com/checkout/" class="menu-link  sub-menu-link"><i class="far fa-credit-card"></i> CHECKOUT </a></li>

                            </ul>
                        </li>
                    </ul>    </nav>
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
                            <!-- Button trigger modal -->
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#form-login" class="btn-active-modal">Sign in</a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#form-sign-up" class="btn-active-modal">Sign up</a>
                        </div>

                    </div>
                </div>
            </div>


        </header>


        <div class="c-sidebar c-top-sidebar" style=" padding:0px 0px 0px 0px ; " >
            <div class="container-fluid c-container-fluid">
                <div class="row c-row">
                    <div id="rev-slider-widget-3" class="widget col-xs-12 col-md-12   default no-icon  widget_revslider"><div class="widget__inner widget_revslider__inner c-widget-wrap"><div class="widget-content">
                                <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                                    <!-- START REVOLUTION SLIDER 5.4.6.2 fullwidth mode -->
                                    <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.6.2">
                                        <ul>	<!-- SLIDE  -->
                                            <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-550105-100x50.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Page 1" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                                <!-- MAIN IMAGE -->
                                                <img src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-550105.jpg"  alt="" title="wallhaven-550105"  width="1920" height="1080" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                                                <!-- LAYERS -->
                                            </li>
                                            <!-- SLIDE  -->

                                        </ul>
                                        <div class="tp-bannertimer" style="height: 5px; background: rgba(0,0,0,0.15);"></div>	</div>
                                    <script type="text/javascript">
                                        setREVStartSize({c: jQuery('#rev_slider_1_1'), gridwidth: [1240], gridheight: [500], sliderLayout: 'fullwidth'});

                                        var revapi1,
                                            tpj=jQuery;

                                        tpj(document).ready(function() {
                                            if(tpj("#rev_slider_1_1").revolution == undefined){
                                                revslider_showDoubleJqueryError("#rev_slider_1_1");
                                            }else{
                                                revapi1 = tpj("#rev_slider_1_1").show().revolution({
                                                    sliderType:"standard",
                                                    jsFileLocation:"//demo.mangabooth.com/wp-content/plugins/revslider/public/assets/js/",
                                                    sliderLayout:"fullwidth",
                                                    dottedOverlay:"none",
                                                    delay:9000,
                                                    navigation: {
                                                        keyboardNavigation:"off",
                                                        keyboard_direction: "horizontal",
                                                        mouseScrollNavigation:"off",
                                                        mouseScrollReverse:"default",
                                                        onHoverStop:"off",
                                                        touch:{
                                                            touchenabled:"on",
                                                            touchOnDesktop:"on",
                                                            swipe_threshold: 75,
                                                            swipe_min_touches: 1,
                                                            swipe_direction: "horizontal",
                                                            drag_block_vertical: false
                                                        }
                                                    },
                                                    visibilityLevels:[1240,1024,778,480],
                                                    gridwidth:1240,
                                                    gridheight:500,
                                                    lazyType:"none",
                                                    parallax: {
                                                        type:"mouse",
                                                        origo:"enterpoint",
                                                        speed:400,
                                                        speedbg:0,
                                                        speedls:0,
                                                        levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,55],
                                                        disable_onmobile:"on"
                                                    },
                                                    shadow:0,
                                                    spinner:"spinner0",
                                                    stopLoop:"off",
                                                    stopAfterLoops:-1,
                                                    stopAtSlide:-1,
                                                    shuffle:"off",
                                                    autoHeight:"off",
                                                    hideThumbsOnMobile:"off",
                                                    hideSliderAtLimit:0,
                                                    hideCaptionAtLimit:0,
                                                    hideAllCaptionAtLilmit:0,
                                                    debugMode:false,
                                                    fallbacks: {
                                                        simplifyAll:"off",
                                                        nextSlideOnWindowFocus:"off",
                                                        disableFocusListener:false,
                                                    }
                                                });
                                            }

                                        });	/*ready*/
                                    </script>
                                </div><!-- END REVOLUTION SLIDER --></div></div></div>                        </div>
            </div>
        </div>



        <div class="site-content">

            <div class="c-page-content style-1">
                <div class="content-area" style="margin-top: 20px">
                    <div class="container">
                        <div class="row ">

                            <div class="main-col col-md-8 col-sm-8">

                                <div class="ad c-ads custom-code body-top-ads"><img src="http://demo.mangabooth.com/wp-content/uploads/2017/10/ads-1.jpg" alt="ads"></div>


                                <div class="main-col-inner c-page">

                                    <div class="c-blog__heading style-2 font-heading ">

                                        <h4>

                                            <i class="ion-star"></i>

                                            WHAT&#039;S NEW
                                        </h4>
                                    </div>

                                    <div class="c-blog-listing c-page__content manga_content">
                                        <div class="c-blog__inner">
                                            <div class="c-blog__content">


                                                <div id="loop-content" class="page-content-listing">




                                                    <div class="page-listing-item">
                                                        <div class="row">

                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-302" class="item-thumb hover-details c-image-hover" data-post-id="302">
                                                                        <a href="http://demo.mangabooth.com/manga/sayakani/" title="Sayakani">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-561840-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-561840"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/sayakani/">Sayakani</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star-half ratings_stars rating_current_half"></i><span class="score font-meta total_votes">4.5</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/sayakani/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/sayakani/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/sayakani/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/sayakani/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-395" class="item-thumb hover-details c-image-hover" data-post-id="395">
                                                                        <a href="http://demo.mangabooth.com/manga/kahana-no-shou/" title="Kahana no Shou">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-561840-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-561840"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <span class="manga-title-badges hot">HOT</span>                            <a href="http://demo.mangabooth.com/manga/kahana-no-shou/">Kahana no Shou</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><span class="score font-meta total_votes">4.2</span></div>                    </div>
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

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="page-listing-item">
                                                        <div class="row">

                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-289" class="item-thumb hover-details c-image-hover" data-post-id="289">
                                                                        <a href="http://demo.mangabooth.com/manga/the-gami-shiobita/" title="The Gami Shiobita">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-516736-110x150.png" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-516736"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/the-gami-shiobita/">The Gami Shiobita</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><span class="score font-meta total_votes">4.2</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/the-gami-shiobita/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/the-gami-shiobita/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/the-gami-shiobita/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/the-gami-shiobita/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-305" class="item-thumb hover-details c-image-hover" data-post-id="305">
                                                                        <a href="http://demo.mangabooth.com/manga/monatari-takawoa-yangku/" title="Monatari Takawoa Yangku">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-530467-110x150.png" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-530467"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/monatari-takawoa-yangku/">Monatari Takawoa Yangku</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star-half ratings_stars rating_current_half"></i><span class="score font-meta total_votes">4.3</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/monatari-takawoa-yangku/volume-1/chapter-2"> Chapter 2 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/monatari-takawoa-yangku/volume-1/chapter-2"> volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 13, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/monatari-takawoa-yangku/volume-1/chapter-1"> Chapter 1 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/monatari-takawoa-yangku/volume-1/chapter-1"> volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 13, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="page-listing-item">
                                                        <div class="row">

                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-229" class="item-thumb hover-details c-image-hover" data-post-id="229">
                                                                        <a href="http://demo.mangabooth.com/manga/jikimisuji/" title="Jikimisuji">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-523582-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-523582"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/jikimisuji/">Jikimisuji</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><span class="score font-meta total_votes">4.8</span></div>                    </div>
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

                                                            </div>



                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-243" class="item-thumb hover-details c-image-hover" data-post-id="243">
                                                                        <a href="http://demo.mangabooth.com/manga/miharu-rokujou/" title="Miharu Rokujou">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-529968-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-529968"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <span class="manga-title-badges hot">HOT</span>                            <a href="http://demo.mangabooth.com/manga/miharu-rokujou/">Miharu Rokujou</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star-half ratings_stars rating_current_half"></i><span class="score font-meta total_votes">4.3</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/miharu-rokujou/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/miharu-rokujou/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 12, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/miharu-rokujou/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/miharu-rokujou/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 12, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="page-listing-item">
                                                        <div class="row">

                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-449" class="item-thumb hover-details c-image-hover" data-post-id="449">
                                                                        <a href="http://demo.mangabooth.com/manga/massa-consectetur-mattis/" title="Manga Video Chapters">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-550618-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-550618"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <span class="manga-title-badges new">NEW</span>                            <a href="http://demo.mangabooth.com/manga/massa-consectetur-mattis/">Manga Video Chapters</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star-outline ratings_stars"></i><span class="score font-meta total_votes">4</span></div>                    </div>
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

                                                            </div>



                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-292" class="item-thumb hover-details c-image-hover" data-post-id="292">
                                                                        <a href="http://demo.mangabooth.com/manga/hitman-reborn-katekyo/" title="Hitman Reborn Katekyo">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-556142-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-556142"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/hitman-reborn-katekyo/">Hitman Reborn Katekyo</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><span class="score font-meta total_votes">4.1</span></div>                    </div>
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

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="page-listing-item">
                                                        <div class="row">

                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-303" class="item-thumb hover-details c-image-hover" data-post-id="303">
                                                                        <a href="http://demo.mangabooth.com/manga/leviathan/" title="Leviathan">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-544737-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-544737"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/leviathan/">Leviathan</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star-half ratings_stars rating_current_half"></i><i class="ion-ios-star-outline ratings_stars"></i><span class="score font-meta total_votes">3.5</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/leviathan/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/leviathan/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/leviathan/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/leviathan/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-227" class="item-thumb hover-details c-image-hover" data-post-id="227">
                                                                        <a href="http://demo.mangabooth.com/manga/nasama-okima/" title="Nasama Okima">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-511610-110x150.png" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-511610"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/nasama-okima/">Nasama Okima</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><span class="score font-meta total_votes">5</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/nasama-okima/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/nasama-okima/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/nasama-okima/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/nasama-okima/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="page-listing-item">
                                                        <div class="row">

                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-311" class="item-thumb hover-details c-image-hover" data-post-id="311">
                                                                        <a href="http://demo.mangabooth.com/manga/dakimi-katawi-yakimimono-hajimazu-kyousou/" title="Dakimi Katawi Yakimimono Hajimazu Kyousou">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-540070-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-540070"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <span class="manga-title-badges new">NEW</span>                            <a href="http://demo.mangabooth.com/manga/dakimi-katawi-yakimimono-hajimazu-kyousou/">Dakimi Katawi Yakimimono Hajimazu Kyousou</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star-half ratings_stars rating_current_half"></i><span class="score font-meta total_votes">4.3</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/dakimi-katawi-yakimimono-hajimazu-kyousou/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/dakimi-katawi-yakimimono-hajimazu-kyousou/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/dakimi-katawi-yakimimono-hajimazu-kyousou/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/dakimi-katawi-yakimimono-hajimazu-kyousou/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-290" class="item-thumb hover-details c-image-hover" data-post-id="290">
                                                                        <a href="http://demo.mangabooth.com/manga/kyojin-shingeki-no/" title="Kyojin Shingeki no">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-560695-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-560695"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/kyojin-shingeki-no/">Kyojin Shingeki no</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star-half ratings_stars rating_current_half"></i><span class="score font-meta total_votes">4.6</span></div>                    </div>
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

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="page-listing-item">
                                                        <div class="row">

                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-285" class="item-thumb hover-details c-image-hover" data-post-id="285">
                                                                        <a href="http://demo.mangabooth.com/manga/jiokima-2/" title="Jiokima">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-548614-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-548614"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/jiokima-2/">Jiokima</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star-half ratings_stars rating_current_half"></i><span class="score font-meta total_votes">4.3</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/jiokima-2/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/jiokima-2/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/jiokima-2/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/jiokima-2/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-295" class="item-thumb hover-details c-image-hover" data-post-id="295">
                                                                        <a href="http://demo.mangabooth.com/manga/hajimaru-himitsu-no-jikan/" title="Hajimaru Himitsu no Jikan">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-543371-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-543371"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <span class="manga-title-badges new">NEW</span>                            <a href="http://demo.mangabooth.com/manga/hajimaru-himitsu-no-jikan/">Hajimaru Himitsu no Jikan</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star-outline ratings_stars"></i><span class="score font-meta total_votes">3.9</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/hajimaru-himitsu-no-jikan/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/hajimaru-himitsu-no-jikan/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 12, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/hajimaru-himitsu-no-jikan/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/hajimaru-himitsu-no-jikan/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 12, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="page-listing-item">
                                                        <div class="row">

                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-294" class="item-thumb hover-details c-image-hover" data-post-id="294">
                                                                        <a href="http://demo.mangabooth.com/manga/sai-tatsu/" title="Sai Tatsu">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-550052-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-550052"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/sai-tatsu/">Sai Tatsu</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><span class="score font-meta total_votes">5</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/sai-tatsu/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/sai-tatsu/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/sai-tatsu/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/sai-tatsu/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-304" class="item-thumb hover-details c-image-hover" data-post-id="304">
                                                                        <a href="http://demo.mangabooth.com/manga/hanamuko-no-vahlia/" title="Hanamuko no Vahlia">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-542975-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-542975"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/hanamuko-no-vahlia/">Hanamuko no Vahlia</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><span class="score font-meta total_votes">4.8</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/hanamuko-no-vahlia/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/hanamuko-no-vahlia/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/hanamuko-no-vahlia/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/hanamuko-no-vahlia/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="page-listing-item">
                                                        <div class="row">

                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-307" class="item-thumb hover-details c-image-hover" data-post-id="307">
                                                                        <a href="http://demo.mangabooth.com/manga/tinitan-nafizakura/" title="Tinitan Nafizakura">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-550620-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-550620"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/tinitan-nafizakura/">Tinitan Nafizakura</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><span class="score font-meta total_votes">4.8</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/tinitan-nafizakura/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/tinitan-nafizakura/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/tinitan-nafizakura/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/tinitan-nafizakura/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-282" class="item-thumb hover-details c-image-hover" data-post-id="282">
                                                                        <a href="http://demo.mangabooth.com/manga/okama-sanmikioa/" title="Okama Sanmikioa">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-551939-110x150.png" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-551939"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/okama-sanmikioa/">Okama Sanmikioa</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><span class="score font-meta total_votes">4.8</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/okama-sanmikioa/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/okama-sanmikioa/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/okama-sanmikioa/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/okama-sanmikioa/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="page-listing-item">
                                                        <div class="row">

                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-300" class="item-thumb hover-details c-image-hover" data-post-id="300">
                                                                        <a href="http://demo.mangabooth.com/manga/tsutsui-hikari/" title="Tsutsui Hikari">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-550618-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-550618"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/tsutsui-hikari/">Tsutsui Hikari</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><span class="score font-meta total_votes">5</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/tsutsui-hikari/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/tsutsui-hikari/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/tsutsui-hikari/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/tsutsui-hikari/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="page-item-detail">

                                                                    <div id="manga-item-288" class="item-thumb hover-details c-image-hover" data-post-id="288">
                                                                        <a href="http://demo.mangabooth.com/manga/kitasou-girl/" title="Kitasou Girl">
                                                                            <img width="110" height="150"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-539923-110x150.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:150px; " alt="wallhaven-539923"/>                            </a>
                                                                    </div>
                                                                    <div class="item-summary">
                                                                        <div class="post-title font-title">
                                                                            <h5>
                                                                                <a href="http://demo.mangabooth.com/manga/kitasou-girl/">Kitasou Girl</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="meta-item rating">
                                                                            <div class="post-total-rating"><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star ratings_stars rating_current"></i><i class="ion-ios-star-half ratings_stars rating_current_half"></i><i class="ion-ios-star-outline ratings_stars"></i><i class="ion-ios-star-outline ratings_stars"></i><span class="score font-meta total_votes">2.6</span></div>                    </div>
                                                                        <div class="list-chapter">
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/kitasou-girl/volume-1/chapter-15"> Chapter 15 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/kitasou-girl/volume-1/chapter-15"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                            <div class="chapter-item">

						                            <span class="chapter font-meta">
							<a href="http://demo.mangabooth.com/manga/kitasou-girl/volume-1/chapter-14"> Chapter 14 </a>
						</span>
                                                                                <span class="vol font-meta">
																                                        <a href="http://demo.mangabooth.com/manga/kitasou-girl/volume-1/chapter-14"> Volume 1 </a>
															</span>
                                                                                <span class="post-on font-meta">
								Oct 11, 2017							</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>


                                                <script type="text/javascript">
                                                    var manga_args = {"post_type":"wp-manga","posts_per_page":20,"post_status":"publish","ignore_sticky_posts":1,"order":"","paged":1,"orderby":"rand","error":"","m":"","p":0,"post_parent":"","subpost":"","subpost_id":"","attachment":"","attachment_id":0,"name":"","static":"","pagename":"","page_id":0,"second":"","minute":"","hour":"","day":0,"monthnum":0,"year":0,"w":0,"category_name":"","tag":"","cat":"","tag_id":"","author":"","author_name":"","feed":"","tb":"","meta_key":"","meta_value":"","preview":"","s":"","sentence":"","title":"","fields":"","menu_order":"","embed":"","category__in":[],"category__not_in":[],"category__and":[],"post__in":[],"post__not_in":[],"post_name__in":[],"tag__in":[],"tag__not_in":[],"tag__and":[],"tag_slug__in":[],"tag_slug__and":[],"post_parent__in":[],"post_parent__not_in":[],"author__in":[],"author__not_in":[],"suppress_filters":false,"cache_results":true,"update_post_term_cache":true,"lazy_load_term_meta":true,"update_post_meta_cache":true,"nopaging":false,"comments_per_page":"50","no_found_rows":false};
                                                </script>

                                                <script type="text/javascript">
                                                    var __madara_query_vars = {"post_type":"wp-manga","posts_per_page":"20","post_status":"publish","ignore_sticky_posts":1,"order":"DESC","paged":1,"orderby":"rand","sidebar":"right"};
                                                </script>

                                                <nav class="navigation-ajax">
                                                    <a href="javascript:void(0)" data-target="#loop-content" data-template="madara-core/content/content-archive" id="navigation-ajax" class="btn btn-default load-ajax">
                                                        <div class="load-title">
                                                            LOAD MORE                        <i class="ion-android-arrow-dropdown"></i>
                                                        </div> &nbsp;<div></div>&nbsp;<div></div>&nbsp;<div></div>
                                                    </a>
                                                </nav>


                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="ad c-ads custom-code body-bottom-ads"><img src="http://demo.mangabooth.com/wp-content/uploads/2017/10/ads-1.jpg" alt="ads"></div>

                            </div>


                            <div class="sidebar-col col-md-4 col-sm-4">
                                <div id="main-sidebar" class="main-sidebar" role="complementary">
                                    <div class="widget_text row"><div id="custom_html-12" class="widget_text widget col-xs-12 col-md-12   default no-icon  widget_custom_html"><div class="widget_text widget__inner widget_custom_html__inner c-widget-wrap"><div class="widget_text widget-content"><div class="textwidget custom-html-widget"><img src="http://demo.mangabooth.com/wp-content/uploads/2017/10/ads-square.jpg" alt="ads"></div></div></div></div></div><div class="row"><div id="vifbfanbox_widget_class-7" class="widget col-xs-12 col-md-12   default  no-icon heading-style-1 widget_FacebookLikeBox"><div class="widget__inner widget_FacebookLikeBox__inner c-widget-wrap"><div class="widget-content"><div id="fb-root"></div>
                                                    <script>(function(d, s, id) {
                                                            var js, fjs = d.getElementsByTagName(s)[0];
                                                            if (d.getElementById(id)) return;
                                                            js = d.createElement(s); js.id = id;
                                                            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script><fb:like-box href="https://www.facebook.com/mangabooth" style="border:2px solid #fff4ec"  width="300" show_faces="true" border_color="yes" stream="true" header="true" data-colorscheme="light" data-show-border="yes"></fb:like-box></div></div></div></div><div class="row"><div id="manga-recent-4" class="widget col-xs-12 col-md-12   bordered  no-icon heading-style-1 c-popular manga-widget widget-manga-recent"><div class="widget__inner c-popular manga-widget widget-manga-recent__inner c-widget-wrap">
                                                <div class="c-widget-content style-1 with-button">
                                                    <div class="widget-heading font-nav"><h5 class="heading">POPULAR MANGA</h5></div><div class="widget-content">                        <div class="popular-item-wrap">


                                                            <div class="popular-img widget-thumbnail c-image-hover">
                                                                <a title="Manga Video Chapters" href="http://demo.mangabooth.com/manga/massa-consectetur-mattis/">
                                                                    <img width="75" height="106"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-550618-75x106.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:106px; " alt="wallhaven-550618"/>        </a>
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
                                                                    <img width="75" height="106"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-550105-75x106.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:106px; " alt="wallhaven-550105"/>        </a>
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
                                                                    <img width="75" height="106"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-561840-75x106.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:106px; " alt="wallhaven-561840"/>        </a>
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
                                                                    <img width="75" height="106"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-556142-75x106.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:106px; " alt="wallhaven-556142"/>        </a>
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
                                                                    <img width="75" height="106"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-560695-75x106.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:106px; " alt="wallhaven-560695"/>        </a>
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
                                                                    <img width="75" height="106"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-523582-75x106.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:106px; " alt="wallhaven-523582"/>        </a>
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

                                                        <span class="c-wg-button-wrap">
				        <a class="widget-view-more" href="/manga/?m_orderby=trending">Here for more Popular Manga</a>
                    </span>

                                                    </div>
                                                </div></div></div></div>        </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div><!-- <div class="site-content"> -->


        <div class="c-sidebar c-bottom-sidebar" style="background-image:url(http://demo.mangabooth.com/wp-content/uploads/2017/10/bg-search.jpg);  padding:50px ; ">
            <div class="container c-container">
                <div class="row c-row">
                    <div id="custom_html-28" class="widget_text widget col-xs-12 col-md-12   default  no-icon heading-style-1 widget_custom_html"><div class="widget_text widget__inner widget_custom_html__inner c-widget-wrap"><div class="widget-heading font-nav"><h5 class="heading">BEST TOPIC OF WEEK</h5></div><div class="widget-content"><div class="textwidget custom-html-widget">

                                    <div id="c-post-slider-773" class="related-post manga-slider style-4" data-style="style-4" data-count="3">

                                        <div class="related__container slider__container row c-row" role="toolbar">



                                            <div class="col-sm-6 col-md-3 related__item ">

                                                <div class="related__thumb">
                                                    <div class="related__thumb_item">
                                                        <a href="http://demo.mangabooth.com/how-to-get-people-to-like-manga-2/">
                                                            <img width="642" height="320"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-539934-642x320.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:49.844236760125%; " alt="wallhaven-539934"/>                                                        <div class="related-overlay"></div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="related__content">
                                                    <div class="related__content_item">
                                                        <div class="post-title font-title">
                                                            <h5>
                                                                <a href="http://demo.mangabooth.com/how-to-get-people-to-like-manga-2/">How To Get People To Like Manga</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-sm-6 col-md-3 related__item ">

                                                <div class="related__thumb">
                                                    <div class="related__thumb_item">
                                                        <a href="http://demo.mangabooth.com/5-reasons-why-people-love-manga/">
                                                            <img width="642" height="320"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-543371-642x320.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:49.844236760125%; " alt="wallhaven-543371"/>                                                        <div class="related-overlay"></div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="related__content">
                                                    <div class="related__content_item">
                                                        <div class="post-title font-title">
                                                            <h5>
                                                                <a href="http://demo.mangabooth.com/5-reasons-why-people-love-manga/">5 Reasons Why People Love Manga.</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-sm-6 col-md-3 related__item ">

                                                <div class="related__thumb">
                                                    <div class="related__thumb_item">
                                                        <a href="http://demo.mangabooth.com/how-to-own-manga-for-free/">
                                                            <img width="642" height="320"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-560695-642x320.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:49.844236760125%; " alt="wallhaven-560695"/>                                                        <div class="related-overlay"></div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="related__content">
                                                    <div class="related__content_item">
                                                        <div class="post-title font-title">
                                                            <h5>
                                                                <a href="http://demo.mangabooth.com/how-to-own-manga-for-free/">How To Own Manga For Free.</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-sm-6 col-md-3 related__item ">

                                                <div class="related__thumb">
                                                    <div class="related__thumb_item">
                                                        <a href="http://demo.mangabooth.com/top-ten-trends-in-manga-to-watch/">
                                                            <img width="642" height="320"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-550620-642x320.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:49.844236760125%; " alt="wallhaven-550620"/>                                                        <div class="related-overlay"></div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="related__content">
                                                    <div class="related__content_item">
                                                        <div class="post-title font-title">
                                                            <h5>
                                                                <a href="http://demo.mangabooth.com/top-ten-trends-in-manga-to-watch/">Top Ten Trends In Manga To Watch.</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-sm-6 col-md-3 related__item ">

                                                <div class="related__thumb">
                                                    <div class="related__thumb_item">
                                                        <a href="http://demo.mangabooth.com/10-facts-you-never-knew-about-manga/">
                                                            <img width="642" height="320"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-551702-642x320.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:49.844236760125%; " alt="wallhaven-551702"/>                                                        <div class="related-overlay"></div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="related__content">
                                                    <div class="related__content_item">
                                                        <div class="post-title font-title">
                                                            <h5>
                                                                <a href="http://demo.mangabooth.com/10-facts-you-never-knew-about-manga/">10 Facts You Never Knew About Manga.</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-sm-6 col-md-3 related__item ">

                                                <div class="related__thumb">
                                                    <div class="related__thumb_item">
                                                        <a href="http://demo.mangabooth.com/5-easy-rules-of-manga/">
                                                            <img width="642" height="320"  data-src="http://demo.mangabooth.com/wp-content/uploads/2017/10/wallhaven-539923-642x320.jpg" class="img-responsive lazyload effect-fade" src="http://demo.mangabooth.com/wp-content/themes/madara/images/dflazy.jpg" style="padding-top:49.844236760125%; " alt="wallhaven-539923"/>                                                        <div class="related-overlay"></div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="related__content">
                                                    <div class="related__content_item">
                                                        <div class="post-title font-title">
                                                            <h5>
                                                                <a href="http://demo.mangabooth.com/5-easy-rules-of-manga/">5 Easy Rules Of Manga.</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>


                                </div></div></div></div>                        </div>
            </div>
        </div>


        <footer class="site-footer">

            <div class="ad c-ads custom-code footer-ads col-md-12"><img src="http://demo.mangabooth.com/wp-content/uploads/2017/10/ads-1.jpg" alt="ads"></div>
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wrap_social_account">
                                <ul class='list-inline social_account__item'><li><a class="social-icons" target="_blank" href="#" title="Facebook"><i class="fab fa-facebook"></i></a></li><li><a class="social-icons" target="_blank" href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li><li><a class="social-icons" target="_blank" href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li><li><a class="social-icons" target="_blank" href="#" title="Flickr"><i class="fab fa-flickr"></i></a></li><li><a class="social-icons" target="_blank" href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li></ul>                                </div>
                        </div>
                    </div>
                </div>
            </div>

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

    </div> <!-- class="wrap" --></div> <!-- class="body-wrap" -->



<!-- Modal -->

<div class="wp-manga-section">
    <input type="hidden" name="bookmarking" value="0"/>
    <div class="modal fade" id="form-login" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="login" class="login">
                        <h1>
                            <a href="http://demo.mangabooth.com/" title="MangaBooth Demo" tabindex="-1">Sign in</a>
                        </h1>
                        <p class="message login"></p>
                        <link rel='dns-prefetch' href='//fonts.googleapis.com' />
                        <link rel='dns-prefetch' href='//s.w.org' />
                        <script type='text/javascript' src='http://demo.mangabooth.com/wp-includes/js/wp-embed.min.js?ver=4.9.6'></script>
                        <form name="loginform" id="loginform" method="post">
                            <p>
                                <label>Username or Email Address *									<br>
                                    <input type="text" name="log" class="input user_login" value="" size="20">
                                </label>
                            </p>
                            <p>
                                <label>Password *									<br>
                                    <input type="password" name="pwd" class="input user_pass" value="" size="20">
                                </label>
                            </p>
                            <p class="forgetmenot">
                                <label>
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever">Remember Me 								</label>
                            </p>
                            <p class="submit">
                                <input type="submit" name="wp-submit" class="button button-primary button-large wp-submit" value="Log In">
                                <input type="hidden" name="redirect_to" value="http://demo.mangabooth.com/wp-admin/">
                                <input type="hidden" name="testcookie" value="1">
                            </p>
                        </form>
                        <p class="nav">
                            <a href="javascript:avoid(0)" class="to-reset">Lost your password?</a>
                        </p>
                        <p class="backtoblog">
                            <a href="javascript:void(0)">&larr; Back to MangaBooth Demo</a>
                        </p>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="form-sign-up" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="sign-up" class="login">
                        <h1>
                            <a href="http://demo.mangabooth.com/" title="MangaBooth Demo" tabindex="-1">Sign Up</a>
                        </h1>
                        <p class="message register">Register For This Site.</p>
                        <link rel='dns-prefetch' href='//fonts.googleapis.com' />
                        <link rel='dns-prefetch' href='//s.w.org' />
                        <form name="registerform" id="registerform" novalidate="novalidate">
                            <p>
                                <label>Username *									<br>
                                    <input type="text" name="user_sign-up" class="input user_login" value="" size="20">
                                </label>
                            </p>
                            <p>
                                <label>Email Address *									<br>
                                    <input type="email" name="email_sign-up"  class="input user_email" value="" size="20">
                                </label>
                            </p>
                            <p>
                                <label>Password *<br>
                                    <input type="password" name="pass_sign-up" class="input user_pass" value="" size="25">
                                </label>
                            </p>

                            <input type="hidden" name="redirect_to" value="">
                            <p class="submit">
                                <input type="submit" name="wp-submit" class="button button-primary button-large wp-submit" value="Register">
                            </p>
                        </form>
                        <p class="nav">
                            <a href="javascript:void(0)" class="to-login">Log in</a>
                            |
                            <a href="javascript:void(0)" class="to-reset">Lost your password?</a>
                        </p>
                        <p class="backtoblog">
                            <a href="javascript:void(0)">&larr; Back to MangaBooth Demo</a>
                        </p>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="form-reset" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="reset" class="login">
                        <h1>
                            <a href="javascript:void(0)" class="to-reset">Lost your password?</a>
                        </h1>
                        <p class="message reset">Please enter your username or email address. You will receive a link to create a new password via email.</p>
                        <form name="resetform" id="resetform" method="post">
                            <p>
                                <label>Username or Email Address									<br>
                                    <input type="text" name="user_reset" id="user_reset" class="input" value="" size="20">
                                </label>
                            </p>
                            <p class="submit">
                                <input type="submit" name="wp-submit" class="button button-primary button-large wp-submit" value="Get New Password">
                                <input type="hidden" name="testcookie" value="1">
                            </p>
                        </form>
                        <p>
                            <a class="backtoblog" href="javascript:void(0)">&larr; Back to  MangaBooth Demo</a>
                        </p>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
</div>
<div class="go-to-top active">
    <i class="ion-android-arrow-up"></i>
</div>
<script type="text/javascript">
    function revslider_showDoubleJqueryError(sliderID) {
        var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
        errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
        errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
        errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
        errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
        jQuery(sliderID).show().html(errorMessage);
    }
</script>
<script type='text/javascript' src='http://demo.mangabooth.com/wp-content/themes/madara/js/lazysizes/lazysizes.min.js?ver=2.0.7'></script>
<script type='text/javascript' src='http://demo.mangabooth.com/wp-content/themes/madara/js/bootstrap.min.js?ver=3.3.7'></script>
<script type='text/javascript' src='http://demo.mangabooth.com/wp-includes/js/imagesloaded.min.js?ver=3.2.0'></script>

<script type='text/javascript' src='http://demo.mangabooth.com/wp-content/themes/madara/js/template.js?ver=4.9.6'></script>


<script type='text/javascript' src='http://demo.mangabooth.com/wp-content/themes/madara/js/slick/slick.min.js?ver=1.7.1'></script>


</body>
</html>