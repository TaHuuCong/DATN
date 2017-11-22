<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialController extends Controller
{
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->user();
        dd($user);
    }
}
