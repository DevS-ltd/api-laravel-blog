<?php

namespace App\Models\User;

use App\Models\Post;

trait UserRelations
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
