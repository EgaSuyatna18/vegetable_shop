<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Account;
use App\Models\Item;

class PageController extends Controller
{
    function index() {
        return view('pages.index', ['title' => 'Index']);
    }

    function register() {
        return view('pages.register', ['title' => 'Register']);
    }
    
    function login() {
        return view('pages.login', ['title' => 'Login']);
    }

    function home() {
        return view('pages.home', [
            'title' => 'Home',
            'items' => Item::paginate(10)
        ]);
    }

    function profile() {
        return view('pages.profile', ['title' => 'Profile']);
    }

    function account() {
        return view('pages.account', [
            'title' => 'Account',
            'accounts' => Account::with('role')->get()
        ]);
    }

    function itemDetail(Item $item) {
        return view('pages.item_detail', [
            'title' => $item->item_name,
            'item' => $item
        ]);
    }

    function successLogout() {
        return view('pages.success_logout', ['title' => 'Success Logout']);
    }

}
