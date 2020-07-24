  @extends('welcome')

    @section('title')
        Women Product - SHOPMAMA
    @endsection
 @section('main')



    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Women</li>
            </ul>
        </div>
    </div>


    <!-- show all product -->

    <div class="container">
        <div class="row">
                            <!-- Product Single -->
                @if($womenproduct!=null)
                    @foreach($womenproduct as $womenpro)
                    <div class="col-md-3 col-sm-6 col-xs-6">
                       
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    <span class="sale">-{{$womenpro->flate_price}}%</span>
                                </div>
                                 <a href='{{url("/product-single/$womenpro->title/$womenpro->id")}}' class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
                                <img src='{{asset("public/$womenpro->feature_image")}}'  alt="">
                            </div>
                            <div class="product-body">
                                <?php 
                                            $discount = $womenpro->flate_price;
                                            $taka = $womenpro->buy_price ;
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
                                <h2 class="product-name"><a href="#">{{$womenpro->title}}</a></h2>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i><a href="{{ url('add-to-cart/'.$womenpro->id) }}" style="color: white"> Add to Cart</a></button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                @else
                <br>
                    <h3 align="center" style="color:red;">Sorry! No product found </h3>
                <br>
                @endif
        </div>
    </div>
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

@endsection
