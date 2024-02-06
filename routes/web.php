<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientBlogController;

Route::get('/',([ClientBlogController::class,'index']))
       ->name('blog.index');

Route::get('/blog/{slug}',([ClientBlogController::class,'show']))
       ->name('blog.show');

Route::get('/category/display/{category}',([ClientBlogController::class,'category']))
       ->name('category.display');


Route::get('/author/{author}',([ClientBlogController::class,'author']))
->name('author');

Route::post('/comments/store',([ClientBlogController::class,'commentStore']))
       ->name('comments.store')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminPostController::class, 'dashboard'])->name('home');

Route::group([
    'middeware' => 'auth'
], function () {
    Route::get('/dashboard', ([AdminPostController::class, 'dashboard']))
        ->name('dashboard');

    //All Posts Routes
    Route::get('/posts', ([AdminPostController::class, 'index']))
        ->name('posts.index');

    Route::get('/posts/create', ([AdminPostController::class, 'create']))
        ->name('posts.create');
    Route::post('/posts/create', ([AdminPostController::class, 'store']))
        ->name('posts.store');

    Route::get('/posts/edit/{slug}', ([AdminPostController::class, 'edit']))
    ->name('posts.edit');
    Route::put('/posts/edit/{slug}', ([AdminPostController::class, 'update']))
        ->name('posts.update');

    Route::get('/posts/{slug}', ([AdminPostController::class, 'show']))
    ->name('posts.show');

    Route::get('/posts/destroy/{slug}', ([AdminPostController::class, 'destroy']))
    ->name('posts.destroy');

    //All Category Routes
    Route::get('/category', ([CategoryController::class, 'index']))
    ->name('category.index');

    Route::get('/category/create', ([CategoryController::class, 'create']))
        ->name('category.create');
    Route::post('/category/create', ([CategoryController::class, 'store']))
        ->name('category.store');

    Route::get('/category/edit/{slug}', ([CategoryController::class, 'edit']))
    ->name('category.edit');
    Route::put('/category/edit/{slug}', ([CategoryController::class, 'update']))
        ->name('category.update');

    Route::get('/category/destroy/{slug}', ([CategoryController::class, 'destroy']))
    ->name('category.destroy');

    Route::get('/user/logout', ([AdminPostController::class, 'Logout']))
    ->name('user.logout');

    Route::get('/user/setting',([AdminSettingController::class,'Profile']))
           ->name('user.setting');
    Route::post('/user/setting',([AdminSettingController::class,'profileUpdate']))
    ->name('user.update');

    Route::get('/user/update/password',([AdminSettingController::class,'Password']))
    ->name('user.password');
    Route::post('/user/update/password',([AdminSettingController::class,'passwordUpdate']))
    ->name('password.update');

    Route::get('/list/comments',([AdminPostController::class,'listComment']))
           ->name('list.comments');
    Route::get('/user/comment/{id}',([AdminPostController::class,'deleteComment']))
    ->name('delete.comments');
});
