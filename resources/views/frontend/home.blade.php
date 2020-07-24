@extends('welcome')
@section('title')
Welcome to - SHOPMAMA
@endsection
@section('main')



    <!-- HOME -->
    <div id="home">
        <!-- container -->
        <div class="container">
            <!-- home wrap -->
            <div class="home-wrap">
                <!-- home slick -->
                <div id="home-slick">
                    <!-- banner -->
                    @foreach($sliderData as $slider)
                    <div class="banner banner-1">
                        <img src='{{asset("public/$slider->feature_image")}}' alt="">
                        <div class="banner-caption text-center">
                            <h1 style="color:#F8694A;">{{$slider->title}}</h1>
                            <h3 class="white-color font-weak">{{$slider->subtitle}}</h3>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                    @endforeach
                    <!-- /banner -->
                </div>
                <!-- /home slick -->
            </div>
            <!-- /home wrap -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOME -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                @foreach($feature_sliderData as $feature)
                <!-- banner -->
                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                    <a class="banner banner-1" href="#">
                        <img src='{{asset("public/$feature->feature_slider")}}' alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">{{$feature->title}}</h2>
                        </div>
                    </a>
                </div>
                @endforeach
                <!-- /banner -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section-title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Deals Of The Day</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->

                <!-- banner -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="banner banner-2">
                        <img src="{{asset('public/assets/./img/banner14.jpg')}}" alt="">
                        <div class="banner-caption">
                            <h2 class="white-color">NEW<br>COLLECTION</h2>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- Product Slick -->
                <div class="col-md-9 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">
                            
                            <!-- /Product Single -->
                            @foreach($deals_product as $deal_pro)
                            <!-- Product Single -->
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span class="sale">-{{$deal_pro->flate_price}}%</span>
                                    </div>

                                    <ul class="product-countdown">
                                        <li><span>00 H</span></li>
                                        <li><span>00 M</span></li>
                                        <li><span>00 S</span></li>
                                    </ul>
                                    <a href='{{url("/product-single/$deal_pro->title/$deal_pro->id")}}' class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
                                    <img src='{{asset("public/$deal_pro->feature_image")}}' alt="">
                                </div>
                                <div class="product-body">
                                    <?php 
                                        $discount = $deal_pro->flate_price;
                                        $taka = $deal_pro->buy_price ;
                                        $discount_taka = $taka - (($taka/100)*$discount);
                                    ?>
                                    <h3 class="product-price">{{$discount_taka}} ৳ <del class="product-old-price">{{$taka}} ৳ </del></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name"><a href="#">{{$deal_pro->title}}</a></h2>
                                    <div class="product-btns">
                                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i><a href="{{ url('add-to-cart/'.$deal_pro->id) }}" style="color: white"> Add to Cart</a> </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Top Of The Day</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-2 custom-dots">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single product-hot">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span class="sale">-20%</span>
                            </div>
                            <ul class="product-countdown">
                                <li><span>01 H</span></li>
                                <li><span>30 M</span></li>
                                <li><span>30 S</span></li>
                            </ul>
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                            <img src="{{asset('public/assets/./img/product01.jpg')}}" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->

                <!-- Product Slick -->
                <div class="col-md-9 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-2" class="product-slick">
                            <!-- Product Single -->
                            @foreach($top_product as $top_pro)
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span class="sale">-{{$top_pro->flate_price}}%</span>
                                    </div>
                                    <a href='{{url("/product-single/$top_pro->title/$top_pro->id")}}' class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
                                    <img src='{{asset("public/$top_pro->feature_image")}}'alt="">
                                </div>
                                <?php 
                                        $discount = $top_pro->flate_price;
                                        $taka = $top_pro->buy_price ;
                                        $discount_taka = $taka - (($taka/100)*$discount);
                                    ?>
                                <div class="product-body">
                                    <h3 class="product-price">{{$discount_taka}} ৳ <del class="product-old-price">{{$taka}} ৳ </del></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name"><a href="#">{{$top_pro->title}}</a></h2>
                                    <div class="product-btns">
                                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> <a href="{{ url('add-to-cart/'.$top_pro->id) }}" style="color: white">Add to Cart</a> </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section section-grey">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- banner -->
                <div class="col-md-8">
                
                <!-- single banner show from slider -->
                    @foreach($single_slider as $single_slide)
                    <div class="banner banner-1">
                        <img src='{{asset("public/$single_slide->feature_image")}}' alt="">
                        <div class="banner-caption text-center">
                            <h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /banner -->
                @foreach($double_feature as $double_feature_slider)
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src='{{asset("public/$double_feature_slider->feature_slider")}}' alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">{{$double_feature_slider->title}}</h2>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Latest Products</h2>
                    </div>
                </div>
                <!-- section title -->

                <!-- /Product Single -->

                <!-- Product Single -->
                 @foreach($latest_product as $latest_pro)
                <div class="col-md-3 col-sm-6 col-xs-6">
                   
                    <div class="product product-single">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span class="sale">-{{$latest_pro->flate_price}}%</span>
                            </div>
                            <a href='{{url("/product-single/<1latest_pro></1latest_pro>->title/$latest_pro->id")}}' class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
                            <img src='{{asset("public/$latest_pro->feature_image")}}'  alt="">
                        </div>
                        <div class="product-body">
                            <?php 
                                        $discount = $latest_pro->flate_price;
                                        $taka = $latest_pro->buy_price ;
                                        $discount_taka = $taka - (($taka/100)*$discount);
                            ?>
                            <h3 class="product-price">{{$discount_taka}} ৳ <del class="product-old-price">{{$taka}} ৳ </del></h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="#">{{$latest_pro->title}}</a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i><a href="{{ url('add-to-cart/'.$latest_pro->id) }}" style="color: white"> Add to Cart</a></button>
                            </div>
                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <!-- banner -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="banner banner-2">
                        <img src="{{asset('public/assets/./img/banner15.jpg')}}" alt="">
                        <div class="banner-caption">
                            <h2 class="white-color">NEW<br>COLLECTION</h2>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                 @foreach($new_product as $new_pro)
                <div class="col-md-3 col-sm-6 col-xs-6">
                   
                    <div class="product product-single">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span class="sale">-{{$new_pro->flate_price}}%</span>
                            </div>
                            <a href='{{url("/product-single/$new_pro->title/$new_pro->id")}}' class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
                            <img src='{{asset("public/$new_pro->feature_image")}}'  alt="">
                        </div>
                        <div class="product-body">
                            <?php 
                                        $discount = $new_pro->flate_price;
                                        $taka = $new_pro->buy_price ;
                                        $discount_taka = $taka - (($taka/100)*$discount);
                            ?>
                            <h3 class="product-price">{{$discount_taka}} ৳ <del class="product-old-price">{{$taka}} ৳ </del></h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="#">{{$new_pro->title}}</a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> <a href="{{ url('add-to-cart/'.$new_pro->id) }}" style="color: white">Add to Cart</a> </button>
                            </div>
                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>
            <!-- /row -->
            <!-- Picked For You -->
                @include('partials.pick-product')
            <!-- end pick for you section -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

@endsection