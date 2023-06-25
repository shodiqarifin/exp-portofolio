<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/auth');
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->user();

        // validation
        if (User::where('google_id', $user->id)->count() === 0) {
            return redirect('/auth')->with('error', 'Akun tidak diizinkan.');
        }

        $user = User::updateOrCreate([
            'google_id' => $user->id
        ], [
            'name' => $user->name,
            'email' => $user->email,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
