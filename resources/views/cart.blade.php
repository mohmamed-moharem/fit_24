@extends('layouts.base')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb d-flex">
                    <a href="index.html" rel="nofollow">Home</a>
                    <ion-icon name="chevron-forward-outline" style="margin-top: 4px;"></ion-icon> Shop
                    <ion-icon name="chevron-forward-outline" style="margin-top: 4px;"></ion-icon> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $value = 0;
                                    @endphp
                                    @foreach ($cartItems as $item)
                                        <tr>
                                            <td class="image product-thumbnail" style="text-align: center;"><img
                                                    src="{{ asset('assets/imgs') }}/{{ $item->product->image }}"
                                                    alt="cart image" style="display: block; margin: auto;"></td>
                                            <td class="product-des product-name">
                                                <h5 class="product-name">
                                                    <a href="product-details.html">
                                                        {{ $item->product->name }}
                                                    </a>
                                                </h5>
                                            </td>
                                            <td class="price" data-title="Price">$ <input type="text" name=""
                                                    class="item-price" value=" {{ $item->product->regular_price }} "
                                                    style="display: inline; border: none; width: 50px; padding: 0;"
                                                    id="">
                                            </td>
                                            <td class="text-center" ata-title="Stock">
                                                <input type="number" value="{{ $item->qty }}" class="item-qty"
                                                    id="item-qty"
                                                    style="width: 65px; margin: auto; padding: 15px 7px 15px 15px; text-align: center;">
                                            </td>
                                            @php
                                                $subTotal = $item->qty * $item->product->regular_price;
                                            @endphp
                                            <td class="text-right d-flex justify-content-center" data-title="Cart"
                                                style="padding-top: 25px;">$
                                                <input type="number" class="item-total"
                                                    style="width: 30px; padding: 0; border: none;"
                                                    value="{{ $subTotal }}">
                                            </td>
                                            <td class="action" data-title="Remove">
                                                <form action=" {{ route('cart.remove', $item->id) }} " method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        style="margin: auto; color: #000; background: none; border: none;">X</button>
                                                </form>
                                            </td>
                                        </tr>

                                        @php
                                            $value = $value + $subTotal;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <form action=" {{ route('cart.clear', Auth::user()->id) }} " method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-muted"
                                                    style="margin-left: auto; border: none; background: none;"> <i
                                                        class="fi-rs-cross-small"></i>
                                                    Clear
                                                    Cart</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="cart-action text-end">
                            <a class="btn " href=" {{ route('shop.index') }} "><i
                                    class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">
                            <div class="col-lg-6 col-md-12">
                                <form class="contact-form-style text-center" id="contact-form"
                                    action=" {{ route('order.store') }} " method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20">
                                                <input name="name" class="d-block p-2" placeholder="Recever Name"
                                                    type="text" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20">
                                                <input name="address" class="d-block p-2" placeholder="Recever Address"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="input-style mb-20">
                                                <input name="phone" class="d-block p-2" placeholder="Recever Phone"
                                                    type="tel">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <input type="submit" class="submit submit-auto-width"
                                                value="Proceed To CheckOut">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Cart Totals</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">Cart Subtotal</td>
                                                    <td class="cart_total_amount"><span
                                                            class="font-lg fw-900 text-brand">${{ $value }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Total</td>
                                                    <td class="cart_total_amount"><strong><span
                                                                class="font-xl fw-900 text-brand">${{ $value }}</span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection


