<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback()
    {
    try {
        Auth::logout();
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user =
                User::create([
                    'name' => $googleUser->name, 'email' => $googleUser->email,
                    'password' => \Hash::make(rand(100000, 999999)),
                    'picture' => $googleUser->avatar,
                     'role' => 'author',
                    'token' => $googleUser->token,
                    'social_login' => 'google'
                ]);
        }

        Auth::login($user);

        return redirect()->route('admin.dashboard');
    } catch (\Exception $e) {
       dd($e);
    }
    }

    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }
    public function githubCallback()
    {
        $github_user = Socialite::driver('github')->stateless()->user();
        $user = User::where('email', $github_user->email)->first();
        if (!$user) {
            $user =
                User::create([
                    'name' => $github_user->name,
                    'email' => $github_user->email,
                    'password' => \Hash::make(rand(100000, 999999)),
                    'picture' => $github_user->avatar,
                    'token' => $github_user->token,
                    'role' => 'author',
                    'social_login' => 'github'
                ]);
        }

        Auth::login($user);

        return redirect()->route('admin.dashboard');
    }
}
