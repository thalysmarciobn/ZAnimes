<div class="c-widget-content style-1">
    <div class="c-blog__heading style-2 font-heading">
        <h4>@lang('anime.also_liked')</h4>
    </div>
    <div class="widget-content">
        @foreach ($similar as $anime)
            <div class="popular-item-wrap">
                <a title="{{ $anime->name }}" href="{{ route('anime', ['anime_slug' => $anime->slug_name]) }}">
                    <div class="popular-img widget-thumbnail c-image-hover">
                            <img width="50" height="75" data-src="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-sizes="(max-width: 50px) 75vw, 50px" class="img-responsive lazyload effect-fade" src="{{ asset('images/video_empty.png') }}" style="padding-top:180px; " alt="{{ $anime->name }}"/>
                    </div>
                    <div class="popular-content">
                        <h5 class="widget-title">
                            {{ $anime->name }}
                        </h5>
                        <div class="list-chapter">
                            <div class="chapter-item">
                                <span class="post-on font-meta">{{ $anime->author }}</span>
                                <span class="post-on font-meta">{{ $anime->year }}</span>
                                <span class="post-on font-meta count">{{ $anime->monthly_views->count() }}  <i class="fa fa-star fa-1x"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
