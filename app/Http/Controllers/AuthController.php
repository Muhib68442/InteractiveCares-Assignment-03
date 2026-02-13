<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\SessionAuth;

class AuthController extends Controller
{


    public function register()
    {
        if(session()->has('user_id')){
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    public function registerPost(UserRequest $request)
    {
        // dd("Here");

        $data = $request->validated();

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->route('login')->with('success', 'User registered successfully. Please login.');
    }

    public function login()
    {
        if(session()->has('user_id')){
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }


    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = DB::table('users')->where('email', $request->email)->first();
        
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                session(['user_id' => $user->id, 'user_name' => $user->name, 'user_email' => $user->email]);
                return redirect()->route('dashboard')->with('success', 'Welcome back, ' . $user->name);
            }
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');
    }


    // DASHBOARD 
    public function dashboard()
    {
        return view('dashboard');
    }

    // LOGOUT
    public function logout()
    {
        session()->forget(['user_id', 'user_name']);
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
