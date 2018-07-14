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
    if (last == 20 || time_update_event.type === "ended" || time_update_event.type === "play" || time_update_event.type === "pause") {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "{{ route('api_episode') }}", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader('x-csrf-token', "{{ csrf_token() }}");
        xhttp.send("episode_id={{ $episode->id }}&current_time=" + current_time + "&duration=" + duration);
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


player.suggestedVideoEndcap({
    header: 'You may also like…',
    suggestions: [
        {
            title: 'Suggested Video One',
            url: '/another-video.html',
            image: 'http://placehold.it/250',
            alt: 'Description of photo',
            target: '_blank'
        },
        {
            title: 'Suggested Article One',
            url: '/a-different-article.html',
            image: 'http://placehold.it/250',
            target: '_self'
        }
    ]
});

