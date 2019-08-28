<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {

    return view('test');
});

Route::get('/blog', function () {
    /*
        $blogs = [
            [
                'id' => 1,
                'title' => 'Mans blogs',
                'body' => 'yolo'
            ],
            [
                'id' => 2,
                'title' => 'Mans blogs 2',
                'body' => 'yolo otra bloga'
            ],
        ];
    */

    $blogs = \App\Post::take(4)
        ->get();

    return view('blog', [
        'myblogs' => $blogs,
    ]);
});

// /blog/2
Route::get('/blog/{id}', function ($id) {

    // When id is in ID
    $single_blog = \App\Post::find($id);

    // When slug is in ID
    // $single_blog = \App\Post::where('slug', $id)
    //     ->first();

    return view('single-blog', [
        'blog_post' => $single_blog,
    ]);
});
