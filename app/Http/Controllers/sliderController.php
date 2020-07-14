<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class sliderController extends Controller
{
          public function addslider(){
        if(Session::has('email')){

            return view('slider.addslider');
        }else{
            return redirect('login');
        }    
	    } 

// save a slider
	public function saveslider(Request $request){
		if(Session::has('email')){
			$title = $request->input('title');
			$subtitle = $request->input('subtitle');
			$image = $request->file('feature_image');

            $name = time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = public_path('slider-image');
            $image->move($destinationPath, $name);
            $feature_image = 'slider-image/' . $name;

			DB::INSERT("INSERT INTO slider (title, subtitle, feature_image) VALUES (?,?,?)",[$title,$subtitle,$feature_image]);

			SESSION::flash("slider-save-msg","save success");
			return redirect()->action('sliderController@addslider');
		}else{
			return redirect('login');
		}
	}	    


// show all slider
	    public function allslider(){
	    if(Session::has('email')){
            $allslider = DB::SELECT("SELECT * FROM slider");

            return view('slider.slider',["allslider"=>$allslider]);
        }else{
            return redirect('login');
        } 
	    }

// edit a slider
		public function editslider($id){
			if(Session::has('email')){
				 $editslider = DB::SELECT("SELECT * FROM slider where id=?",[$id]);
            	// var_dump($editData);
            	return view('slider.editslider',["editslider"=>$editslider]);
			}else{
				return redirect('login');
			}
		}

// update a slider 
		public function updateslider(Request $request, $id){
			if(Session::has('email')){
			$title = $request->input('title');
			$subtitle = $request->input('subtitle');
			$image = $request->file('feature_image');

			if($image){
				$name = time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('slider-image');
	            $image->move($destinationPath, $name);
	            $feature_image = 'slider-image/' . $name;
				
				DB::update("update slider set title=?, subtitle=?, feature_image=? WHERE id=$id",[$title,$subtitle,$feature_image]);

            	SESSION::flash("slider-update-msg","update success");
				return redirect()->action('sliderController@allslider');
			}else{
				DB::update("update slider set title=?, subtitle=? WHERE id=$id",[$title,$subtitle]);

            	SESSION::flash("slider-update-msg","update success");
				return redirect()->action('sliderController@allslider');
			}

			}else{
				return redirect('login');
			}
		}
// delete a slider
	    public function deleteslider($id){
	    	DB::delete("delete FROM slider where id=?",[$id]);

	    	Session::flash('slider-del-msg','slider delete success');
			return redirect()->action("sliderController@allslider");
	    }

}
