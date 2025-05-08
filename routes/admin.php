<?php
use App\Http\Controllers\admin\blogCrudController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'is_admin'])
    ->group(function () {
        Route::get('/', [BlogCrudController::class, 'index'])->name('blog.index');
    });