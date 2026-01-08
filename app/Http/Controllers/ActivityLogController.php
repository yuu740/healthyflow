<?php
namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'activity_name'    => 'required|string|max:255',
            'duration_minutes' => 'required|integer|min:1',
            'logged_at'        => 'required|date',
        ]);

        ActivityLog::create([
            'user_id'          => $request->user()->id,
            'activity_name'    => $request->activity_name,
            'duration_minutes' => $request->duration_minutes,
            'logged_at'        => $request->logged_at,
        ]);

        return redirect()->route('daily_logs')->with('success', 'Activity logged successfully!');
    }
    
    public function destroy(Request $request, ActivityLog $activityLog)
    {
        if ($activityLog->user_id !== $request->user()->id) {
            abort(403, 'Unauthorized');
        }

        $activityLog->delete();

        return redirect()->back()->with('success', 'Activity deleted successfully!');
    }
}