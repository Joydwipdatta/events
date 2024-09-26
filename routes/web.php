<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\Usercontroller;
use App\Http\Controllers\backend\Backendcontroller;



Route::get('/admin/dashboard', function () {
    return view('admin.admin_index');
})->middleware(['auth', 'verified', 'isAdmin'])->name('dashboard');


Route::get('/admin-login', function () {
    return view('admin.admin-login');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::controller(Admincontroller::class)->group(function () {

        // Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/admin/edit/profile', 'edit')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');
        // Route::get('/index', 'Index')->name('index');
    });
});
Route::middleware(['auth'])->group(
    function () {
        Route::controller(Admincontroller::class)->group(
            function () {
                Route::get('/logout', 'logout')->name('admin.logout');
            }
        );
    }
);

Route::middleware(['auth', 'isAdmin'])->group(
    function () {
        Route::controller(Backendcontroller::class)->group(
            function () {
                Route::get('/admin/events-bookings', 'showEventBooking');
                Route::get('/admmin/view/event-booking/{id}', 'viewEvents');
                Route::get('/event/approve/{id}', 'eventIsApproved');
                Route::get('/event/featured/{id}',  'eventIsFeatured')->name('event.isFeatured');
            }
        );
    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';
