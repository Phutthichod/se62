<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $table = "borrowing";
    function accessory(){
        return $this->hasOne('App\Accessories','accessories_id');
    }
    function borrowingList(){
        return $this->hasOne('App\BorrowingList','borrowing_list_id');
    }
}
