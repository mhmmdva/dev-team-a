<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
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

    public function show()
    {
        // ...
        return view('users.show', [
            'title' => 'User',
            'active' => 'User',
            'user' => User::get(),
        ]);
    }
}
