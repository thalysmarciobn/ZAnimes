(function ($) {

    "use strict";

    $(document).ready(function () {

        // header slider
        $(".manga-slider .slider__container").each(function () {

            var $this = $(this);
            var style = $(this).parents(".manga-slider").attr('data-style');
            var manga_slidesToShow = parseInt($(this).parents(".manga-slider").attr('data-count'));
            var check_style = $this.parents(".style-3").length;
            var check_rtl = (jQuery("body").css('direction') === "rtl");
            var manga_style_1 = {
                lazyLoad: 'ondemand',
                dots: true,
                infinite: false,
                speed: 500,
                centerMode: (((manga_slidesToShow % 2 !== 0) && (!check_style)) ? true : false),
                slidesToShow: manga_slidesToShow,
                slidesToScroll: check_style ? 3 : 1,
                arrows: false,
                rtl: check_rtl,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: (manga_slidesToShow == 1) ? 1 : 2,
                        slidesToScroll: (manga_slidesToShow == 1) ? 1 : 2,
                        infinite: false,
                        centerMode: false,
                        dots: true
                    }
                }, {
                    breakpoint: 660,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        variableWidth: false,
                        dots: true
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        variableWidth: false,
                    }
                }]
            }
            var manga_style_2 = {
                lazyLoad: 'ondemand',
                dots: true,
                infinite: false,
                speed: 500,
                centerMode: (((manga_slidesToShow % 2 !== 0) && (!check_style)) ? true : false),
                slidesToShow: manga_slidesToShow,
                slidesToScroll: check_style ? 3 : 1,
                arrows: false,
                rtl: check_rtl,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: (manga_slidesToShow == 1) ? 1 : 2,
                        slidesToScroll: (manga_slidesToShow == 1) ? 1 : 2,
                        infinite: false,
                        dots: true
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true
                    }
                }]
            }
            var manga_style_3 = {
                lazyLoad: 'ondemand',
                dots: true,
                infinite: false,
                speed: 500,
                slidesToShow: manga_slidesToShow,
                slidesToScroll: manga_slidesToShow,
                arrows: false,
                rtl: check_rtl,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: (manga_slidesToShow == 1) ? 1 : 2,
                        slidesToScroll: (manga_slidesToShow == 1) ? 1 : 2,
                        infinite: false,
                        dots: true
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true
                    }
                }]
            }
            var manga_style_4 = {
                lazyLoad: 'ondemand',
                dots: true,
                infinite: false,
                speed: 500,
                vertical: true,
                verticalSwiping: true,
                slidesToShow: manga_slidesToShow,
                slidesToScroll: manga_slidesToShow,
                arrows: false,
                rtl: check_rtl,
                initialSlide: initial > 2 ? initial - 3 : (initial > 1 ? initial - 2 : initial - 1),
                responsive: [
                    {
                        breakpoint: 1700,
                        settings: {
                            slidesToShow: manga_slidesToShow,
                            slidesToScroll: manga_slidesToShow,
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: manga_slidesToShow,
                            slidesToScroll: manga_slidesToShow,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            initialSlide: initial > 2 ? initial - 2 : (initial > 1 ? initial - 2 : initial - 1),
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            initialSlide: initial > 2 ? initial - 2 : (initial > 1 ? initial - 2 : initial - 1),
                        }
                    },
                ]
            }

            switch (style) {
                case 'style-1':
                    $this.slick(manga_style_1);
                    break;
                case 'style-2':
                    $this.slick(manga_style_2);
                    break;
                case 'style-3':
                    $this.slick(manga_style_3);
                    break;
                case 'style-4':
                    $this.slick(manga_style_4);
                    break;
            }

        });

        // popular slider
        $(".popular-slider .slider__container").each(function () {
            var manga_slidesToShow = parseInt($(this).parents(".popular-slider").attr('data-count'));
            var check_rtl = (jQuery("body").css('direction') === "rtl");
            var initial = parseInt($(this).parents(".popular-slider").attr('data-initial'));
            var items = parseInt($(this).parents(".popular-slider").attr('data-items'));
            var popular_style_2 = {
                lazyLoad: 'ondemand',
                dots: false,
                infinite: false,
                speed: 500,
                slidesToShow: manga_slidesToShow,
                arrows: true,
                rtl: check_rtl,
                slidesToScroll: manga_slidesToShow,
                responsive: [
                    {
                        breakpoint: 1700,
                        settings: {
                            slidesToShow: (manga_slidesToShow == 1) ? 1 : 4,
                            slidesToScroll: (manga_slidesToShow == 1) ? 1 : 4,
                        }
                    },
                    {
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: (manga_slidesToShow == 1) ? 1 : 3,
                            slidesToScroll: (manga_slidesToShow == 1) ? 1 : 3,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: (manga_slidesToShow == 1) ? 1 : 2,
                            slidesToScroll: (manga_slidesToShow == 1) ? 1 : 2,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
                ]
            }
            var popular_style_1 = {
                lazyLoad: 'ondemand',
                dots: false,
                infinite: false,
                speed: 500,
                slidesToShow: manga_slidesToShow,
                arrows: true,
                rtl: check_rtl,
                slidesToScroll: manga_slidesToShow,
                responsive: [
                    {
                        breakpoint: 1700,
                        settings: {
                            slidesToShow: manga_slidesToShow,
                            slidesToScroll: manga_slidesToShow,
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
                ]
            }
            console.log(initial);
            var popular_style_4 = {
                lazyLoad: 'ondemand',
                dots: false,
                infinite: false,
                speed: 500,
                slidesToShow: manga_slidesToShow,
                arrows: true,
                rtl: check_rtl,
                slidesToScroll: 1,
                initialSlide: initial + 1 == items ? initial - 4 : (initial >= items ? initial - 5 : (initial > 3 ? initial - 3 : 0)),
                responsive: [
                    {
                        breakpoint: 1700,
                        settings: {
                            slidesToShow: 3,
                            initialSlide: initial + 1 == items ? initial - 3 : (initial >= items ? initial - 3 : (initial > 2 ? initial - 2 : 0)),
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            initialSlide: initial + 1 == items ? initial - 3 : (initial >= items ? initial - 3 : (initial > 2 ? initial - 2 : 0)),
                        }
                    },
                    {
                        breakpoint: 700,
                        settings: {
                            slidesToShow: 2,
                            initialSlide: initial + 1 == items ? initial - 1 : (initial >= items ? initial - 2 : (initial > 1 ? initial - 1 : 0)),
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            initialSlide: initial + 1 == items ? initial - 1 : (initial >= items ? initial - 2 : (initial > 1 ? initial - 1 : 0)),
                        }
                    },
                ]
            }

            var popular_style_3 = popular_style_1;

            var $this = $(this);
            var style = $(this).parents(".popular-slider").attr('data-style');
            switch (style) {
                case 'style-1':
                    $this.slick(popular_style_1);
                    break;
                case 'style-2':
                    $this.slick(popular_style_2);
                    break;
                case 'style-3':
                    $this.slick(popular_style_3);
                    break;
                case 'style-4':
                    $this.slick(popular_style_4);
                    break;
            }

        });


    });
})(jQuery);
