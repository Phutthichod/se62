<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BorrowingList;
class LogBorrowing extends Model
{
    protected $table = "log_borrowing";
    public $year;
    public $mount;
    public $timestamps = false;
    public function __construct(){

    }
    public function BorrowingList()
    {
        return $this->hasOne('App\BorrowingList','id','borrowing_list_id');
    }
    function setDateTime(){
        $this->year = convertDateTime($this->datetime_start)['year'];
        $this->mount = convertDateTime($this->datetime_start)['mount'];
    }
}
