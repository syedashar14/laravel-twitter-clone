<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeUserEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function register () {
        return view('auth.register');
    }

    public function store () {
        //You can also create custom validation, Instead of string pass validations as array and pass custom validation rule
        //class in the validation array
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed'
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);
        Mail::to($user->email)->send(new WelcomeUserEmail($user));
        return redirect()->route('dashboard')->with('success', 'User created successfully');
    }

    public function login () {
        return view('auth.login');
    }

    public function authenticate () {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }
        return redirect()->route('login')->withErrors(['email' => 'Email or Password is incorrect']);
    }

    public function logout () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('dashboard')->with('success', 'Logged out successfully');
    }
}
