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
                <h2>Orders</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Address</td>
                        <td>Phone</td>
                        <td>Status</td>
                        <td>Product Name</td>
                        <td>Product Image</td>
                        <td>Price</td>
                        <td>
                            Chang Order
                        </td>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($orders as $order)
                    <tr>
                        <td> {{ $loop->index + 1 }} </td>
                        <td> {{ $order->name }} </td>
                        <td> {{ $order->rec_address }} </td>
                        <td> {{ $order->phone }} </td>
                        <td>
                            @if ($order->status == 'in progress')
                            <span class="status delivered"> {{ $order->status }} </span>
                            @elseif ($order->status == 'Delivered')
                            <span class="status delivered"> {{ $order->status }} </span>
                            @elseif ($order->status == 'Return')
                            <span class="status return"> {{ $order->status }} </span>
                            @else
                            <span class="status pending"> {{ $order->status }} </span>
                            @endif
                        </td>
                        <td> {{ $order->products->name }} </td>
                        <td><img src="{{ asset('assets/imgs/products') }}/{{ $order->products->image }}" alt=""></td>
                        <td>{{$order->products->regular_price}}</td>
                        <td>
                            <a href=" {{ route('order.deleverd', $order->id) }} " style="text-decoration: none; display: block;" class="status delivered">Delivered</a>
                            <a href=" {{ route('order.pending', $order->id) }}" style="text-decoration: none; display: block; margin-top: 3px; margin-bottom: 3px;" class="status pending">Pending</a>
                            <a href=" {{ route('order.return', $order->id) }}" style="text-decoration: none; display: block;" class="status return">Return</a>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection