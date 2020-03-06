<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "users";
    private $username;
    private $firstName;
    private $lastName;
    private $mail;
    private $department;
    private $permission;
    private
    function __construct(){

    }
}
