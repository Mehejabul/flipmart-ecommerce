@include('website.includes.website_header')


<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <div class="breadcrumb">
                <div class="container">
                    <div class="breadcrumb-inner">
                        <ul class="list-inline list-unstyled">
                            <li><a href="home.html">Home</a></li>
                            <li class='active'>Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="body-content">
                <div class="container">
                    <div class="my-wishlist-page">
                        <div class="row">
                            <div class="col-md-12 my-wishlist">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="4" class="heading-title">My Wishlist</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $wishlists as $wishlist)

                                            @php
                                                $products = App\Models\Product::where('product_id',$wishlist->product_id)->get();
                                            @endphp
                                            <tr>
                                                @foreach ($products as $product)
                                                <td class="col-md-2"><img src="{{ asset('uploads/product/pro_img/'.$product->product_image) }}"
                                                        alt="imga"></td>
                                                <td class="col-md-7">
                                                    <div class="product-name"><a href="#">{{ $product->product_name }}</a>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star rate"></i>
                                                        <i class="fa fa-star rate"></i>
                                                        <i class="fa fa-star rate"></i>
                                                        <i class="fa fa-star rate"></i>
                                                        <i class="fa fa-star non-rate"></i>
                                                        <span class="review">( 06 Reviews )</span>
                                                    </div>
                                                    <div class="price">
                                                        <span>{{ $product->product_discount_price }}</span>
                                                    </div>
                                                </td>
                                                <td class="col-md-2">
                                                    <a href="#" class="btn-upper btn btn-primary">Add to cart</a>
                                                </td>
                                                <td class="col-md-1 close-btn">
                                                    <a href="{{ route('wishlist.delete',$product->product_slug) }}" class=""><i class="fa fa-times"></i></a>
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @include('website.includes.website_footer')
