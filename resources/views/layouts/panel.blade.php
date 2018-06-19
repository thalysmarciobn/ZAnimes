<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        @include('inc.head-h')
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