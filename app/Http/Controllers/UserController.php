<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function edit(Request $request)
    {
        return view('settings', [
            'user' => $request->user()
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'preferred_unit'   => ['required', 'in:ml,oz'],
            'preferred_locale' => ['required', 'in:en,id'],
        ]);

        $user->update($validated);

        if ($request->has('preferred_locale')) {
            session(['locale' => $request->preferred_locale]);
        }

        return redirect()->back()->with('success', 'Profile settings updated.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'], 
            'password'         => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Password changed successfully.');
    }
}