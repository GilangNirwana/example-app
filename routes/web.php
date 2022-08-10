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
    return view('welcome');
});

Route::get('/home/{email}',[\App\Http\Controllers\Controller::class,'home'])->name('home')->middleware('captcha');

Route::get('main',[\App\Http\Controllers\Controller::class,'main'])->name('main')->middleware('captcha');

Route::post('/yes', [\App\Http\Controllers\Controller::class,'verifYes'])->name('yes');


