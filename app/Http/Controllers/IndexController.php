<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagories;
class IndexController extends Controller
{
    public function __construct(){
        // $this->middleware('check.permission');
    }
    function index(Request $req){
        // print_r(dd(session()->get('member'))));
        if(request()->route('id')!=null){
           if(request()->route('id')==1){
            session()->put('permission',1);
            }else{
                session()->put('permission',0);
            }
        }

        $catagories = Catagories::find(1)->accessories()->get();
        foreach($catagories as $item){
            echo $item->name;
        }
        // return view('index',["catagories"=>$catagories]);
    }
}
