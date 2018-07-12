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
        <link rel='stylesheet' id='bootstrap-css' href='{{ asset('css/morris.css?ver=4.9.6') }}' type='text/css' media='all' />
        <link rel='stylesheet' id='slick-css' href='{{ asset('css/slick/slick.css?ver=4.9.6') }}' type='text/css' media='all' />
        <link rel='stylesheet' id='slick-theme-css' href='{{ asset('css/slick/slick-theme.css?ver=4.9.6') }}' type='text/css' media='all' />
        <link rel='stylesheet' id='loaders-css' href='{{ asset('css/loaders.min.css?ver=4.9.6') }}' type='text/css' media='all' />

        <link rel='stylesheet' id='madara-css-css' href='{{ asset('css/style.css?ver=4.9.6') }}' type='text/css' media='all' />

        <script type='text/javascript' src='{{ asset('js/jquery.js?ver=1.12.4') }}'></script>
        <script type='text/javascript' src='{{ asset('js/jquery.themepunch.tools.min.js?ver=5.4.6.2') }}'></script>
        <script type='text/javascript' src='{{ asset('js/jquery.themepunch.revolution.min.js?ver=5.4.6.2') }}'></script>
    </head>
    <body class="@yield('body') page-template page-template-page-templates page vc_responsive">
        <div class="wrap">
            <div class="body-wrap">
                @include('inc.header')
                <div class="site-content">
                    <div class="c-page-content style-1">
                        @yield("header")
                        <div class="content-area">
                            <div class="container">
                                <div class="row">
                                    @if (session('info'))
                                        <div class="alert alert-info" role="info">
                                            <h4 class="alert-heading">@lang('pages.info')</h4>
                                            <p>{{ session('info') }}</p>
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <div class="row">
                                                @yield("container")
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            @yield("sidebar")
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('footer')
        <div class="clear"></div>
        <footer id="main-footer">

            <div id="info">
                <div class="container wrap">

                    <div class="row">
                        <div class="col-md-12">
                            <div id="logo">
                                <p>Copyright <i class="fa fa-copyright"></i> <strong>{{ config('app.name', 'Laravel') }}</strong> - 2018</p>
                            </div>
                            <div id="contact">
                                <ul class="inline-list">
                                    <li><a dhref="">Termos de Uso</a></li>
                                    <li><a href="{{ route('dmca') }}">DMCA</a></li>
                                    <li><a dhref="">Facebook</a></li>
                                    <li><a dhref="">Contato</a></li>
                                </ul>
                                <p>
                                    Desenvolvido por Thalys Márcio
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

        <div class="go-to-top active">
            <i class="ion-android-arrow-up"></i>
        </div>
        <script type='text/javascript' src='{{ asset('js/lazysizes.min.js?ver=2.0.7') }}'></script>
        <script type='text/javascript' src='{{ asset('js/bootstrap.min.js?ver=3.3.7') }}'></script>
        <script type='text/javascript' src='{{ asset('js/imagesloaded.min.js?ver=3.2.0') }}'></script>

        <script type='text/javascript' src='{{ asset('js/template.js?ver=4.9.6') }}'></script>
        <script type='text/javascript' src='{{ asset('js/script.js?ver=4.9.6') }}'></script>

        <script type='text/javascript' src='{{ asset('js/slick.min.js?ver=1.7.1') }}'></script>

    </body>

</html>