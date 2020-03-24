<?php
namespace App\http\Borrow;
use App\http\Borrow\Borrowing;
class TeacherBorrow extends Borrowing
{
    // function arkForApprove(){

    // }
    // function borrow(){

    // }

    function display(){
        return $this->description.session()->get("member")['permission'];
    }
}
