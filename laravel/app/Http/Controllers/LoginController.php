<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Adaptors\Adaptor;

class LoginController extends Controller
{
    public function loginVK()
    {
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(Adaptor $userAdaptor)
    {
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        $user = Socialite::driver('vkontakte')->user();
        $userInSystem = $userAdaptor->getUserBySocId($user, 'vk');
        Auth::login($userInSystem);
        return redirect()->route('Home');

    }

    public function loginGH()
    {
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        return Socialite::with('github')->redirect();
    }

    public function responseGH(Adaptor $userAdaptor)
    {
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        $user = Socialite::driver('github')->user();
        $userInSystem = $userAdaptor->getUserBySocId($user, 'gh');
        Auth::login($userInSystem);
        return redirect()->route('Home');

    }
}
