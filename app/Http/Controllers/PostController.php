<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Resources\PostResource;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\Post\PostIndexRequest;
use App\Http\Requests\Post\PostCreateRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
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
}
