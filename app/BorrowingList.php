<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LogBorrowing;
class BorrowingList extends Model
{
    protected $table = "borrowing_list";
    public $timestamps = false;
    public function user(){
        return $this->hasOne('App\Member','id','user_id');
    }
    public function staff(){
        return $this->hasOne('App\Member','id','staff_id');
    }
    function borrowingLists(){
        return $this->belongsTo('App\Borrowing','id','borrowing_list_id');
    }
    public function logs()
    {
        return $this->belongsTo('App\LogBorrowing','id','borrowing_list_id');
    }
    public function alerts()
    {
        return $this->belongsTo('App\Alert','id','borrowing_list_id');
    }
}
