<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Theme Routes
Route::controller(ThemeController::class)->name('theme.')->group(function (){
    Route::get('/','index')->name('index');
    Route::get('/category/{id}','category')->name('category');
    Route::get('/contact','contact')->name('contact');
    // Route::get('/singleBlog','singleBlog')->name('singleBlog');
    // Route::get('/login','login')->name('login');
    // Route::get('/register','register')->name('register');
});


// Subscribers Routes
Route::post('/subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');


// Contact Routes
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');


// Blog Routes
Route::get('/my-blogs', [BlogController::class, 'myBlogs'])->name('blogs.myBlogs');
Route::resource('blogs', BlogController::class );


// Comment Routes
Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');


// Comment Reply Route
Route::post('/comment/reply/store', [CommentController::class, 'replyStore'])->name('comment.reply.store');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
