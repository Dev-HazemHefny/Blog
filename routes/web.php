<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });
                    ///main route/////
    Route::get('/homepage',[HomeController::class,'homepage']);
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/home', [HomeController::class,"index"])->middleware('auth')->name('home');
Route::get('/post_page',[AdminController::class,'post_page']);
Route::post('/add_post', [AdminController::class,'add_post']);
Route::get('/show_post',[AdminController::class,'show_post']);
Route::get('/delete_post/{id}',[AdminController::class,'delete_post']);
Route::get('/edit_page/{id}',[AdminController::class,'edit_page']);
Route::post('/update_post/{id}',[AdminController::class,'update_post']);
Route::get('/create_post',[HomeController::class,'create_post'])->name('create_post');
Route::post('/store_user_post',[HomeController::class,'store_user_post']);
Route::get('/my_posts',[HomeController::class,'my_posts'])->name('my_posts');
Route::get('/my_post_delete/{id}',[HomeController::class,'my_post_delete']);
Route::get('/my_post_edit/{id}',[HomeController::class,'my_post_edit']);
Route::post('/my_post_update/{id}',[HomeController::class,'my_post_update']);
Route::get('/accept_post/{id}',[HomeController::class,'accept_post']);
Route::get('/reject_post/{id}',[HomeController::class,'reject_post']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
