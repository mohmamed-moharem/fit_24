<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Categore;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(): View
    {
        $categoress = Categore::orderBy("name", "ASC")->get()->take(4);

        if (Auth::hasUser()) {
            $cart = Cart::where('user_id', Auth::user()->id)->latest()->get()->count();
            return view('contect', ['cart' => $cart, 'categoress' => $categoress]);
        }
        return view('contect', ['categoress' => $categoress]);
    }

    public function store(Request $request): RedirectResponse
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->telephone,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'unreded',
        ]);
        return to_route('contect.index');
    }

    public function messages(): View
    {
        $messages = Contact::latest()->get();
        return view('messages', ['messages' => $messages]);
    }

    public function update(Contact $message): RedirectResponse
    {
        $message->update([
            'status' => 'reded'
        ]);

        return to_route('admin.masseges.index');
    }
}
