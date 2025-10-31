<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function index(){ 
        $name = "Oscar";
        return view('index',["nam"=>$name]);
    }

    public function dashboardIndex(){
        return view('dashboard.index');
    }
}