<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use Mail;

class userController extends Controller
{

//   Registraction Form
    
    function registerview(){
        if(Session::has('email')){
            return redirect('adminhome');
        }else{
        return view('user.registerform');
        }
    }
    
// Registraction data save
    function saveregister(Request $request){
        $reg_data = array();
        $reg_data['username'] = $request->input('username');
        $reg_data['email'] = $request->input('email');
        $image = $request->file('image') ;

        // GENERATE Password 
        $a = '#bA' . rand(1000, 9999) . 'a@b';
        $b = 'c$x' . rand(1505, 8585) . '!b#';
        $c = '?xR' . rand(2596, 7895) . '/4r';
        $d = ["$a", "$b", "$c"][rand(0, 1)];
        $reg_data['password'] = ["$d", "$c"][rand(1, 0)];




            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.".".$ext;
            $image_upload_path = base_path()."/public/image/";
            $uploaded = $image->move($image_upload_path, $image_full_name);
            $reg_data['photo_url'] = "public/image/".$image_full_name;

            DB::table('users')->insert($reg_data);

 // start reg & send password by email 
        $password = $reg_data['password'];
        $to = $reg_data['email'];
        $name = $reg_data['username'];
        $inputs = [
            'username' => $name,
            'pwd' => $password,
            'email' => $to
        ];
        
        Mail::send('emails.mail',$inputs,function($mail) use ($inputs){
          $mail->subject('SHOPMAMA - user login password');
              $mail ->to($inputs['email'],'Abdullah');
              $mail ->from('azonedev@azonedev.com','SHOPMAMA MAIL SERVER');
        });
        
// Redirect and flash message
        Session::flash('msg', 'Register success,Check your mail and login ..');
        return redirect('login');
        
        
        
    }
    
    public function loginview()
    {
        if(Session::has('email')){
            return redirect('adminhome');
        }else{
                    return view('user.loginform');
        }

    }
    public function checklogin(Request $request)
    {
       $user_email = $request->input('user_email');
       $password = $request->input('password');

       $users =  DB::select("SELECT * FROM users WHERE email=? AND password =?",[$user_email,$password]);

       if(count($users)>0){

            foreach($users as $user){
                $user_id = $user->id;
                $user_name = $user->username;
                $email = $user->email;
                $user->password;
                $photo = $user->photo_url;
            }
            $request->session()->put('msg','Log in sucess !');
            $request->session()->put('user_id',$user_id);
            $request->session()->put('user_name',$user_name);
            $request->session()->put('email',$email);
            $request->session()->put('photo',$photo);

            
            return redirect('adminhome');
        }
        else{
            Session::flash('msg',"Sorry login fail, try again");
            return redirect('login');
 
       }

    }

    public function logout(Request $request){

        $request->session()->forget('email');
        $request->session()->forget('user_name');
        $request->session()->forget('user_id');
        $request->session()->forget('msg');
        $request->session()->forget('photo');
        return redirect('login');

    }
    



}
