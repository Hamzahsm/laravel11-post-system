<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', [
        'title' => 'Home Page',
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'nama' => 'Budi',
        'title' => 'About',
    ]);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'posts' => Post::all()
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact Us',
    ]);
});


//route model binding -> menghubungkan antara rute dan model
Route::get('/posts/{post:slug}', function(Post $post) {
        // $post = Post::find($slug);

        // dd($post);
        return view('post', [
            'title' => 'Single Post',
            'post' => $post,
        ]);
    });

//route model binding -> menghubungkan antara rute dan model
Route::get('/authors/{user:username}', function(User $user) {
        // $post = Post::find($slug);

        // dd($post);
        return view('posts', [
            'title' => count($user->posts) . ' Article By ' . $user->name,
            'posts' => $user->posts,
        ]);
    });

//route model binding -> menghubungkan antara rute dan model
Route::get('/categories/{category:slug}', function(Category $category) {
        // $post = Post::find($slug);

        // dd($post);
        return view('posts', [
            'title' => count($category->posts) . ' Artikel Category : ' . $category->name,
            'posts' => $category->posts,
        ]);
    });