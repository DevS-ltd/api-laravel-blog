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

    protected $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->directory = 'avatars';
        $this->user = auth()->user();
    }

    public function getProfile()
    {
        return new UserResource($this->user);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $this->user->update($request->validated());

        return new UserResource($this->user);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $this->user->update([
            'password' => $request->get('password'),
        ]);

        return response([
            'message' => trans('passwords.updated'),
        ]);
    }

    public function uploadAvatar(UploadAvatarRequest $request)
    {
        if ($this->user->avatar) {
            $this->handleDeletedImage($this->user->avatar);
        }

        $this->user->update([
            'avatar' => $this->handleUploadedImage($request->file('avatar')),
        ]);

        return new UserResource($this->user);
    }

    public function deleteAvatar()
    {
        $this->handleDeletedImage($this->user->avatar);

        $this->user->update([
            'avatar' => null,
        ]);

        return new UserResource($this->user);
    }
}
