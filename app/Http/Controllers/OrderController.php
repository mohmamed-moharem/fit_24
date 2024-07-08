<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Categore;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id', $user_id)->get();

        foreach ($cart as $carts) {
            Order::create([
                'name' => $request->name,
                'rec_address' => $request->address,
                'phone' => $request->phone,
                'status' => 'in progress',
                'user_id' => $carts->user_id,
                'product_id' => $carts->product_id
            ]);
            $carts->delete();
        }
        return to_route('shop.index');
    }

    public function index(): View
    {
        $orders = Order::latest()->get();
        if (Auth::hasUser()) {
            $cart = Cart::where('user_id', Auth::user()->id)->latest()->get()->count();
            return view('orders.index', ['orders' => $orders, 'cart' => $cart,]);
        }
        // $categoress = Categore::orderBy("name", "ASC")->get()->take(4);

        return view('orders.index', ['orders' => $orders]);
    }

    public function delivered(Order $order): RedirectResponse
    {
        $order->update([
            'status' => 'Delivered',
        ]);
        return to_route('order.index');
    }

    public function pending(Order $order): RedirectResponse
    {
        $order->update([
            'status' => 'Pending',
        ]);
        return to_route('order.index');
    }

    public function return(Order $order): RedirectResponse
    {
        $order->update([
            'status' => 'Return',
        ]);
        return to_route('order.index');
    }
}
