@extends('layouts.panel')

@section('title', "Edit Episode")

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
            <form name="edit" method="POST" enctype="multipart/form-data">
                <div class="card-header">Edit Episode: '{{ $episode->title  }}'</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="episode">Episode</label>
                                <input type="text" class="form-control" name="episode" value="{{ $episode->episode  }}">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $episode->title  }}">
                            </div>
                            <div class="form-group">
                                <label for="episode">Preview</label>
                                <textarea type="text" class="form-control" name="prev">{{ $episode->prev  }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="video">Video</label>
                                <input type="text" class="form-control" name="video" value="{{ $episode->video }}">
                            </div>
                            <div class="form-group">
                                <label for="poster">Poster ( 640x360 )</label>
                                <input type="text" class="form-control" name="poster" value="">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="delete" name="delete" value="delete" type="checkbox">
                                    <label for="delete"> Delete </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="image">Thumbnail</label>
                                <div class="anime">
                                    <div class="poster">
                                        <img data-src="{{ ZAnimesControl::url('animes/' . $episode->image) }}" data-srcset="{{ ZAnimesControl::url('animes/' . $episode->imagee) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive effect-fade lazyloaded" src="{{ ZAnimesControl::url('animes/' . $episode->image) }}" style="padding-top:180px; " sizes="(max-width: 125px) 100vw, 125px" srcset="{{ ZAnimesControl::url('animes/' . $episode->image) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-default">Edit</button>
                </div>
            </form>
        </div>
    </div>
@stop
