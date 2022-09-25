<?php

namespace App\Services;

use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;

class ResetPasswordServices
{
    public function handleResetPassword($request)
    {
        $request->validated();

        $updatePassword = PasswordReset::where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }
        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        PasswordReset::where(['email' => $request->email])->delete();
    }
}
