<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
            $finduser = User::where('email', $user->email)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('home.index');
            } else {
                $newUser = User::create([
                    'name' => ucwords($user->name),
                    'username' => str()->lower(str_replace(' ', '.', $user->name) . $user->id),
                    'email' => $user->email,
                    'provider_id' => $user->id,
                ]);

                Auth::login($newUser);
                return redirect()->route('home.index');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
