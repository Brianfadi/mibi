<?php

namespace App\Services;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Support\Collection;

class BlogService
{
    public function createPost(array $data): BlogPost
    {
        $post = BlogPost::create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'content' => $data['content'],
            'excerpt' => $data['excerpt'] ?? null,
            'featured_image' => $data['featured_image'] ?? null,
            'is_published' => $data['is_published'] ?? false,
            'is_featured' => $data['is_featured'] ?? false,
            'published_at' => ($data['is_published'] ?? false) ? now() : null,
            'meta_title' => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'meta_keywords' => $data['meta_keywords'] ?? null,
        ]);

        if (!empty($data['categories'])) {
            $post->categories()->sync($data['categories']);
        }

        return $post;
    }

    public function updatePost(BlogPost $post, array $data): BlogPost
    {
        $post->update([
            'title' => $data['title'] ?? $post->title,
            'content' => $data['content'] ?? $post->content,
            'excerpt' => $data['excerpt'] ?? $post->excerpt,
            'featured_image' => $data['featured_image'] ?? $post->featured_image,
            'is_published' => $data['is_published'] ?? $post->is_published,
            'is_featured' => $data['is_featured'] ?? $post->is_featured,
            'published_at' => isset($data['is_published']) && $data['is_published'] && !$post->published_at ? now() : $post->published_at,
            'meta_title' => $data['meta_title'] ?? $post->meta_title,
            'meta_description' => $data['meta_description'] ?? $post->meta_description,
            'meta_keywords' => $data['meta_keywords'] ?? $post->meta_keywords,
        ]);

        if (isset($data['categories'])) {
            $post->categories()->sync($data['categories']);
        }

        return $post;
    }

    public function publishPost(BlogPost $post): BlogPost
    {
        $post->update([
            'is_published' => true,
            'published_at' => $post->published_at ?? now(),
        ]);

        return $post;
    }

    public function unpublishPost(BlogPost $post): BlogPost
    {
        $post->update(['is_published' => false]);
        return $post;
    }

    public function getRelatedPosts(BlogPost $post, int $limit = 3): Collection
    {
        $categoryIds = $post->categories->pluck('id')->toArray();

        return BlogPost::published()
            ->where('id', '!=', $post->id)
            ->whereHas('categories', fn ($q) => $q->whereIn('blog_categories.id', $categoryIds))
            ->take($limit)
            ->get();
    }

    public function getPopularPosts(int $limit = 5): Collection
    {
        return BlogPost::published()
            ->featured()
            ->recent()
            ->take($limit)
            ->get();
    }

    public function getPublishedPosts(int $perPage = 10)
    {
        return BlogPost::with(['author', 'categories'])
            ->published()
            ->recent()
            ->paginate($perPage);
    }

    public function searchPosts(string $query, int $perPage = 10)
    {
        return BlogPost::with(['author', 'categories'])
            ->published()
            ->search($query)
            ->recent()
            ->paginate($perPage);
    }
}
