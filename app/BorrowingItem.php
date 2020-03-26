<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Accessories;
class BorrowingItem extends Model
{
    protected $table = "borrowing";
    public $timestamps = false;
    function accessories(){
        return $this->hasOne('App\Accessories','id','access_id');
    }
    function borrowingList(){
        return $this->hasOne('App\BorrowingList','id','borrowing_list_id');
    }

}
