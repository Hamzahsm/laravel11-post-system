<?php

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
        'posts' => [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Writer 1',
                'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis ad, quis delectus, perferendis adipisci omnis ullam ipsam neque libero sapiente et voluptatum qui, dolorem molestiae animi reiciendis vero nisi cupiditate. Odio repellendus optio deserunt? Eveniet, fuga quod eius nesciunt dolorem ad modi magnam incidunt tempora minus explicabo eos quasi maiores?'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Writer 2',
                'body' => 'Lorem ipsum, bla bla bla, lorem ipsum'
            ]
        ]
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact Us',
    ]);
});

Route::get('/posts/{slug}', function($slug) {
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Writer 1',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis ad, quis delectus, perferendis adipisci omnis ullam ipsam neque libero sapiente et voluptatum qui, dolorem molestiae animi reiciendis vero nisi cupiditate. Odio repellendus optio deserunt? Eveniet, fuga quod eius nesciunt dolorem ad modi magnam incidunt tempora minus explicabo eos quasi maiores?'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Writer 2',
            'body' => 'Lorem ipsum, bla bla bla, lorem ipsum'
        ]
        ];

        $post = Arr::first($posts, function($post) use ($slug) {
            return $post['slug'] == $slug;
        });

        // dd($post);
        return view('post', [
            'title' => 'Single Post',
            'post' => $post,
        ]);
});