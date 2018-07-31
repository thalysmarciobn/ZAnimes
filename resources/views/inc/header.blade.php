<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">
        <div class="col-12">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="mobile-menu">
                <div class="w-100">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ Request::is('/') ? 'active' : 'non' }}"><a class="nav-link" href="{{ route('home') }}">@lang('pages.menu.home')</a></li>
                        <li class="{{ Request::is('animes') ? 'active' : 'non' }}"><a class="nav-link" href="{{ route('animes') }}">@lang('pages.menu.animes')</a></li>
                        <li class="{{ Request::is('temporada') ? 'active' : 'non' }}"><a class="nav-link" href="{{ route('season') }}">@lang('pages.menu.season')</a></li>
                        <li class="{{ Request::is('noticias') ? 'active' : 'non' }}"><a class="nav-link" href="{{ route('home') }}">@lang('pages.menu.articles')</a></li>
                        <li class="{{ Request::is('forum') ? 'active' : 'non' }}" ><a class="nav-link" href="{{ route('home') }}">@lang('pages.menu.forum')</a></li>
                    </ul>
                </div>
                <div class="my-2 my-lg-0">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <div class="search-content">
                                <form role="search" method="get" class="search-form">
                                    {{ csrf_field() }}
                                    <label>
                                        <span class="screen-reader-text">Procurar por:</span>
                                        <input type="search" class="search-field" placeholder="Procurar" name="procura">
                                    </label>
                                    <input type="submit" class="search-submit" value="Search">
                                </form>
                            </div>
                        </li>
                        @auth
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a id="conta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link avatar nav-link dropdown-toggle">
                                        <img src="{{ ZAnimesControl::url('avatars/default.jpg') }}" srcset="{{ Auth::user()->avatar }}" data-src="{{ Auth::user()->avatar }}" data-srcset="{{ Auth::user()->avatar }}" height="50" width="50">
                                    </a>
                                    <div class="fade dropdown-menu dropdown-menu-right account-panel" aria-labelledby="conta">
                                        @if(Auth::user()->editor)
                                            <a class="dropdown-item" href="{{ route('panel.dashboard') }}">@lang('pages.panel')</a>
                                            <div class="dropdown-divider"></div>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('profile', ['name' => Auth::user()->name]) }}">{{ Auth::user()->name }}</a>
                                        <a class="dropdown-item" href="{{ route('user.settings') }}">@lang('pages.settings')</a>
                                        <a class="dropdown-item" href="{{ route('user.logout') }}">@lang('pages.logout')</a>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a id="conta" data-toggle="modal" data-target="#loginModal" class="nav-link avatar nav-link dropdown-toggle">
                                        <img src="{{ ZAnimesControl::url('avatars/default.jpg') }}" height="50" width="50">
                                    </a>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>

            </div>
        </div>
    </div>
</nav>

@guest
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('login.title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('login') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="email">@lang('login.email')</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="email@example.com">
                    </div>
                    <div class="form-group">
                        <label for="password">@lang('login.password')</label>
                        <input name="password"  type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('register') }}" class="btn btn-secondary" role="button">@lang('login.register')</a>
                    <button type="submit" class="btn btn-primary">@lang('login.submit')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endguest
