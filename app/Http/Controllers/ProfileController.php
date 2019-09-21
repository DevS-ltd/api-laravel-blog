<?php

namespace App\Http\Controllers;

use App\Traits\FileUpload;
use App\Http\Resources\UserResource;
use App\Http\Requests\Profile\UploadAvatarRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Http\Requests\Profile\UpdatePasswordRequest;

class ProfileController extends Controller
{
    use FileUpload;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProfile()
    {
        return new UserResource(auth()->user());
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update($request->validated());

        return new UserResource($user);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        auth()->user()->update([
            'password' => $request->get('password'),
        ]);

        return response([
            'message' => trans('passwords.updated'),
        ]);
    }

    public function uploadAvatar(UploadAvatarRequest $request)
    {
        $this->directory = 'avatars';

        $user = auth()->user();

        if ($user->avatar) {
            $this->handleDeletedImage($user->avatar);
        }

        $user->update([
            'avatar' => $this->handleUploadedImage($request->file('avatar')),
        ]);

        return new UserResource($user);
    }
}
