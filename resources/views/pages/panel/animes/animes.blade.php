@extends('layouts.panel')

@section('title', "Animes")

@section('container')
    <div class="row">
        <div class="col-lg-12 col-md-12">




            <div class="panel panel-default">
                <div class="panel-heading">Animes</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Creator</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($animes as $anime)
                                <tr>
                                    <td>{{ $anime->id }}</td>
                                    <td><a href="{{ route('panel-anime-edit', array('slug' => $anime->slug_name)) }}">{{ $anime->name }}</a></td>
                                    <td>{{ $anime->created_at }}</td>
                                    <td>{{ $anime->updated_at }}</td>
                                    <td>{{ $anime->creator->name }}</td>
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