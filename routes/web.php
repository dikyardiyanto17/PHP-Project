<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\LandingPage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LandingPage::class, 'login']) ->name('login');
Route::post('/loginuser', [LandingPage::class, 'loginuser'])->name('loginuser');
Route::get('/register', [LandingPage::class, 'register']) ->name('register');
Route::post('/register', [LandingPage::class, 'registeruser']);
Route::get('/logout', [LandingPage::class, 'logout']);
Route::get('/', [Home::class, 'index']) ->name('home')->middleware('auth');
Route::post('/editpost/{id}', [Home::class, 'editpost']) ->name('editpost')->middleware('auth');
Route::post('/editcomment/{id}', [Home::class, 'editcomment']) ->name('editcomment')->middleware('auth');
Route::post('/post', [Home::class, 'post'])->middleware('auth');
Route::post('/comment/{id}', [Home::class, 'comment'])->middleware('auth');
Route::get('/deletecomment/{id}', [Home::class, 'deletecomment'])->middleware('auth');
Route::get('/deletepost/{id}', [Home::class, 'deletepost'])->middleware('auth');