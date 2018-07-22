@extends('layouts.panel')

@section('title', "Edit Week")

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
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $week->title }}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>ID</label>
                                    <input name="id" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Hour</label>
                                    <input name="hour" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="action">Action</label>
                                    <select name="action" class="form-control" id="action">
                                        <option>Add</option>
                                        <option>Delete</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">List</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Hour</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($week->animes as $animes)
                                <tr>
                                    <td>{{ $animes->anime->id }}</td>
                                    <td>{{ $animes->anime->name }}</td>
                                    <td>{{ $animes->hour }}</td>
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
