<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-16x16.png') }}" sizes="16x16">
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}">

    <meta name="description" content="@yield('og_description')" />
    <meta name="keywords" content="zanimes,desenhos onlines,assistir animes onlines,desenhos online gratis,desenhos completo online,animes completo,animes para assistir,lancamentos de animes,animes completos, animes em smartphone,animes em tablets,animes em iphone, animes em celular, baixar animes, download de animes" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:title" content="@yield('og_title')" />
    <meta property="og:description" content="@yield('og_description')" />
    <meta property="og:image" content="@yield('og_image')" />

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <link rel='stylesheet' id='apss-font-awesome-css' href='{{ asset('css/font-awesome/font-awesome.min.css?ver=4.3.5') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='apss-font-opensans-css' href='//fonts.googleapis.com/css?family=Open+Sans&#038;ver=4.9.6' type='text/css' media='all' />
    <link rel='stylesheet' id='apss-frontend-css-css' href='{{ asset('css/frontend.css?ver=4.3.5') }}' type='text/css' media='all' />

    <link rel='stylesheet' id='rs-plugin-settings-css' href='{{ asset('css/settings.css?ver=5.4.6.2') }}' type='text/css' media='all' />

    <link rel='stylesheet' id='google-fonts-css' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100i%2C200%2C200i%2C300%2C300i%2C400%2C400i%2C500%2C500i%2C600%2C600i%2C700%2C700i%2C800%2C800i%2C900%2C900i&#038;ver=4.9.6' type='text/css' media='all' />

    <link rel='stylesheet' id='fontawesome-css' href='{{ asset('css/font-awesome/fontawesome-all.min.css?ver=5.0.6') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='ionicons-css' href='{{ asset('css/ionicons.min.css?ver=4.2.6') }}' type='text/css' media='all' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel='stylesheet' id='slick-css' href='{{ asset('css/slick/slick.css?ver=4.9.6') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='slick-theme-css' href='{{ asset('css/slick/slick-theme.css?ver=4.9.6') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='loaders-css' href='{{ asset('css/loaders.min.css?ver=4.9.6') }}' type='text/css' media='all' />

    <link rel='stylesheet' id='madara-css-css' href='{{ asset('css/style.css?ver=4.9.6') }}{{ time() }}' type='text/css' media='all' />

    <script type='text/javascript' src='{{ asset('js/jquery.js?ver=1.12.4') }}'></script>
    <script type='text/javascript' src='{{ asset('js/jquery.themepunch.tools.min.js?ver=5.4.6.2') }}'></script>
    <script type='text/javascript' src='{{ asset('js/jquery.themepunch.revolution.min.js?ver=5.4.6.2') }}'></script>
</head>
<body class="@yield('body') page-template  page">
    <div class="wrap">
        <div class="body-wrap">
            @include('inc.header')
            <div class="site-content">
                <div class="c-page-content style-1">
                    @yield("header")
                    <div class="content-area">
                        <div class="container">
                            <div class="col-md-12">
                                @if ($errors->any())
                                    @foreach($errors->all() as $message)
                                        <div class="alert alert-danger" role="danger">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endif
                                @if (session('info'))
                                    <div class="alert alert-info" role="info">
                                        <p>{{ session('info') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    @yield("container")
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc.footer')
    <script type='text/javascript' src='{{ asset('js/lazysizes.min.js?ver=2.0.7') }}'></script>
    <script type='text/javascript' src='{{ asset('js/imagesloaded.min.js?ver=3.2.0') }}'></script>

    <script type='text/javascript' src='{{ asset('js/template.js?ver=4.9.6') }}{{ time() }}'></script>
    <script type='text/javascript' src='{{ asset('js/script.js?ver=4.9.6') }}'></script>

    <script type='text/javascript' src='{{ asset('js/slick.min.js?ver=1.7.1') }}'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    @yield('footer')
</body>

</html>
