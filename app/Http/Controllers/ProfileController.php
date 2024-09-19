<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {
    public function view(string $id) {
        $user = DB::table('users')->where('id', $id)->first();

        return view('pages.profile.view', ['user' => $user]);
    }

    public function edit(string $id) {
        $user = DB::table('users')->where('id', $id)->first();
        return view('pages.profile.edit', ['user' => $user]);
    }

    public function update(Request $request) {

        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|required_with:current_password|string|min:8',
            'bio' => 'nullable|string',
        ]);

        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }
        }

        $update = DB::table('users')->where('id', $user->id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->first_name,
            'password' => Hash::make($request->new_password),
            'bio' => $request->bio,
        ]);

        if ($update) {
            return redirect()->back()->with([
                'success' => 'Profile successfully updated!',
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Something went wrong!',
        ]);



    }
}
