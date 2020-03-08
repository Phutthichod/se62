<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "users";
    public $timestamps = false;
    private $username;
    private $firstName;
    private $lastName;
    private $mail = array();
    private $department;
    private $permission;
    private $thainame;
    private $faculty;
    private $icon = "img/avatar.png";
    private $isAdmin;
    function __construct($member_ku = null){
        if($member_ku!=null){
            $this->username = $member_ku['uid'][0];
            $this->firstName = $member_ku['first-name'][0];
            $this->lastName = $member_ku['last-name'][0];
            if($member_ku['type-person'][0] == 3){
            $this->department = $member_ku['major-id'][0];
                $this->permission = "Student";
            }
            else{
                $this->department = $member_ku['department'][0];
                if($member_ku['type-person'][0] == 1)
                    $this->permission = "Teacher";
                else
                    $this->permission = "Other";
            }
            $this->thainame = $member_ku['thainame'][0];
            $this->faculty = $member_ku['faculty'][0];
            $member = Member::where('username',$member_ku['uid'][0])->get();
            if(count($member) == 0){
                $this->mail[] = $member_ku['google-mail'][0];

                $result = Member::insert(
                    ['username' => $this->username, 'thainame' => $this->thainame,'email1'=>$this->mail[0],'permission'=>$this->permission]
                );
            }else{
                $result = (json_decode(json_encode($member), true));
                array_push ($this->mail,$result[0]['email1'],$result[0]['email2']);
                if($result[0]['icon']!=null) $this->icon = $result[0]['icon'];
                $this->isAdmin = $result[0]['isAdmin'];
            }
        }
        // return self::$member;

    }
    public static function getMemberKU($username,$password){
        if($password!=null){
            $uri = "http://158.108.207.4/se62_01/ldap.php?username=$username&password=$password";
            $response = \Httpful\Request::get($uri)->send();
            $arr = json_decode($response, true);
            if($arr!=''){
                return new Member($arr);
            }
        }

        return null;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getFirstName(){
        return $this->firstName;
    }
    public function getLastName(){
        return $this->lastname;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getPermission(){
        return $this->permission;
    }
    public function getIsAdmin(){
        return $this->isAdmin;
    }
    public function getDepartment(){
        return $this->department;
    }
    public function getThainame(){
        return $this->thainame;
    }
    public function getFaculty(){
        return $this->faculty;
    }
    public function getIcon(){
        return $this->icon;
    }
    public function addMail($mail){
        $this->mail[] = $mail;
    }
    public function setIcon($icon){
        $this->icon = $icon;
    }
    public function setIsAdmin($permission){
        $this->isAdmin = $permission;
    }



}
