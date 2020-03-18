<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowingList extends Model
{
    protected $table = "borrowing_list";
    public function member()
    {
        return $this->hasOne('App\Member');
    }
}
