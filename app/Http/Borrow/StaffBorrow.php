<?php
namespace App\http\Borrow;
use App\http\Borrow\Borrowing;
use App\BorrowingList;
use App\LogBorrowing;
class StaffBorrow extends Borrowing
{
    function construct($status,$id,$description){
        parent::__construct($status,$id,$description);
    }
    // function borrow(){

    // }
    function returnAccessories(){
        $staff_id = session()->get('member')['id'];
        $this->borrow->staff_id = $staff_id;
        $this->borrow->update();
    }
    function borrowed(){
        $staff_id = session()->get('member')['id'];
        $this->borrow->staff_id = $staff_id;
        $this->borrow->update();
    }
}
