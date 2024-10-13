<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return view('client.checkout', compact('cart', 'total'));
    }

    public function processCheckout(Request $request)
    {
        session()->forget('cart');

        return redirect()->route('successPage')->with('success', 'Đặt hàng thành công!');
    }
}