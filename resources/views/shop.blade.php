@extends('layouts.base')
@section('content')
    <section>
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb d-flex">
                    <a href="index.html" rel="nofollow">Home</a>
                    <ion-icon name="chevron-forward-outline" style="margin-top: 4px;"></ion-icon> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> {{ __('We found') }} <strong class="text-brand"> {{ $products->count() }} </strong>
                                    {{ __('items for you!') }}
                                </p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-product-area">
                                    <div class="sort-by-cover mr-10">
                                        <div class="dropdown sort-by-product-wrap">
                                            <select class="form-select " name="orderby" id="orderby">
                                                <option value="-1" {{ $order == -1 ? 'selected' : '' }}>Default</option>
                                                <option value="1" {{ $order == 1 ? 'selected' : '' }}>Date, New To Old
                                                </option>
                                                <option value="2" {{ $order == 2 ? 'selected' : '' }}>Date, Old To New
                                                </option>
                                                <option value="3" {{ $order == 3 ? 'selected' : '' }}>Price, Low To
                                                    High</option>
                                                <option value="4" {{ $order == 4 ? 'selected' : '' }}>Price, High To
                                                    Low</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="sort-by-cover">
                                        <div class="sort-by-product-wrap">
                                            <select class="form-select" name="size" id="pagesize">
                                                <option value="16" {{ $size == 16 ? 'selected' : '' }}>16 Products Per
                                                    Page</option>
                                                <option value="24" {{ $size == 24 ? 'selected' : '' }}>24 Products
                                                    PerPage</option>
                                                <option value="52" {{ $size == 52 ? 'selected' : '' }}>52 Products
                                                    PerPage</option>
                                                <option value="100" {{ $size == 100 ? 'selected' : '' }}>100 Products
                                                    PerPage</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-main">
                            <h2 class="title"> {{ __('Products') }} </h2>

                            <div class="product-grid">
                                @foreach ($products as $product)
                                    <div class="showcase">
                                        <div class="showcase-banner">
                                            <a href=" {{ route('shop.details', $product->id) }} ">
                                                <img src="{{ asset('assets/imgs') }}/{{ $product->image }}"
                                                    alt="Mens Winter Leathers Jackets" width="300"
                                                    class="product-img default" />
                                            </a>
                                            <a href=" {{ route('shop.details', $product->id) }} ">
                                                <img src="{{ asset('assets/imgs') }}/{{ $product->image }}"
                                                    alt="Mens Winter Leathers Jackets" width="300"
                                                    class="product-img hover" />
                                            </a>
                                            @if ($product->sale_price)
                                                <p class="showcase-badge">
                                                    {{ round((($product->regular_price - $product->sale_price) / $product->regular_price) * 100) }}
                                                    %
                                                </p>
                                            @endif
                                            <div class="showcase-actions">
                                                <form class="cart" action=" {{ route('cart.add', $product->id) }} "
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        style="padding: 5px; font-size: 22px; background: none; border: none; color: #000;">
                                                        <ion-icon name="bag-add-outline"></ion-icon>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="showcase-content">
                                            <a href="#" class="showcase-category"> {{ $product->category->name }}
                                            </a>

                                            <a href=" {{ route('shop.details', $product->id) }} ">
                                                <h3 class="showcase-title">
                                                    {{ $product->name }}
                                                </h3>
                                            </a>

                                            <div class="product-info">
                                                <div class="product-main-info">
                                                    <div class="showcase-rating">
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star-outline"></ion-icon>
                                                        <ion-icon name="star-outline"></ion-icon>
                                                    </div>

                                                    <div class="price-box">
                                                        @if ($product->sale_price)
                                                            <p class="price">${{ $product->sale_price }}</p>
                                                            <del>${{ $product->regular_price }}</del>
                                                        @else
                                                            <p class="price">${{ $product->regular_price }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <form action=" {{ route('cart.add', $product->id) }} " method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            style="padding: 5px; font-size: 22px; background: none; border: none; color: #000;">
                                                            <ion-icon name="bag-add-outline"></ion-icon>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!--pagination-->
                        {{ $products->withQueryString()->links('pagination.default') }}
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated"> {{ __('Category') }} </h5>
                            <ul class="categories">
                                @foreach ($categores as $categore)
                                    <li>
                                        <input type="checkbox" @if (in_array($categore->id, explode(',', $q_categories))) checked="checked" @endif
                                            id="ct{{ $categore->id }}" name="categories" value="{{ $categore->id }}"
                                            onchange="fillterProductsByCategory(this)">
                                        <label for="input" class="inline"> {{ $categore->name }} </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10"> {{ __('New products') }} </h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>

                            @foreach ($newproducts as $newproduct)
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="{{ asset('assets/imgs') }}/{{ $newproduct->image }}"
                                            alt="#">
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href="product-details.html"> {{ $newproduct->name }} </a></h5>
                                        @if ($newproduct->sale_price)
                                            <span>$ {{ $newproduct->sale_price }} </span>
                                            <span class="old-price">$ {{ $newproduct->regular_price }}
                                            </span>
                                        @else
                                            <span>$ {{ $newproduct->regular_price }} </span>
                                        @endif
                                        <div class="product-rate">
                                            <div class="product-rating" style="width:90%"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
        </section>
    </section>
    <form id="frmFliter" method="GET">
        <input type="hidden" name="page" id="page" value="{{ $page }}" />
        <input type="hidden" name="size" id="size" value="{{ $size }}" />
        <input type="hidden" name="order" id="order" value="{{ $order }}" />
        <input type="hidden" name="categories" id="categories" value="{{ $q_categories }}" />
        <input type="hidden" name="prange" id="prange" value="" />
    </form>
@endsection

@push('scripts')
    <script>
        $(function() {
            $("#pagesize").on("change", function() {
                $("#size").val($("#pagesize option:selected").val());
                $("#frmFliter").submit();
            });

            $("#orderby").on("change", function() {
                $("#order").val($("#orderby option:selected").val());
                $("#frmFliter").submit();
            });

            var $range = $(".amount");
            instance = $range.data("ionRangeSlider");
            instance.update({
                from: {{ $from }},
                to: {{ $to }}
            });

            $("#prange").on("change", function() {
                setInterval(() => {
                    $("#frmFliter").submit();
                }, 1000);
            })
        });

        function fillterProductsByCategory(brand) {
            var categories = "";
            $("input[name='categories']:checked").each(function() {
                if (categories == "") {
                    categories += this.value;
                } else {
                    categories += "," + this.value
                }
            });
            $("#categories").val(categories);
            $("#frmFliter").submit();
        }
    </script>
@endpush
