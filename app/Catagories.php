<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagories extends Model
{
    protected $table = "catagories";
    public $timestamps = false;
    public function accessories()
    {
        return $this->belongsTo('App\Accessories','id','catagories_id');
    }
}
