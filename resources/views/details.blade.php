@extends('layouts.base')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb d-flex">
                    <a href="index.html" rel="nofollow">Home</a>
                    <ion-icon name="chevron-forward-outline" style="margin-top: 4px;"></ion-icon> Fashion
                    <ion-icon name="chevron-forward-outline" style="margin-top: 4px;"></ion-icon> Abstract Print Patchwork
                    Dress
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ asset('assets/imgs') }}/{{ $product->image }}"
                                                    alt="product image">
                                            </figure>

                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            @if ($product->images)
                                                @php
                                                    $images = explode(',', $product->images);
                                                @endphp
                                                @foreach ($images as $image)
                                                    <div>
                                                        <img src="{{ asset('assets/imgs') }}/{{ $product->image }}"
                                                            alt="product image">
                                                    </div>
                                                @endforeach
                                            @endif
                                            {{-- <div><img src="assets/imgs/shop/thumbnail-4.jpg" alt="product image"></div>
                                            <div><img src="assets/imgs/shop/thumbnail-5.jpg" alt="product image"></div>
                                            <div><img src="assets/imgs/shop/thumbnail-6.jpg" alt="product image"></div>
                                            <div><img src="assets/imgs/shop/thumbnail-7.jpg" alt="product image"></div>
                                            <div><img src="assets/imgs/shop/thumbnail-8.jpg" alt="product image"></div>
                                            <div><img src="assets/imgs/shop/thumbnail-9.jpg" alt="product image"></div> --}}
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                    <!-- <div class="social-icons single-share">
                                                    <ul class="text-grey-5 d-inline-block">
                                                        <li><strong class="mr-10">Share this:</strong></li>
                                                        <li class="social-facebook"><a href="#"><img
                                                                    src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                                                        </li>
                                                        <li class="social-twitter"> <a href="#"><img
                                                                    src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                                                        </li>
                                                        <li class="social-instagram"><a href="#"><img
                                                                    src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                                                        </li>
                                                        <li class="social-linkedin"><a href="#"><img
                                                                    src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                                                        </li>
                                                    </ul>
                                                </div> -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail"> {{ $product->name }} </h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span><a href="shop.html">
                                                        {{ $product->category->name }} </a></span>
                                            </div>
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> ( {{ $reviews }} reviews)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">

                                            <div class="product-price primary-color float-left">
                                                @if ($product->sale_price)
                                                    <ins><span class="text-brand">$ {{ $product->sale_price }} </span></ins>
                                                    <ins><span class="old-price font-md ml-15">$
                                                            {{ $product->regular_price }} </span></ins>
                                                    <span class="save-price  font-md color3 ml-15">
                                                        {{ round((($product->regular_price - $product->sale_price) / $product->regular_price) * 100) }}%
                                                        Off</span>
                                                @else
                                                    <ins><span class="text-brand">$ {{ $product->regular_price }}
                                                        </span></ins>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p> {{ $product->short_description }} </p>
                                        </div>
                                        <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera
                                                    Brand Warranty</li>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return
                                                    Policy</li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available
                                                </li>
                                            </ul>
                                        </div>
                                        {{-- <div class="attr-detail attr-color mb-15">
                                            <strong class="mr-10">Color</strong>
                                            <ul class="list-filter color-filter">
                                                <li><a href="#" data-color="Red"><span
                                                            class="product-color-red"></span></a></li>
                                                <li><a href="#" data-color="Yellow"><span
                                                            class="product-color-yellow"></span></a></li>
                                                <li class="active"><a href="#" data-color="White"><span
                                                            class="product-color-white"></span></a></li>
                                                <li><a href="#" data-color="Orange"><span
                                                            class="product-color-orange"></span></a></li>
                                                <li><a href="#" data-color="Cyan"><span
                                                            class="product-color-cyan"></span></a></li>
                                                <li><a href="#" data-color="Green"><span
                                                            class="product-color-green"></span></a></li>
                                                <li><a href="#" data-color="Purple"><span
                                                            class="product-color-purple"></span></a></li>
                                            </ul>
                                        </div>
                                        <div class="attr-detail attr-size">
                                            <strong class="mr-10">Size</strong>
                                            <ul class="list-filter size-filter font-small">
                                                <li><a href="#">S</a></li>
                                                <li class="active"><a href="#">M</a></li>
                                                <li><a href="#">L</a></li>
                                                <li><a href="#">XL</a></li>
                                                <li><a href="#">XXL</a></li>
                                            </ul>
                                        </div> --}}
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down"><i
                                                        class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">1</span>
                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            <div class="product-extra-link2">
                                                <form action=" {{ route('cart.add', $product->id) }} " method="POST">
                                                    @csrf
                                                    <button type="submit" class="button button-add-to-cart" id="add">
                                                        {{ __('Add to cart') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- <ul class="product-meta font-xs color-grey mt-50">
                                                        <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                                        <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a
                                                                href="#" rel="tag">Women</a>, <a href="#"
                                                                rel="tag">Dress</a> </li>
                                                        <li>Availability:<span class="in-stock text-success ml-5">
                                                                @if ($product->stock_status == 'instock')
    {{ __('in stock') }}
@else
    {{ __('out of stock') }}
    @endif
                                                            </span></li>
                                                    </ul> -->
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                            href="#Description">Description</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                                    <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                                        href="#Additional-info">Additional info</a>
                                                </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab"
                                            href="#Reviews">Reviews ({{ $reviews }})</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            <p>
                                                {{ $product->desctiption }}
                                            </p>
                                            <!-- <ul class="product-more-infor mt-30">
                                                            <li><span>Type Of Packing</span> Bottle</li>
                                                            <li><span>Color</span> Green, Pink, Powder Blue, Purple</li>
                                                            <li><span>Quantity Per Case</span> 100ml</li>
                                                            <li><span>Ethyl Alcohol</span> 70%</li>
                                                            <li><span>Piece In One</span> Carton</li>
                                                        </ul> -->
                                            <!-- <hr class="wp-block-separator is-style-dots">
                                                        <p>Laconic overheard dear woodchuck wow this outrageously taut beaver hey
                                                            hello far meadowlark imitatively egregiously hugged that yikes minimally
                                                            unanimous pouted flirtatiously as beaver beheld above forward
                                                            energetic across this jeepers beneficently cockily less a the raucously
                                                            that magic upheld far so the this where crud then below after jeez
                                                            enchanting drunkenly more much wow callously irrespective limpet.</p>
                                                        <h4 class="mt-30">Packaging & Delivery</h4>
                                                        <hr class="wp-block-separator is-style-wide">
                                                        <p>Less lion goodness that euphemistically robin expeditiously bluebird
                                                            smugly scratched far while thus cackled sheepishly rigid after due one
                                                            assenting regarding censorious while occasional or this more crane
                                                            went more as this less much amid overhung anathematic because much held
                                                            one exuberantly sheep goodness so where rat wry well concomitantly.
                                                        </p>
                                                        <p>Scallop or far crud plain remarkably far by thus far iguana lewd
                                                            precociously and and less rattlesnake contrary caustic wow this near
                                                            alas and next and pled the yikes articulate about as less cackled
                                                            dalmatian
                                                            in much less well jeering for the thanks blindly sentimental whimpered
                                                            less across objectively fanciful grimaced wildly some wow and rose
                                                            jeepers outgrew lugubrious luridly irrationally attractively
                                                            dachshund.
                                                        </p> -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Additional-info">
                                        <table class="font-md">
                                            <tbody>
                                                <tr class="stand-up">
                                                    <th>Stand Up</th>
                                                    <td>
                                                        <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-wo-wheels">
                                                    <th>Folded (w/o wheels)</th>
                                                    <td>
                                                        <p>32.5″L x 18.5″W x 16.5″H</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-w-wheels">
                                                    <th>Folded (w/ wheels)</th>
                                                    <td>
                                                        <p>32.5″L x 24″W x 18.5″H</p>
                                                    </td>
                                                </tr>
                                                <tr class="door-pass-through">
                                                    <th>Door Pass Through</th>
                                                    <td>
                                                        <p>24</p>
                                                    </td>
                                                </tr>
                                                <tr class="frame">
                                                    <th>Frame</th>
                                                    <td>
                                                        <p>Aluminum</p>
                                                    </td>
                                                </tr>
                                                <tr class="weight-wo-wheels">
                                                    <th>Weight (w/o wheels)</th>
                                                    <td>
                                                        <p>20 LBS</p>
                                                    </td>
                                                </tr>
                                                <tr class="weight-capacity">
                                                    <th>Weight Capacity</th>
                                                    <td>
                                                        <p>60 LBS</p>
                                                    </td>
                                                </tr>
                                                <tr class="width">
                                                    <th>Width</th>
                                                    <td>
                                                        <p>24″</p>
                                                    </td>
                                                </tr>
                                                <tr class="handle-height-ground-to-handle">
                                                    <th>Handle height (ground to handle)</th>
                                                    <td>
                                                        <p>37-45″</p>
                                                    </td>
                                                </tr>
                                                <tr class="wheels">
                                                    <th>Wheels</th>
                                                    <td>
                                                        <p>12″ air / wide track slick tread</p>
                                                    </td>
                                                </tr>
                                                <tr class="seat-back-height">
                                                    <th>Seat back height</th>
                                                    <td>
                                                        <p>21.5″</p>
                                                    </td>
                                                </tr>
                                                <tr class="head-room-inside-canopy">
                                                    <th>Head room (inside canopy)</th>
                                                    <td>
                                                        <p>25″</p>
                                                    </td>
                                                </tr>
                                                <tr class="pa_color">
                                                    <th>Color</th>
                                                    <td>
                                                        <p>Black, Blue, Red, White</p>
                                                    </td>
                                                </tr>
                                                <tr class="pa_size">
                                                    <th>Size</th>
                                                    <td>
                                                        <p>M, S</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="Reviews">
                                        <!--Comments-->
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Customer questions & answers</h4>
                                                    <div class="comment-list">
                                                        <!--single-comment -->
                                                        @foreach ($review as $reviews)
                                                            <div class="single-comment justify-content-between d-flex">
                                                                <div class="user justify-content-between d-flex">
                                                                    <div class="thumb text-center">
                                                                        {{-- <img src="assets/imgs/page/avatar-8.jpg"
                                                                            alt=""> --}}
                                                                        <h6><a href="#"> {{ $reviews->user->name }} </a></h6>
                                                                        <p class="font-xxs">Since {{ $reviews->user->created_at }} </p>
                                                                    </div>
                                                                    <div class="desc">
                                                                        <div class="product-rate d-inline-block">
                                                                            <div class="product-rating" style="width:90%">
                                                                            </div>
                                                                        </div>
                                                                        <p> {{ $reviews->comment }} </p>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div class="d-flex align-items-center">
                                                                                <p class="font-xs mr-30"> {{ $reviews->created_at }} </p>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4 class="mb-30">Customer reviews</h4>
                                                    <div class="d-flex mb-30">
                                                        <div class="product-rate d-inline-block mr-15">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <h6>4.8 out of 5</h6>
                                                    </div>
                                                    @php
                                                        $ratte = 0;
                                                    @endphp
                                                    @foreach ($review as $ratte)
                                                        @php
                                                            $ratte = $ratte->ratte * 10;
                                                        @endphp
                                                        <div class="progress mb-30">
                                                            <span> star</span>
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: {{ $ratte }}%;" aria-valuenow="85"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                {{ $ratte }}%
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <a href="#" class="font-xs text-muted">How are ratings
                                                        calculated?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--comment form-->
                                        <div class="comment-form">
                                            <h4 class="mb-15">Add a review</h4>
                                            <div class="product-rate d-inline-block mb-30">

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    @auth
                                                        <form class="form-contact comment_form"
                                                            action=" {{ route('product.review', $product->id) }} "
                                                            method="POST" id="commentForm">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <input type="range" name="ratte" min="1"
                                                                            max="5" step=".5"
                                                                            style="background: hsl(353, 100%, 78%)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                                            placeholder="Write Comment"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    class="button button-contactForm">Submit
                                                                    Review</button>
                                                            </div>
                                                        </form>
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h3 class="section-title style-1 mb-30"> {{ __('Related products') }} </h3>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach ($reproducts as $reproduct)
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap small hover-up">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href=" {{ route('shop.details', $reproduct->id) }} "
                                                                tabindex="0">
                                                                <img class="default-img"
                                                                    src="{{ asset('assets/imgs') }}/{{ $reproduct->image }}"
                                                                    alt="">
                                                                <img class="hover-img"
                                                                    src="assets/imgs/shop/product-2-2.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div
                                                            class="product-badges product-badges-position product-badges-mrg">
                                                            <span class="hot">Hot</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2><a href="{{ route('shop.details', $reproduct->id) }}"
                                                                tabindex="0">
                                                                {{ $reproduct->name }} </a></h2>
                                                        <div class="rating-result" title="90%">
                                                            <span>
                                                            </span>
                                                        </div>
                                                        <div class="product-price">
                                                            @if ($reproduct->sale_price)
                                                                <span>$ {{ $reproduct->sale_price }} </span>
                                                                <span class="old-price">$ {{ $reproduct->regular_price }}
                                                                </span>
                                                            @else
                                                                <span>$ {{ $reproduct->regular_price }} </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">

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
                                        <h5><a href=" {{ route('shop.details', $newproduct->id) }} "> {{ $newproduct->name }} </a></h5>
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
                </div>
            </div>
        </section>
    </main>
@endsection
