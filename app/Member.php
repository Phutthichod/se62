<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "users";
    public $timestamps = false;

    // function __construct($member_ku = null){
    //     if($member_ku!=null){
    //         $this->username = $member_ku['uid'][0];
    //         $this->firstName = $member_ku['first-name'][0];
    //         $this->lastName = $member_ku['last-name'][0];
    //         if($member_ku['type-person'][0] == 3){
    //         $this->department = $member_ku['major-id'][0];
    //             $this->permission = "Student";
    //         }
    //         else{
    //             $this->department = $member_ku['department'][0];
    //             if($member_ku['type-person'][0] == 1)
    //                 $this->permission = "Teacher";
    //             else
    //                 $this->permission = "Other";
    //         }
    //         $this->thainame = $member_ku['thainame'][0];
    //         $this->faculty = $member_ku['faculty'][0];
    //         $member = Member::where('username',$member_ku['uid'][0])->get();
    //         if(count($member) == 0){
    //             $this->mail1 = $member_ku['google-mail'][0];

    //             $result = Member::insert(
    //                 ['username' => $this->username, 'thainame' => $this->thainame,'email1'=>$this->mail1,'permission'=>$this->permission]
    //             );
    //         }else{
    //             $result = (json_decode(json_encode($member), true));
    //             // array_push ($this->mail,$result[0]['email1'],$result[0]['email2']);
    //             $this->mail1 = $result[0]['email1'];
    //             $this->mail2 = $result[0]['email2'];
    //             if($result[0]['icon']!=null) $this->icon = $result[0]['icon'];
    //             $this->isAdmin = $result[0]['isAdmin'];
    //         }
    //     }
    //     // return self::$member;

    // }
    public static function memberKU($username,$password){
        if($password!=null){
            $uri = "http://158.108.207.4/se62_01/ldap.php?username=$username&password=$password";
            $response = \Httpful\Request::get($uri)->send();
            $member_ku = json_decode($response, true);
            if($member_ku!=''){
                $member = new Member;
                $member->username = $member_ku['uid'][0];

                $member->thainame = $member_ku['first-name'][0];
                $member->firstName = $member_ku['first-name'][0];
                $member->lastName = $member_ku['last-name'][0];
                if($member_ku['type-person'][0] == 3){
                $member->department = $member_ku['major-id'][0];
                    $member->permission = "Student";
                }
                else{
                    $member->department = $member_ku['department'][0];
                    if($member_ku['type-person'][0] == 1)
                        $member->permission = "Teacher";
                    else
                        $member->permission = "Other";
                }
                $member->faculty = $member_ku['faculty'][0];

                $member->email1 = $member_ku['google-mail'][0];

                $member->save();
            }
        }

        return null;
    }




}
