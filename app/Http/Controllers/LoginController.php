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
            $member = Member::getMemberKU($username,$password);
            if($member!=null){
                // print_r(dd($arr));
                session()->put("member", ['username'=>$member->getUsername(),'thainame'=>$member->getThainame(),'permission'=>$member->getIsAdmin(),
                'mail'=>$member->getMail(),'icon'=>$member->getIcon(),'firstname'=>$member->getFirstName(),'lastname'=>$member->getLastName()
                ,'permission'=>$member->getPermission(),'faculty'=>$member->getFaculty(),'department'=>$member->getDepartment()]);
                if($member->getPermission()==1)
                    session()->put("permission",1);
                else session()->put("permission",0);
                //  print_r($req->session()->get("member"));
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
