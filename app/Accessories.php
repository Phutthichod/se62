<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    protected $table = "accessories";
    public function catagories(){
        return $this->hasOne('App\Catagories','id','catagories_id');
    }
    public function borrowItem(){
        return $this->belongsTo("App\BorrowingItem","id","access_id");
    }
}
