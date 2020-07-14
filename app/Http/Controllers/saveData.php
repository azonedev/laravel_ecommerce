<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class saveData extends Controller
{
    function consultationSave(Request $request){
        $name = $request->input('name');
        $phone =  $request->input('phone');
        $service = $request->input('select');
        $email = $request->input('email');
        $message = $request->input('message');
        echo $name.$phone.$service.$email.$message;
    }

    function newsletterSave(){
        return "do something newsletterSave";
    }
}
