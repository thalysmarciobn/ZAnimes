@extends('layouts.panel')

@section('title', "Edit Week")

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
            <form role="form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-header">
                    {{ $week->title }}
                </div>
                <div class="card-body">
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
            <div class="card-header">List</div>
            <div class="card-body">
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
@stop
