<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class checkoutController extends Controller
{

	public function checkout(){

		$catData = DB::SELECT('SELECT * From category');
		return view('frontend.checkout',['catData'				=>	$catData,]);
	}

	public function update(Request $request)
	{
		 
		$coupon =$request->get('coupon');
		$vouchers=DB::select('select * from voucer where name=?',[$coupon]);
		
		$count = count($vouchers);
		if($count>0){
			return response()->json($vouchers, 200);
		}
		else{
			return response()->json("Have No Coupon", 200);
		}
      
       
	}

	public function savecheckout(Request $request){

		$order_id = intval(random_int(100000,999999));

		// get billing data

		$first_name = $request->get('first_name');
		$last_name = $request->get('last_name');
		$shipping_email = $request->get('shipping_email');
		$address = $request->get('address');
		$city = $request->get('city');
		$country = $request->get('country');
		$zip_code = $request->get('zip_code');
		$phone = $request->get('phone');

		// blilling data insert into users table

		// DB::insert('insert into users(first_name,last_name,shipping_email,address,city,country,zip_code,phone,order_id) values(?,?,?,?,?,?,?,?,?)',[$first_name,$last_name,$shipping_email,$address,$city,$country,$zip_code,$phone,$order_id]);


		// order placement 

		 // $product_id = $request->input('product_id');
		 // echo count($product_id);
		 // var_dump($product_id);

		// var_dump($product_id);
		// for ($i = 0; $i < count($request->product_id); $i++) {
		// $product_title = $request->get('product_title'); 
		// $price = $request->get('price'); 
		// $quantity = $request->get('quantity'); 
		// $subtotal = $request->get('subtotal');
		// $discount = $request->get('discount');
		// $grantotal = $request->get('grantotal');
		// $customer_id = 0;
		// $status = 0;
		// }

		// insert orders data into ordperplace table
		// DB::insert('insert into ordperplace(product_id,order_id,product_title,price,quantity,subtotal,discount,grantotal,customer_id,status) values(?,?,?,?,?,?,?,?,?,?)',[$product_id,$product_title,$price,$quantity,$subtotal,$discount,$grantotal,$customer_id,$status]);


		/*************

		//order placement

		***************/





		if(session('cart'))
		{
				$carts = session('cart');
				$total =0;
				// $order_id = order_id;
				$discount=00;

				foreach($carts as $id=>$details)
				{
				// var_dump($details);
						
				// single product price calculation
				$discount = $details['discount_per'];
				$taka =$details['price'];
				$discount_taka = $taka - (($taka/100)*$discount);


				// total product price calculation
				$total += $discount_taka * $details['quantity'] ;
				
				$product_title = $details["name"];
				$price = $discount_taka;
				$quantity = $details["quantity"];
				$product_id = $id;
				$subtotal = $request->get('subtotal');
				$discount = $request->get('discount');
				$grantotal = $request->get('grantotal');
				$status = 0;

				// if(Session::get('discount')==00){
				// 	$discount=00;
				// }
				// else
				// {
				// 	$discount=Session::get('discount');
				// }

				// insert orders data into ordperplace table
				DB::insert('insert into ordperplace(product_id,order_id,product_title,price,quantity,subtotal,discount,grantotal,status) values(?,?,?,?,?,?,?,?,?)',[$product_id,$product_title,$price,$quantity,$subtotal,$discount,$grantotal,$status]);

             
				//  $getproductforstock=DB::select('select quantity, sales_qty ,stock_qty  from product where id=?',[$product_id]);
				//   $convertoarray = (array)$getproductforstock;
				//   $stock_qty=0;

				// foreach($convertoarray as $single)
				// {
				// 	 $quantity+=$single->sales_qty;
				// 	 $stock_qty=$single->quantity-$quantity;
				// }
				
				//  DB::insert('update product  set sales_qty=?, stock_qty=?  where id=?',[$quantity,$stock_qty,$product_id]);
				 
				}
		}






		/*************

		//order tracking

		***************/


		$order_state = 'queue'; 
		DB::insert('insert into order_track(order_id,order_state) values(?,?)',[$order_id,$order_state]);

		
		Session::flash('checkout','Congrats! your your order checkout sucessfully.');
		$request->session()->forget('cart');


		return redirect('/');



	}

}
