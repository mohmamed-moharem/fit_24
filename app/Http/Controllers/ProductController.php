<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\StoreRequest;
use App\Http\Requests\product\UpdateRequest;
use App\Models\Categore;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->get();
        return view('products.index', ['products' => $products]);
    }

    public function create(): View
    {
        $category = Categore::latest()->get();
        return view('products.create', ['categorys' => $category]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $request->validated();
        $name = $request->file('image')->getClientOriginalName();
        $final_name = $name;
        $request->image->move(public_path("assets/imgs"), $final_name);
        // foreach ($request->file('images') as $image) {
        //     $imageName = time().".".$image->extension();
        //     $imageNames[] = $imageName;
        // }

        // dd($imageNames);

        Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'short_description' => $request->short_description,
            'desctiption' => $request->description,
            'regular_price' => $request->ragulare_price,
            'sale_price' => $request->sale_price,
            'SKU' => $request->sku,
            'stock_status' => $request->stoce_status,
            'featured' => $request->featured,
            'quantity' => $request->quantity,
            'image' => $final_name,
            'images' => $request->images,
            'categore_id' => $request->category_id,
        ]);
        return to_route('admin.product.index');
    }

    public function edit(Product $product): View
    {
        $category = Categore::latest()->get();
        return view('products.edit', ['product' => $product, 'categorys' => $category]);
    }

    public function update(UpdateRequest $request, Product $product): RedirectResponse
    {
        $request->validated();

        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'short_description' => $request->short_description,
            'desctiption' => $request->description,
            'regular_price' => $request->ragulare_price,
            'sale_price' => $request->sale_price,
            'SKU' => $request->sku,
            'stock_status' => $request->stoce_status,
            'featured' => $request->featured,
            'quantity' => $request->quantity,
            'image' => $request->image,
            'images' => $request->images,
            'categore_id' => $request->category_id,
        ]);

        return to_route('admin.product.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return to_route('admin.product.index');
    }

    public function restore($product): RedirectResponse
    {
        $product = Product::withTrashed()->find($product);
        $product->restore();
        return to_route('admin.product.index');
    }
}
