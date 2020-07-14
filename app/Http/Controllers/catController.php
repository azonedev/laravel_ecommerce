<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use DB;
class catController extends Controller
{

// add new category
       public function addcat(){
        if(Session::has('email')){

            return view('cat.addcat');
        }else{
            return redirect('login');
        }    
	    } 

// save a category
	public function catsave(Request $request){
		if(Session::has('email')){
			$cat_name = $request->input('cat_name');
			$cat_code = $request->input('cat_code');
			$user_id = Session::get('user_id');

			DB::INSERT("INSERT INTO category (cat_name, cat_code, user_id) VALUES (?,?,?)",[$cat_name,$cat_code,$user_id]);

			SESSION::flash("cat-save-msg","save success");
			return redirect()->action('catController@addcat');
		}else{
			return redirect('login');
		}
	}	    


// show all category
	    public function allcat(){
	    if(Session::has('email')){
            $allCat = DB::SELECT("SELECT * FROM category");

            return view('cat.cat',["allCat"=>$allCat]);
        }else{
            return redirect('login');
        } 
	    }

// edit a category
		public function editcat($id){
			if(Session::has('email')){
				 $editCat = DB::SELECT("SELECT * FROM category where id=?",[$id]);
            	// var_dump($editData);
            	return view('cat.editcat',["editCat"=>$editCat]);
			}else{
				return redirect('login');
			}
		}

// update a category 
		public function updatecat(Request $request, $id){
			if(Session::has('email')){
				$cat_id = $id;
				$cat_name = $request->input('cat_name');
				$cat_code = $request->input('cat_code');
				DB::update("update category set cat_name=?, cat_code=? WHERE id=$cat_id",[$cat_name,$cat_code]);

            	SESSION::flash("cat-update-msg","update success");
				return redirect()->action('catController@allcat');
			}else{
				return redirect('login');
			}
		}

// delete a category
		public function deletecat($id){
			if(Session::has('email')){
				// echo $id;
				DB::DELETE("DELETE from category where id=?",[$id]);
				Session::flash('cat-del-msg','category delete done');
				return redirect()->action('catController@allcat');
			}else{
				return redirect('login');
			}
		}


}


