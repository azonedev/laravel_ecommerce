
@extends('welcome')

    @section('title')
        Checkout - SHOPMAMA
    @endsection

@section('main')

<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form id="checkout-form" action="{{url('savecheckout')}}" method="post"  class="clearfix">

					@csrf

					<div class="col-md-6">
						<div class="billing-details">
							<!-- <p>Already a customer ? <a href="#">Login</a></p> -->
							<div class="section-title">
								<h3 class="title">Billing Details</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="first_name" placeholder="First Name" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last_name" placeholder="Last Name" required>
							</div>
							<div class="form-group">
								<input class="input" type="email" name="shipping_email" placeholder="Email" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip_code" placeholder="ZIP Code" required>
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="phone" placeholder="Telephone" required>
							</div>
							<!-- <div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="register">
									<label class="font-weak" for="register">Create Account?</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
											<p>
												<input class="input" type="password" name="password" placeholder="Enter Your Password">
									</div>
								</div>
							</div> -->
						</div>
					</div>

					<div class="col-md-6">
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Shiping Methods</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" onclick="shipcheck()" name="shipping" id="shipping1" value="40" checked>
								<label for="shipping-1">Shiping Charge - 50 ৳</label>
								<div class="caption">
									<p>Your shiping charge is only 50 taka. Happy delivery and stay happy with shopmama<p>
								</div>
							</div>
<!-- 							<div class="input-checkbox">
								<input type="radio" onclick="shipcheck()" name="shipping" id="shipping2" value="70">
								<label for="shipping-2">Out of Dhaka - 70 ৳</label>
								<div class="caption">
									<p>If you are order out of from Dhaka city.Please select this and enjoy our services
									<p>
								</div>
							</div> -->
						</div>

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Payments Methods</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" checked>
								<label for="payments-1">Cash On Delivery</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<!-- <div class="input-checkbox">
								<input type="radio" name="payments" id="payments-2">
								<label for="payments-2">Cheque Payment</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-3">
								<label for="payments-3">Paypal System</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div> -->
						</div>
					</div>

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


									 <?php $checktotal = 0 ?>
									@if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                                <?php 

                                                    // single product price calculation
                                                    $discount = $details['discount_per'];
                                                    $taka =$details['price'];
                                                    $discount_taka = $taka - (($taka/100)*$discount);


                                                    // total product price calculation
                                                     $checktotal += $discount_taka * $details['quantity'] ;

                                                     $image = $details['photo'] 
                                    ?>

									<tr>
										<td class="thumb"><img src='{{asset("public/$image")}}' alt=""></td>
										<td class="details">
											 
											<a href="#">{{$details['name']}}</a>
											<ul>
												<li><span>Size: XL</span></li>
												<li><span>Color: Camelot</span></li>
											</ul>
										</td>
										<td class="price text-center"><strong>{{$discount_taka}} ৳</strong><br><del class="font-weak"><small>{{$details['price']}} ৳</small></del></td>
										<td class="qty text-center"><input class="input" type="number" value="1"></td>
										<td class="total text-center"><strong class="primary-color">{{$discount_taka}} ৳</strong></td>
										<td class="text-right"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></td>
									</tr>
									@endforeach
								@endif
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SUBTOTAL</th>
										<th colspan="2" class="sub-total">{{$checktotal}}  ৳ </th>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SHIPING</th>
										<td colspan="2"> <span  id="shipvalue">
											
											<?php 
											if($checktotal!=null){
												echo 50; 
											}else{
												echo 00;
											}


											?>

										</span> <span> ৳</span> </td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th style="max-width:100px;" >
											<input type="text" placeholder="Enter your cupon" id="coupon" 
											class="input">
										</th>

										<td   colspan="2">
											<!-- <input onclick="getToken()" type="submit" value="Apply" class="primary-btn"> -->
											<span onclick="getToken()" class="primary-btn" style="cursor: pointer;">Apply</span>
										</td>

									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th style="max-width:100px;" >
											Discount
										</th>
										<td   colspan="2">
											<h3 class="sub-total"> <span id="discount">0</span> <span>৳</span>
											</h3>
										</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total"><span id="alltotal">
										<?php  
										if($checktotal !=null){
											echo $checktotal+50;
										}else{
											echo 0;
										}
										

											?>
										</span><span> ৳ </span> </th>
									</tr>
	                                 

	                                <!-- get esential values from cart -->
										
									<input type="hidden" name="subtotal" value="{{$checktotal}}">
									<input type="hidden" id="discountinput" name="discount" value="">
									<input type="hidden" id="alltotalinput" name="grantotal" value="{{$checktotal+50}}">




								</tfoot>
							</table>
							<div class="pull-right">
								<button type="submit" class="primary-btn">Place Order</button>
							</div>
						</div>

					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	

	@section('script')

    <script>

		// function shipcheck(){
				// var shipvalue1 = document.getElementById("shipping1").value;
				// var shipvalue2 = document.getElementById("shipping2").value;

				// document.getElementById("shipvalue").innerHTML = shipvalue2;
				
					
					

				// var total = {{$checktotal}} + shipvalue;

				// 	document.getElementById("alltotal").innerHTML = total + shipvalue;
				 
				
				
		// }

         function getToken() {
			var coupon = document.getElementById("coupon").value;
			
			

            $.ajax({
               type:'get',
               url:'update-voucer',
			  data: {_token: '{{ csrf_token() }}',coupon},
               success:function(name) {

				   // alert(name[0]['discount']);
				   
				   if(name.length<5){
					   // document.getElementById("discount").value=name[0]['discount'];

					   // discount
					   var discount = name[0]['discount'];
					   document.getElementById("discount").innerHTML = discount;

					   // shipping


					   // calculation total 
					   var cal_total =  ({{$checktotal}}-name[0]['discount'])+50;
					   document.getElementById("alltotal").innerHTML=cal_total;
					   
					   document.getElementById("discountinput").value=name[0]['discount'];
					   document.getElementById("alltotalinput").value=cal_total;
					 
				   }
				   else{
					   document.getElementById("discount").innerHTML=name;
					   document.getElementById("discountinput").value=000;
                  
					     
				   }
				  
               }
            });
         }
      </script>
   
    @endsection

@endsection
