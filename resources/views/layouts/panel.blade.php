<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

        <link rel='stylesheet' id='apss-font-awesome-css' href='{{ asset('css/font-awesome/font-awesome.min.css?ver=4.3.5') }}' type='text/css' media='all' />
        <link rel='stylesheet' id='apss-font-opensans-css' href='//fonts.googleapis.com/css?family=Open+Sans&#038;ver=4.9.6' type='text/css' media='all' />
        <link rel='stylesheet' id='apss-frontend-css-css' href='{{ asset('css/frontend.css?ver=4.3.5') }}' type='text/css' media='all' />

        <link rel='stylesheet' id='rs-plugin-settings-css' href='{{ asset('css/settings.css?ver=5.4.6.2') }}' type='text/css' media='all' />

        <link rel='stylesheet' id='google-fonts-css' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100i%2C200%2C200i%2C300%2C300i%2C400%2C400i%2C500%2C500i%2C600%2C600i%2C700%2C700i%2C800%2C800i%2C900%2C900i&#038;ver=4.9.6' type='text/css' media='all' />

        <link rel='stylesheet' id='fontawesome-css' href='{{ asset('css/font-awesome/fontawesome-all.min.css?ver=5.0.6') }}' type='text/css' media='all' />
        <link rel='stylesheet' id='ionicons-css' href='{{ asset('css/ionicons.min.css?ver=4.9.6') }}' type='text/css' media='all' />
        <link rel='stylesheet' id='bootstrap-css' href='{{ asset('css/bootstrap.min.css?ver=4.9.6') }}' type='text/css' media='all' />
        <link rel='stylesheet' id='slick-css' href='{{ asset('css/slick/slick.css?ver=4.9.6') }}' type='text/css' media='all' />
        <link rel='stylesheet' id='slick-theme-css' href='{{ asset('css/slick/slick-theme.css?ver=4.9.6') }}' type='text/css' media='all' />
        <link rel='stylesheet' id='loaders-css' href='{{ asset('css/loaders.min.css?ver=4.9.6') }}' type='text/css' media='all' />

        <link rel='stylesheet' id='madara-css-css' href='{{ asset('css/style.css?ver=4.9.6') }}' type='text/css' media='all' />

        <script type='text/javascript' src='http://demo.mangabooth.com/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
        <script type='text/javascript' src='http://demo.mangabooth.com/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js?ver=5.4.6.2'></script>
        <script type='text/javascript' src='http://demo.mangabooth.com/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js?ver=5.4.6.2'></script>
    </head>
    <body class="page-template page-template-page-templates page vc_responsive panel-open">
    <div class="wrap">
        <div class="body-wrap">
            @include('inc.panel-header')
            <div class="c-sidebar c-top-second-sidebar">
                <div class="container c-container">
                    @yield("container")
                </div>
            </div>
        </div>
    </div>
</html>