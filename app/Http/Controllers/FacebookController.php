<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('email', $user->email)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->route('home.index');
            } else {
                $newUser = User::create([
                    'name' => ucwords($user->name),
                    'username' => str()->lower(str_replace(' ', '_', $user->name)),
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
