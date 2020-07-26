<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use DB;
class posController extends Controller
{
    //

    public function product()
    {
        if(Session::has('email')){
			$catData = DB::SELECT('SELECT * From category');
	    	$latest_product = DB::SELECT('
		    		SELECT * FROM product 
		    		ORDER BY ID
		    		DESC LIMIT 6
	    		');

			return view('pos.product',
	            [
	                'catData'               =>  $catData,
	                'latest_product' 		=> $latest_product
	            ]
	        );
        }else{
            return redirect('login');
        }
    }

    // search 
    public function search(Request $request){

        if(Session::has('email')){
		    $cat_id = $request->input('cat_id');
	        $keyword = $request->input('keyword');
	        $catData = DB::SELECT('SELECT * From category');
	        $search_query = DB::SELECT("

		        	SELECT * from product
		        	 where `title` OR`tag` LIKE '%".$keyword."%'
		        	 AND
		        	 cat_id=".$cat_id."
		        	 
	        	 ");

	       
	        return view('pos.pos-search',[
	            'search_product'           =>  $search_query,
	            'catData'               =>  $catData,

	        ]);
        }else{
            return redirect('login');
        }
    }
}
