<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)
            ->create()
            ->each(function ($user) {
                $user
                    ->posts()
                    ->saveMany(factory(Post::class, 5)->make())
                    ->each(function ($post) {
                        $post
                            ->photos()
                            ->saveMany(factory(Photo::class, 5)->make());
                    });
            });
    }
}
