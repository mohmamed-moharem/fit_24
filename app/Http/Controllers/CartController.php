<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Categore;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    public function index(): View
    {
        $cartItems = Cart::where('user_id', Auth::user()->id)->latest()->get();
        $categoress = Categore::orderBy("name", "ASC")->get()->take(4);


        if(Auth::hasUser()) {
            $cart = Cart::where('user_id', Auth::user()->id)->latest()->get()->count();

        return view('cart', ['cartItems' => $cartItems, 'cart' => $cart, 'categoress' => $categoress]);

        }


        return view('cart', ['cartItems' => $cartItems, 'categoress' => $categoress]);
    }

    public function add($product): RedirectResponse
    {
        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product,
            'qty' => 1,
        ]);
        return to_route('cart.index');
    }

    public function update(Cart $cart, Request $request): RedirectResponse
    {
        $cart->update([
            'qty' => $request->qty,
        ]);
        return to_route('cart.index');
    }

    public function remove(Cart $cart): RedirectResponse
    {
        $cart->delete();
        return to_route('cart.index');
    }

    public function clear(): RedirectResponse
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id', $user_id)->get();
        foreach($cart as $carts) {
            $carts->delete();
        }
        return to_route('cart.index');
    }
}
