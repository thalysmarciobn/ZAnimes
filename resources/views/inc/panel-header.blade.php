<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('panel') ? 'active' : 'non' }}"><a class="nav-link" href="{{ route('panel.dashboard') }}">Dashboard</a></li>
                <li class="nav-item {{ Request::is('panel/animes') ? 'active' : 'non' }}"><a class="nav-link" href="{{ route('panel.animes.default') }}">Animes</a></li>
                <li class="nav-item {{ Request::is('panel/animes/add') ? 'active' : 'non' }}"><a class="nav-link" href="{{ route('panel.animes.add') }}">Add Anime</a></li>
                <li class="nav-item {{ Request::is('panel/week') ? 'active' : 'non' }}"><a class="nav-link" href="{{ route('panel.week.default') }}">Week</a></li>
                <li class="nav-item {{ Request::is('panel/avatar') ? 'active' : 'non' }}"><a class="nav-link" href="{{ route('panel.avatar.default') }}">Avatar</a></li>
            </ul>
        </div>
    </div>
</nav>
