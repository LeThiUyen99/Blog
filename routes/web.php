<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;

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
    return view('login');
});
Route::get('/logout', '\App\Http\Controllers\Controller@logout')->name("log-out");
//Route::prefix('Category')->group(function () {
//    Route::get('/', [CategoryController::class, 'categoryList'])->name('Category.categoryList');
//
//    Route::get('/categoryAdd', [CategoryController::class, 'categoryAdd'])->name('Category.categoryAdd');
//    Route::get('/categorySave', [CategoryController::class,'categorySave'])->name('Category.categorySave');
//
//    Route::get('/categoryEdit/{categoryId}', [CategoryController::class, 'categoryEdit'])->name('Category.categoryEdit');
//    Route::get('/categoryUpdate/{id}', [CategoryController::class,'categoryUpdate'])->name('Category.categoryUpdate');
//
//    Route::get('/categoryDelete/{categoryId}', [CategoryController::class, 'categoryDelete'])->name('Category.categoryDelete');
//});

Route::prefix('Blog')->group(function () {
    Route::get('/', [BlogController::class, 'blogList'])->name('Blog.blogList');

    Route::get('/blogAdd', [BlogController::class, 'blogAdd'])->name('Blog.blogAdd');
    Route::post('/blogSave', [BlogController::class, 'blogSave'])->name('Blog.blogSave');

    Route::get('/blogEdit/{id}', [BlogController::class, 'blogEdit'])->name('Blog.blogEdit');
    Route::post('/blogUpdate/{id}', [BlogController::class,'blogUpdate'])->name('Blog.blogUpdate');

    Route::get('/blogDelete/{blogId}', [BlogController::class, 'blogDelete'])->name('Blog.blogDelete');
});

Route::prefix('Account')->group(function () {
    Route::get('/', [AccountController::class, 'accountList'])->name('Account.accountList');

    Route::get('/accountAdd', [AccountController::class, 'accountAdd'])->name('Account.accountAdd');
    Route::get('/accountSave', [AccountController::class, 'accountSave'])->name('Account.accountSave');
});

Route::resource('admins', AdminController::class);
Route::resource('categories', CategoryController::class);
//Route::prefix('Admin')->group(function () {
//    Route::get('/', [AdminController::class, 'adminList'])->name('Admin.adminList');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('main-dashboard');
})->name('dashboard');
