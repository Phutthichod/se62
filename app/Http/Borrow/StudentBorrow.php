<?php
namespace App\http\Borrow;
use App\http\Borrow\Borrowing;
// use Mail;
use App\Mail\TestMail;
use App\Member;
use Illuminate\Support\Facades\Mail;
use App\Alert;
class StudentBorrow extends Borrowing
{
    function __construct(){

    }
    function setProjectName($project_name){

    }
    function arkForApprove(){

    }
    function sendMail($teacher,$id){
        $member = Member::getMemberByThainame($teacher);
        Mail::to($member->email1)->send(new TestMail());
        $alert = new Alert();
        $alert->user_id = session()->get('member')['id'];
        $alert->borrowing_list_id = $id;
        $alert->type = "ขออนุมัติ";
        $alert->save();
        echo $member->email1;
    }
    function display(){
        return $this->teacher;
    }

}
