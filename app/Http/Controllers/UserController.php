<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // show profile
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    // edit user profile form
    public function editProfile(User $user)
    {
        return view('profile.edit-profile', compact('user'));
    }

    public function changeProfilePhoto(Request $request, User $user)
    {
        if ($request->hasFile('photo')) {
            if (!is_null($user->photo)) {
                Storage::delete($user->photo);
            }
            $photo = $request->file('photo')->store('public/images/profile');
            $data['photo'] = $photo;
        }

        $upload = $user->update($data);

        if ($upload) {
            return response()->json(['status' => 1, 'msg' => "Your profile picture has been successfully updated."]);
        } else {
            return response()->json(['status' => 0, 'msg' => "Something went wrong."]);
        }
    }

    // update user profile
    public function updateProfile(UpdateUserRequest $request, User $user, UserServices $userServices)
    {
        $userServices->handleUpdateProfile($request, $user);
        return redirect()->route('profile.edit-profile', compact('user'))
            ->with('success-update-profile', 'Your profile successfully updated!');
    }

    // edit user passsword form
    public function editPassword(User $user)
    {
        return view('profile.edit-password', compact('user'));
    }

    // update user password
    public function updatePassword(UpdatePasswordRequest $request, User $user, UserServices $userServices)
    {
        $userServices->handleUpdatePassword($request, $user);
        return redirect()->route('profile.edit-password', compact('user'))
            ->with('success-update-password', 'Your password successfully updated!');
    }
}
