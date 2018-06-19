<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Models\Animes;
use App\Models\AnimesSeasonsEpisodes;

class PagesController extends Controller
{
    public function home() {
        return view('pages.home', [
            'releases' => Animes::animesInRelease()->orderBy("name", "asc")->get(),
            'episodes' => AnimesSeasonsEpisodes::latestEpisodes()->take(12)->get(),
            'latests' => Animes::latestCreated()->take(12)->get()
        ]);
    }

    public function login(Request $request) {
        if ($request->has('email') && $request->has('password')) {
            if (Auth::attempt($request->only('email', 'password'), $request->has('rememberme'))) {
                return redirect('')->with('info', __('pages.info-logged', ['name' => Auth::user()->name]));
            }
            return redirect('logar')->with('danger', __('pages.login-failed'));
        }
        return view('pages.login');
    }

    public function register(Request $request) {
        if ($request->has('username') && $request->has('email') && $request->has('password') && $request->has('r-password')) {
            if (User::where('name', '=', $request->input('username'))->exists()) {
                return redirect('cadastro')->with('alert', __('pages.register-name-exist', ['name' => $request->input('username')]));
            } else if (User::where('email', '=', $request->input('email'))->exists()) {
                return redirect('cadastro')->with('alert', __('pages.register-email-exist', ['email' => $request->input('email')]));
            } else if ($request->input('password') != $request->input('r-password')) {
                return redirect('cadastro')->with('danger', __('pages.register-password-not-match'));
            }
            $user = new User([
                'name' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'remember_token' => "",
                'editor' => 0
            ]);
            if ($user->save()) {
                Auth::login($user);
                return redirect('')->with('info', __('pages.info-logged', ['name' => $user->name]));
            }
        }
        return view('pages.register');
    }

    public function logout() {
        if (!Auth::guest()) {
            Auth::logout();
        }
        return redirect('');
    }
}