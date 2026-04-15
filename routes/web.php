<?php

use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Livewire\Admin\Bookings;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Rooms;
use App\Livewire\BlogCard;
use App\Livewire\BookingForm;
use App\Livewire\MyBookings;
use App\Livewire\RoomCard;
use App\Livewire\ServiceCard;
use App\Livewire\ShowBlog;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;





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

Route::get('/reservation', function () {
    return view('rent');
})->name('rent');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Livewire::component('service-card', ServiceCard::class);
Livewire::component('room-card', RoomCard::class);

// Route::get('/my-bookings', MyBookings::class)->name('my-bookings');

Route::get('/my-bookings', function () {
    return view('booknow');
})->name('booknow');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/book', function () {
    return view('book');
})->name('book');

// Route::get('/book', BookingForm::class)->name('booknow');

Route::get('blog/{blog}', ShowBlog::class)->name('blog-single');

Route::get('/blog', BlogCard::class)->name('blog.index');
Route::get('/blog/{id}', ShowBlog::class)->name('blog.show');

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::middleware(['auth', 'role:master|engineer'])->group(function () {
    Route::get('/Admin/user/roles/index', [UserRoleController::class, 'index'])->name('admin.user.roles.index');
    Route::post('/Admin/roles/{user}', [UserRoleController::class, 'update'])->name('admin.roles.update');

    Route::get('Admin/index', [AdminController::class, 'index'])->name('Admin.index');
    Route::resource('admin/rooms', RoomController::class);

    Route::resource('admin/services', ServiceController::class);
    Route::resource('admin/blogs', BlogController::class);
    Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials');
    Route::post('/admin/testimonial/{id}/approve', function ($id) {
        $t = Testimonial::findOrFail($id);
        $t->approved = true;
        $t->save();

        return back()->with('success', 'Testimonial approved');
    })->name('admin.approve.testimonial');

    Route::get('/Admin/bookings', function () {
        return view('Admin/bookings');
    })->name('Admin/bookings');

    Route::get('/Admin/rooms', function () {
        return view('Admin/rooms');
    })->name('Admin/rooms');

    // Route::get('/rooms', Rooms::class)->name('admin.rooms');

});
// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
//     Route::get('/', Dashboard::class)->name('admin.dashboard');
//     Route::get('/bookings', Bookings::class)->name('admin.bookings');
//     Route::get('/rooms', Rooms::class)->name('admin.rooms');
//     Route::get('/services', Services::class)->name('admin.services');
//     Route::get('/blog', Blog::class)->name('admin.blog');
// });
// Route::middleware('role:master|admin|engineer')->group(function () {
//     Route::resource('rooms', RoomController::class)->only(['index', 'show']);
// });

require __DIR__.'/auth.php';
