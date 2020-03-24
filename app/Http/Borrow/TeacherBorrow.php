<?php
namespace App\http\Borrow;
use App\http\Borrow\Borrowing;
use App\BorrowingList;
use App\LogBorrowing;
use App\Mail\TestMail;
use App\Member;
use Illuminate\Support\Facades\Mail;
class TeacherBorrow extends Borrowing
{
    function construct($status,$id,$description){
        parent::__construct($status,$id,$description);
    }
    function pass(){
        $this->sendMail();
    }
    function sendMail(){
        $student = $this->borrow->user;
        Mail::to($student->email1)->send(new TestMail());
        $alert = new Alert();
        $alert->log_id = $this->log_id;
        $alert->save();
        // echo $student->email1;
    }
    function display(){
        return $this->description.session()->get("member")['permission'];
    }
}
