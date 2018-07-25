@extends('layouts.panel')

@section('title', "Edit Anime")

@section('container')
    @if (session('success'))
        <div class="col-md-12">
            <div class="alert alert-success" role="success">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <form role="form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-header">
                    Edit Anime
                </div>
                <div class="card-body">
                    <div class=col-md-12">
                        <div class="row">
                            <div class="col-md-8">
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
                                    <label>Studio</label>
                                    <input name="studio" class="form-control" value="{{ $anime->studio }}">
                                </div>
                                <div class="form-group">
                                    <label>Age Group</label>
                                    <select name="age_group" class="form-control-lg">
                                        <option value="0" @if($anime->age_group == 0) selected @endif>L</option>
                                        <option value="10" @if($anime->age_group == 10) selected @endif>10</option>
                                        <option value="12" @if($anime->age_group == 12) selected @endif>12</option>
                                        <option value="14" @if($anime->age_group == 14) selected @endif>14</option>
                                        <option value="16" @if($anime->age_group == 16) selected @endif>16</option>
                                        <option value="18" @if($anime->age_group == 18) selected @endif>18</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control-lg">
                                        <option value="0" @if($anime->status == 0) selected @endif>Ongoing</option>
                                        <option value="1" @if($anime->status == 1) selected @endif>Completed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sinopse">Sinopse</label>
                                    <textarea name="sinopse" rows="7" class="form-control">{{ $anime->sinopse }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        <div class="anime">
                                            <div class="poster">
                                                <img data-src="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive effect-fade lazyloaded" src="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}" style="padding-top:180px; " alt="as54sa6 dfg df" sizes="(max-width: 125px) 100vw, 125px" srcset="{{ ZAnimesControl::url('animes/' . $anime->slug_name . '/' . $anime->image) }}">
                                            </div>
                                        </div>
                                    </label>
                                    <input name="image" type="file" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="form-group">
                                <div class="form-group checkbox-group row">
                                    @foreach ($genres as $genre)
                                        <div class="checkbox col-md-3 ">
                                            <input id="{{ $genre->id }}" name="genre[{{ $genre->id }}]" value="{{ $genre->id }}" type="checkbox" @if( $anime->genres()->get()->contains($genre->id) ) checked @endif>
                                            <label for="{{ $genre->id }}"> {{ $genre->name }} </label>
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
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <form method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-header">
                    Add Season
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="1º Season">
                    </div>
                    <div class="form-group">
                        <label for="season">Season nº</label>
                        <input type="text" class="form-control" name="season" placeholder="1">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Seasons
            </div>
            <div class="card-body">
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
                                <td style="width: 105px;text-align: center;"><a href="{{ route('panel.animes.edit.season', array('slug' => $anime->slug_name, 'season' => $season->season)) }}"><button type="button" class="btn btn-default">Editar</button></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
