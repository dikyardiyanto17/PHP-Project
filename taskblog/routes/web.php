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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LandingPage::class, 'login']) ->name('login');
Route::get('/register', [LandingPage::class, 'register']) ->name('register');
Route::post('/register', [LandingPage::class, 'registeruser']);
Route::get('/home', [Home::class, 'index']) ->name('home');