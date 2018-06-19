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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>