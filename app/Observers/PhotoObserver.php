<?php

namespace App\Observers;

use App\Models\Photo;
use App\Traits\FileUpload;

class PhotoObserver
{
    use FileUpload;

    /**
     * Handle the User "deleting" event.
     *
     * @param  \App\Models\Photo $photo
     * @return void
     */
    public function deleting(Photo $photo)
    {
        $this->handleDeletedImage($photo->url);
    }
}
