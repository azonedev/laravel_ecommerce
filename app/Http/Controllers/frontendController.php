<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class frontendController extends Controller
{
    public function index(){
    	$catData = DB::SELECT('SELECT * From category');
    	$sliderData = DB::SELECT('SELECT * From slider ORDER BY ID DESC');
    	$feature_slider = DB::SELECT('SELECT * FROM feature_slider ORDER BY ID DESC LIMIT 3');

    	$single_slider = DB::SELECT('SELECT * FROM slider ORDER BY ID DESC LIMIT 1');
    	$double_feature = DB::SELECT('SELECT * FROM feature_slider ORDER BY ID DESC LIMIT 2');

    	$deals_product = DB::SELECT('SELECT * FROM product where section=
    		? ORDER BY ID DESC ',['1']);
    	$top_product = DB::SELECT('SELECT * FROM product where section=2 ORDER BY ID DESC ');
    	$latest_product = DB::SELECT('SELECT * FROM product ORDER BY ID DESC LIMIT 4');
    	$new_product = DB::SELECT('SELECT * FROM product where section=3 ORDER BY ID DESC LIMIT 3');
    	$pick_product = DB::SELECT('SELECT * FROM product where section=4 ORDER BY ID DESC ');

    	// exit();
    	return view('frontend.home',
    		[
    			'catData'				=>	$catData,
    			'sliderData'			=>	$sliderData,
    			'feature_sliderData'	=>	$feature_slider,

    			'single_slider'			=> 	$single_slider,
    			'double_feature' 		=>	$double_feature,
    			
    			'deals_product'			=>	$deals_product,
    			'top_product'			=>	$top_product,
    			'latest_product'		=>	$latest_product,
    			'new_product'			=>	$new_product,
    			'pick_product'			=>	$pick_product
    		]
    	);
    }

// search 
    public function search(Request $request){
        $cat_id = $request->input('cat_id');
        $keyword = $request->input('keyword');
        $catData = DB::SELECT('SELECT * From category');
        $search_query = DB::SELECT("SELECT * from product where `title` OR`tag` LIKE '%".$keyword."%' AND cat_id=".$cat_id."");

       
        return view('frontend.search',[
            'search_product'           =>  $search_query,
            'catData'               =>  $catData,

        ]);
    }

// about page
    public function about()
    {
        $catData = DB::SELECT('SELECT * From category');
        $menquery = DB::SELECT("SELECT * FROM product where cat_id=2 ORDER BY ID DESC");

        return view('frontend.about',
            [
                'catData'               =>  $catData,
               
            ]
        );
    }

// single category product show on single page 
    public function category($catName,$catId){
        $cat_id = $catId;
        $catData = DB::SELECT('SELECT * From category');
        $catProductQuery = DB::SELECT("SELECT * From product where cat_id=$cat_id");
      
        return view('frontend.category',
            [
                'catData'               =>  $catData,
                'catName'               =>  $catName,
                'catProduct'            =>  $catProductQuery 

            ]
        );
    }


// show product on shop page
    public function shop()
    {
        $catData = DB::SELECT('SELECT * From category');
        $shopquery = DB::SELECT('SELECT * FROM product ORDER BY ID DESC LIMIT 28');

        return view('frontend.shop',
            [
                'catData'               =>  $catData,
                'shopproduct'            =>  $shopquery,
            ]
        );
    }

// show product on women page by women category
    public function women()
    {
        $catData = DB::SELECT('SELECT * From category');
        $womenquery = DB::SELECT("SELECT * FROM product where cat_id=7 ORDER BY ID DESC");

        return view('frontend.women',
            [
                'catData'               =>  $catData,
                'womenproduct'            =>  $womenquery,
            ]
        );
    }

// show product on women page by women category
    public function men()
    {
        $catData = DB::SELECT('SELECT * From category');
        $menquery = DB::SELECT("SELECT * FROM product where cat_id=2 ORDER BY ID DESC");

        return view('frontend.men',
            [
                'catData'               =>  $catData,
                'menproduct'            =>  $menquery,
            ]
        );
    }


// show single product page

    public function product_single($name,$id)
    {
        $catData = DB::SELECT('SELECT * From category');
        $pick_product = DB::SELECT('SELECT * FROM product where section=4 ORDER BY ID DESC ');
        $product_details = DB::SELECT("SELECT * FROM product where id = ?",[$id]);
        $product_image = DB::SELECT("SELECT * From product_image where product_id = ?",[$id]);
        return view('frontend.single-product',
            [
                'catData'               =>  $catData,
                'pick_product'          =>  $pick_product,
                'product'               =>  $product_details,
                'product_image'         =>  $product_image,
            ]
        );

    }

// contact page

    public function contact()
    {
        $catData = DB::SELECT('SELECT * From category');
        return view('frontend.contact',
            [
                'catData'           =>  $catData 
            ]
        );
    }


}

