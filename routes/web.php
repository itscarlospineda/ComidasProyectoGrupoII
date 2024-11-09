<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductController;
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

/*Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('/blog', [Controller::class, 'blog'])->name('blog');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::get('/userprofile/{id}', [ProfileController::class, 'edit'])->name('editusers.show');

Route::get('/profile/upload', [ProfileController::class, 'showUploadForm'])->name('profile.upload.form');
Route::post('/profile/{id}/upload', [ProfileController::class, 'uploadProfilePicture'])->name('profile.upload');

Route::get('/posts/{id}', [PostsController::class, 'read'])->name('posts.read');

Route::get("/product",[ProductController::class, 'viewProduct']);
Auth::routes();


