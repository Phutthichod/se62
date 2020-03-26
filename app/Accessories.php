<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    protected $table = "accessories";
    public $timestamps = false;
    public function catagories(){
        return $this->hasOne('App\Member','id','catagories_id');
    }
}
