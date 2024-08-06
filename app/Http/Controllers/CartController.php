<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        $cartItems = Cart::getContent();
        return view('client.cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric|min:1',
            
        ]);
        
        // Add item to the cart
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'img' => $request->image
            ]
        ]);
        
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function removeFromCart($id)
    {
        Cart::remove($id);

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

    public function updateCart(Request $request)
    {
        Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ],
        ]);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }
}
