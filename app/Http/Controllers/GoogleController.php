<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('email', $user->email)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->route('home.index');
            } else {
                $newUser = User::create([
                    'name' => ucwords($user->name),
                    'username' => str_replace(' ', '_', $user->name),
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
