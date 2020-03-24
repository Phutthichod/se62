<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BorrowingList;
class LogBorrowing extends Model
{
    protected $table = "log_borrowing";
    public $timestamps = false;
    public function BorrowingList()
    {
        return $this->hasOne('App\BorrowingList','id','borrowing_list_id');
    }
}
