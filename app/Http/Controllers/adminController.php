<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use DB;

class adminController extends Controller
{

    public function adminhome(){
        if(Session::has('email')){
            return view('layouts.adminhome');
        }else{
            return redirect('login');
        }
        
    } 

// add role 
    public function addrole(){
          if(Session::has('email')){
            return view('role.addrole');
        }else{
            return redirect('login');
        }
    }

// save new role 

    public function saverole(Request $request){
          if(Session::has('email')){
            $role = $request->input('role');
            $status_code = $request->input('status_code');
            
            DB::INSERT('INSERT INTO role(role,status_code) VALUES(?,?)',[$role,$status_code]);

            // Session::flash('role-save-msg','saved your role');
            SESSION::flash("role-save-msg","save success");
            return redirect()->action('adminController@addrole');

        }else{
            return redirect('login');
        }
    }

// all role view
   public function allrole(){
        
          if(Session::has('email')){
            $allRole = DB::SELECT("SELECT * FROM role");

            return view('role.role',['allRole'=>$allRole]);
        }else{
            return redirect('login');
        }
    } 

//edit role
    public function editrole($id){
        if(Session::has('email')){
            $editRole = DB::SELECT("SELECT * FROM role where id=?",[$id]);
            
            return view('role.editrole',["editRole"=>$editRole]);


        }else{
            return redirect('login');
        }
    }

// Update role
    public function updaterole(Request $request,$id){
        if(Session::has('email')){

            $role = $request->input('role');
            $status_code = $request->input('status_code');

            DB::UPDATE("update role set role=?, status_code=? where id=$id",[$role,$status_code]);
            Session::flash('role-upadte-msg','role update success');
            return redirect()->action('adminController@allrole');
        }else{
            return redirect('login');
        }
    }

// Delete role
    public function deleterole($id){
        if(Session::has('email')){
            DB::delete("delete from role where id=?",[$id]);
            Session::flash('role-del-msg','role delete success');
            return redirect()->action('adminController@allrole');
        }else{
            return redirect('login');
        }
    }
}
