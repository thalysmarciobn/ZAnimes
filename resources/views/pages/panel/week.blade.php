@extends('layouts.panel')

@section('title', "Week")

@section('container')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            @if (session('success'))
                <div class="alert alert-success" role="success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">Week</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($weeks as $week)
                                <tr>
                                    <td>{{ $week->id }}</td>
                                    <td>{{ $week->title }}</td>
                                    <td style="width: 105px;text-align: center;"><a href="{{ route('panel.week.edit', ['week' => $week->id]) }}"><button type="button" class="btn btn-default">Edit</button></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
