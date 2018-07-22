<div class="c-widget-content style-1">
    <div class="c-blog__heading style-2 font-heading">
        <h4>@lang('home.most-accesseds-in-the-month')</h4>
    </div>
    <div id="home-toprank-list-1" class="top5__list" data-genre="gl">
        @foreach ($monthly as $anime)
            <li class="top5__item">
                <a href="{{ route('anime.default', ['anime_slug' => $anime->slug_name]) }}">
                    <div class="top5__link">
                        <div class="popular-img widget-thumbnail">
                            <img data-src="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-sizes="(max-width: 50px) 75vw, 50px" class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}">
                        </div>
                        <div class="top5__ranking">{{ $loop->iteration }}</div>
                        <div class="top5__title">{{ $anime->name }}</div>
                        <div class="top5__author">
                            <span class="artist-link" data-artist="misspm">{{ $anime->author }}</span>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </div>
</div>
