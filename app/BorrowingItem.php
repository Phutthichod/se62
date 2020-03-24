<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowingItem extends Model
{
    protected $table = "borrowing";
    public $timestamps = false;
    function accessory(){
        return $this->hasOne('App\Accessories','id','accessories_id');
    }
    function borrowingList(){
        return $this->hasOne('App\BorrowingList','id','borrowing_list_id');
    }

}
