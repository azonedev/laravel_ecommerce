@extends('welcome')

	@section('title')
		
	@endsection

@section('main')
@foreach($product as $product)

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li><a href="{{url('/shop')}}">Products</a></li>

						@foreach($catData as $cat)
							@if(($cat->id)==($product->cat_id))
								<li><a href='{{url("/$cat->cat_name/$cat->id")}}'>{{$cat->cat_name}}</a></li>
							@endif
						@endforeach



				<li class="active">{{$product->title}}</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->



	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
			
			

				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src='{{asset("public/$product->feature_image")}}' alt="">
							</div>
							@foreach($product_image as $pro_image)
							<div class="product-view">
								<img src='{{asset("public/$pro_image->image_url")}}' alt="">
							</div>
							@endforeach
						</div>
						<div id="product-view">
							<div class="product-view">
								<img src='{{asset("public/$product->feature_image")}}' alt="">
							</div>
							@foreach($product_image as $pro_image)
							<div class="product-view">
								<img src='{{asset("public/$pro_image->image_url")}}' alt="">
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<div class="product-label">
								<span class="sale">-{{$product->flate_price}}%</span>
							</div>
							<h2 class="product-name">{{$product->title}}</h2>
                            <?php 
                                        $discount = $product->flate_price;
                                        $taka = $product->buy_price ;
                                        $discount_taka = $taka - (($taka/100)*$discount);
                            ?>
                            <h3 class="product-price">{{$discount_taka}} ৳ <del class="product-old-price">{{$taka}} ৳ </del></h3>
<!-- 							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<a href="#">3 Review(s) / Add Review</a>
							</div> -->
							<p><strong>Availability:</strong> In Stock</p>

						@foreach($catData as $cat)
							@if(($cat->id)==($product->cat_id))
							<p><strong>Brand:</strong> {{$cat->cat_name}}  </p>
							@endif
						@endforeach

							<p>{{$product->shortdes}}</p>
							<div class="product-options">
<!-- 								<ul class="size-option">
									<li><span class="text-uppercase">Size:</span></li>
									<li class="active"><a href="#">S</a></li>
									<li><a href="#">XL</a></li>
									<li><a href="#">SL</a></li>
								</ul>
								<ul class="color-option">
									<li><span class="text-uppercase">Color:</span></li>
									<li class="active"><a href="#" style="background-color:#475984;"></a></li>
									<li><a href="#" style="background-color:#8A2454;"></a></li>
									<li><a href="#" style="background-color:#BF6989;"></a></li>
									<li><a href="#" style="background-color:#9A54D8;"></a></li>
								</ul> -->
							</div>

							<div class="product-btns">
								<div class="qty-input">
									<span class="text-uppercase">QTY: </span>
									<input class="input" type="number" value="1">
								</div>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i><a href="{{ url('add-to-cart/'.$product->id) }}" style="color:white;"> Add to Cart</a> </button>
								<div class="pull-right">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
								
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<p>{{$product->shortdes}}</p>
								</div>

								<div id="tab2" class="tab-pane fade in active">
									<p>{{$product->product_info}}</p>
								</div>

							</div>
						</div>
					</div>

				</div>

			@endforeach

				<!-- /Product Details -->
			</div>
			<!-- /row -->

		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- pick for you product section -->

		<div class="container">
			<div class="row">
				@include('partials.pick-product')
			</div>
		</div>
		
	<!-- /section -->


@endsection