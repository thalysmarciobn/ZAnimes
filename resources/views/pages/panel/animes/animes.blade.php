@extends('layouts.panel')

@section('title', "Animes")

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
            <div class="panel panel-default">
                <div class="panel-heading">Animes</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Seasons</th>
                                <th>Episodes</th>
                                <th>Author</th>
                                <th>Created</th>
                                <th>Updated</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($animes as $anime)
                                <tr>
                                    <td>{{ $anime->id }}</td>
                                    <td>{{ $anime->name }}</td>
                                    <td>{{ $anime->seasons()->count() }}</td>
                                    <td>{{ $anime->episodes()->count() }}</td>
                                    <td>{{ $anime->creator->name }}</td>
                                    <td>{{ $anime->created_at }}</td>
                                    <td>{{ $anime->updated_at }}</td>
                                    <td style="width: 105px;text-align: center;"><a href="{{ route('panel.animes.edit.default', array('slug' => $anime->slug_name)) }}"><button type="button" class="btn btn-default">Edit</button></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$animes->links()}}
                </div>
            </div>
        </div>
    </div>
@stop
