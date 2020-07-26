@extends('layouts.adminmaster')
	@section('stylesheet')
		@include('partials.csslink')
	@endsection
@section('maincontent')
	<!-- header -->
        <div id="header" >
            <div class="container" style="max-width: 95%;display: block;">
                <div class="pull-left">
                    <!-- Search -->
                    <div class="header-search">
                        <form action="{{url('pos-search')}}" method="post">
                         @csrf
                            <input name="keyword" class="input search-input" type="text" placeholder="Enter your keyword">

                            <select class="input search-categories" name="cat_id">
                                <option value="0">All Categories</option>
                                @foreach($catData as $category)
                                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- /Search -->
                </div>
                <div class="pull-right">
                    <ul class="header-btns">
                        

                        <!-- Cart -->
                        <li class="header-cart dropdown default-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="qty"> 
                                   
                                   {{ count((array) session('cart')) }}

                                     </span>
                                </div>
                                <strong class="text-uppercase">My Cart</strong>
                                <br>
                                <span> 

                                    <?php $total = 0 ?>
                                    @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                    <?php  
                                                    $discount = $details['discount_per'];
                                                    $taka =$details['price'];
                                                    $discount_taka = $taka - (($taka/100)*$discount);


                                                    // total product price calculation
                                                     $total += $discount_taka * $details['quantity'] ;

                                    ?>
                                    @endforeach
                                    @endif
                                   <?php  echo $total." ৳" ?>
                                </span>
                            </a>
                            <div class="custom-menu" style="margin: -48px; margin-top: 0px;">
                                <div id="shopping-cart">
                                    <div class="shopping-cart-list">
                                           
 
                                                 @if(session('cart'))
                                                    @foreach(session('cart') as $id => $details)
                                                <?php 

                                                    // single product price calculation
                                                    $discount = $details['discount_per'];
                                                    $taka =$details['price'];
                                                    $discount_taka = $taka - (($taka/100)*$discount);


                                                    // total product price calculation
                                                     $total += $discount_taka * $details['quantity'] ;
                                                ?>

                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <?php $image = $details['photo'] 

                                                ?>
                                                <img src='{{asset("public/$image")}}'alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price">{{$discount_taka}} ৳</span></h3>
                                                <h2 class="product-name"><a href="#">{{$details['name']}} </a></h2>
                                            </div>
                                            <button class="cancel-btn"><a href="{{url('remove-cart').'/'.$id}}"><i class="fa fa-trash"></i></a></button>
                                        </div>

                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="shopping-cart-btns">
                                        <button class="main-btn"><a href="{{url('view-cart')}}">View Cart</a></button>
                                        <button class="primary-btn"><a href="{{url('checkout')}}" style="color:white">Checkout <i class="fa fa-arrow-circle-right"></i></a></button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- /Cart -->

                        <!-- Mobile nav toggle-->
                        <li class="nav-toggle">
                            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                        </li>
                        <!-- / Mobile nav toggle -->
                    </ul>
                </div>
            </div>
            <!-- header -->
        </div>
        <!-- container -->
    </header>
    <!-- /HEADER -->

    <!-- product -->
		
		@foreach($latest_product  as $product)

				<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
					<div class="product product-single">
							<img style="max-width: 100%;max-height:211px;min-height: 210px" src='{{asset("public/$product->feature_image")}}' alt="">
						<div class="product-body">
							<h4>$32.50</h4>
							<h5><a href="#">{{$product->title}}</a></h5>
							<div class="product-btns">
								<div class="btn-group">
				                  	<button type="button" class="btn btn-theme btn-block"><i class="fa fa-shopping-cart"></i><a href="{{ url('add-to-cart/'.$product->id) }}" style="color:white;"> Add to Cart</a> </button>
				                </div>
							</div>
						</div>
					</div>
				</div>
		@endforeach
	<!-- / product -->
	
<!-- cart product details -->
				<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Cart Product Review</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
                                    <?php $total = 0 ?>
									@if(session('cart'))
                                                    @foreach(session('cart') as $id => $details)
                                                <?php 

                                                    // single product price calculation
                                                    $discount = $details['discount_per'];
                                                    $taka =$details['price'];
                                                    $discount_taka = $taka - (($taka/100)*$discount);


                                                    // total product price calculation
                                                     $total += $discount_taka * $details['quantity'] ;


                                                     $image = $details['photo'];
                                                ?>
									<tr>
										<td class="thumb"><img src='{{asset("public/$image")}}' alt=""></td>
										<td >
											<!-- <a href="#">{{$details['name']}}</a> -->
											<h3>{{$details['name']}}</h3>
											<ul>
												<!-- <li><span>Size: XL</span></li>
												<li><span>Color: Camelot</span></li> -->
											</ul>
										</td>
										<td class="price text-center"><strong>{{$discount_taka}} ৳</strong><br><del class="font-weak"><small>{{$details['price']}} ৳</small></del></td>
										<td class="qty text-center"><input class="input" type="number" value="1"></td>
										<td class="total text-center"><strong class="primary-color">{{$discount_taka}} ৳</strong></td>
										<td class="text-right"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></td>
									</tr>
									@endforeach
								@endif
							</table>
							

						</div>
						<br>
					</div>
<!-- /end cart product detials  -->
@endsection