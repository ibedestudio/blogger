<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $request->user()->posts()->create($validated);

        return redirect()->route('blog')
            ->with('success', 'Post berhasil dibuat!');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $post->update($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Post berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        $post->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Post berhasil dihapus!');
    }

    public function show(Post $post)
    {
        $relatedPosts = Post::where('id', '!=', $post->id)
            ->latest()
            ->take(2)
            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }

    public function blog()
    {
        $featuredPost = Post::where('is_featured', true)
            ->with('user')
            ->latest()
            ->first();

        $posts = Post::when($featuredPost, function($query) use ($featuredPost) {
            return $query->where('id', '!=', $featuredPost->id);
        })
        ->with('user')
        ->latest()
        ->paginate(9);

        return view('blog', compact('posts', 'featuredPost'));
    }
} 