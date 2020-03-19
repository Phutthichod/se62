<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Borrow\StudentBorrow;
use App\http\Borrow\TeacherBorrow;
use App\http\Borrow\StaffBorrow;
use App\http\Borrow\GeneralBorrow;
use App\http\Borrow\Borrowing;
class BorrowingController extends Controller
{
    function index(){
        $borrow = new StudentBorrow();
        echo $borrow->index();
    }
    function borrow(Request $req){
        $user_id = session()->get('member')['id'];
        $description = "description";
        $projectName = "project";
        $accessories = [1=>2,2=>15];
        $period = 8;
        $teacher = "jarunee";
        $personBorrow = new StudentBorrow();
        $id = $personBorrow->borrow($user_id,$description,$accessories,$period,$projectName,$teacher);
        $personBorrow->sendMail($teacher,$id);

    }
    function cancel(Request $req){

    }
    function returnAccessories(){

    }

}
