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

    @foreach ($avatars as $avatar)
    <div class="modal fade" id="modal-{{ $avatar->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $avatar->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input name="user_id" value="{{ $avatar->id }}" type="hidden">
                        <div class="form-group">
                            <div id="image-container">
                                <img src="{{ $avatar->avatar_pending }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <input id="approve" name="approve" value="ok" type="checkbox">
                                <label for="approve"> Approve </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button href="#" type="submit" class="btn btn-primary">Check</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">Animes</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Update</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($avatars as $avatar)
                                <tr>
                                    <td>{{ $avatar->id }}</td>
                                    <td>{{ $avatar->name }}</td>
                                    <td>{{ $avatar->avatar_update }}</td>

                                    <td style="width: 105px;text-align: center;">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{ $avatar->id }}">
                                            MODERATE
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$avatars->links()}}
                </div>
            </div>
        </div>
    </div>
@stop
