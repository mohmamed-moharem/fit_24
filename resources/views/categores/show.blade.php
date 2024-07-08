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
                <h2>Categores show</h2>
                <a href=" {{ route('admin.categores.index') }} " class="btn">Categores Home Page</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Categore Name</td>
                        <td>Slug</td>
                        <td>Image</td>
                        <td>Related Products</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td> {{ $categore->id }} </td>
                        <td> {{ $categore->name }} </td>
                        <td> {{ $categore->slug }} </td>
                        <td><img src="{{ asset('assets/imgs/products') }}/{{ $categore->image }}" alt=""></td>
                        <td> {{ $categore->products->count() }} </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="recentOrders">
            <table>
                <thead>
                    <tr>
                        <td>id</td>
                        <td>name</td>
                        <td>regular_price</td>
                        <td>sale_price</td>
                        <td>SKU</td>
                        <td>stock_status</td>
                        <td>quantity</td>
                        <td>image</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categore->products as $product)
                    <tr>
                        <td> {{ $loop->index + 1 }} </td>
                        <td> {{ $product->name }} </td>
                        <td> {{ $product->regular_price }} </td>
                        <td> {{ $product->sale_price }} </td>
                        <td> {{ $product->SKU }} </td>
                        <td> {{ $product->stock_status }} </td>
                        <td> {{ $product->quantity }} </td>
                        <td><img src="{{ asset('assets/imgs/products') }}/{{ $product->image }}" alt=""></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- ================= New Customers ================ -->
        {{-- <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customers</h2>
                </div>

                <table>
                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>David <br> <span>Italy</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Amit <br> <span>India</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>David <br> <span>Italy</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Amit <br> <span>India</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>David <br> <span>Italy</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Amit <br> <span>India</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>David <br> <span>Italy</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Amit <br> <span>India</span></h4>
                        </td>
                    </tr>
                </table>
            </div> --}}
    </div>
</div>
@endsection