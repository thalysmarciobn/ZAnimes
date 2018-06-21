@extends('layouts.auth')

@section('title', __('pages.register-title'))

@section('container')
    <div class="panel-form" id="form-login">
        <div class="modal-dialog" role="document">
            <div class="panel-content">
                <div class="modal-body">
                    <div id="login" class="login">
                        <h1>
                            @lang('pages.login-title')
                        </h1>
                        @if (session('danger'))
                            <div class="alert alert-danger" role="danger">
                                {{ session('danger') }}
                            </div>
                        @endif
                        <form name="login" method="post">
                            @csrf
                            <p>
                                <label>@lang('pages.login-email')<br>
                                    <input type="email" name="email" class="input user_login" value="" size="20">
                                </label>
                            </p>
                            <p>
                                <label>@lang('pages.login-password')<br>
                                    <input type="password" name="password" class="input user_login" value="" size="20">
                                </label>
                            </p>
                            <p class="forgetmenot">
                                <label>
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever">Remember Me
                                </label>
                            </p>
                            <p class="submit">
                                <input type="submit" name="wp-submit" class="button button-primary button-large wp-submit" value="@lang('pages.login-submit')">
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop