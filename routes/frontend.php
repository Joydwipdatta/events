<?php

use App\Http\Controllers\frontend\Frontendcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/user-dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified', 'isUser'])->name('user.dashboard');


// Route::get('/event_details', function () {});
Route::middleware(['auth', 'isUser'])->group(function () {

    Route::controller(Frontendcontroller::class)->group(function () {
        // Route::get('/user_Dashboard', 'userDashboard')->name('user.dashboard');
        Route::get('/create-event', 'createEvent');
        Route::get('/event-details/{event_id}', 'eventDetails');
        Route::post('/store-event', 'storeEventForm')->name('frontend.addevent');
        Route::get('/edit-event/{event_id}', 'editEvent');
        Route::delete('/delete-event-image/{id}',  'deleteEventImage');
    });
});
