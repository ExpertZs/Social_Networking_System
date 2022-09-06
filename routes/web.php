<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PageController;

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
    Route::get('dashboard','dashboard')->name('dashboard');
    Route::get('logout','logout')->name('logout');
});


//To implement api/page/create with loading feed and logout functionality
Route::controller(PageController::class)->group(function(){
    Route::get('page/create','create_page')->name('page/create');
    Route::post('page-creation','page_creation')->name('page-creation');
});
