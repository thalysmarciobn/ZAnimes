@extends('layouts.panel')

@section('title', "Edit Season")

@section('container')
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success" role="success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning" role="warning">
                {{ session('warning') }}
            </div>
        @endif
    </div>
    <div class="col-md-12">
        <div class="card">
            <form method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-header">
                    Anime: '{{ $anime->name }}', Season: '{{ $season->title }}'
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="name" value="{{ $season->title  }}">
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <input id="delete" name="delete" value="delete" type="checkbox">
                            <label for="delete"> Delete </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-default">Edit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <form name="edit" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-header">Add Episode</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="episode">Sinopse</label>
                        <input type="text" class="form-control" name="prev">
                    </div>
                    <div class="form-group">
                        <label for="episode">Episode</label>
                        <input type="text" class="form-control" name="episode">
                    </div>
                    <div class="form-group">
                        <label for="video">Video</label>
                        <input type="text" class="form-control" name="video">
                    </div>
                    <div class="form-group">
                        <label for="poster">Poster ( 640x360 )</label>
                        <input type="text" class="form-control" name="poster" value="">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-default">Add</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Episodes</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Episode</th>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($episodes as $episode)
                            <tr>
                                <td>{{ $episode->id }}</td>
                                <td>{{ $episode->episode }}</td>
                                <td>{{ $episode->title }}</td>
                                <td>{{ $episode->created_at }}</td>
                                <td>{{ $episode->updated_at }}</td>
                                <td style="width: 105px;text-align: center;"><a href="{{ route('panel.animes.edit.episode', array('slug' => $anime->slug_name, 'season' => $season->season, 'episode' => $episode->episode)) }}"><button type="button" class="btn btn-default">Edit</button></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
