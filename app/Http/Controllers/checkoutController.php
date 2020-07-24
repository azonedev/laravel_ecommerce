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

/*************

//Update billing info 

***************/

		if(Session::has('email')){
			$user_email = Session::get('email');

			// get billing data
			$first_name = $request->get('first_name');
			$last_name = $request->get('last_name');
			$shipping_email = $request->get('shipping_email');
			$address = $request->get('address');
			$city = $request->get('city');
			$country = $request->get('country');
			$zip_code = $request->get('zip_code');
			$phone = $request->get('phone');


			// Update user information on user table
			DB::update("
				UPDATE users
				SET 
					first_name = ?,
					last_name = ?,
					shipping_email = ?,
					address = ?,
					city = ?,
					country =?,
					zip_code= ?,
					phone = ?,
					order_id = ?
				WHERE 
					email='$user_email';
				",

				[
					$first_name,
					$last_name,
					$shipping_email,
					$address,
					$city,$country,
					$zip_code,
					$phone,
					$order_id
				]
			);


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

				$product_id = $id;
				$product_title = $details["name"];
				$price = $discount_taka;
				$quantity = $details["quantity"];
				$subtotal = $request->get('subtotal');
				$discount = $request->get('discount');
				$grantotal = $request->get('grantotal');
				$user_id = Session::get('user_id');

				// insert orders data into ordperplace table
				DB::insert('insert into ordperplace 
					(
						product_id,
						order_id,
						product_title,
						price,
						quantity,
						subtotal,
						discount,
						grantotal,
						customer_id
					)

					values(?,?,?,?,?,?,?,?,?)',

					[
						$product_id,
						$order_id,
						$product_title,
						$price,
						$quantity,
						$subtotal,
						$discount,
						$grantotal,
						$user_id
					]
				);




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
		DB::insert('insert into order_track
			(
				order_id,
				order_state
			) 

			values(?,?)',
			[
				$order_id,
				$order_state
			]);

/*************

//orders table

***************/


				DB::insert('
					insert into orders
					(
						user_id,
						debit,
						credit,
						balance
					)

					values(?,?,?,?)',
					[
						$user_id,$grantotal,500,500
					]
				);

/*************

//Ledger table

***************/

				$description ="$product_title $product_id $order_id $price  $quantity $subtotal $discount $grantotal $user_id";
				DB::insert('insert into ledger(description) values(?)',[$description]);

		Session::flash('checkout','Congrats! your your order checkout sucessfully.');
		$request->session()->forget('cart');


		return redirect('/');


		}else{
			return redirect('/login');
		}

	}

}
