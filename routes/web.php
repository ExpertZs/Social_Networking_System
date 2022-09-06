<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

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

Route::get('/home', [App\Http\Controllers\PersonController::class, 'index'])->name('home');

Route::controller(PersonController::class)->group(function(){
    Route::get('auth/login','login')->name('auth/login');
    Route::get('auth/register','registration')->name('auth/register');
    Route::post('register','register')->name('register');
    Route::post('login','validate_login')->name('login');
    Route::get('dashboard','dashboard')->name('dashboard');
    Route::get('logout','logout')->name('logout');
});
