<?php

namespace App\Models;

use App\Observers\PostObserver;
use App\Models\Post\PostRelations;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use PostRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'annotation',
        'content',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        self::observe(PostObserver::class);
    }

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['photos'];
}
