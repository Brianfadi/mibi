<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPostRequest;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Services\BlogService;

class BlogController extends Controller
{
    public function __construct(
        private BlogService $blogService
    ) {}

    public function index()
    {
        $posts = BlogPost::with(['author', 'categories'])
            ->latest()
            ->paginate(20);

        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        $categories = BlogCategory::all();

        return view('admin.blog.create', compact('categories'));
    }

    public function store(StoreBlogPostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')
                ->store('blog', 'public');
        }

        $this->blogService->createPost($data);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Post created successfully.');
    }

    public function edit(BlogPost $post)
    {
        $categories = BlogCategory::all();
        $post->load('categories');

        return view('admin.blog.edit', compact('post', 'categories'));
    }

    public function update(StoreBlogPostRequest $request, BlogPost $post)
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')
                ->store('blog', 'public');
        }

        $this->blogService->updatePost($post, $data);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Post updated successfully.');
    }

    public function publish(BlogPost $post)
    {
        $this->blogService->publishPost($post);

        return back()->with('success', 'Post published.');
    }

    public function unpublish(BlogPost $post)
    {
        $this->blogService->unpublishPost($post);

        return back()->with('success', 'Post unpublished.');
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted.');
    }

    public function categories()
    {
        $categories = BlogCategory::withCount('posts')->get();

        return view('admin.blog.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        BlogCategory::create($request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:blog_categories'],
            'description' => ['nullable', 'string', 'max:500'],
            'color' => ['nullable', 'string', 'max:7'],
        ]));

        return back()->with('success', 'Category created.');
    }
}
