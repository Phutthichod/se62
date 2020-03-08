<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
class ShowProfile extends Controller
{
    private $member;
    public function index(){
        return view('profile');
    }
    public function updateIcon(Request $req){
            $username = session()->get('member')['username'];
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
}
