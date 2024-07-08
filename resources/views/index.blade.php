@extends('layouts.base')
@section('content')
    <main>
        <!--
                - BANNER
                -->

        <div class="banner">
            <div class="container">
                <div class="slider-container has-scrollbar">
                    <!-- <div class="slider-item">
                        <img src="./assets/imgs/banner-1.jpg" alt="women's latest fashion sale" class="banner-img" />

                        <div class="banner-content">
                            <p class="banner-subtitle">Trending item</p>

                            <h2 class="banner-title">Women's latest fashion sale</h2>

                            <p class="banner-text">starting at &dollar; <b>20</b>.00</p>

                            <a href="#" class="banner-btn">Shop now</a>
                        </div>
                    </div>

                    <div class="slider-item">
                        <img src="./assets/imgs/banner-2.jpg" alt="modern sunglasses" class="banner-img" />

                        <div class="banner-content">
                            <p class="banner-subtitle">Trending accessories</p>

                            <h2 class="banner-title">Modern sunglasses</h2>

                            <p class="banner-text">starting at &dollar; <b>15</b>.00</p>

                            <a href="#" class="banner-btn">Shop now</a>
                        </div>
                    </div>

                    <div class="slider-item">
                        <img src="./assets/imgs/banner-3.jpg" alt="new fashion summer sale" class="banner-img" />

                        <div class="banner-content">
                            <p class="banner-subtitle">Sale Offer</p>

                            <h2 class="banner-title">New fashion summer sale</h2>

                            <p class="banner-text">starting at &dollar; <b>29</b>.99</p>

                            <a href="#" class="banner-btn">Shop now</a>
                        </div>
                    </div> -->
                    @foreach ($baners as $baner)
                        <div class="slider-item">
                            <img src="{{asset('assets/imgs')}}/{{$baner->image}}" alt="modern sunglasses" class="banner-img" />

                            <div class="banner-content">
                                <p class="banner-subtitle"> {{ $baner->title }} </p>

                                <h2 class="banner-title"> {{ $baner->desc }} </h2>

                                <p class="banner-text">{{ __('starting at') }} &dollar; <b>{{ $baner->value }}</b>.00</p>

                                <a href=" {{ route('shop.index') }} " class="banner-btn"> {{ __('Shop now') }} </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!--
                  - CATEGORY
                -->

        <div class="category">
            <div class="container">
                <div class="category-item-container has-scrollbar">
                    @foreach ($categores as $categore)
                        <div class="category-item">
                            <div class="category-img-box">
                                <img src="{{ asset('assets/imgs') }}/{{ $categore->image }}" alt="dress & frock"
                                    width="30" />
                            </div>

                            <div class="category-content-box">
                                <div class="category-content-flex">
                                    <h3 class="category-item-title">{{ $categore->name }}</h3>
                                </div>

                                <a href="  " class="category-btn">Show all</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!--
                  - PRODUCT
                -->

        <div class="product-container">
            <div class="container">
                <!--
                      - SIDEBAR
                    -->

                <div class="sidebar has-scrollbar" data-mobile-menu>
                    <div class="sidebar-category">
                        <div class="sidebar-top">
                            <h2 class="sidebar-title"> {{ __('Category') }} </h2>

                            <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                                <ion-icon name="close-outline"></ion-icon>
                            </button>
                        </div>

                        <ul class="sidebar-menu-category-list">

                            @foreach ($categores as $categore)
                                <li class="sidebar-menu-category">
                                    <button class="sidebar-accordion-menu" data-accordion-btn>
                                        <div class="menu-title-flex">
                                            <img src="{{ asset('assets/imgs') }}/{{ $categore->image }}"
                                                alt="clothes" width="20" height="20" class="menu-title-img" />

                                            <p class="menu-title">{{ $categore->name }}</p>
                                        </div>

                                        <div>
                                            <ion-icon name="add-outline" class="add-icon"></ion-icon>
                                            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                                        </div>
                                    </button>

                                    <ul class="sidebar-submenu-category-list" data-accordion>
                                        @foreach ($categore->products as $product)
                                            <li class="sidebar-submenu-category">
                                                <a href="#" class="sidebar-submenu-title">
                                                    <a href=" {{ route('shop.index') }} "
                                                        class="product-name">{{ $product->name }}</a>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="product-cart-wrap" style="border-radius: 10px; padding: 15px">
                        <h3 class="showcase-heading"> {{ __('best sellers') }} </h3>

                        <div class="showcase-wrapper">
                            <div class="showcase-container">
                                @foreach ($narrivals as $product)
                                    <div class="showcase">
                                        <a href=" {{ route('shop.details', $product->id) }} " class="showcase-img-box">
                                            <img src="{{ asset('assets/imgs') }}/{{ $product->image }}"
                                                alt="baby fabric shoes" width="75" height="75"
                                                class="showcase-img" />
                                        </a>

                                        <div class="showcase-content">
                                            <a href="#">
                                                <h4 class="showcase-title">{{ $product->name }}</h4>
                                            </a>

                                            <div class="showcase-rating">
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
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
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-box">
                    <!--
                        - PRODUCT MINIMAL
                      -->

                    <div class="product-minimal">
                        <div class="product-showcase">
                            <h2 class="title"> {{ __('New Arrivals') }} </h2>

                            <div class="showcase-wrapper has-scrollbar">
                                <div class="showcase-container">
                                    @foreach ($newproducts as $product)
                                        <div class="showcase">
                                            <a href=" {{ route('shop.details', $product->id) }} "
                                                class="showcase-img-box">
                                                <img src="{{ asset('assets/imgs') }}/{{ $product->image }}"
                                                    alt="relaxed short full sleeve t-shirt" width="70"
                                                    class="showcase-img" />
                                            </a>

                                            <div class="showcase-content">
                                                <a href=" {{ route('shop.details', $product->id) }} ">
                                                    <h4 class="showcase-title">
                                                        {{ $product->name }}
                                                    </h4>
                                                </a>

                                                <a href=" {{ route('shop.details', $product->id) }} "
                                                    class="showcase-category"> {{ $product->category->name }} </a>

                                                <div class="price-box">
                                                    @if ($product->sale_price)
                                                        <p class="price">${{ $product->sale_price }}</p>
                                                        <del>${{ $product->regular_price }}</del>
                                                    @else
                                                        <p class="price">${{ $product->regular_price }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="product-showcase">
                            <h2 class="title"> {{ __('Trending') }} </h2>

                            <div class="showcase-wrapper has-scrollbar">
                                <div class="showcase-container">
                                    @foreach ($tranding as $product)
                                        <div class="showcase">
                                            <a href=" {{ route('shop.details', $product->id) }} "
                                                class="showcase-img-box">
                                                <img src="{{ asset('assets/imgs') }}/{{ $product->image }}"
                                                    alt="relaxed short full sleeve t-shirt" width="70"
                                                    class="showcase-img" />
                                            </a>

                                            <div class="showcase-content">
                                                <a href=" {{ route('shop.details', $product->id) }} ">
                                                    <h4 class="showcase-title">
                                                        {{ $product->name }}
                                                    </h4>
                                                </a>

                                                <a href=" {{ route('shop.details', $product->id) }} "
                                                    class="showcase-category">{{ $product->category->name }}</a>

                                                <div class="price-box">
                                                    @if ($product->sale_price)
                                                        <p class="price">${{ $product->sale_price }}</p>
                                                        <del>${{ $product->regular_price }}</del>
                                                    @else
                                                        <p class="price">${{ $product->regular_price }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="product-showcase">
                            <h2 class="title"> {{ __('Top Rated') }} </h2>

                            <div class="showcase-wrapper has-scrollbar">
                                <div class="showcase-container">
                                    <div class="showcase">
                                        <a href="#" class="showcase-img-box">
                                            <img src="./assets/imgs/products/watch-3.jpg" alt="pocket watch leather pouch"
                                                class="showcase-img" width="70" />
                                        </a>

                                        <div class="showcase-content">
                                            <a href="#">
                                                <h4 class="showcase-title">
                                                    Pocket Watch Leather Pouch
                                                </h4>
                                            </a>

                                            <a href="#" class="showcase-category">Watches</a>

                                            <div class="price-box">
                                                <p class="price">$50.00</p>
                                                <del>$34.00</del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="showcase">
                                        <a href="#" class="showcase-img-box">
                                            <img src="./assets/imgs/products/jewellery-3.jpg"
                                                alt="silver deer heart necklace" class="showcase-img" width="70" />
                                        </a>

                                        <div class="showcase-content">
                                            <a href="#">
                                                <h4 class="showcase-title">
                                                    Silver Deer Heart Necklace
                                                </h4>
                                            </a>

                                            <a href="#" class="showcase-category">Jewellery</a>

                                            <div class="price-box">
                                                <p class="price">$84.00</p>
                                                <del>$30.00</del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="showcase">
                                        <a href="#" class="showcase-img-box">
                                            <img src="./assets/imgs/products/perfume.jpg"
                                                alt="titan 100 ml womens perfume" class="showcase-img" width="70" />
                                        </a>

                                        <div class="showcase-content">
                                            <a href="#">
                                                <h4 class="showcase-title">
                                                    Titan 100 Ml Womens Perfume
                                                </h4>
                                            </a>

                                            <a href="#" class="showcase-category">Perfume</a>

                                            <div class="price-box">
                                                <p class="price">$42.00</p>
                                                <del>$10.00</del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="showcase">
                                        <a href="#" class="showcase-img-box">
                                            <img src="./assets/imgs/products/belt.jpg" alt="men's leather reversible belt"
                                                class="showcase-img" width="70" />
                                        </a>

                                        <div class="showcase-content">
                                            <a href="#">
                                                <h4 class="showcase-title">
                                                    Men's Leather Reversible Belt
                                                </h4>
                                            </a>

                                            <a href="#" class="showcase-category">Belt</a>

                                            <div class="price-box">
                                                <p class="price">$24.00</p>
                                                <del>$10.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--
                        - PRODUCT GRID
                      -->
                    <!-- @dump($nproducts) -->
                    <div class="product-main">
                        <h2 class="title">New Products</h2>

                        <div class="product-grid">
                            @foreach ($nproducts as $product)
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
                                            {{-- <button class="btn-action">
                                                <ion-icon name="heart-outline"></ion-icon>
                                            </button>

                                            <button class="btn-action">
                                                <ion-icon name="eye-outline"></ion-icon>
                                            </button>

                                            <button class="btn-action">
                                                <ion-icon name="repeat-outline"></ion-icon>
                                            </button> --}}

                                            <button class="btn-action">
                                                <ion-icon name="bag-add-outline"></ion-icon>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="showcase-content">
                                        <a href=" {{ route('shop.details', $product->id) }} "
                                            class="showcase-category">{{ $product->category->name }}</a>


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
                                                        style="padding: 0; background: none; border: none; color: #000;">
                                                        <i class="fi-rs-shopping-bag-add"></i>
                                                    </button>
                                                </form>
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

        <!--
                  - TESTIMONIALS, CTA & SERVICE
                -->

        <div>
            <div class="container">
                <div class="testimonials-box">
                    <!--
                        - TESTIMONIALS
                      -->

                    <div class="testimonial">
                        <h2 class="title">testimonial</h2>

                        <div class="testimonial-card">
                            <img src="./assets/imgs/testimonial-1.jpg" alt="alan doe" class="testimonial-banner"
                                width="80" height="80" />

                            <p class="testimonial-name">Alan Doe</p>

                            <p class="testimonial-title">CEO & Founder Invision</p>

                            <img src="./assets/imgs/icons/quotes.svg" alt="quotation" class="quotation-img"
                                width="26" />

                            <p class="testimonial-desc">
                                Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor dolor
                                sit amet.
                            </p>
                        </div>
                    </div>

                    <!--
                        - CTA
                      -->

                    <div class="cta-container">
                        <img src="./assets/imgs/cta-banner.jpg" alt="summer collection" class="cta-banner" />

                        <a href="#" class="cta-content">
                            <p class="discount">25% Discount</p>

                            <h2 class="cta-title">Summer collection</h2>

                            <p class="cta-text">Starting @ $10</p>

                            <button class="cta-btn">Shop now</button>
                        </a>
                    </div>

                    <!--
                        - SERVICE
                      -->

                    <div class="service">
                        <h2 class="title">Our Services</h2>

                        <div class="service-container">
                            <a href="#" class="service-item">
                                <div class="service-icon">
                                    <ion-icon name="boat-outline"></ion-icon>
                                </div>

                                <div class="service-content">
                                    <h3 class="service-title">Worldwide Delivery</h3>
                                    <p class="service-desc">For Order Over $100</p>
                                </div>
                            </a>

                            <a href="#" class="service-item">
                                <div class="service-icon">
                                    <ion-icon name="rocket-outline"></ion-icon>
                                </div>

                                <div class="service-content">
                                    <h3 class="service-title">Next Day delivery</h3>
                                    <p class="service-desc">UK Orders Only</p>
                                </div>
                            </a>

                            <a href="#" class="service-item">
                                <div class="service-icon">
                                    <ion-icon name="call-outline"></ion-icon>
                                </div>

                                <div class="service-content">
                                    <h3 class="service-title">Best Online Support</h3>
                                    <p class="service-desc">Hours: 8AM - 11PM</p>
                                </div>
                            </a>

                            <a href="#" class="service-item">
                                <div class="service-icon">
                                    <ion-icon name="arrow-undo-outline"></ion-icon>
                                </div>

                                <div class="service-content">
                                    <h3 class="service-title">Return Policy</h3>
                                    <p class="service-desc">Easy & Free Return</p>
                                </div>
                            </a>

                            <a href="#" class="service-item">
                                <div class="service-icon">
                                    <ion-icon name="ticket-outline"></ion-icon>
                                </div>

                                <div class="service-content">
                                    <h3 class="service-title">30% money back</h3>
                                    <p class="service-desc">For Order Over $100</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--
                  - BLOG
                -->

        <!-- <div class="blog">
            <div class="container">
                <div class="blog-container has-scrollbar">
                    <div class="blog-card">
                        <a href="#">
                            <img src="./assets/imgs/blog-1.jpg" alt="Clothes Retail KPIs 2021 Guide for Clothes Executives" width="300" class="blog-banner" />
                        </a>

                        <div class="blog-content">
                            <a href="#" class="blog-category">Fashion</a>

                            <a href="#">
                                <h3 class="blog-title">
                                    Clothes Retail KPIs 2021 Guide for Clothes Executives.
                                </h3>
                            </a>

                            <p class="blog-meta">
                                By <cite>Mr Admin</cite> /
                                <time datetime="2022-04-06">Apr 06, 2022</time>
                            </p>
                        </div>
                    </div>

                    <div class="blog-card">
                        <a href="#">
                            <img src="./assets/imgs/blog-2.jpg" alt="Curbside fashion Trends: How to Win the Pickup Battle." class="blog-banner" width="300" />
                        </a>

                        <div class="blog-content">
                            <a href="#" class="blog-category">Clothes</a>

                            <h3>
                                <a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup
                                    Battle.</a>
                            </h3>

                            <p class="blog-meta">
                                By <cite>Mr Robin</cite> /
                                <time datetime="2022-01-18">Jan 18, 2022</time>
                            </p>
                        </div>
                    </div>

                    <div class="blog-card">
                        <a href="#">
                            <img src="./assets/imgs/blog-3.jpg" alt="EBT vendors: Claim Your Share of SNAP Online Revenue." class="blog-banner" width="300" />
                        </a>

                        <div class="blog-content">
                            <a href="#" class="blog-category">Shoes</a>

                            <h3>
                                <a href="#" class="blog-title">EBT vendors: Claim Your Share of SNAP Online
                                    Revenue.</a>
                            </h3>

                            <p class="blog-meta">
                                By <cite>Mr Selsa</cite> /
                                <time datetime="2022-02-10">Feb 10, 2022</time>
                            </p>
                        </div>
                    </div>

                    <div class="blog-card">
                        <a href="#">
                            <img src="./assets/imgs/blog-4.jpg" alt="Curbside fashion Trends: How to Win the Pickup Battle." class="blog-banner" width="300" />
                        </a>

                        <div class="blog-content">
                            <a href="#" class="blog-category">Electronics</a>

                            <h3>
                                <a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup
                                    Battle.</a>
                            </h3>

                            <p class="blog-meta">
                                By <cite>Mr Pawar</cite> /
                                <time datetime="2022-03-15">Mar 15, 2022</time>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </main>
@endsection
