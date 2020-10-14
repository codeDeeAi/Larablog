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


// Blog route
Route::get('/', 'BlogController@index');
Route::get('/notfound', function () {
        return view('notfound');
    });


Route::get('/app/get_slider_blogs', 'BlogController@getSliderBlogs');
Route::get('/app/get_home_blogs', 'BlogController@getHomeBlogs');
Route::get('/app/get_tags', 'BlogController@getHomeTags');
Route::get('/app/get_popular_blogs', 'BlogController@getPopularBlogs');
Route::get('/blog/{id}', 'BlogController@singleBlog');



// Route::get('/', function () {
//     return view('welcome');
// });
// If route not found, return welcome page
// Route::any('{slug}', function () {
//     return view('welcome');
// });
