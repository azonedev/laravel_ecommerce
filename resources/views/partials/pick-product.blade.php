            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Picked For You</h2>
                    </div>
                </div>
                <!-- section title -->
                 @foreach($pick_product as $pick_pro)
                <div class="col-md-3 col-sm-6 col-xs-6">
                   
                    <div class="product product-single">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span class="sale">-{{$pick_pro->flate_price}}%</span>
                            </div>
                            <a href='{{url("/product-single/$pick_pro->title/$pick_pro->id")}}' class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
                            <img src='{{asset("public/$pick_pro->feature_image")}}'  alt="">
                        </div>
                        <div class="product-body">
                            <?php 
                                        $discount = $pick_pro->flate_price;
                                        $taka = $pick_pro->buy_price ;
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
                            <h2 class="product-name"><a href="#">{{$pick_pro->title}}</a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i><a href="{{ url('add-to-cart/'.$pick_pro->id) }}" style="color:white;"> Add to Cart</a> </button>
                            </div>
                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>
            <!-- /row -->