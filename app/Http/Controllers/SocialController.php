<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        // $socialUser = Socialite::driver($provider)->user();
        $socialUser = Socialite::driver($provider)->stateless()->user();
        $user = User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName(),
                'username' => Str::slug($socialUser->getName()) . rand(1000, 9999),
                'password' => bcrypt(Str::random(16))
            ]
        );


        Auth::login($user);
        return redirect()->intended('/');
    }
}
