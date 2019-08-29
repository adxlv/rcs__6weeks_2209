<?php

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    $blogs = Post::orderBy('created_at', 'desc')
        ->take(4)
        ->get();

    return view('blog', [
        'myblogs' => $blogs,
    ]);
});


Route::get('/blog/create', function() {

    return view('create-blog');
});

Route::post('/blog/create/submit', function(Request $request) {
    // request()




    $validator = Validator::make($request->all(), [
        'title'    => 'required|unique:posts|max:255',
        'picture'  => 'required',
        'body'     => 'required',
        'excerpt'  => 'required',
        'author'   => 'required',
        'slug'     => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('blog/create')
                    ->withErrors($validator)
                    ->withInput();
    }

    $posted = $request->all();

    $imagePath = $request->file('image')->store('public');

    $post = new Post;

    $post->title    = $posted['title'];
    $post->picture  = $imagePath;
    $post->body     = $posted['body'];
    $post->excerpt  = $posted['excerpt'];
    $post->author   = $posted['author'];
    $post->slug     = $posted['slug'];

    $post->save();

    return redirect('/blog/create')->with('success', 'Profile updated!');
});


// /blog/2
Route::get('/blog/{id}', function ($id) {

    // When id is in ID
    $single_blog = Post::find($id);

    if ($single_blog == null) {
        abort(404);
    }

    // When slug is in ULR
    // $single_blog = ::where('slug', $id)->first();

    return view('single-blog', [
        'blog_post' => $single_blog,
    ]);
});
