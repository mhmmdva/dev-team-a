<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Category;
use App\Models\User;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        // about user
        return view('users.index', [
            'title' => 'About',
            'active' => 'About',
            'user' => User::get(),

        ]);
    }

    public function create()
    {
        // category user
        return view('users.list', [
            'title' => 'List',
            'active' => 'List',
            'category' => Category::get(),
        ]);
    }

    public function showList()
    {
        // ...
        return view('users.show', [
            'title' => 'User',
            'active' => 'User',
            'user' => User::get(),
        ]);
    }

    // show profile
    public function showProfile(User $user)
    {
        return view('profile.show', compact('user'));
    }

    // edit user profile form
    public function editProfile(User $user)
    {
        return view('profile.edit-profile', compact('user'));
    }

    // update user profile
    public function updateProfile(UpdateUserRequest $request, User $user, UserServices $userServices)
    {
        $userServices->handleUpdateProfile($request, $user);
        return redirect()->route('profile.edit-profile', compact('user'));
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
        return redirect()->route('profile.edit-password', compact('user'));
    }
}
