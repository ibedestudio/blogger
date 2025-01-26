<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

// Public routes (bisa diakses tanpa login)
Route::get('/', function () {
    $featuredPosts = Post::where('is_featured', true)
        ->with('user')
        ->latest()
        ->take(2)
        ->get();
    
    $latestPosts = Post::with('user')
        ->latest()
        ->take(3)
        ->get();
    
    return view('welcome', compact('featuredPosts', 'latestPosts'));
})->name('home');

Route::get('/blog', [PostController::class, 'blog'])->name('blog');
Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');

// Protected routes (perlu login)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Posts Management Routes
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("chirps", ChirpController::class)
->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(["auth", "verified"]);

require __DIR__ . "/auth.php";
