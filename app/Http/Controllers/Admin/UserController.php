<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user,)
    {
        // about user
        $post = Post::get();

        return view('users.about', [
            'active' => 'About',
            'post' => $post,
            'title' => 'About',
            'user' => $user,
        ]);
    }

    public function create()
    {
        // category user
        return view('users.category-user', [
            'title' => 'List',
            'active' => 'List',
            'category' => Category::get(),
        ]);
    }

    public function showList()
    {
        // list user crud
        return view('users.list-user', [
            'active' => 'User',
            'title' => 'User',
            'user' => User::get(),
        ]);
    }

    // // show profile
    public function showProfile(User $user)
    {
        return view('profile.show', [
            'active' => 'User',
            'title' => 'User',
            'user' => $user,
        ]);
    }

    // edit user profile form
    public function editProfile(User $user)
    {
        return view('profile.edit-profile', [
            'active' => 'User',
            'title' => 'User',
            'user' => $user,
        ]);
    }

    // update user profile
    public function updateProfile(UpdateUserRequest $request, User $user, UserServices $userServices)
    {
        $userServices->handleUpdateProfile($request, $user);
        return redirect()->route('profile.edit-profile', [
            'active' => 'UpdatePro',
            'title' => 'UpdatePro',
            'user' => $user,
        ]);
    }

    //edit user passsword form
    public function editPassword(User $user)
    {
        return view('profile.edit-password', [
            'active' => 'Edit',
            'title' => 'Edit',
            'user' => $user,
        ]);
    }

    public function updatePassword(UpdatePasswordRequest $request, User $user, UserServices $userServices)
    {
        $userServices->handleUpdatePassword($request, $user);
        return redirect()->route('profile.edit-password', [
            'active' => 'Update',
            'title' => 'Update',
            'user' => $user
        ]);
    }
}
