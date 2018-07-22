<?php
namespace App\Http\Controllers;

use App\ZAnimesControl;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required|max:255'
        ], [
            'email.required' => __('login.email-required'),
            'password.required' => __('login.password-required')
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if (Auth::attempt($request->only('email', 'password'), $request->filled('rememberme'))) {
            return redirect()->route('home')->with('info', __('pages.info-logged', ['name' => Auth::user()->name]));
        }
        return back()->withErrors([__('login.failed')]);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'r_password' => 'required|max:255'
        ], [
            'username.required' => __('login.username-required'),
            'email.required' => __('login.email-required'),
            'password.required' => __('login.password-required'),
            'r_password.required' => __('login.r-password-required')
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if ($request->password != $request->r_password) {
            return back()->withErrors([__('pages.register-password-not-match')]);
        } else if (User::where('name', '=', $request->username)->exists()) {
            return back()->withErrors([__('pages.register-name-exist', ['name' => $request->username])]);
        } else if (User::where('email', '=', $request->email)->exists()) {
            return back()->withErrors([__('pages.register-email-exist', ['email' => $request->email])]);
        }
        $user = new User([
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'remember_token' => "",
            'editor' => 0,
            'avatar' => ZAnimesControl::url('avatars/default.jpg')
        ]);
        if ($user->save()) {
            Auth::login($user);
            return redirect()->route('home')->with('info', __('pages.info-logged', ['name' => $user->name]));
        }
    }
}
