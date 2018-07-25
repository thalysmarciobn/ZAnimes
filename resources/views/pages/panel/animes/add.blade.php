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
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        Add Anime
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
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
                                    <label>Studio</label>
                                    <input name="studio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Age Group</label>
                                    <select name="age_group" class="form-control-lg">
                                        <option value="0">L</option>
                                        <option value="10">10</option>
                                        <option value="12">12</option>
                                        <option value="14">14</option>
                                        <option value="16">16</option>
                                        <option value="18">18</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control-lg">
                                        <option value="0">Ongoing</option>
                                        <option value="1">Completed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sinopse">Sinopse</label>
                                    <textarea name="sinopse" rows="7" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Cover</label>
                                    <input name="image" type="file" >
                                </div>
                                <div class="form-group">
                                    <div class="form-group checkbox-group row">
                                        @foreach ($genres as $genre)
                                            <div class="checkbox col-md-3 ">
                                                <input id="{{ $genre->id }}" name="genre[{{ $genre->id }}]" value="{{ $genre->id }}" type="checkbox">
                                                <label for="{{ $genre->id }}"> {{ $genre->name }} </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Add</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
