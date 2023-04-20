<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Account;

class ProfileController extends Controller
{
    function dpchange() {
        $validated = Request()->validate([
            'display_picture_link' => 'required|image|mimes:jpg,png,jpeg'
        ]);
        Storage::delete(auth()->user()->display_picture_link);
        $validated['display_picture_link'] = Request()->file('display_picture_link')->store('display_picture');
        Account::where('id', auth()->user()->id)->update([
            'display_picture_link' => $validated['display_picture_link']
        ]);
        return redirect('/profile');
    }

    function edit_profile() {
        $validated = Request()->validate([
            'first_name' => 'required|alpha:ascii|max:25',
            'last_name' => 'required|alpha:ascii|max:25',
            'email' => 'required|email|unique:accounts,email',
            'role_id' => 'required|in:1,2',
            'gender_id' => 'required',
            'password' => 'required|min:8|regex:/\d/',
            'confirm_password' => 'required|same:password'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        unset($validated['confirm_password']);
        Account::where('id', auth()->user()->id)->update($validated);
        return redirect('/profile/success');
    }

    function profile_success() {
        return view('pages.saved', ['title' => 'Saved']);
    }
}
