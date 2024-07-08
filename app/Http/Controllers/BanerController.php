<?php

namespace App\Http\Controllers;

use App\Models\Baner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BanerController extends Controller
{
    public function index(): View
    {
        $baners = Baner::latest()->get();
        return view('settings.baner.baner', ['baners' => $baners]);
    }

    public function create(): View
    {
        return view('settings.baner.create');
    }

    // public function store(Request $request): RedirectResponse
    // {
    //     $name = $request->file('image')->getClientOriginalName();
    //     $final_name = $name;
    //     $request->image->move(public_path("assets/imgs"), $final_name);
    //     Baner::create([
    //         'title' => $request->title,
    //         'description' => $request->desctiption,
    //         'offer' => $request->Value,
    //         'image' => $final_name,
    //     ]);
    //     return to_route('admin.baner.index');
    // }
    public function store(Request $request): RedirectResponse
    {

        $name = $request->file('image')->getClientOriginalName();
        $final_name = $name;
        $request->image->move(public_path("assets/imgs"), $final_name);

        Baner::create([
            'title' => $request->title,
            'desc' => $request->desctiption,
            'value' => $request->Value,
            'image' => $final_name,
        ]);
        return to_route('admin.baner.index');
    }

    public function edit(Baner $baner): View
    {
        return view('settings.baner.edit', ['baner' => $baner]);
    }

    public function update(Request $request, Baner $baner): RedirectResponse
    {
        $baner->update([
            'title' => $request->title,
            'description' => $request->desctiption,
            'offer' => $request->Value
        ]);

        return to_route('admin.baner.index');
    }

    public function destroy(Baner $baner): RedirectResponse
    {
        $baner->delete();
        return to_route('admin.baner.index');
    }
}
