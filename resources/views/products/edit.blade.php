@extends('layouts.admin')
@section('content')
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>

        <div class="search">
            <label>
                <input type="text" placeholder="Search here">
                <ion-icon name="search-outline"></ion-icon>
            </label>
        </div>

        <div class="user">
            <img src="assets/imgs/customer01.jpg" alt="">
        </div>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Products</h2>
                <a href=" {{ route('admin.product.index') }} " class="btn">Products Home Page</a>
            </div>

            <form action=" {{ route('product.update', $product->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-control">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter Product Name" value=" {{ $product->name }} ">
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" placeholder="Slug" value=" {{ $product->slug }} ">
                    @error('slug')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="short-desc">Short Description</label>
                    <textarea name="short_description" id="short-desc" placeholder="Short Description"> {{ $product->short_description }} </textarea>
                    @error('short_description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="desc">Description</label>
                    <textarea name="description" id="desc" placeholder="Description"> {{ $product->desctiption }} </textarea>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="ragulare-price">Ragulare Price</label>
                    @php
                    $price = (int)$product->regular_price
                    @endphp
                    <input type="number" id="ragulare-price" name="ragulare_price" placeholder="Ragulare Price" value="{{$price}}">
                    @error('ragulare_price')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="sale-price">Sale Price</label>
                    @php
                    $sale_price = (int)$product->sale_price
                    @endphp
                    <input type="number" id="sale-price" name="sale_price" placeholder="Sale Price" value="{{$sale_price}}">
                    @error('sale_price')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="sku">SKU</label>
                    <input type="text" id="sku" name="sku" placeholder="SKU" value=" {{ $product->SKU }} ">
                    @error('sku')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="stock-status">Stock Status</label>
                    <select name="stoce_status" id="stock-status">
                        @if($product->stock_status == 'instock')
                        <option value="instock" selected>instock</option>
                        @else
                        <option value="outofstock" selected>out of stock</option>
                        @endif
                    </select>
                    @error('stoce_status')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="featured">Featured</label>
                    <input type="text" id="featured" name="featured" placeholder="Featured" value=" {{ $product->featured }} ">
                    @error('featured')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="quantity">Quantity</label>
                    @php
                    $qty = (int)$product->quantity
                    @endphp
                    <input type="number" name="quantity" id="quantity" placeholder="Quantity" value="{{$qty}}">
                    @error('quantity')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <input type="file" name="image" id="image">
                    @error('image')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <input type="file" name="images" id="images">
                    @error('images')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <select name="category_id" id="category-id">
                        @foreach($categorys as $category)
                        @if($product->category->id)
                        <option value=" {{ $category->id }} " selected> {{ $category->name }} </option>
                        @else
                        <option value=" {{ $category->id }} "> {{ $category->name }} </option>
                        @endif
                        @endforeach
                    </select>
                    @error('category_id')
                    <span>{{$message}}</span>
                    @enderror
                </div>


                <div class="form-control">
                    <button type="submit">update</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection