@extends('layouts.admin')
@section('content')
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <!-- <ion-icon name="menu-outline"></ion-icon> -->
        </div>

        <div class="search">
            <label>
                <input type="text" placeholder="Search here">
                <!-- <ion-icon name="search-outline"></ion-icon> -->
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
                <a href=" {{ route('product.create') }} " class="btn">Add New Product</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Slug</td>
                        <td>Ragulare price</td>
                        <td>sale price</td>
                        <td>SKU</td>
                        <td>stock status</td>
                        <td>image</td>
                        <td>product category</td>
                        <td>actions</td>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td> {{ $loop->index + 1 }} </td>
                            <td> {{ $product->name }} </td>
                            <td> {{ $product->slug }} </td>
                            <td> {{ $product->regular_price }} </td>
                            <td> {{ $product->sale_price }} </td>
                            <td> {{ $product->SKU }} </td>
                            <td> {{ $product->stock_status }} </td>
                            <td><img src="{{ asset('assets/imgs') }}/{{ $product->image }}" alt=""></td>
                            <td> {{ $product->category->name }} </td>
                            <td>
                                <a href=" {{ route('product.edit', $product->id) }} " style="display: block; text-decoration: none; color: #000; margin-bottom: 10px;">Edit</a>
                                <form action=" {{ route('product.destroy', $product->id) }} " style="margin: 0;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" style="background: none; border: none; padding: 0; margin: 0; color: #000;">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <p>No Categores Avaliable</p>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
