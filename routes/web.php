<?php

use App\Http\Controllers\admin\blogCrudController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\BlogController;


Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('login', function () {
    return view('auth');
})->name('login');


Route::get('/blog_detail', [BlogController::class, 'blog_detail'])->name('blog_detail');
Route::get('/blog/index', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::get('/blog/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::put('/blog/update', [BlogController::class, 'update'])->name('blog.update');


Route::post('/signup', [AuthController::class, 'register'])->name('registerPost');
Route::post('/singin', [AuthController::class, 'login'])->name('loginPost');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forget_password', [AuthController::class, 'forgetPassword'])->name('forget_password');

Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);



// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// })->middleware('guest')->name('password.request');

// Route::post('/forgot-password', function (\Illuminate\Http\Request $request) {
//     $request->validate(['email' => 'required|email']);

//     $status = Password::sendResetLink(
//         $request->only('email')
//     );

//     return $status === Password::RESET_LINK_SENT
//         ? back()->with('status', __($status))
//         : back()->withErrors(['email' => __($status)]);
// })->middleware('guest')->name('password.email');


Route::resource('posts', BlogController::class);
Route::post('posts/{post}/content', [BlogController::class, 'storeContent'])->name('posts.content.store');
Route::delete('posts/content/{content}', [BlogController::class, 'destroyContent'])->name('posts.content.destroy');
Route::get('blog/search', [BlogController::class, 'search_blogs'])->name('search_blogs_title');


Route::get('abcdefg/', [blogCrudController::class, 'index'])->name('admin.blog.index')
    // ->middleware('is_admin')
;
