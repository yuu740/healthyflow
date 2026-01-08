<?php

namespace App\Http\Controllers;

use App\Models\TimerPreset;
use App\Models\Ringtone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimerPresetController extends Controller
{
    public function index()
    {
        $timers = TimerPreset::where('user_id', Auth::id())->get();
        $ringtones = Ringtone::all();
        return view('healthy_timer', compact('timers', 'ringtones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'duration_minutes' => 'required|integer|min:0', 
            'icon' => 'required|string',
        ]);

        TimerPreset::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'duration_minutes' => $request->duration_minutes,
            'icon' => $request->icon,
        ]);

        return back()->with('success', 'Timer preset added!');
    }

    public function destroy(TimerPreset $timer)
    {
        if ($timer->user_id !== Auth::id()) abort(403);
        $timer->delete();
        return back()->with('success', 'Timer preset deleted!');
    }
}
