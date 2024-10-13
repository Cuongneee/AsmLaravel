<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $shoe = Shoe::find($id);
        $quantity = $request->input('quantity', 1);

        // Lấy giỏ hàng hiện tại từ session
        $cart = session()->get('cart', []);

        // Nếu sản phẩm đã có trong giỏ hàng thì tăng số lượng
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            // Nếu chưa có thì thêm sản phẩm vào giỏ hàng
            $cart[$id] = [
                "shoe_name" => $shoe->shoe_name,
                "quantity" => $quantity,
                "price" => $shoe->price,
                "thumbnail" => $shoe->thumbnail
            ];
        }

        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);
        return redirect()->back()->with('message', 'Sản phẩm đã được thêm vào giỏ hàng✅');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('client.cart', compact('cart'));
    }

    public function updateCart(Request $request, $id)
{
    $cart = session()->get('cart', []);
    if(isset($cart[$id])) {
        $cart[$id]['quantity'] = max(1, (int) $request->quantity);
        session()->put('cart', $cart);
    }
    return redirect()->back();
}

public function removeCart($id)
{
    $cart = session()->get('cart', []);
    if(isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }
    return redirect()->back();
}


}