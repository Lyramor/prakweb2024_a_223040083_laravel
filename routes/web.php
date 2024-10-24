<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog', 
        'posts' => [
            [
                'id' => '1',
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Muhamad Marsa Nur Jaman',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam nobis fugit corrupti, quaerat non perspiciatis id est sequi debitis ipsam assumenda aspernatur praesentium vel, reprehenderit nulla doloribus accusamus inventore distinctio.'
            ],
            [
                'id' => '2',
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Lyramor',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam nobis fugit corrupti, quaerat non perspiciatis id est sequi debitis ipsam assumenda aspernatur praesentium vel, reprehenderit nulla doloribus accusamus inventore distinctio.'
            ]
        ]
    ]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        [
            'id' => '1',
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Muhamad Marsa Nur Jaman',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam nobis fugit corrupti, quaerat non perspiciatis id est sequi debitis ipsam assumenda aspernatur praesentium vel, reprehenderit nulla doloribus accusamus inventore distinctio.'
        ],
        [
            'id' => '2',
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Lyramor',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam nobis fugit corrupti, quaerat non perspiciatis id est sequi debitis ipsam assumenda aspernatur praesentium vel, reprehenderit nulla doloribus accusamus inventore distinctio.'
        ]
    ];

    $post = Arr::first($posts, function($post) use ($slug) {
        return $post['slug'] === $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});