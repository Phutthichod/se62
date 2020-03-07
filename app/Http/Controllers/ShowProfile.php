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
}
