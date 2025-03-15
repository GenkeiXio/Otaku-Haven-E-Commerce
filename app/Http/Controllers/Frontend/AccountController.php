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
        $validSections = ['profile', 'address', 'changepassword','wishlist', 'returns', 'cancellations'];

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
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);
    
        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;
    
        $user->save();
    
        // Make sure response is returned
        return redirect()->route('frontend.account.index')->with('success', 'Profile updated successfully!');
    }
    
    public function changePassword()
    {
        return view('frontend.account.changepassword'); // Ensure this view file exists

        // Handle password update
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'Incorrect current password.']);
            }
            $user->password = Hash::make($request->new_password);
        }
    
        $user->save();
    
        // Make sure response is returned
        return redirect()->route('frontend.account.index')->with('success', 'Change password updated successfully!');
    }

}
