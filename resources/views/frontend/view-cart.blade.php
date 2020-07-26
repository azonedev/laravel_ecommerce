 @extends('welcome')

    @section('title')
        View Cart - SHOPMAMA
    @endsection
 @section('main')



    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Viewcart</li>
            </ul>
        </div>
    </div>
        <!-- container -->

		<div class="container">
			<!-- row -->
			<div class="row">
				<form id="checkout-form" class="clearfix">

					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
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
										<td class="details">
											<a href="#">{{$details['name']}}</a>
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
							<div class="pull-left">
								<button class="primary-btn"><a href="{{url('/')}}" style="color:white">CONTINUE SHOPPING</a></button>
							</div><div class="pull-right">
                                <button class="primary-btn"><a href="{{url('/checkout')}}" style="color:white">Checkout</a></button>
                            </div>

						</div>
						<br>
					</div>
				</form>
			</div>
			<!-- /row -->
		</div>


@endsection