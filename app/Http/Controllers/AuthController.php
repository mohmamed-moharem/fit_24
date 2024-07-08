<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Categore;
use App\Mail\welcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class authController extends Controller
{
    public function register()
    {
        $categoress = Categore::orderBy("name", "ASC")->get()->take(4);
        if (Auth::hasUser()) {
            $cart = Cart::where('user_id', Auth::user()->id)->latest()->get()->count();
            return view('auth.register', ['categoress' => $categoress, 'cart' => $cart]);
        }


        return view('auth.register', ['categoress' => $categoress]);
    }

    public function store()
    {

        //  validate the user info
        $validated = request()->validate(
            [
                'name' => 'required|min:3|max:40',
                'email' => 'required|email|unique:users,email',
                'utype' => 'required',
                'password' => 'required|min:8'
            ]
        );

        //  create the user
        $user = User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'utype' => $validated['utype'],
                'password' => Hash::make($validated['password'])
            ]
        );

        // sending a email

        // Mail::to($user->email)->send(new welcomeEmail($user));

        // redirecte the user
        return to_route('app.index');
    }

    public function login()
    {
        $categoress = Categore::orderBy("name", "ASC")->get()->take(4);
        if (Auth::hasUser()) {

            if (Auth::hasUser()) {
                $cart = Cart::where('user_id', Auth::user()->id)->latest()->get()->count();
                return view('auth.login', ['categoress' => $categoress, 'cart' => $cart]);
            }
            return view('auth.login', ['categoress' => $categoress]);
        }



        return view('auth.login', ['categoress' => $categoress]);
    }

    public function authenticate()
    {
        //  validate the user info
        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]
        );

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            return to_route('app.index');
        }

        // redirecte the user
        return redirect()->route('login')->withErrors(
            [
                'email', 'No matching user found with the porvider email and password'
            ]
        );
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('app.index');
    }
}
