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
                    Edit Anime
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="col-lg-8">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" class="form-control" value="{{ $anime->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Author</label>
                                    <input name="author" class="form-control" value="{{ $anime->author }}">
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <input name="year" class="form-control" value="{{ $anime->year }}">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="0" @if($anime->status == 0) selected @endif>Ongoing</option>
                                        <option value="1" @if($anime->status == 1) selected @endif>Completed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sinopse">Sinopse</label>
                                    <textarea name="sinopse" rows="3" class="form-control">{{ $anime->sinopse }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>
                                        <div class="anime">
                                            <div class="poster">
                                                <img data-src="{{ asset('uploads/animes/' . $anime->slug_name . '/' . $anime->image) }}" data-srcset="{{ asset('uploads/animes/' . $anime->slug_name . '/' . $anime->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive effect-fade lazyloaded" src="{{ asset('uploads/animes/' . $anime->slug_name . '/' . $anime->image) }}" style="padding-top:180px; " alt="as54sa6 dfg df" sizes="(max-width: 125px) 100vw, 125px" srcset="{{ asset('uploads/animes/' . $anime->slug_name . '/' . $anime->image) }}">
                                            </div>
                                        </div>


                                    </label>
                                    <input name="image" type="file" >
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="form-group checkbox-group row">
                                        @foreach ($genres as $genre)
                                            <div class="checkbox col-xs-3 ">
                                                <input id="{{ $genre->slug }}" name="genre[{{ $genre->slug }}]" value="{{ $genre->slug }}" type="checkbox" @if( in_array($genre->slug, $anime_genres) ) checked @endif>
                                                <label for="{{ $genre->slug }}"> {{ $genre->name }} </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <input id="delete" name="delete" value="delete" type="checkbox">
                                        <label for="delete"> Delete </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Season
                </div>
                <form method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="1º Season">
                        </div>
                        <div class="form-group">
                            <label for="season">Season nº</label>
                            <input type="text" class="form-control" name="season" placeholder="1">
                        </div>
                        <button type="submit" class="btn btn-default">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Seasons
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Temporada</th>
                                <th>Nome</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($anime->seasons as $season)
                                <tr>
                                    <td>{{ $season->season }}</td>
                                    <td>{{ $season->title }}</td>
                                    <td style="width: 105px;text-align: center;"><a href="{{ route('panel-anime-edit-season', array('slug' => $anime->slug_name, 'season' => $season->season)) }}"><button type="button" class="btn btn-default">Editar</button></a></td>
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