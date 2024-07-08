<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Review;
use App\Models\product;
use App\Models\Categore;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request): View
    {
        $page = $request->query("page");
        $size = $request->query("size");

        if (!$page)
            $page = 1;

        if (!$size)
            $size = 16;

        $order = $request->query("order");
        if (!$order)
            $order = -1;
        $o_column = "";
        $o_order = "";

        switch ($order) {
            case 1:
                $o_column = "created_at";
                $o_order = "DESC";
                break;
            case 2:
                $o_column = "created_at";
                $o_order = "ASC";
                break;
            case 3:
                $o_column = "regular_price";
                $o_order = "ASC";
                break;
            case 4:
                $o_column = "regular_price";
                $o_order = "DESC";
                break;
            default:
                $o_column = "id";
                $o_order = "DESC";
        }

        $categores = Categore::orderBy("name", "ASC")->get();
        $q_categories = $request->query("categories");

        $prange = $request->query("prange");
        if (!$prange)
            $prange = "0, 500";
        $from = explode(",", $prange)[0];
        $to = explode(",", $prange)[1];

        $products = product::where(function ($query) use ($q_categories) {
            $query->whereIn('categore_id', explode(',', $q_categories))->orWhereRaw("'" . $q_categories . "'=''");
        })
            ->whereBetween('regular_price', array($from, $to))
            ->orderBy('created_at', 'DESC')->orderBy($o_column, $o_order)->paginate($size);
        $newproducts = product::latest()->get()->take(3);
        $categoress = Categore::orderBy("name", "ASC")->get()->take(4);
        if (Auth::hasUser()) {
            $cart = Cart::where('user_id', Auth::user()->id)->latest()->get()->count();
            return view('shop', [
                'products' => $products,
                'page' => $page,
                'size' => $size,
                'order' => $order,
                'categores' => $categores,
                'q_categories' => $q_categories,
                'from' => $from,
                'to' => $to,
                'newproducts' => $newproducts,
                'cart' => $cart,
                'categoress' => $categoress,
            ]);
        }

        return view('shop', [
            'products' => $products,
            'page' => $page,
            'size' => $size,
            'order' => $order,
            'categores' => $categores,
            'q_categories' => $q_categories,
            'from' => $from,
            'to' => $to,
            'newproducts' => $newproducts,
            'categoress' => $categoress,
        ]);
    }

    public function productDetails(product $product): View
    {
        $reproducts = product::where('slug', '!=', $product)->inRandomOrder('id')->get()->take(4);
        $newproducts = product::latest()->get()->take(5);
        $categoress = Categore::orderBy("name", "ASC")->get()->take(4);
        $reviews = Review::where('product_id', $product->id)->latest()->get()->count();
        $review = Review::where('product_id', $product->id)->latest()->get();
        if (Auth::hasUser()) {
            $cart = Cart::where('user_id', Auth::user()->id)->latest()->get()->count();
            return view('details', ['product' => $product, 'reproducts' => $reproducts, 'newproducts' => $newproducts, 'cart' => $cart, 'categoress' => $categoress]);
        }

        return view('details', ['product' => $product, 'reproducts' => $reproducts, 'newproducts' => $newproducts, 'categoress' => $categoress, 'reviews' => $reviews, 'review' => $review]);
    }
}
