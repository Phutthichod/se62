<?php
 namespace App\http\Borrow;
 use App\BorrowingList;
 use App\BorrowingItem;
class Borrowing
{
    protected $borrow;
    function __construct(){

    }
    function borrow($user_id,$description,$accessories,$period,$projectName,$teacher){
        $borrow = new BorrowingList();
        $borrow->user_id = $user_id;
        $borrow->description = $description;
        $borrow->period = $period;
        $borrow->project_name = $projectName;
        $borrow->teacher_name = $teacher;
        $borrow->status = "รออนุมัติ";
        $borrow->save();

        foreach($accessories as $key=>$val){
            $borrowItem = new BorrowingItem();
            $borrowItem->borrowing_list_id = $borrow->id;
            $borrowItem->access_id = $key;
            $borrowItem->number = $val;
            $borrowItem->save();
        }
        return $borrow->id;

    }
    function cancel(){

    }
    function returnAccessories(){

    }

}
