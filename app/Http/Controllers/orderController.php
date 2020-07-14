<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\session;
use DB;

class orderController extends Controller
{
    public function order()
    {

    	if(Session::has('email')){
            $allCat = DB::SELECT("SELECT * FROM category");

            return view('order.order',["allCat"=>$allCat]);
        }else{
            return redirect('login');
        }
    	
    }
    public function order_place(){
    	
    }
    public function allorder(){

    }
}
