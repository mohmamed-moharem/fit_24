<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoty\StoreRequest;
use App\Http\Requests\categoty\UpdateRequest;
use App\Models\Categore;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categores = Categore::latest()->get();
        return view(
            'categores.index',
            [
                'categores' => $categores
            ]
        );
    }

    public function create(): View
    {
        return view('categores.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        // $final_name = "$name.".$request->image->extension();

        $request->validated();
        $name = $request->file('image')->getClientOriginalName();
        $final_name = $name;
        $request->image->move(public_path("assets/imgs"), $final_name);
        Categore::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $final_name,
        ]);

        return to_route('admin.categores.index');
    }

    public function show(Categore $categore): View
    {
        $categore = $categore->load('Products');
        return view('categores.show', ['categore' => $categore]);
    }

    public function edit(Categore $categore): View
    {
        return view('categores.edit', ['categore' => $categore]);
    }

    public function update(UpdateRequest $request, Categore $categore): RedirectResponse
    {
        $request->validated();

        $categore->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $request->image
        ]);

        return to_route('admin.categores.index');
    }

    public function destroy(Categore $categore): RedirectResponse
    {
        $categore->delete();
        return to_route('admin.categores.index');
    }

    public function restore($categore): RedirectResponse
    {
        $categore = Categore::withTrashed()->find($categore);
        $categore->restore();
        return to_route('admin.categores.index');
    }
}
