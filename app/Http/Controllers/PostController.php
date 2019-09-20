<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Resources\PostResource;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\Post\PostIndexRequest;
use App\Http\Requests\Post\PostCreateRequest;
use App\Http\Requests\Post\PostUpdateRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('verified')->only(['store']);
    }

    public function index(PostIndexRequest $request)
    {
        $posts = QueryBuilder::for(Post::class)
            ->allowedFilters([
                'title',
                'annotation',
                'content',
                AllowedFilter::exact('author', 'user_id'),
            ])
            ->defaultSort('-created_at')
            ->allowedSorts('created_at')
            ->allowedIncludes(['author'])
            ->paginate($request->input('per_page', 10));
        $posts->appends($request->validated())->links();

        return PostResource::collection($posts);
    }

    public function store(PostCreateRequest $request)
    {
        return new PostResource(
            Post::create(
                array_merge(
                    $request->validated(),
                    [
                        'user_id' => auth()->id(),
                    ]
                )
            )
        );
    }

    public function show(Post $post)
    {
        return new PostResource($post->load('author'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->update($request->validated());

        return new PostResource($post);
    }
}
