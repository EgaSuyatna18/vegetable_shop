<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register(Request $request) {
        $validated = Request()->validate([
            'first_name' => 'required|alpha:ascii|max:25',
            'last_name' => 'required|alpha:ascii|max:25',
            'email' => 'required|email|unique:accounts,email',
            'role_id' => 'required|in:1,2',
            'gender_id' => 'required',
            'display_picture_link' => 'required|image|mimes:jpg,png,jpeg',
            'password' => 'required|min:8|regex:/\d/',
            'confirm_password' => 'required|same:password'
        ]);

        $credentials['email'] = $validated['email'];
        $credentials['password'] = $validated['password'];

        $validated['password'] = Hash::make($validated['password']);
        $validated['display_picture_link'] = Request()->file('display_picture_link')->store('display_picture');
        unset($validated['confirm_password']);
        Account::create($validated);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/home');
        }
 
        return back()->withErrors([
            'email' => 'Wrong Email/Password. Please Check Again',
        ])->onlyInput('email');
    }

    function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/logout/success');
    }
}
