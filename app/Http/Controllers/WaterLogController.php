<?php
namespace App\Http\Controllers;

use App\Models\WaterLog;
use Illuminate\Http\Request;

class WaterLogController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'amount_ml' => 'required|integer|min:1',
            'logged_at' => 'required|date',
        ]);

        WaterLog::create([
            'user_id' => $request->user()->id,
            'amount_ml' => $request->amount_ml,
            'logged_at' => $request->logged_at,
        ]);

        return redirect()->back()->with('success', 'Hydration track logged!');
    }

    public function destroy(Request $request, WaterLog $waterLog)
    {
        if ($waterLog->user_id !== $request->user()->id) {
            abort(403);
        }
        
        $waterLog->delete();
        return back()->with('success', 'Water log deleted.');
    }
}