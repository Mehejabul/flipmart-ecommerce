<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.themesground.com/flipmart-demo/HTML/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 May 2022 09:55:34 GMT -->

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Flipmart premium HTML5 & CSS3 Template</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('contents/forntend') }}/assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('contents/forntend') }}/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('contents/forntend') }}/assets/css/blue.css">
    <link rel="stylesheet" href="{{ asset('contents/forntend') }}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('contents/forntend') }}/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="{{ asset('contents/forntend') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('contents/forntend') }}/assets/css/rateit.css">
    <link rel="stylesheet" href="{{ asset('contents/forntend') }}/assets/css/bootstrap-select.min.css">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('contents/forntend') }}/assets/css/font-awesome.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body class="cnt-home">

    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">

        <!-- ============================================== TOP MENU ============================================== -->
        <div class="top-bar animate-dropdown">
            <div class="container">
                <div class="header-top-inner">
                    <div class="cnt-account">
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                            <li><a href="{{ route('wishlist.index') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                            <li><a href="{{ route('cart.index') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a>
                            </li>
                            <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
                            <li><a href="{{ route('website.login') }}"><i class="icon fa fa-lock"></i>Login</a></li>
                        </ul>
                    </div>
                    <!-- /.cnt-account -->

                    <div class="cnt-block">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                    data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                    data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- /.list-unstyled -->
                    </div>
                    <!-- /.cnt-cart -->
                    <div class="clearfix"></div>
                </div>
                <!-- /.header-top-inner -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.header-top -->
        <!-- ============================================== TOP MENU : END ============================================== -->
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                        <!-- ============================================================= LOGO ============================================================= -->
                        <div class="logo"> <a href="home.html"> <img
                                    src="{{ asset('contents/forntend') }}/assets/images/logo.png" alt="logo"> </a>
                        </div>
                        <!-- /.logo -->
                        <!-- ============================================================= LOGO : END ============================================================= -->
                    </div>
                    <!-- /.logo-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                        <!-- /.contact-row -->
                        <!-- ============================================================= SEARCH AREA ============================================================= -->
                        <div class="search-area">
                            <form>
                                <div class="control-group">
                                    <ul class="categories-filter animate-dropdown">
                                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                                href="category.html">Categories <b class="caret"></b></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li class="menu-header">Computer</li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Clothing</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Electronics</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Shoes</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Watches</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <input class="search-field" placeholder="Search here..." />
                                    <a class="search-button" href="#"></a>
                                </div>
                            </form>
                        </div>
                        <!-- /.search-area -->
                        <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                    </div>
                    <!-- /.top-search-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                        <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                        @php
                              $cartCollection = Cart::getContent();
                        @endphp
                        <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                                data-toggle="dropdown">
                                <div class="items-cart-inner">
                                    <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                    <div class="basket-item-count"><span class="count">{{ Cart::getTotalQuantity(); }}</span></div>
                                    <div class="total-price-basket"> <span class="lbl">cart -</span> <span
                                    class="total-price"> <span class="sign">$</span><span
                                     class="value">{{ Cart::getTotal();}}</span> </span> </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="cart-item product-summary">
                                        @foreach ( $cartCollection as $cart_data )
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="image"> <a href="detail.html"><img
                                                            src="{{ asset('uploads/product/pro_img/'.$cart_data->attributes->product_image) }}"
                                                            alt=""></a> </div>
                                            </div>
                                            <div class="col-xs-7">
                                                <h3 class="name"><a href="index8a95.html?page-detail">{{ $cart_data->name }}</a>
                                                </h3>
                                                <div class="price">{{ $cart_data->price }}</div>
                                            </div>
                                            <div class="col-xs-1 action"> <a href="{{ route('cart.delete',$cart_data->id)}}"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- /.cart-item -->
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="clearfix cart-total">
                                        <div class="pull-right"> <span class="text">Sub Total :</span><span
                                                class='price'></span>{{  Cart::getSubTotal(); }}</div>
                                        <div class="clearfix"></div>
                                        <a href="{{ route('cart.index') }}"
                                            class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                    </div>
                                    <!-- /.cart-total-->

                                </li>
                            </ul>
                            <!-- /.dropdown-menu-->
                        </div>
                        <!-- /.dropdown-cart -->

                        <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                    </div>
                    <!-- /.top-cart-row -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->

        </div>
        <!-- /.main-header -->

        <!-- ============================================== NAVBAR ============================================== -->
        <div class="header-nav animate-dropdown">
            <div class="container">
                <div class="yamm navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div class="nav-bg-class">
                        <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                            <div class="nav-outer">
                                <ul class="nav navbar-nav">
                                    <li class="active dropdown yamm-fw"> <a href="{{ route('website.index') }}" data-hover="dropdown"
                                            class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>
                                    <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
                                            class="dropdown-toggle" data-toggle="dropdown">Clothing</a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                            <h2 class="title">Men</h2>
                                                            <ul class="links">
                                                                <li><a href="#">Dresses</a></li>
                                                                <li><a href="#">Shoes </a></li>
                                                                <li><a href="#">Jackets</a></li>
                                                                <li><a href="#">Sunglasses</a></li>
                                                                <li><a href="#">Sport Wear</a></li>
                                                                <li><a href="#">Blazers</a></li>
                                                                <li><a href="#">Shirts</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.col -->

                                                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                            <h2 class="title">Women</h2>
                                                            <ul class="links">
                                                                <li><a href="#">Handbags</a></li>
                                                                <li><a href="#">Jwellery</a></li>
                                                                <li><a href="#">Swimwear </a></li>
                                                                <li><a href="#">Tops</a></li>
                                                                <li><a href="#">Flats</a></li>
                                                                <li><a href="#">Shoes</a></li>
                                                                <li><a href="#">Winter Wear</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.col -->

                                                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                            <h2 class="title">Boys</h2>
                                                            <ul class="links">
                                                                <li><a href="#">Toys & Games</a></li>
                                                                <li><a href="#">Jeans</a></li>
                                                                <li><a href="#">Shirts</a></li>
                                                                <li><a href="#">Shoes</a></li>
                                                                <li><a href="#">School Bags</a></li>
                                                                <li><a href="#">Lunch Box</a></li>
                                                                <li><a href="#">Footwear</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.col -->

                                                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                            <h2 class="title">Girls</h2>
                                                            <ul class="links">
                                                                <li><a href="#">Sandals </a></li>
                                                                <li><a href="#">Shorts</a></li>
                                                                <li><a href="#">Dresses</a></li>
                                                                <li><a href="#">Jwellery</a></li>
                                                                <li><a href="#">Bags</a></li>
                                                                <li><a href="#">Night Dress</a></li>
                                                                <li><a href="#">Swim Wear</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.col -->

                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive"
                                                                src="{{ asset('contents/forntend') }}/assets/images/banners/top-menu-banner.jpg"
                                                                alt=""> </div>
                                                        <!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown mega-menu">
                                        <a href="category.html" data-hover="dropdown" class="dropdown-toggle"
                                            data-toggle="dropdown">Electronics <span
                                                class="menu-label hot-menu hidden-xs">hot</span> </a>
                                        <ul class="dropdown-menu container">
                                            @php
                                            $nav_categories =
                                            App\Models\ProductCategory::where('pro_cate_status',1)->where('pro_cate_parent',null)->limit(4)->get();
                                            @endphp

                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">
                                                        @foreach ( $nav_categories as $nav_category )
                                                        <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                            <h2 class="title">{{ $nav_category->pro_cate_name }}</h2>
                                                            <ul class="links">
                                                                @php
                                                                $nav_subcategories =
                                                                App\Models\ProductCategory::where('pro_cate_status',1)->where('pro_cate_parent',
                                                                $nav_category->pro_cate_id)->get();
                                                                @endphp
                                                                @foreach ($nav_subcategories as $nav_subcategory)
                                                                <li><a
                                                                        href="#">{{$nav_subcategory->pro_cate_name  }}</a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        @endforeach

                                                        <div
                                                            class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner">
                                                            <a href="#"><img alt=""
                                                                    src="{{ asset('contents/forntend') }}/assets/images/banners/banner-side.png"></a>
                                                        </div>
                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                                <!-- /.yamm-content -->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown hidden-sm"> <a href="category.html">Health & Beauty <span
                                                class="menu-label new-menu hidden-xs">new</span> </a> </li>
                                    <li class="dropdown hidden-sm"> <a href="category.html">Watches</a> </li>
                                    <li class="dropdown"> <a href="contact.html">Jewellery</a> </li>
                                    <li class="dropdown"> <a href="contact.html">Shoes</a> </li>
                                    <li class="dropdown"> <a href="contact.html">Kids & Girls</a> </li>
                                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                                            data-toggle="dropdown">Pages</a>
                                        <ul class="dropdown-menu pages">
                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-menu">
                                                            <ul class="links">
                                                                <li><a href="home.html">Home</a></li>
                                                                <li><a href="category.html">Category</a></li>
                                                                <li><a href="detail.html">Detail</a></li>
                                                                <li><a href="shopping-cart.html">Shopping Cart
                                                                        Summary</a></li>
                                                                <li><a href="checkout.html">Checkout</a></li>
                                                                <li><a href="blog.html">Blog</a></li>
                                                                <li><a href="blog-details.html">Blog Detail</a></li>
                                                                <li><a href="contact.html">Contact</a></li>
                                                                <li><a href="sign-in.html">Sign In</a></li>
                                                                <li><a href="my-wishlist.html">Wishlist</a></li>
                                                                <li><a href="terms-conditions.html">Terms and
                                                                        Condition</a></li>
                                                                <li><a href="track-orders.html">Track Orders</a></li>
                                                                <li><a
                                                                        href="product-comparison.html">Product-Comparison</a>
                                                                </li>
                                                                <li><a href="faq.html">FAQ</a></li>
                                                                <li><a href="404.html">404</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                                </ul>
                                <!-- /.navbar-nav -->
                                <div class="clearfix"></div>
                            </div>
                            <!-- /.nav-outer -->
                        </div>
                        <!-- /.navbar-collapse -->

                    </div>
                    <!-- /.nav-bg-class -->
                </div>
                <!-- /.navbar-default -->
            </div>
            <!-- /.container-class -->

        </div>
        <!-- /.header-nav -->
        <!-- ============================================== NAVBAR : END ============================================== -->

    </header>
