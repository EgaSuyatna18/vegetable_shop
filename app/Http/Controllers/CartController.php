<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;

class CartController extends Controller
{
    function buyItem(Item $item) {
        if(!session()->has('cart')) {
            session()->put('cart', []);
        }
        if(!in_array($item, session()->get('cart'))) {
            session()->push('cart', $item);
        }
        return redirect('/cart');
    }

    function cart() {
        return view('pages.cart', ['title' => 'Cart']);
    }

    function deleteCart($key) {
        session()->forget('cart.' . $key);
        return redirect('/cart');
    }

    function check_out() {
        foreach(session()->get('cart') as $item) {
            Order::create([
                'account_id' => auth()->user()->id,
                'item_id' => $item->id,
                'price' => $item->price
            ]);
            Item::where('id', $item->id)->delete();
        }
        session()->forget('cart');
        return redirect('/success');
    }

    function success() {
        return view('pages.success', ['title' => 'Success']);
    }
}
