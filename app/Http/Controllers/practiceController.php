<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class practiceController extends Controller
{
    public function index($age){
        if($age>18){
            return "Permission granted";
        }
        return redirect()->action('practiceController@contract');
    }
    public function contract(){
        return "xyz";
    }
}
