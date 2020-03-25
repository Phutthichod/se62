<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Borrow\StudentBorrow;
use App\http\Borrow\TeacherBorrow;
use App\http\Borrow\StaffBorrow;
use App\http\Borrow\GeneralBorrow;
use App\http\Borrow\Borrowing;
use App\BorrowingList;
use App\BorrowingItem;
use App\LogBorrowing;
class BorrowingController extends Controller
{
    function index(){
        // $borrow = new StudentBorrow();
        // echo $borrow->index();
    }
    function borrow(Request $req){
        $accessories;
        $period = 0;
        foreach(json_decode($req->get('accessories'),true) as $val){
            $accessories[$val['id']] = $val['number'];
        }
        print_r($accessories);
        $permission = session()->get('member')['permission'];
        $user_id = session()->get('member')['id'];
        $description = $req->get("description");
        $projectName = $req->get("project_name");
        $teacher = $req->get("teacher_name");
        $borrowList = [
            "user_id" => $user_id,
            "description" => $description,
            "project_name" => $projectName,
            "period" => $period,
            "teacher_name" => $teacher
        ];
        // $borrowList = [
        //     "user_id" => 1,
        //     "description" => "sss",
        //     "project_name" => "ssss",
        //     "period" => 8,
        //     "teacher_name" =>  "sssss"
        // ];
        $id;
        if($permission == "Student"){

            $personBorrow = new StudentBorrow("รออนุมัติ");
            $id = $personBorrow->borrow($borrowList,$accessories);
        }else{
            $personBorrow = new Borrow("รอรับ");
            $id = $personBorrow->borrow($borrowList,$accessories);
        }

        // echo $id;


    }
    function cancel(){
        $id = request()->route("id");
        $borrow = new Borrowing("ยกเลิก",$id);
        // echo $borrow->cancel($id);
    }
    function pass(Request $req){
        $id = request()->route("id");
        $description = $req->get("description");
        $status = "ไม่อนุมัติ";
        $borrow = new TeacherBorrow($status,$id,$description);
        // $borrow->pass();
    }
    function returnAccessories(){
        $id = request()->route("id");
        $borrow = new StaffBorrow("คืนแล้ว",$id);
        echo $borrow->returnAccessories();
    }
    function borrowed(){
        $id = request()->route("id");
        $borrow = new StaffBorrow("ยืมแล้ว",$id);
        echo $borrow->borrowed();
    }


}
