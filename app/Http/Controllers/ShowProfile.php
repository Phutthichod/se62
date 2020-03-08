<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
class ShowProfile extends Controller
{
    private  $username;
    public function __constructor(){
        $this->username = session()->get('member')['username'];
    }
    public function index(){
        return view('profile');
    }
    public function updateIcon(Request $req){
            $username = $this->username;
            $dataI = $req->get('icon');
            $img_array = explode(';',$dataI);
            $img_array2 = explode(",",$img_array[1]);
            $dataI = base64_decode($img_array2[1]);
            $Icon = time().'.png';
            $path = "img/profile/$username";
            if(!file_exists($path))
                mkdir( $path);
            $path .= "/$Icon";
            file_put_contents($path,$dataI);

            Member::where('username',$username)->update(['icon' => $path]);
            session()->put('icon',$path);
            // return $username;
    }
    public function updateEmail(Request $req){
        $username = session()->get('member')['username'];
        $mail = $req->get('mail');
        $update = Member::where('username',$username)->update(['email2' => $mail]);
        session()->put("mail2",$mail);
        return $update;
    }
}
