<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home(): View
    {
        $posts = Post::with(['category', 'tags', 'user'])
            ->where('is_published', true)
            ->latest('published_at')
            ->paginate(9);
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('public.home', compact('posts', 'categories', 'tags'));
    }

    public function post(string $slug): View
    {
        $post = Post::with(['category', 'tags', 'user'])
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
        $related = Post::where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->where('is_published', true)
            ->latest('published_at')
            ->limit(6)
            ->get();
        return view('public.post', compact('post', 'related'));
    }

    public function category(string $slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()
            ->where('is_published', true)
            ->latest('published_at')
            ->paginate(9);
        return view('public.category', compact('category', 'posts'));
    }

    public function tag(string $slug): View
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()
            ->where('is_published', true)
            ->latest('published_at')
            ->paginate(9);
        return view('public.tag', compact('tag', 'posts'));
    }
}
