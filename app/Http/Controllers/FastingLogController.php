<?php
namespace App\Http\Controllers;

use App\Models\FastingLog;
use Illuminate\Http\Request;

class FastingLogController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required|date',
            'end_time'   => 'nullable|date|after:start_time', 
            'target_duration_hours' => 'required|numeric|min:0.5',
        ]);

        FastingLog::create([
            'user_id' => $request->user()->id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'target_duration_hours' => $request->target_duration_hours,
        ]);

        return redirect()->route('daily_logs')->with('success', 'Fasting timer started!');
    }

    public function update(Request $request, FastingLog $fastingLog)
    {
        if ($fastingLog->user_id !== $request->user()->id) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'end_time' => 'required|date|after:' . $fastingLog->start_time,
        ]);

        $fastingLog->update(['end_time' => $request->end_time]);

        $hours = $fastingLog->start_time->diffInHours($fastingLog->end_time);

        return redirect()->back()->with('success', "Fasting ended! You fasted for {$hours} hours.");
    }
}