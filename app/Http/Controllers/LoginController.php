<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    function index(){
        if(Session::has('username'))
            return redirect('index');
        return view('login');
    }
    function checkLogin(Request $req){
        $username = $req->get('username');
        $password = $req->get('password');
        if($username !=null && $password!=null){
            $uri = "http://158.108.207.4/se62_01/ldap.php?username=$username&password=$password";
            $response = \Httpful\Request::get($uri)->send();
            $arr = json_decode($response, true);
            if($arr!=''){
                Session::put("username",$username);
                return redirect("index");
            }

            else{
               $msg = "ชื่อผู้ใช้หรือรหัสผ่านคุณผิด";
                return view("login", array('msg' => $msg));
            }

        }else{
            $msg = "คุณต้องกรอกชื่อผู้ใช้และรหัสผ่าน";
            return view("login", array('msg' => $msg));
        }
    }
    function logout(){
        Session::flush();
        return view('login');
    }
}
