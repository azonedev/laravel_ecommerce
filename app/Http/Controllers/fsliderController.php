<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class fsliderController extends Controller
{
          public function addfslider(){
        if(Session::has('email')){

            return view('fslider.addfslider');
        }else{
            return redirect('login');
        }    
	    } 

// save a feature slider
	public function savefslider(Request $request){
		if(Session::has('email')){
			$title = $request->input('title');
			$image = $request->file('feature_image');

            $name = time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = public_path('slider-image');
            $image->move($destinationPath, $name);
            $feature_image = 'slider-image/' . $name;

			DB::INSERT("INSERT INTO feature_slider (title, feature_slider) VALUES (?,?)",[$title,$feature_image]);

			SESSION::flash("fslider-save-msg","save success");
			return redirect()->action('fsliderController@addfslider');
		}else{
			return redirect('login');
		}
	}	    


// show all feature slider
	    public function allfslider(){
	    if(Session::has('email')){
            $allfslider = DB::SELECT("SELECT * FROM feature_slider");

            return view('fslider.fslider',["allfslider"=>$allfslider]);
        }else{
            return redirect('login');
        } 
	    }

// edit a  slider
		public function editfslider($id){
			if(Session::has('email')){
				 $editfslider = DB::SELECT("SELECT * FROM feature_slider where id=?",[$id]);
            	return view('fslider.editfslider',["editfslider"=>$editfslider]);
			}else{
				return redirect('login');
			}
		}

// update a feature slider 
		public function updatefslider(Request $request, $id){
			if(Session::has('email')){
				
			$title = $request->input('title');
			$image = $request->file('feature_image');

			if($image){
	            $name = time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('slider-image');
	            $image->move($destinationPath, $name);
	            $feature_image = 'slider-image/' . $name;
				
				DB::update("update feature_slider set title=?, feature_slider=? WHERE id=$id",[$title,$feature_image]);

            	SESSION::flash("fslider-update-msg","update success");
				return redirect()->action('fsliderController@allfslider');
			}else{
				DB::update("update feature_slider set title=? WHERE id=$id",[$title]);

            	SESSION::flash("fslider-update-msg","update success");
				return redirect()->action('fsliderController@allfslider');
			}

			}else{
				return redirect('login');
			}
		}
// delete a feature slider
	    public function deletefslider ($id){
	    	DB::delete("delete FROM feature_slider where id=?",[$id]);

	    	Session::flash('fslider-del-msg','slider delete success');
			return redirect()->action("fsliderController@allfslider");
	    }

}
