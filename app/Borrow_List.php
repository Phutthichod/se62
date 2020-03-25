<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow_List extends Model
{
    protected $fillable = [
    	'project_name', 'description'
    ];
}
