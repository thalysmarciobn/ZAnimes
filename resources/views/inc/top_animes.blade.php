<div class="c-widget-content style-1">
    <div class="c-blog__heading style-2 font-heading">
        <h4>@lang('home.most-accesseds-in-the-month')</h4>
    </div>
    <ul id="home-toprank-list-1" class="top5" data-genre="gl">
        @foreach ($monthly as $anime)
            <li style="background-image: url({{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }});">
                <a href="{{ route('anime.default', ['anime_slug' => $anime->slug_name]) }}" class="overlay">
                    <span class="iteration">{{ $loop->iteration }}</span>
                    <div class="meta">
                        <h4 class="title">{{ $anime->name }}</h4>
                        <span>{{ $anime->author }}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
