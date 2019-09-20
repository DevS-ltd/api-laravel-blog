<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Photo;
use App\Traits\FileUpload;
use App\Http\Resources\PhotoResource;
use App\Http\Requests\Photo\PhotoStoreRequest;
use App\Http\Requests\Photo\PhotoDestroyRequest;

class PhotoController extends Controller
{
    use FileUpload;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(PhotoStoreRequest $request, Post $post)
    {
        $this->directory = 'photos';

        return new PhotoResource(
            $post->photos()->create([
                'url' => $this->handleUploadedImage($request->file('photo')),
            ])
        );
    }

    public function destroy(PhotoDestroyRequest $request, Post $post, Photo $photo)
    {
        $photo->delete();

        return response([
            'message' => trans('messages.delete.success'),
        ]);
    }
}
