<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserServices
{
    public function handleUpdateProfile($request, $user)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        $user->update($data);
    }

    public function handleUpdatePassword($request, $user)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($request->get('password'));

        $user->update($data);
    }
}
