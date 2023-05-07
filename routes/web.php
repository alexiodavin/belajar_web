<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/artikel', [PostController::class, 'index'])->name('artikel');
Route::get('/artikel1', [PostController::class, 'show'])->name('artikel1');

Route::post("/post",[PostController::class,'store']);
Route::get('/',[PostController::class,'index']);

Route::get('/create', function () {
    return view('create');
});

Route::post("/post",[PostController::class,'store']);

Route::post('artikel/{id}', [PostController::class,'destroy']);
Route::get('edit/{id}', [PostController::class,'edit']);
Route::post('edit/{id}', [PostController::class,'update'])->name('put.edit');
Route::get('/landing', [LandingController::class,'index']);
Route::get('article/{id}', [ArtikelController::class,'index']);