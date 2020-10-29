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
Route::get('/app/get_tags', 'BlogController@getTags');
Route::get('/app/get_cats', 'BlogController@getCats');
Route::get('/app/get_blogs', 'BlogController@getBlogs');
Route::get('/app/get_popular_blogs', 'BlogController@getPopularBlogs');
Route::get('/blog/{id}/{slug}', 'BlogController@singleBlog');
Route::any('/app/related_cats/{id}', 'BlogController@catRequest');
// Route::get('/category/{categoryName}/{id}', 'BlogController@categoryIndex');
Route::get('/tag/{name}/{id}', 'BlogController@tagIndex');
Route::get('/allblogs', 'BlogController@allBlogs');
Route::get('/about-us', 'BlogController@aboutUsPage');
Route::get('/contact-us', 'BlogController@contactUsPage');
Route::any('/search', 'BlogController@search');
Route::any('/login', 'BlogController@login');
Route::any('/user-login', 'BloguserController@userLogin');
Route::any('/signup', 'BlogController@signup');
// Create new blog user
Route::post('/user-signup', 'BloguserController@create');

// Route::prefix('app')->middleware([AdminCheck::class])->group(function(){
Route::prefix('app')->group(function(){

});
Route::get('{any}', function () {
    return view('welcome');
})->where( 'any','.*');
// If route not found, return welcome page
Route::any('{slug}', function () {
    return view('notfound');
});
