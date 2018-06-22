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
                <div class="panel-heading">Edit Episode: '{{ $episode->title  }}'</div>
                <div class="panel-body">
                    <form name="edit" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-9">
                                {{ csrf_field() }}
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
                                <button type="submit" class="btn btn-default">Edit</button>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="image">Thumbnail</label>
                                    <div class="anime">
                                        <div class="poster">
                                            <img data-src="{{ asset('uploads/animes/' . $episode->image) }}" data-srcset="{{ asset('uploads/animes/' . $episode->imagee) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive effect-fade lazyloaded" src="{{ asset('uploads/animes/' . $episode->image) }}" style="padding-top:180px; " sizes="(max-width: 125px) 100vw, 125px" srcset="{{ asset('uploads/animes/' . $episode->image) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image">Poster</label>
                                    <div class="anime">
                                        <div class="poster">
                                            <img data-src="{{ asset('uploads/animes/' . $episode->poster) }}" data-srcset="{{ asset('uploads/animes/' . $episode->poster) }}" data-sizes="(max-width: 125px) 100vw, 125px" class="img-responsive effect-fade lazyloaded" src="{{ asset('uploads/animes/' . $episode->poster) }}" style="padding-top:180px; " sizes="(max-width: 125px) 100vw, 125px" srcset="{{ asset('uploads/animes/' . $episode->poster) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop