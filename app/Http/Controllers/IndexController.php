<?php

namespace App\Http\Controllers;

// use Catagories;
use Illuminate\Http\Request;
use App\Catagories;
class IndexController extends Controller
{
    public function __construct()
    {
        // $this->middleware('check.permission');
    }
<<<<<<< HEAD
    
    function index(Request $req){
        // print_r(dd(session()->get('member'))));

        $catagories = Catagories::get();
        if(request()->route('id')!=null){
           if(request()->route('id')==1){
                session()->put('permission',1);
                return view('indexAdmin',["catagories"=>$catagories]);
            }else{
                session()->put('permission',0);
                return view('indexUser',["catagories"=>$catagories]);
            }
        }else{
            if(session()->get('member')['permission'] == 1 && session()->get('permission')==1 ){
                return view('indexAdmin',["catagories"=>$catagories]);
            }else{
                return view('indexUser',["catagories"=>$catagories]);
=======
    function index(Request $req)
    {
        // print_r(dd(session()->get('member'))));
        if (request()->route('id') != null) {
            if (request()->route('id') == 1) {
                session()->put('permission', 1);
            } else {
                session()->put('permission', 0);
>>>>>>> 4fd0cb3d2c45bdd65935296531961273fb3dc83b
            }
        }
        

<<<<<<< HEAD
=======
        return view("index");

        // return view('index',["catagories"=>$catagories]);
>>>>>>> 4fd0cb3d2c45bdd65935296531961273fb3dc83b
    }
}
