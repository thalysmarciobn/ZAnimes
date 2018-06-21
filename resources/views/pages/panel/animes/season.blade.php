@extends('layouts.panel')

@section('title', "Edit Anime")

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
                <div class="panel-heading">
                    Anime: '{{ $anime->name }}', Season: '{{ $season->title }}'
                </div>
                <form method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel-body">
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
                        <button type="submit" class="btn btn-default">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop