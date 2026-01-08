<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WaterLogController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\FastingLogController;
use App\Http\Controllers\FoodDiaryController;
use App\Http\Controllers\SleepLogController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('welcome');

Route::middleware(['guest'])->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        /** @var \App\Models\User $user */
        $user = Auth::user();

       $rawWater = $user->waterLogs()->whereDate('logged_at', today())->sum('amount_ml');
        $rawActivity = $user->activityLogs()->whereDate('logged_at', today())->sum('duration_minutes');
        $rawSleep = $user->sleepLogs()->whereDate('logged_at', today())->sum('duration_hours');

        $goalWaterDB = $user->water_goal ?? 2000;
        $goalActivity = $user->activity_goal ?? 45;
        $goalSleep = $user->sleep_goal ?? 8;
        $unit = $user->preferred_unit ?? 'ml';

        $conversionFactor = 29.5735; // 1 fl oz = 29.5735 ml

        if ($unit == 'oz') {
            $displayWaterCurrent = round($rawWater / $conversionFactor);
            $displayWaterGoal = round($goalWaterDB / $conversionFactor);
        } else {
            $displayWaterCurrent = $rawWater;
            $displayWaterGoal = $goalWaterDB;
        }

        $goals = [
            'water' => $displayWaterGoal,
            'activity' => $goalActivity,
            'sleep' => $goalSleep,
            'unit' => $unit
        ];

        $weekly = [50, 60, 40, 80, 70, 90, 100];

        return view('dashboard', [
            'todayWater' => $displayWaterCurrent,
            'todayActivity' => $rawActivity,
            'todaySleep' => $rawSleep,
            'goals' => $goals,
            'weekly' => $weekly
        ]);
    })->name('dashboard');

    Route::get('/logs', function () {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $waterLogs = $user->waterLogs()->latest('logged_at')->take(3)->get();
        $activityLogs = $user->activityLogs()->latest('logged_at')->take(3)->get();
        $sleepLogs = $user->sleepLogs()->latest('logged_at')->take(3)->get();
        return view('daily_logs', compact('waterLogs', 'activityLogs', 'sleepLogs'));
    })->name('daily_logs');

    Route::post('/logs/water', [WaterLogController::class, 'store'])->name('logs.water.store');
    Route::post('/logs/activity', [ActivityLogController::class, 'store'])->name('logs.activity.store');
    Route::delete('/logs/activity/{activityLog}', [ActivityLogController::class, 'destroy'])->name('logs.activity.destroy');
    Route::post('/logs/sleep', [SleepLogController::class, 'store'])->name('logs.sleep.store');
    Route::post('/logs/fasting', [FastingLogController::class, 'store'])->name('logs.fasting.store');
    Route::put('/logs/fasting/{fastingLog}', [FastingLogController::class, 'update'])->name('logs.fasting.update');

    Route::post('/settings/update-goals', function (Request $request) {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $inputWater = $request->water_goal;
        $conversionFactor = 29.5735;

        if ($request->unit == 'oz') {
            $finalWaterGoalML = $inputWater * $conversionFactor;
        } else {
            $finalWaterGoalML = $inputWater;
        }

        $user->update([
            'water_goal' => $finalWaterGoalML,
            'activity_goal' => $request->activity_goal,
            'sleep_goal' => $request->sleep_goal,
            'preferred_unit' => $request->unit
        ]);

        return back()->with('success', 'Targets updated successfully!');
    })->name('update.goals');

    Route::post('/settings/update-email', function (Request $request) {
        $request->validate([
            'new_email' => 'required|email|unique:users,email',
            'password_confirmation' => 'required',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!Hash::check($request->password_confirmation, $user->password)) {
            return back()->with('error', 'Password salah, email gagal diganti.');
        }

        $user->update(['email' => $request->new_email]);
        return back()->with('success', 'Email updated successfully!');
    })->name('update.email');

    Route::get('/timer', function () { return view('healthy_timer'); })->name('healthy_timer');

    Route::get('/gallery', function (\Illuminate\Http\Request $request) {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $query = $user->foodDiaries();

        if ($request->has('date')) {
            $query->whereDate('logged_at', $request->date);
        } elseif (!$request->has('search') && !$request->has('all')) {
            $query->whereDate('logged_at', today());
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('food_name', 'like', "%{$search}%")
                ->orWhere('notes', 'like', "%{$search}%");
            });
        }

        $meals = $query->latest('logged_at')->get();

        return view('gallery', compact('meals'));
    })->name('gallery');

    Route::post('/logs/food', [FoodDiaryController::class, 'store'])->name('logs.food.store');    Route::get('/settings', function () { return view('settings'); })->name('settings');
    Route::get('/settings/about', function () { return view('about'); })->name('about');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        Session::put('locale', $locale);
    }
    return back();
})->name('switch.language');
