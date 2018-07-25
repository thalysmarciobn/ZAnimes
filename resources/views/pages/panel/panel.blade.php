@extends('layouts.panel')

@section('title', "Panel")

@section('container')

    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-header">
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
                <div class="card">
                    <div class="card-header">
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
                <div class="card">
                    <div class="card-header">
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
                <div class="card">
                    <div class="card-header">
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
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Episodes
                </div>
                <div class="card-body">
                    <div id="episodes" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Views
                </div>
                <div class="card-body">
                    <div id="views" style="width: 100%; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>

        <script>
            Highcharts.chart('episodes', {
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
                    categories: [@foreach ( $analystic_users as $date => $count )'{{ date('d M', strtotime($date)) }}',@endforeach]
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
                    name: 'Episodes',
                    data: [@foreach ( $analystic_users as $date => $count ){{ $count }},@endforeach]
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
                    categories: [@foreach ( $analystic_views as $date => $count )'{{ date('d M', strtotime($date)) }}',@endforeach]
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
