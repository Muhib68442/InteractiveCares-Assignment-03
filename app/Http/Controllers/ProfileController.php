<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('edit-profile');
    }

    public function update(Request $request)
    {
        return back()->with('success', 'Profile updated successfully.');
    }

    public function changePassword()
    {
        return view('change-password');
    }

    public function changePasswordPost(Request $request)
    {
        return back()->with('success', 'Password changed successfully.');
    }
}
