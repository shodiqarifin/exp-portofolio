<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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

        $avatar_name = $user->id . '.jpg';
        File::put(public_path("/admin/images/faces/$avatar_name"), file_get_contents($user->avatar));

        $user = User::updateOrCreate([
            'google_id' => $user->id
        ], [
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $avatar_name
        ]);


        Auth::login($user);

        return to_route('dashboard');
    }
}
