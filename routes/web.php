<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Auth\RegisterController;

Route::middleware('auth')->group(function () {
Route::get('/fullcalendar', [EventController::class, 'fullCalendar']);
Route::get('/fullcalendar', [EventController::class, 'getEvents']);


Route::get('items/create', [ItemController::class, 'create']);

Route::post('items/show', [ItemController::class, 'show'])->name('items.show');

Route::resource('events', EventController::class);
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events/update', [EventController::class, 'update'])->name('events.update');
Route::post('/events/delete', [EventController::class, 'delete'])->name('events.delete');
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');



Route::get('/', function () {
    return redirect()->route('index');
})->name('/');

//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])) {
        abort(400);
    }
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');

Route::prefix('dashboard')->group(function () {
    Route::view('index', 'dashboard.index')->name('index');
});

Route::prefix('chat')->group(function () {
    Route::view('chat', 'apps.chat')->name('chat');
    Route::view('video-chat', 'apps.video-chat')->name('chat-video');
});

Route::prefix('users')->group(function () {
    Route::view('user-profile', 'apps.user-profile')->name('user-profile');
    Route::view('edit-profile', 'apps.edit-profile')->name('edit-profile');
    Route::view('user-cards', 'apps.user-cards')->name('user-cards');
});


Route::view('search', 'apps.search')->name('search');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['prefix' => 'admin', 'as' => 'events.', 'middleware' => 'Admin'], function () {
    Route::resource('pages', \App\Http\Controllers\Admin\EventController::class)
        ->only(['edit', 'update', 'destroy']);   
    
    

    });