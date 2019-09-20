<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    /**
     * Handle the User "deleting" event.
     *
     * @param  \App\Models\Post $post
     * @return void
     */
    public function deleting(Post $post)
    {
        foreach ($post->photos as $photo) {
            $photo->delete();
        }
    }
}
