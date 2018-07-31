(function(videojs) {
    'use strict';
    videojs.plugin('suggestedVideoEndcap', function(opts) {
        var player = this;
        var _sve;

        function constructSuggestedVideoEndcapContent() {
            var _frag = document.createDocumentFragment();
            var _aside = document.createElement('aside');
            var _div = document.createElement('div');
            var _header = document.createElement('div');
            var _content = document.createElement('div');
            var _title = document.createElement('h5');
            var _episode = document.createElement('h4');
            var _prev = document.createElement('div');
            _aside.className = 'vjs-suggested-video-endcap';
            _div.className = 'vjs-suggested-video-endcap-container';

            _title.innerHTML = opts.header;
            _episode.innerHTML = opts.episode;
            _header.className = 'vjs-suggested-video-endcap-header';
            _content.className = 'vjs-suggested-video-endcap-content';
            _content.appendChild(_title);
            _content.appendChild(_episode);


            _prev.innerHTML = opts.prev;
            _prev.className = 'vjs-suggested-video-endcap-prev';
            _content.appendChild(_prev);
            _header.appendChild(_content);

            _div.appendChild(_header);

            var _a = document.createElement('a');
            _a.className = 'next-play';
            _a.href = opts.url;
            _a.target = opts.target || '_self';
            var _img = document.createElement('img');
            var _shadow = document.createElement('div');
            _shadow.className = 'vjs-suggested-video-shadow';
            _img.className = 'vjs-suggested-video-endcap-img';
            _img.src = opts.image;
            _a.appendChild(_img);
            _header.appendChild(_a);
            _div.appendChild(_shadow);



            _aside.appendChild(_div);
            _sve = _aside;
            _frag.appendChild(_aside);
            player.el().appendChild(_frag);
        }
        player.on('ended', function() {
            _sve.classList.add('is-active');
        }).on('play', function() {
            _sve.classList.remove('is-active');
        }).on('timeupdate', function() {
            _sve.classList.remove('is-active');
        }).on('pause', function() {
            _sve.classList.remove('is-active');
        });
        player.ready(function() {
            constructSuggestedVideoEndcapContent();
        });
    });
}(window.videojs));
