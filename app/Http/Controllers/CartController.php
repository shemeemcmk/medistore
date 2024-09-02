<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
// use Session;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class CartController extends Controller
{
    // public function addToCart(Request $request)
    // {
    //     $productId = $request->input('product_id');
    //     $quantity = $request->input('quantity');
    //     $product = Product::find($productId);

    //     if(!$product) {
    //         return redirect()->back()->with('error', 'Product not found');
    //     }

        
    //     $cart = session()->get('cart', []);

        
    //     if(isset($cart[$productId])) {
    //         $cart[$productId]['quantity']++;
    //     } else {
    //         $cart[$productId] = [
    //             "name" => $product->name,
    //             "quantity" => $quantity,
    //             "price" => $product->price,
    //             "image" => $product->image
    //         ];
    //     }

    //     session()->put('cart', $cart);

    //     return redirect()->back()->with('success', 'Product added to cart successfully!');
    // }

    // public function removeFromCart($id)
    // {
        
    //     $cart = session()->get('cart');
    //     if(isset($cart[$id])) {
    //         unset($cart[$id]);
    //         session()->put('cart', $cart);
    //     }

    //     return redirect()->route('cart')->with('success', 'Product removed from cart successfully!');
    // }


    public function addToCart(Request $request)
    {
        $user = Auth::user();
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $cart = Cart::where('user_id', $user->id)
                            ->where('product_id', $productId)
                            ->first();

        if ($cart) {
            $cart->quantity += $quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeFromCart($id)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)
                            ->where('product_id', $id)
                            ->first();

        if ($cart) {
            $cart->delete();
        }

        return redirect()->route('cart')->with('success', 'Product removed from cart successfully!');
    }

    // public function showCart()
    // {
    //     $user = Auth::user();
    //     $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

    //     return view('cart', ['cartItems' => $cartItems]);
    // }
    
    
}
