@extends('layouts.panel')

@section('title', "Panel")

@section('container')

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-book fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $animes->count() }}</div>
                            <div>Animes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-file-video-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $seasons->count() }}</div>
                            <div>Seasons</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-file-video-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $episodes->count() }}</div>
                            <div>Episodes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $users->count() }}</div>
                            <div>Users</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Animes
                </div>
                <div class="panel-body">
                    <div id="animes" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Views
                </div>
                <div class="panel-body">
                    <div id="views" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>

        <script>
            Highcharts.chart('animes', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: 'Stats'
                },
                xAxis: {
                    categories: [@foreach ( $analystic_animes as $date => $count )'{{ $date }}',@endforeach]
                },
                yAxis: {
                    title: {
                        text: ''
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Animes',
                    data: [@foreach ( $analystic_animes as $date => $count ){{ $count }},@endforeach]
                },
                    {
                        name: 'Seasons',
                        data: [@foreach ( $analystic_seasons as $date => $count ){{ $count }},@endforeach]
                    },
                    {
                        name: 'Episodes',
                        data: [@foreach ( $analystic_episodes as $date => $count ){{ $count }},@endforeach]
                    }
                ]
            });

            Highcharts.chart('views', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: 'Stats'
                },
                xAxis: {
                    categories: [@foreach ( $analystic_views as $date => $count )'{{ $date }}',@endforeach]
                },
                yAxis: {
                    title: {
                        text: ''
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Views',
                    data: [@foreach ( $analystic_views as $date => $count ){{ $count }},@endforeach]
                }
                ]
            });
        </script>
    </div>
@stop