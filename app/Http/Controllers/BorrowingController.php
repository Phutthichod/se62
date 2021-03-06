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
use App\Member;
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
        $id;
        if($permission == "Student"){

            $personBorrow = new StudentBorrow("รออนุมัติ");
            $id = $personBorrow->borrow($borrowList,$accessories);
        }else{
            $personBorrow = new Borrow("รอรับ");
            $id = $personBorrow->borrow($borrowList,$accessories);
        }

        echo $id;


    }
    function showBorrowAll(){
        $user_id = session()->get('member')['id'];
        $status = ['รออนุมัติ','รอรับ','ยกเลิก','ไม่อนุมัติ','ยืมแล้ว','คืนแล้ว',"ยืมเกิน"];
        $borrowStatus = array();
        $borrowList = BorrowingList::where("user_id",$user_id)->get();
        foreach($status as $val){
            $borrowStatus[$val] = BorrowingList::where("status",$val)->where("user_id",$user_id)->get();
        }
        // print_r($borrowStatus);
        $teacherAllow = BorrowingList::where("teacher_name",session()->get('member')['thainame'])->get();
        return view("/access_borrow",['borrowList'=>$borrowList,"borrowStatus"=>$borrowStatus,"teacherAllow"=>$teacherAllow]);
    }
    function showBorrowStaffAll(){
        $user_id = session()->get('member')['id'];
        $status = ['รออนุมัติ','รอรับ','ยืมแล้ว'];
        $borrowStatus = array();
        $borrowList = BorrowingList::get();
        foreach($status as $val){
            $borrowStatus[$val] = BorrowingList::where("status",$val)->get();
        }
        // print_r($borrowStatus);
        // $teacherAllow = BorrowingList::where("teacher_name",session()->get('member')['thainame'])->get();
        return view("/incomplete-borrow",['borrowList'=>$borrowList,"borrowStatus"=>$borrowStatus]);
    }
    function cancel(){
        $id = request()->route("id");
        $borrow = new Borrowing("ยกเลิก",$id);
        // echo $borrow->cancel($id);
    }
    function pass(Request $req){
        $id = request()->route("id");
        // $description = $req->get("description");
        //  $status = $req->get("status");
        //  echo $status;
        $borrow = new TeacherBorrow("รอรับ",$id);
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
