<?php
 namespace App\http\Borrow;
 use App\BorrowingList;
 use App\BorrowingItem;
 use App\LogBorrowing;
class Borrowing
{
    protected $status;
    protected $borrow_list_id;
    protected $log;
    protected $log_id;
    protected $date;
    protected $borrow;
    protected $teacher;
    protected $description;
    function __construct($status,$id = null,$description = null){
        date_default_timezone_set('Asia/Bangkok');
        $this->status = $status;
        $this->description = $description;
        if($id!=null){
            $this->borrow_list_id = $id;
            $this->date = date('Y-m-d H:i:s');

            $this->borrow = BorrowingList::find($this->borrow_list_id);
            $this->borrow->status = $status;
            $this->borrow->update = $this->date;
            $this->borrow->update();

            $this->log = $this->borrow->logs()->where("datetime_end",null)->first();
            $this->insertLog();
            $this->updateLog();
        }

    }
    function borrow($borrowList,$accessories){
        $this->teacher = $borrowList['teacher_name'];
        print_r($borrowList);
        $borrow = new BorrowingList();
        foreach($borrowList as $key=>$val){
            $borrow->$key = $val;
        }
        $borrow->update = $this->date;
        $borrow->date_borrow = $this->date;
        $borrow->status = $this->status;
        $borrow->save();

        foreach($accessories as $key=>$val){
            $borrowItem = new BorrowingItem();
            $borrowItem->borrowing_list_id = $borrow->id;
            $borrowItem->access_id = $key;
            $borrowItem->number = $val;
            $borrowItem->save();
        }
        $this->borrow_list_id = $borrow->id;
        $this->log = new LogBorrowing();
        $this->insertLog();
        return $this->borrow_list_id;

    }
    function cancel(){

    }
    function insertLog(){
        // $log = new LogBorrowing();
        $this->log->title = $this->status;
        $this->log->datetime_start = $this->date;
        $this->log->borrowing_list_id = $this->borrow_list_id;
        $this->log->description = $this->description;
        $this->log->save();
        $this->log_id = $this->log->id;
        return $this->log->id;
    }
    function updateLog(){
        $this->log->borrowing_list_id = $this->borrow_list_id;
        $this->log->datetime_end = $this->date;
        return $this->log->update();
    }
}
