<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\UserRoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/rent', function () {
    return view('rent');
})->name('rent');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/booknow', function () {
    return view('booknow');
})->name('booknow');

Route::middleware(['auth', 'role:master|engineer'])->group(function () {
    Route::get('/admin/user/roles/index', [UserRoleController::class, 'index'])->name('admin.user.roles.index');
    Route::post('/admin/roles/{user}', [UserRoleController::class, 'update'])->name('admin.roles.update');

    Route::get('Admin/index', [AdminController::class, 'index'])->name('Admin.index');
    Route::resource('admin/rooms', RoomController::class);

     Route::resource('admin/services', ServiceController::class);
         Route::resource('admin/blogs', BlogController::class);
});

// Route::middleware('role:master|admin|engineer')->group(function () {
//     Route::resource('rooms', RoomController::class)->only(['index', 'show']);
// });

require __DIR__ . '/auth.php';
