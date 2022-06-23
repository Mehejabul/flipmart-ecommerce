<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller{

    public function index()
    {
        $cartdatas = Cart::getContent();
        return view("website.cart.shoping_cart", compact('cartdatas'));

    }

    public function store($slug)
    {
        $cart_product = Product::where('product_status',1)->where('product_slug',$slug)->first();

        Cart::add(array(
            'id' => $cart_product->product_id,
            'name' => $cart_product->product_name,
            'price' => $cart_product->product_discount_price,
            'quantity' => $cart_product->product_quantity,
            'attributes' => [
                'product_image' => $cart_product->product_image,
            ]
        ));
        return redirect()->back();
    }

}
