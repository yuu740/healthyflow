<?php
namespace App\Http\Controllers;

use App\Models\FoodDiary;
use Illuminate\Http\Request;

class FoodDiaryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'food_name' => 'required|string|max:255',
            'image'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'notes'     => 'nullable|string',
            'logged_at' => 'required|date',
        ]);

        $data = $request->except('image');
        $data['user_id'] = $request->user()->id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('food_images', 'public');
            $data['image_path'] = $path;
        }

        FoodDiary::create($data);

        return redirect()->route('gallery')->with('success', 'Meal saved successfully!');
    }
}
