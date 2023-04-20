<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    function deleteAccount($id) {
        Account::where('id', $id)->delete();
        return redirect('/account');
    }

    function updateRole($id) {
        return view('pages.update_role', [
            'title' => 'Update Role',
            'account' => Account::where('id', $id)->first()
        ]);
    }

    function updateRoleProcess() {
        $validated = Request()->validate([
            'role_id' => 'required|in:1,2'
        ]);
        Account::where('id', Request()->input('id'))->update($validated);
        return redirect('/account');
    }
}
