<?php
namespace App\http\Borrow;
use App\http\Borrow\Borrowing;
// use Mail;
use App\Mail\TestMail;
use App\Member;
use Illuminate\Support\Facades\Mail;
use App\Alert;
use App\LogBorrowing;
class StudentBorrow extends Borrowing
{
    function construct($status,$id,$description){
        parent::__construct($status,$id,$description);
    }
    function setProjectName($project_name){

    }
    function borrow($borrowList,$accessories){
        parent::borrow($borrowList,$accessories);
        $this->sendMail($this->teacher);
    }
    function sendMail($teacher){
        $member = Member::getMemberByThainame($teacher);
        Mail::to($member->email1)->send(new TestMail());
        $alert = new Alert();
        $alert->borrowing_list_id = $this->borrow_list_id;
        $alert->log_id = $this->log_id;
        $alert->save();
        echo $member->email1;
    }
    function display(){
        return $this->teacher;
    }

}
