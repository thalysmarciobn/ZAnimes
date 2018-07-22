@extends('layouts.panel')

@section('title', "Add Anime")

@section('container')
    <div class="row">
        <div class="col-lg-12 col-md-12">
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
            @if (session('danger'))
                <div class="alert alert-danger" role="danger">
                    {{ session('alert') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Anime
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Author</label>
                                    <input name="author" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <input name="year" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="0">Ongoing</option>
                                        <option value="1">Completed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sinopse">Sinopse</label>
                                    <textarea name="sinopse" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Cover</label>
                                    <input name="image" type="file" >
                                </div>
                                <div class="form-group">
                                    <div class="form-group checkbox-group row">
                                        @foreach ($genres as $genre)
                                            <div class="checkbox col-xs-3 ">
                                                <input id="{{ $genre->id }}" name="genre[{{ $genre->id }}]" value="{{ $genre->id }}" type="checkbox">
                                                <label for="{{ $genre->id }}"> {{ $genre->name }} </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
