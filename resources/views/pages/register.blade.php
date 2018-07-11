@extends('layouts.auth')

@section('title', __('pages.register-title'))

@section('container')
    <div class="panel-form" id="form-login">
        <div class="modal-dialog" role="document">
            <div class="panel-content">
                <div class="modal-body">
                    <div id="login" class="login">
                        <h1>
                            @lang('pages.register-title')
                        </h1>
                        @if ($errors->any())
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger" role="danger">
                                    {{ $message }}
                                </div>
                            @endforeach
                        @endif
                        <form name="register" method="post">
                            @csrf
                            <p>
                                <label>@lang('pages.register-name')<br>
                                    <input type="text" name="username" class="input user_login" value="" size="20">
                                </label>
                            </p>
                            <p>
                                <label>@lang('pages.register-email')<br>
                                    <input type="email" name="email" class="input user_login" value="" size="20">
                                </label>
                            </p>
                            <p>
                                <label>@lang('pages.register-password')<br>
                                    <input type="password" name="password" class="input user_login" value="" size="20">
                                </label>
                            </p>
                            <p>
                                <label>@lang('pages.register-r-password')<br>
                                    <input type="password" name="r_password" class="input user_login" value="" size="20">
                                </label>
                            </p>
                            <p class="submit">
                                <input type="submit" name="wp-submit" class="button button-primary button-large wp-submit" value="@lang('pages.register-submit')">
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop