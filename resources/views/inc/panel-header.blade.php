<header class="site-header">
    <div class="c-header__top">

        <div class="c-sub-header-nav with-border  ">
            <div class="container ">
                <div class="c-sub-nav_wrap">
                    <div class="sub-nav_content">
                        <ul class="sub-nav_list list-inline second-menu">
                            <li id="menu-item-54" class="menu-item"><a href="{{ route('panel-animes') }}">Animes</a></li>
                            <li id="menu-item-54" class="menu-item"><a href="{{ route('panel-animes-add') }}">Add Anime</a></li>
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
    </div>
</header>