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

Route::get('/', App\Http\Livewire\Topics::class);

Route::get('/post/{topic_id}', App\Http\Livewire\Post::class, 'topic_id');
Route::get('/login', App\Http\Livewire\Login::class);
Route::get('/logout', App\Http\Livewire\Logout::class);
Route::get('/register', App\Http\Livewire\Register::class);
Route::get('/createpost', App\Http\Livewire\CreatePost::class);
Route::get('/editpost/{topic_id}/{topic_slug}', App\Http\Livewire\EditPost::class, 'topic_id','topic_slug');
