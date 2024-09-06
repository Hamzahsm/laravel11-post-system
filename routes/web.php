<?php

use App\Models\Post;
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