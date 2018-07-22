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
                    <li class="{{ Request::is('/') ? 'active' : 'non' }}"><a href="{{ route('home') }}">@lang('pages.menu.home')</a></li>
                    <li class="{{ Request::is('animes') ? 'active' : 'non' }}"><a href="{{ route('animes') }}">@lang('pages.menu.animes')</a></li>
                    <li class="{{ Request::is('temporada') ? 'active' : 'non' }}"><a href="{{ route('season') }}">@lang('pages.menu.season')</a></li>
                    <li class="{{ Request::is('noticias') ? 'active' : 'non' }}"><a href="{{ route('home') }}">@lang('pages.menu.articles')</a></li>
                    <li class="{{ Request::is('forum') ? 'active' : 'non' }}"><a href="{{ route('home') }}">@lang('pages.menu.forum')</a></li>
                </ul>
                <ul class="pull-right nav navbar-nav">
                    @auth
                        @if(Auth::user()->editor)
                            <li>
                                <a href="{{ route('panel.dashboard') }}">@lang('pages.panel')</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('logout') }}">@lang('pages.logout')</a>
                        </li>
                        <li>
                            <a class="avatar nav-link dropdown-toggle" href="{{ route('profile', ['name' => Auth::user()->name]) }}">
                                <img src="{{ ZAnimesControl::url('avatars/default.jpg') }}" srcset="{{ Auth::user()->avatar }}" data-src="{{ Auth::user()->avatar }}" data-srcset="{{ Auth::user()->avatar }}" height="50" width="50">
                            </a>
                        </li>
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
