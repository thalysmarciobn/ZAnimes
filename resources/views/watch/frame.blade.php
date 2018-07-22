player = videojs ("video-player", {
        preload: true,
        controls: true,
        plugins: {
            videoJsResolutionSwitcher: {
                default: 'high',
                dynamicLabel: true
            }
        }
    }, function() {
        player.updateSrc([
        {
            src: '{{ $episode->video }}',
            type: 'video/mp4',
            label: '360'
        },
        {
            src: 'sds',
            type: 'video/mp4',
            label: '720'
            }
        ]);
    }
);

var last = 0;
function time_updated(time_update_event){
    var current_time = player.currentTime();
    var duration = player.duration();
    var time = Math.floor(current_time);

    if(time > duration || time_update_event.type === "ended") {
        time = 0;
    }
    if (last == 240 || last % 240 == 0 || time_update_event.type === "ended" || time_update_event.type === "play" || time_update_event.type === "pause") {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "{{ route('user.setEpisode') }}", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader('x-csrf-token', "{{ csrf_token() }}");
        xhttp.send("anime_id={{ $episode->anime->id }}&season_id={{ $episode->season->id }}&episode_id={{ $episode->id }}&current_time=" + current_time + "&duration=" + duration);
        console.info('Source changed to % s', current_time);
        last = 0;
    }
    last = last + 1;

}

player.on('loadedmetadata', time_updated);
player.on('timeupdate', time_updated);
player.on('ended', time_updated);
player.on('pause', time_updated);


player.remember({"localStorageKey": "{{ $episode->id }}"});



player.hotkeys({
    volumeStep: 0.1,
    seekStep: 5,
    enableModifiersForNumbers: false
});

@if ($next != null)
player.suggestedVideoEndcap({
    header: 'Próximo Episódio',
    prev: "&nbsp;&nbsp;{{ $next->prev }}",
    episode: "{{ $next->title }}",
    url: '{{ route('anime.episode', ['anime_slug' => $next->season->anime->slug_name, 'episode' => $next->episode, 'episode_slug' => $next->slug, 'season' => $next->season_id]) }}',
    image: '{{ ZAnimesControl::url('animes/' . $next->poster) }}',
    alt: 'Description of photo',
    target: ''
});
@endif


