<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;

class UserController extends Controller
{
    public function index(User $user)
    {
        // about user
        return view('users.about', [
            'title' => 'About',
            'active' => 'About',
            'user' => User::get(),

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
            'title' => 'User',
            'active' => 'User',
            'user' => User::get(),
        ]);
    }

    // // show profile
    public function showProfile(User $user)
    {
        $posts = Post::get()->where('user_id', $user->id);

        return view('profile.show',  [
            'title' => 'User',
            'active' => 'User',
            'user' => $user,
            'posts' => $posts
        ]);
    }

    // edit user profile form
    public function editProfile(User $user)
    {
        return view('profile.edit-profile', [
            'title' => 'User',
            'active' => 'User',
            'user' => $user,
        ]);
    }

    // update user profile
    public function updateProfile(UpdateUserRequest $request, User $user, UserServices $userServices)
    {
        $userServices->handleUpdateProfile($request, $user);
        return redirect()->route('profile.edit-profile', [
            'title' => 'UpdatePro',
            'active' => 'UpdatePro',
            'user' => $user,
        ])->with('success-update-profile', 'Your profile successfully updated!');;
    }

    //edit user passsword form
    public function editPassword(User $user)
    {
        return view('profile.edit-password', [
            'title' => 'Edit',
            'active' => 'Edit',
            'user' => $user,
        ]);
    }

    public function updatePassword(UpdatePasswordRequest $request, User $user, UserServices $userServices)
    {
        $userServices->handleUpdatePassword($request, $user);
        return redirect()->route('profile.edit-password', [
            'title' => 'Update',
            'active' => 'Update',
            'user' => $user
        ])->with('success-update-password', 'Your password successfully updated!');
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
}
