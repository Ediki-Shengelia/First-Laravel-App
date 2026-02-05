<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/photoUpload', [ProfileController::class, 'photoUpload'])->name('user.photo');
    Route::resource('post', PostController::class);
});

Route::post('read/{id}', function ($id) {
    auth()->user()
        ->notifications
        ->where('id', $id)
        ->markAsRead()
    ;
    return back();
})->name('readOne');
Route::post('allRead', function () {
    auth()->user()
        ->unreadNotifications
        ->markAsRead();
    return back();
})->name('allRead');
require __DIR__ . '/auth.php';
