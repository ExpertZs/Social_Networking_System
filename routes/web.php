<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;


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

//To load initial page of the software
Route::get('/home', [App\Http\Controllers\PersonController::class, 'index'])->name('home');

//To implement api/auth/register and api/auth/login with loading feed and logout functionality
Route::controller(PersonController::class)->group(function(){
    Route::get('auth/login','login')->name('auth/login');
    Route::get('auth/register','registration')->name('auth/register');
    Route::post('register','register')->name('register');
    Route::post('login','validate_login')->name('login');
    Route::get('logout','logout')->name('logout');
});


//To implement api/page/create with loading page create form and save to database
Route::controller(PageController::class)->group(function(){
    Route::get('page/create','create_page')->name('page/create');
    Route::post('page-creation','page_creation')->name('page-creation');
});

//To implement api/person/attach-post with loading create post and save to database
Route::controller(PostController::class)->group(function(){
    Route::get('person/attach-post','create_post')->name('person/attach-post');
    Route::post('post-creation','post_creation')->name('post-creation');
});

//To implement api/page/{pageId}/attach-post with loading create post and save to database
//Specail Note: please enter a valid page id in {pageId}, Example: api/page/1/attach-post
Route::controller(PostController::class)->group(function(){
    Route::get('page/{pageId}/attach-post','create_page_post')->name('page/{pageId}/attach-post');
    Route::post('page-post-creation/{id}','page_post_creation')->name('page-post-creation');
});

//To implement api/follow/person/{personId} with loading create post and save to database
//Specail Note: please enter a valid person id in {personId}, Example: api/follow/person/1 when your person id is 2
Route::controller(FollowController::class)->group(function(){
    Route::get('follow/person/{personId}','search_follow_person')->name('follow/person/{personId}');
    Route::post('follow-person/{id}','follow_person')->name('follow-person');
});

//To implement api/follow/page/{pageId} with loading create post and save to database
//Specail Note: please enter a valid page id in {pageId}, Example: api/follow/page/1 
Route::controller(FollowController::class)->group(function(){
    Route::get('follow/page/{pageId}','search_page')->name('follow/page/{pageId}');
    Route::post('follow-page/{id}','follow_page')->name('follow-page');
});

//To load person feed
Route::get('person/feed', [App\Http\Controllers\PersonController::class, 'dashboard'])->name('person/feed');





