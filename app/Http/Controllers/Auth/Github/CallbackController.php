<?php

namespace App\Http\Controllers\Auth\Github;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class CallbackController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::query()->updateOrCreate([
            'nickname'          => $githubUser->getNickname(),
            'email'             => $githubUser->getEmail(),
            'email_verified_at' => now(),
            'avatar'            => $githubUser->getAvatar(),
            'name'              => $githubUser->getName(),
            'password'          => Str::random(30),

        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
