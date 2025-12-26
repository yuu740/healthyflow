<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\AuthSession;
use App\Http\Middleware\GuestSession;

App::setLocale(Session::get('locale', config('app.locale')));

Route::get('/', function () {
    if (Session::has('user_logged_in')) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('welcome');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('switch.language');

Route::middleware([GuestSession::class])->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');

    Route::post('/login', function () {
        Session::put('user_logged_in', true);
        Session::put('user_name', 'John Doe');
        Session::put('daily_progress', [
            'water_intake' => 1500,
            'water_goal'   => 2000,
            'sleep_hours'  => 6.5,
            'sleep_goal'   => 8,
            'activity_mins'=> 45,
            'activity_goal'=> 60,
        ]);
        Session::put('weekly_data', [60, 75, 80, 70, 85, 90, 95]);
        return redirect()->route('dashboard');
    })->name('login.post');

    Route::post('/register', function () {
        Session::put('user_logged_in', true);
        Session::put('user_name', 'New User');
        Session::put('daily_progress', [
            'water_intake' => 0,
            'water_goal'   => 2000,
            'sleep_hours'  => 0,
            'sleep_goal'   => 8,
            'activity_mins'=> 0,
            'activity_goal'=> 60,
        ]);
        return redirect()->route('dashboard');
    })->name('register.post');
});

Route::middleware([AuthSession::class])->group(function () {

    Route::get('/dashboard', function () {
        $progress = Session::get('daily_progress');
        $weekly = Session::get('weekly_data');
        return view('dashboard', compact('progress', 'weekly'));
    })->name('dashboard');

    Route::get('/logs', function () {
        return view('daily_logs');
    })->name('daily_logs');

    Route::get('/gallery', function () {
        return view('gallery');
    })->name('gallery');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

Route::post('/logout', function () {
    Session::forget(['user_logged_in', 'user_name', 'user_email', 'daily_progress', 'weekly_data']);
    return redirect()->route('welcome');
})->name('logout');
});
