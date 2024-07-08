<?php

namespace App\Http\Controllers;

use App\Http\Requests\reviews\StoreRequest;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(StoreRequest $request, Product $product): RedirectResponse
    {
        $request->validated();
        Review::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'comment' => $request->comment,
            'ratte' => $request->ratte
        ]);
        return to_route('shop.index');
    }
}
