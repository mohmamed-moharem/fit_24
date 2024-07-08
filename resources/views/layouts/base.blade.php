<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Anon - eCommerce Website</title>

    <!--
    - favicon
  -->
    <link rel="shortcut icon" href=" {{ asset('assets/imgs/logo/favicon.ico') }} " type="image/x-icon" />

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href=" {{ asset('assets/css/style-prefix.css') }} " />

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <!--
      main style
    -->
    <link rel="stylesheet" href=" {{ asset('assets/css/main.css') }} " />
    <link rel="stylesheet" href=" {{ asset('assets/css/custom.css') }} " />

    @stack('styles')
</head>

<body>
    <div class="overlay" data-overlay></div>

    <!--
    - MODAL
  -->

    <div class="modal" data-modal>
        <div class="modal-close-overlay" data-modal-overlay></div>

        <div class="modal-content">
            <button class="modal-close-btn" data-modal-close>
                <ion-icon name="close-outline"></ion-icon>
            </button>

            <div class="newsletter-img">
                <img src=" {{ asset('assets/imgs/newsletter.png') }} " alt="subscribe newsletter" width="400"
                    height="400" />
            </div>

            <div class="newsletter">
                <form action="#">
                    <div class="newsletter-header">
                        <h3 class="newsletter-title"> {{ __('Subscribe Newsletter.') }} </h3>

                        <p class="newsletter-desc">
                            {{ __('Subscribe the') }} <b> {{ __('Anon') }} </b>
                            {{ __("to get latest products and discount
                                                                                                                                                                                                                                                                            update.") }}
                        </p>
                    </div>

                    <input type="email" name="email" class="email-field" placeholder="Email Address" required />

                    <button type="submit" class="btn-newsletter"> {{ __('Subscribe') }} </button>
                </form>
            </div>
        </div>
    </div>

    <!--
    - NOTIFICATION TOAST
  -->

    <div class="notification-toast" data-toast>
        <button class="toast-close-btn" data-toast-close>
            <ion-icon name="close-outline"></ion-icon>
        </button>

        <div class="toast-banner">
            <img src=" {{ asset('assets/imgs/jewellery-1.jpg') }} " alt="Rose Gold Earrings" width="80"
                height="70" />
        </div>

        <div class="toast-detail">
            <p class="toast-message"> {{ __('Someone in new just bought') }} </p>

            <p class="toast-title"> {{ __('Rose Gold Earrings') }} </p>

            <p class="toast-meta"><time datetime="PT2M"> {{ __('2 Minutes') }} </time> {{ __('ago') }} </p>
        </div>
    </div>

    <!--
    - HEADER
  -->

    <header>
        <div class="header-top">
            <div class="container">
                <ul class="header-social-container">
                    <li>
                        <a href="https://www.facebook.com/profile.php?id=61561736346327&mibextid=ZbWKwL" class="social-link">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </li> --}}

                    <li>
                        <a href="https://www.instagram.com/ali_el_hariri?utm_source=qr&igsh=MXI3eGVnNnJsOTR6bA=="
                            class="social-link">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-linkedin"></ion-icon>
                        </a>
                    </li> --}}
                    <li>
                        <a href="https://www.tiktok.com/@fit24alhariri2?_t=8nkFg5E3l8q&_r=1" class="social-link">
                            <ion-icon name="logo-tiktok"></ion-icon>
                        </a>
                    </li>
                </ul>

                <div class="header-alert-news">
                    <p>
                        <b> {{ __('Free Shipping') }} </b>
                        {{ __("This Week Order Over - $55") }}
                    </p>
                </div>

                <div class="header-top-actions">
                    <ul class="desktop-menu-category-list">
                        <li class="onhover-dropdown d-flex">
                            <div class="cart-media name-usr">
                                @auth
                                    <span class="d-block me-3">
                                        {{ Auth::user()->name }}
                                    </span>
                                @endauth
                                <i data-feather="user"></i>
                            </div>
                            <div class="onhover-div profile-dropdown">
                                <ul class="d-flex">
                                    @auth

                                    @endauth
                                    @guest
                                        <li>
                                            <a href=" {{ route('login') }} " class="d-block pe-3">Login</a>
                                        </li>
                                        <li>
                                            <a href=" {{ route('register') }} " class="d-block">Register</a>
                                        </li>
                                    @endguest
                                    @if (Route::has('login'))
                                        @auth
                                            @if (Auth::user()->utype === 'ADM')
                                                <li>
                                                    <a href=" {{ route('admin.index') }} "
                                                        class="d-block pe-3">Dashboard</a>
                                                </li>
                                            @else
                                            @endif
                                            <li>
                                                <a href=" {{ route('logout') }} "
                                                    onclick="event.preventDefault();document.getElementById('frmlogout').submit();"
                                                    class="d-block">Logout</a>
                                                <form id="frmlogout" action=" {{ route('logout') }} " method="POST">
                                                    @csrf
                                                </form>
                                            </li>
                                        @else
                                        @endauth
                                    @endif


                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="header-main">
            <div class="container">
                <a href="#" class="header-logo">
                    <img src=" {{ asset('assets/imgs/logo/logo.jpeg') }} " alt="Anon's logo" width="300"
                        height="150" />
                </a>

                <div class="header-search-container">
                    <input type="search" name="search" class="search-field"
                        placeholder="Enter your product name..." />

                    <form action=" {{ route('shop.index') }} " method="GET">
                        <button type="submit" class="search-btn">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </form>
                </div>

                <div class="header-user-actions">
                    <button class="action-btn">
                        <ion-icon name="person-outline"></ion-icon>
                    </button>

                    <a class="action-btn" href=" {{ route('cart.index') }} ">
                        <ion-icon name="bag-handle-outline"></ion-icon>

                        <span class="count">
                            {{-- @if (Route::has('login'))
                                @auth
                                    {{ $cart }}
                                @endauth

                            @endif --}}
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <nav class="desktop-navigation-menu">
            <div class="container">
                <ul class="desktop-menu-category-list">
                    <li class="menu-category">
                        <a href=" {{ route('app.index') }} " class="menu-title">Home</a>
                    </li>



                    <li class="menu-category">
                        <a href=" {{ route('shop.index') }} " class="menu-title">Shop</a>
                    </li>

                    <li class="menu-category">
                        <a href=" {{ route('about.index') }} " class="menu-title">About</a>
                    </li>

                    <li class="menu-category">
                        <a href=" {{ route('contect.index') }} " class="menu-title">Contact</a>
                    </li>

                    {{-- <li c   --}}
                </ul>
            </div>
        </nav>

        <div class="mobile-bottom-navigation">
            <button class="action-btn" data-mobile-menu-open-btn>
                <ion-icon name="menu-outline"></ion-icon>
            </button>

            <a class="action-btn" href=" route('cart.index') ">
                <ion-icon name="bag-handle-outline"></ion-icon>

                <span class="count"> 0 </span>
            </a>

            <button class="action-btn">
                <ion-icon name="home-outline"></ion-icon>
            </button>

            <button class="action-btn">
                <ion-icon name="heart-outline"></ion-icon>

                <span class="count">0</span>
            </button>

            <button class="action-btn" data-mobile-menu-open-btn>
                <ion-icon name="grid-outline"></ion-icon>
            </button>
        </div>

        <nav class="mobile-navigation-menu has-scrollbar" data-mobile-menu>
            <div class="menu-top">
                <h2 class="menu-title">Menu</h2>

                <button class="menu-close-btn" data-mobile-menu-close-btn>
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>

            <ul class="mobile-menu-category-list">
                <li class="menu-category">
                    <a href="#" class="menu-title">Home</a>
                </li>

                <li class="menu-category">
                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Men's</p>

                        <div>
                            <ion-icon name="add-outline" class="add-icon"></ion-icon>
                            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                        </div>
                    </button>

                    <ul class="submenu-category-list" data-accordion>
                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Shirt</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Shorts & Jeans</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Safety Shoes</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Wallet</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-category">
                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Women's</p>

                        <div>
                            <ion-icon name="add-outline" class="add-icon"></ion-icon>
                            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                        </div>
                    </button>

                    <ul class="submenu-category-list" data-accordion>
                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Dress & Frock</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Earrings</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Necklace</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Makeup Kit</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-category">
                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Jewelry</p>

                        <div>
                            <ion-icon name="add-outline" class="add-icon"></ion-icon>
                            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                        </div>
                    </button>

                    <ul class="submenu-category-list" data-accordion>
                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Earrings</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Couple Rings</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Necklace</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Bracelets</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-category">
                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Perfume</p>

                        <div>
                            <ion-icon name="add-outline" class="add-icon"></ion-icon>
                            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                        </div>
                    </button>

                    <ul class="submenu-category-list" data-accordion>
                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Clothes Perfume</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Deodorant</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Flower Fragrance</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Air Freshener</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-category">
                    <a href="#" class="menu-title">Blog</a>
                </li>

                <li class="menu-category">
                    <a href="#" class="menu-title">Hot Offers</a>
                </li>
            </ul>

            <div class="menu-bottom">
                <ul class="menu-category-list">
                    <li class="menu-category">
                        <button class="accordion-menu" data-accordion-btn>
                            <p class="menu-title">Language</p>

                            <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                        </button>

                        <ul class="submenu-category-list" data-accordion>
                            <li class="submenu-category">
                                <a href="#" class="submenu-title">English</a>
                            </li>

                            <li class="submenu-category">
                                <a href="#" class="submenu-title">Espa&ntilde;ol</a>
                            </li>

                            <li class="submenu-category">
                                <a href="#" class="submenu-title">Fren&ccedil;h</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-category">
                        <button class="accordion-menu" data-accordion-btn>
                            <p class="menu-title">Currency</p>
                            <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                        </button>

                        <ul class="submenu-category-list" data-accordion>
                            <li class="submenu-category">
                                <a href="#" class="submenu-title">USD &dollar;</a>
                            </li>

                            <li class="submenu-category">
                                <a href="#" class="submenu-title">EUR &euro;</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="menu-social-container">
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-linkedin"></ion-icon>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!--
    - MAIN
  -->

    @yield('content')

    <!--
    - FOOTER
  -->

    <footer class="main" style="color: #fff;">

        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="index.html"><img src=" {{ asset('assets/imgs/logo/logo.jpeg') }} " alt="Anon's logo" width="300" style="width: 300px"
                                    height="150" /> </a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">
                                Contact
                            </h5>
                            <p class="wow fadeIn animated">
                                <strong>Address: </strong>Cairo Egypt
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Phone: </strong>+20 1098660720
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Email: </strong>fit24alhariri@gmail.com
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">
                                Follow Us
                            </h5>
                            <ul class="header-social-container">
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=61561736346327&mibextid=ZbWKwL" class="social-link">
                                        <ion-icon name="logo-facebook"></ion-icon>
                                    </a>
                                </li>

                                {{-- <li>
                                    <a href="#" class="social-link">
                                        <ion-icon name="logo-twitter"></ion-icon>
                                    </a>
                                </li> --}}

                                <li>
                                    <a href="https://www.instagram.com/ali_el_hariri?utm_source=qr&igsh=MXI3eGVnNnJsOTR6bA=="
                                        class="social-link">
                                        <ion-icon name="logo-instagram"></ion-icon>
                                    </a>
                                </li>

                                {{-- <li>
                                    <a href="#" class="social-link">
                                        <ion-icon name="logo-linkedin"></ion-icon>
                                    </a>
                                </li> --}}
                                <li>
                                    <a href="https://www.tiktok.com/@fit24alhariri2?_t=8nkFg5E3l8q&_r=1" class="social-link">
                                        <ion-icon name="logo-tiktok"></ion-icon>
                                    </a>
                                </li>
                            </ul>
                            <!-- <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">About</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="#">About Us</a></li>
                            <!-- <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li> -->
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">My Account</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="#">View Cart</a></li>
                            <!-- <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li> -->
                            <li><a href="#">Order</a></li>
                        </ul>
                    </div>
                    <!-- <div class="col-lg-4 mob-center">
                        <h5 class="widget-title wow fadeIn animated">Install App</h5>
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <p class="wow fadeIn animated">
                                    From App Store or Google Play
                                </p>
                                <div class="download-app wow fadeIn animated mob-app">
                                    <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="assets/imgs/theme/app-store.jpg" alt="" /></a>
                                    <a href="#" class="hover-up"><img src="assets/imgs/theme/google-play.jpg" alt="" /></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">
                                    Secured Payment Gateways
                                </p>
                                <img class="wow fadeIn animated" src="assets/imgs/theme/payment-method.png" alt="" />
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>

                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">Fit 24</strong> All
                        rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!--
    - custom js link
  -->
    <script src=" {{ asset('assets/js/script.js') }} "></script>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Vendor JS-->
    <script src=" {{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }} "></script>
    <script src=" {{ asset('assets/js/vendor/jquery-3.6.0.min.js') }} "></script>
    <script src=" {{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }} "></script>
    <script src=" {{ asset('assets/js/vendor/bootstrap.bundle.min.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/slick.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/jquery.syotimer.min.j') }} "></script>
    <script src=" {{ asset('assets/js/plugins/wow.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/jquery-ui.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/perfect-scrollbar.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/magnific-popup.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/select2.min.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/waypoints.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/counterup.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/jquery.countdown.min.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/images-loaded.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/isotope.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/scrollup.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/jquery.vticker-min.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/jquery.theia.sticky.js') }} "></script>
    <script src=" {{ asset('assets/js/plugins/jquery.elevatezoom.js') }} "></script>
    <!-- Template  JS -->
    <script src=" {{ asset('assets/js/main.js?v=3.3') }} "></script>
    <script src=" {{ asset('assets/js/shop.js?v=3.3') }} "></script>
    {{-- <script src=" {{ asset('assets/js/cart.js') }} "></script> --}}
    @stack('scripts')
</body>

</html>
