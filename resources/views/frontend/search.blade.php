 @extends('welcome')

    @section('title')
        Your Products - SHOPMAMA
    @endsection
 @section('main')


    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Search Products</h2>
                    </div>
                </div>
                <!-- section title -->

                <!-- /Product Single -->

                <!-- Product Single -->
				@if($search_product!=null)
					@foreach($search_product as $search_pro)
	                <div class="col-md-3 col-sm-6 col-xs-6">
	                   
	                    <div class="product product-single">
	                        <div class="product-thumb">
	                            <div class="product-label">
	                                <span class="sale">-{{$search_pro->flate_price}}%</span>
	                            </div>
	                            <a href='{{url("/product-single/$search_pro->title/$search_pro->id")}}' class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
	                            <img src='{{asset("public/$search_pro->feature_image")}}'  alt="">
	                        </div>
	                        <div class="product-body">
	                            <?php 
	                                        $discount = $search_pro->flate_price;
	                                        $taka = $search_pro->buy_price ;
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
	                            <h2 class="product-name"><a href="#">{{$search_pro->title}}</a></h2>
	                            <div class="product-btns">
	                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
	                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
	                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i><a href="{{ url('add-to-cart/'.$search_pro->id) }}"> Add to Cart</a></button>
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
            <!-- /row -->

       

        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

@endsection