<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function index()
    {
        $products = Auth::user()->cart_products()->get();
        $price = 0;

        foreach ($products as $product) {
            $price += $product->price * $product->pivot->quantity;
        }
        return view('home.cart', compact('products', 'price'));
    }

    public function addToCart($id)
    {
        if (!Auth::check()) {
            session()->put('error', 'Please login too add in cart.');
            return redirect()->route('home');
        }

        $cart = new Cart();
        $products = Auth::user()->cart_products()->get();

        foreach ($products as $product) {
            if ($product->pivot->product_id == $id) {
                session()->put(["error" => "Product is already in cart"]);
                return redirect()->route('home');
            }
        }

        $cart->user_id = Auth::user()->id;
        $cart->product_id = $id;
        $cart->quantity = 1;

        $save = $cart->save();

        if ($save) {
            session()->put(["success" => "Product is added in cart"]);
        }

        return redirect()->route('home');
    }

    public function deleteFromCart($id)
    {
        Auth::user()->cart_products()->detach($id);

        session()->put(["success" => "Product is deleted from cart"]);

        return redirect()->route('cart');
    }

    public function updateCart(Request $request, $id)
    {
        Auth::user()->cart_products()->updateExistingPivot($id, ['quantity' => $request->quantity]);

        session()->put(["success" => "Cart Updated"]);

        return redirect()->route('cart');
    }

    public function buyProducts()
    {$user = Auth::user();

        $products = $user->cart_products()->get();

        foreach ($products as $product) {

            if ($product->pivot->quantity > $product->quantity) {
                session()->put("error", "Not enough " . $product->title . ".");
                return redirect()->route('cart');
            }
        }

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->save();

        foreach ($products as $product) {
            $order = new Order();
            $order->transaction_id = $transaction->id;
            $order->product_id = $product->id;
            $order->quantity = $product->pivot->quantity;
            $order->save();

            $product_update = Product::find($product->id);
            $product_update->quantity = $product_update->quantity - $product->pivot->quantity;
            $product_update->save();
        }

        $user->cart_products()->detach();

        session()->put('success', 'You successfully purchased products.');

        return redirect()->route('cart');
    }
}
