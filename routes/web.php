<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/login', function() { return "Logic Login belum dibuat"; });
Route::post('/register', function() { return "Logic Register belum dibuat"; });
Route::post('/logout', function() { return redirect('/'); })->name('logout');


// Route Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/* // SEMENTARA DI-KOMEN DULU SAMPAI CONTROLLER DIBUAT
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
*/
