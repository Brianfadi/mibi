<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Services\BlogService;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{
    public function __construct(
        private BlogService $blogService
    ) {}

    public function index(): JsonResponse
    {
        $posts = BlogPost::with(['author:id,name', 'categories:id,name'])
            ->published()
            ->recent()
            ->paginate(10);

        return response()->json($posts);
    }

    public function show(string $slug): JsonResponse
    {
        $post = BlogPost::with(['author:id,name', 'categories'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        return response()->json($post);
    }

    public function featured(): JsonResponse
    {
        $posts = $this->blogService->getPopularPosts(5);

        return response()->json($posts);
    }
}
