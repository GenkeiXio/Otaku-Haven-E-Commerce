<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Get authenticated user
        return view('frontend.account.profile', compact('user'));
    }

    public function loadSection($section)
    {
        $validSections = ['profile', 'changepassword','wishlist', 'returns', 'cancellations'];

        if (in_array($section, $validSections)) {
            $user = auth()->user(); // Get user data
            return view("frontend.account.$section", compact('user'));
        }

        abort(404);
    }

    public function updateProfile(Request $request)
{
    $user = Auth::user();

    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'phone' => 'nullable|string|max:20',
        'gender' => 'nullable|in:male,female,other',
        'dob' => 'nullable|date',
    ]);

    // Update user details
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone; // Save phone
    $user->gender = $request->gender; // Save gender
    $user->dob = $request->dob; // Save date of birth

    $user->save();

    return redirect()->route('frontend.account.index')->with('success', 'Profile updated successfully!');
}

    
    public function changePassword() {
        return view('frontend.account.changepassword');
    }

    public function updatePassword(Request $request)
{
    $user = Auth::user();

    // Validate input
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    // Check if current password matches
    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'Incorrect current password.']);
    }

    // Update password
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->route('frontend.account.index')->with('success', 'Password updated successfully!');
}


}
