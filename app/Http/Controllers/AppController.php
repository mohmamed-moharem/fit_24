<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Baner;
use App\Models\Product;
use App\Models\Categore;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->get();
        $categores = Categore::orderBy("name", "ASC")->get();
        $categoress = Categore::orderBy("name", "ASC")->get()->take(4);
        $narrivals = Product::latest()->get()->take(5);
        $newproducts = Product::latest()->get()->take(4);
        $tranding = Product::orderBy('regular_price', 'DESC')->get()->take(4);
        $nproducts = Product::latest()->get()->take(16);
        $baners = Baner::latest()->get();
        if (Auth::hasUser()) {
            $cart = Cart::where('user_id', Auth::user()->id)->latest()->get()->count();
            return view('index', [
                'baners' => $baners,
                'categores' => $categores,
                'narrivals' => $narrivals,
                'newproducts' => $newproducts,
                'tranding' => $tranding,
                'nproducts' => $nproducts,
                'categoress' => $categoress,
                'cart' => $cart,
            ]);
        }
        if(request()->has('search')) {
            $products = $products->where('name', 'like', '%' . request()->get('search', '') . '%');
            return view('shop', ['products' => $products]);
        }


        return view('index', [
            'baners' => $baners,
            'categores' => $categores,
            'narrivals' => $narrivals,
            'newproducts' => $newproducts,
            'tranding' => $tranding,
            'nproducts' => $nproducts,
            'categoress' => $categoress,
        ]);
    }

}
