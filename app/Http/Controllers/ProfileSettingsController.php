<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileSettingsController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $title = 'Profile Settings';
        $data = 'Profile Settings';
        return view('admin.profile-settings.index', compact('title', 'data', 'user'));
    }

    public function update(Request $request)
    {
        // Validate the input data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            notyf()->error('Current password is incorrect');
            return redirect()->back();
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        notyf()->success('Password updated successfully');
        return redirect()->back();
    }

    public function checkCurrentPassword(Request $request)
    {
        $user = Auth::user();
        $isValid = Hash::check($request->current_password, $user->password);

        return response()->json(['message' => $isValid ? 'true' : 'false']);
    }

}
