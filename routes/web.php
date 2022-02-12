<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});

Route::get('/posts/{post}', function ($slug) {
    // dd($path);

    if (!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
        // dd('file does not exist');
        // abort(404);
        // return view('posts');
        return redirect('/');
    }


    // $post = cache()->remember("posts.{$slug}", /*now()->addMinute(20)*/ 5, function () use ($path) {
    //     // var_dump('file_get_contents');
    //     return file_get_contents($path);
    // });

    $post = cache()->remember("posts.{$slug}", 5, fn () => file_get_contents($path));

    return view('post', ['post' => $post]);
    // })->whereAlpha('post');
})->where('post', '[A-z_/-]+');
