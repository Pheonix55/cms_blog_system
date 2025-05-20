<?php

use App\Http\Controllers\admin\blogCrudController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
// use App\Http\Controllers\SocialController;
use App\Http\Controllers\TagController;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SocialController;


Route::get('/auth/{provider}', [SocialController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialController::class, 'handleProviderCallback']);

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('login', function () {
    return view('auth');
})->name('login');

// auth
Route::get('/singin/view', [AuthController::class, 'loginView'])->name('loginView');
Route::get('/singUp', [AuthController::class, 'registerView'])->name('registerView');


Route::get('admin/blog/create', [blogCrudController::class, 'create'])->name('admin.blog.create');
Route::get('admin/blog/edit', [blogCrudController::class, 'edit'])->name('admin.blog.edit');
Route::post('admin/blog/store', [blogCrudController::class, 'store'])->name('admin.blog.store');

Route::get('/blog_detail', [BlogController::class, 'blog_detail'])->name('blog_detail');
Route::get('/blog/index', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::get('/blog/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::put('/blog/update', [BlogController::class, 'update'])->name('blog.update');


Route::post('/signup', [AuthController::class, 'register'])->name('registerPost');
Route::post('/singin', [AuthController::class, 'login'])->name('loginPost');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forget_password', [AuthController::class, 'forgetPassword'])->name('forget_password_view');
Route::post('/send-reset-link', [AuthController::class, 'sendPasswordResetLink'])->name('send_reset_link');
Route::get('/new-password/{id}', [AuthController::class, 'newPasswordView'])->name('forget_password');
Route::post('/change_password/{id}', [AuthController::class, 'newPasswordStore'])->name('new_password');

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


Route::get('abcdefg', [blogCrudController::class, 'index'])->name('admin.blog.index')
    // ->middleware('is_admin')
;
Route::get('mail_test', function () {
    $user = \App\Models\User::first(); // Or use your own data
    Mail::to('m33322ali@gmail.com')->send(new WelcomeEmail($user));
    return 'Email Sent';
});