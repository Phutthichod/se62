<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class IndexController extends Controller
{
    public function __construct(){
        // $this->middleware('check.permission');
    }
    function index(){


         return view("index");
    }
}
