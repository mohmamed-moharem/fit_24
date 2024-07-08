<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::latest()->get();
        return view(
            'user.index',
            [
                'users' => $users,
            ]
        );
    }
}
