<?php
namespace App\Http\Controllers;
use App\Models\SleepLog;
use Illuminate\Http\Request;

class SleepLogController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'duration_hours' => 'required|numeric|min:0.1|max:24',
            'logged_at' => 'required|date',
        ]);

        SleepLog::create([
            'user_id' => $request->user()->id,
            'duration_hours' => $request->duration_hours,
            'logged_at' => $request->logged_at,
        ]);

        return redirect()->back()->with('success', 'Sleep logged!');
    }
}
