<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Services\BlogService;

class BlogController extends Controller
{
    public function __construct(
        private BlogService $blogService
    ) {}

    public function index()
    {
        $posts = $this->blogService->getPublishedPosts();
        $categories = BlogCategory::whereHas('posts', fn ($q) => $q->published())->get();
        $popularPosts = $this->blogService->getPopularPosts();
        $featuredPost = BlogPost::published()->featured()->recent()->first();

        $totalPosts = BlogPost::published()->count();
        $totalCategories = $categories->count();
        $totalReadingTime = BlogPost::published()->get()->sum(fn ($p) => $p->reading_time);

        return view('blog.index', compact(
            'posts', 'categories', 'popularPosts', 'featuredPost',
            'totalPosts', 'totalCategories', 'totalReadingTime'
        ));
    }

    public function show(string $slug)
    {
        $post = BlogPost::with(['author', 'categories'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        $relatedPosts = $this->blogService->getRelatedPosts($post);
        $popularPosts = $this->blogService->getPopularPosts(5);

        return view('blog.show', compact('post', 'relatedPosts', 'popularPosts'));
    }

    public function category(string $slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        $posts = $category->publishedPosts()->with(['author', 'categories'])
            ->recent()
            ->paginate(10);

        $categories = BlogCategory::whereHas('posts', fn ($q) => $q->published())->get();

        return view('blog.category', compact('category', 'posts', 'categories'));
    }

    public function search()
    {
        $query = request('q');
        $posts = $this->blogService->searchPosts($query);

        return view('blog.search', compact('posts', 'query'));
    }
}
