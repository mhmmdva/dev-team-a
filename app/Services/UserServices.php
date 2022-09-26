<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

        $file = $request->file('photo');

        $fileName = Str::of($file->getClientOriginalName())->replace(' ', '-');
        $fileExtension = $file->getClientOriginalExtension();
        $name = $fileName . '-' . now()->format('dmyhis') . '.' . $fileExtension;

        $fileUrl = $file->storeAs('images/profile', $name);
        $data['photo'] = $fileUrl;


        $user->update($data);
    }
}
