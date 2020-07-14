<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use DB;

class cuponController extends Controller
{
    //
    // add new category
       public function addcupon(){
        if(Session::has('email')){

            return view('cupon.addcupon');
        }else{
            return redirect('login');
        }    
	    } 

// save a category
	public function savecupon(Request $request){
		if(Session::has('email')){
			$cupon_name = $request->input('cupon_name');
			$discount = $request->input('discount');

			DB::INSERT("INSERT INTO voucer (name, discount) VALUES (?,?)",[$cupon_name,$discount]);

			SESSION::flash("discount-save-msg","save success");
			return redirect()->action('cuponController@addcupon');
		}else{
			return redirect('login');
		}
	}	    


// show all category
	    public function allcupon(){
	    if(Session::has('email')){
            $allCupon = DB::SELECT("SELECT * FROM voucer");

            return view('cupon.cupon',["allCupon"=>$allCupon]);
        }else{
            return redirect('login');
        } 
	    }

// edit a category
		public function editcupon($id){
			if(Session::has('email')){
				 $editCupon = DB::SELECT("SELECT * FROM voucer where id=?",[$id]);
            	// var_dump($editData);
            	return view('cat.editcat',["editCat"=>$editCupon]);
			}else{
				return redirect('login');
			}
		}

// update a category 
		public function updatecupon(Request $request, $id){
			if(Session::has('email')){
				$cupon_name = $request->input('cat_name');
				$discount = $request->input('discount');
				DB::update("update voucer set name=?, discount=? WHERE id=$id",[$cupon_name,$discount]);

            	SESSION::flash("cupon-update-msg","update success");
				return redirect()->action('cuponController@allcupon');
			}else{
				return redirect('login');
			}
		}

// delete a category
		public function deletecupon($id){
			if(Session::has('email')){
				echo $id;
				DB::DELETE("DELETE from voucer where id=?",[$id]);
				Session::flash('cupon-del-msg','cupon delete done');
				return redirect()->action('cuponController@allcupon');
			}else{
				return redirect('login');
			}
		}

}
