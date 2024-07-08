<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(): View
    {
        $orders = Order::latest()->get()->take(10);
        return view('admin.index', ['orders' => $orders]);
    }

    public function settings(): View
    {
        return view('settings.index');
    }
}
