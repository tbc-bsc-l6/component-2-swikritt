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

Route::get('/', function () { // get is http request // function are all in controller 
    return view('welcome'); //view function
   // return "hello";
});

Route::get('/test-page',function (){
    return "Swikrit Thapa";
});


Route::get('/posts', function()
{
    return view('posts');
});

Route::get('/posts/{post}', function($slug)
{
    $post= file_get_contents(__DIR__ . "/../resources/posts/{$slug}.html");
    return view('post',[
        'post'=>$post,
        'title'=>$slug
    ]);
});