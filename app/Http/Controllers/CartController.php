<?php
// CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please login to add items to your cart.');
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('cart', compact('cartItems'));
    }

    public function add($id)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to add items to the cart.');
        }

        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('product_id', $id)
                        ->first();

        if ($cartItem) {
            // Update quantity if the item is already in the cart
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Create a new cart item
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => 1,
                'name' => $product->name,
                'image' => $product->image_url,
                'price' => $product->price,
                'description' => $product->description,
                'Availability' => $product->stock_quantity,
            ]);
        }

        return redirect()->route('cart');
    }
}