<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubsecriberController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

Route::controller(ThemeController::class)->name('theme.')->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/category/{id}','category')->name('category');
    Route::get('/contact','contact')->name('contact');
    Route::get('login','login')
        ->middleware('guest')
        ->name('login');
    Route::get('register', 'register')
    ->middleware('guest')
        ->name('register');
    Route::get('blog-detail', 'singleBlog')
        ->name('singleBlog');
});

Route::post('/subscribe',[SubsecriberController::class,'store'])->name('subscribe');
Route::post('/contact',[ContactController::class,'store'])->name('contact');
Route::get('/myBlogs',[BlogController::class,'myBlogs'])->name('myBlogs');
Route::post('/comment/store',[CommentController::class,'store'])->middleware('auth')->name('comment.create');
Route::resource('blogs', BlogController::class)->except('index');