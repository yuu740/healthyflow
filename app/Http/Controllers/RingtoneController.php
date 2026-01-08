<?php

namespace App\Http\Controllers;
use App\Models\Ringtone;
use Illuminate\Http\Request;

class RingtoneController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|mimes:mp3,wav,mpeg|max:5120',
        ]);

        $path = $request->file('file')->store('ringtones', 'public');

        Ringtone::create([
            'name' => $request->name,
            'file_path' => $path,
        ]);

        return back()->with('success', 'Ringtone added!');
    }
}
