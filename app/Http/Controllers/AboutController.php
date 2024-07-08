<?php

namespace App\Http\Controllers;

use App\Http\Requests\about\StoreRequest;
use App\Models\About;
use App\Models\Cart;
use App\Models\Categore;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index(): View
    {

        $categoress = Categore::orderBy("name", "ASC")->get()->take(4);
        $reviews = About::latest()->get()->take(6);
        if(Auth::hasUser()) {
            $cart = Cart::where('user_id', Auth::user()->id)->latest()->get()->count();
        return view('about', ['cart' => $cart, 'categoress' => $categoress, 'reviews' => $reviews]);

        }

        return view('about', ['categoress' => $categoress, 'reviews' => $reviews]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $request->validated();

        About::create([
            'user_id' => Auth::user()->id,
            'content' => $request->review,
        ]);
        return to_route('about.index');
    }
}
