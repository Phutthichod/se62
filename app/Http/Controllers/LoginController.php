<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
class LoginController extends Controller
{
    function index(){
        if(session()->has('member'))
            return redirect('index');
         return view('login');
    }
    function checkLogin(Request $req){
        $username = $req->get('username');
        $password = $req->get('password');
        if($username!=null&&$password!=null){
            $member = Member::memberKU( $username,$password);
            if($member!=null){
                session()->put("member", ['username'=>$member->username,'thainame'=>$member->thainame,'Admin'=>$member->isAdmin,
                        'mail1'=>$member->email1,'mail2'=>$member->email2,'firstname'=>$member->firstName,'lastname'=>$member->lastName
                        ,'permission'=>$member->permission,'faculty'=>$member->faculty,'department'=>$member->department]);
                        session()->put("icon",$member->icon);
                        session()->put("mail2",$member->email2);
                        if($member->isAdmin == 1)
                            session()->put("permission",1);
                        else session()->put("permission",0);
                        return redirect("index");
            }
            else{
                $msg = "ชื่อผู้ใช้หรือรหัสผ่านคุณผิด";
                return view("login", array('msg' => $msg));
            }
        }
        else{
            $msg = "คุณต้องกรอกชื่อผู้ใช้และรหัสผ่าน";
            return view("login", array('msg' => $msg));
        }
    }
    function logout(){
        session()->flush();
        return redirect('login');
    }
}
