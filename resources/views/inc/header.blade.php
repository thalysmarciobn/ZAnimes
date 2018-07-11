<div class="navbar navbar-default">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('home') }}">@lang('pages.menu-home')</a></li>
                    <li><a href="{{ route('animes') }}">@lang('pages.menu-animes')</a></li>
                    <li><a href="{{ route('dmca') }}">@lang('pages.menu-dmca')</a></li>
                </ul>
                <ul class="pull-right nav navbar-nav">
                    @auth
                        <a class="avatar nav-link dropdown-toggle" href="#">
                            <img src="http://1.gravatar.com/avatar/1f2281df65a4de28c1547e09710b68c0?s=50&amp;d=mm&amp;r=g" srcset="http://1.gravatar.com/avatar/1f2281df65a4de28c1547e09710b68c0?s=100&amp;d=mm&amp;r=g 2x" class="avatar avatar-50 photo" height="50" width="50">
                        </a>
                        @if(Auth::user()->editor)
                            <li><a href="{{ route('panel') }}">@lang('pages.panel')</a></li>
                        @endif
                        <li><a href="{{ route('logout') }}">@lang('pages.logout')</a></li>
                    @endauth
                    @guest
                        <li><a href="{{ route('login') }}">@lang('pages.login')</a></li>
                        <li><a href="{{ route('register') }}">@lang('pages.register')</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</div>