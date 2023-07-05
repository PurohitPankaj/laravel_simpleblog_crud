<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostsController;
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

//default routes for login/register and related.
Auth::routes();

// Front End Routes
Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('website');
Route::get('/post/{slug}', [App\Http\Controllers\FrontController::class, 'post'])->name('website.post');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

// User Panel Routes
Route::group(['prefix' => 'account', 'middleware' => ['auth']], function () {
    //Post Resource Route
    Route::resource('posts', PostsController::class);
    Route::get('/', [PostsController::class, 'index']); //call to account url
});
