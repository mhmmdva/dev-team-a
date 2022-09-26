<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;

use App\Services\UserServices;

use App\Models\Tag;


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
        ])->with('success-update-profile', 'Your profile successfully updated!');;
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
        ])->with('success-update-password', 'Your password successfully updated!');
    }

    public function changeProfilePhoto(Request $request, User $user)
    {
        if ($request->hasFile('photo')) {
            if (!is_null($user->photo)) {
                Storage::delete($user->photo);
            }
            $photo = $request->file('photo')->store('images/profile');
            $data['photo'] = $photo;
        }

        $upload = $user->update($data);

        if ($upload) {
            return response()->json(['status' => 1, 'msg' => "Your profile picture has been successfully updated."]);
        } else {
            return response()->json(['status' => 0, 'msg' => "Something went wrong."]);
        }
    }

    public function showLikedPosts(User $user)
    {
        return view('profile.show-liked-posts', [
            'user' => $user,
            'title' => 'Liked Posts',
            'active' => 'User',
        ]);
    }
}
