<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BorrowingList;
use App\LogBorrowing;
use App\BorrowingItem;
use App\Accessories;
use App\Catagories;
use App\Member;
class StaticController extends Controller
{
    function index(){
        return view("static");
    }
    function static(Request $req){
        print_r($req->all());
        $static = $this->getStatic();
        return view("static",["static"=>$static]);
    }
    function search(){
        $logAll = array();
        $staticBorrowed = $this->getStaticByBorrowed();
        $logsYear = $this->getStaticByYear(null);
        $logsMount = $this->getStaticByMount(null);
        $accessByCat = $this->getStaticByCatagories(null);
        $accessByPer = $this->getStaticByPermission(null);

        foreach($logsYear as $key=>$item){
            if(array_key_exists($key, $logsMount)&&array_key_exists($key, $accessByCat)
            &&array_key_exists($key, $accessByPer)&&array_key_exists($key, $staticBorrowed))
                $logAll[$key] = $item;
        }
        $this->getStatic($logAll);
    }
    function getStaticByCatagories($catagories_id){
        $accessories = array();
        $accessAll = array();
        if($catagories_id != null){
            $accessories = Catagories::find($catagories_id)->accessories()->get();
            foreach($accessories as $item){
                $borrowItem = $item->borrowItem()->get();
                foreach($borrowItem as $bItem){
                    $accessAll[$bItem->id] = $bItem;
                }
            }
        }
        else{
            $BorrowingList = BorrowingList::get();
            foreach($BorrowingList as $item){
                    $accessAll[$item->id] = $item;
            }
        }
        return $accessAll;

    }
    function getStaticByPermission($type){
        $accessories = array();
        $accessAll = array();
        if($type != null){
            $Members = Member::where("permission",$type)->get();
            foreach($Members as $member){
                foreach($member->borrowingListsU()->get() as $borrowList){
                    foreach($borrowList->borrowingItems()->get() as $borrowItem){
                        $accessAll[$borrowItem->id] = $borrowItem;
                    }
                }
            }
        }
        else{
            $BorrowingList = BorrowingList::get();
            foreach($BorrowingList as $item){
                    $accessAll[$item->id] = $item;
            }
        }
        return $accessAll;
    }
    function getStaticByYear($year){
        $logs = LogBorrowing::where("title","ยืมแล้ว")->get();
        $logs_id = array();
        foreach($logs as $item){
            $item->setDateTime();
            if($item->year == $year || $year==null){
                foreach($item->BorrowingList->borrowingItems()->get() as $borrowItem){
                    $logs_id[$borrowItem->id] = $borrowItem;
                }
            }
        }
        return $logs_id;
    }
    function getStaticByMount($mount){
        $logs = LogBorrowing::where("title","ยืมแล้ว")->get();
        $logs_id = array();
        foreach($logs as $item){
            $item->setDateTime();
            if($item->mount == $mount || $mount==null){
                foreach($item->BorrowingList->borrowingItems()->get() as $borrowItem){
                    $logs_id[$borrowItem->id] = $borrowItem;
                }
            }
        }
        return $logs_id;
    }
    function getStaticByBorrowed(){
        $logs = LogBorrowing::where("title","ยืมแล้ว")->get();
        $borrowItems = array();
        foreach($logs as $item){
            foreach($item->BorrowingList->borrowingItems()->get() as $borrowItem){
                    $borrowItems[$borrowItem->id] = $borrowItem;
            }
        }
        return $borrowItems;
    }
    function getStatic($borrowItems){
        $borrowTotal = 0;
        $accessories = Accessories::get();
        $accessAll = array();
        $accessAllPer = array();
        foreach($accessories as $item){
            $accessAll[$item->id] = 0;
        }

        foreach($borrowItems as $borrowItem){
            if (array_key_exists($borrowItem->access_id, $accessAll))
                $accessAll[$borrowItem->access_id]++;
                $borrowTotal++;
        }

        foreach($borrowItems as $borrowItem){
                $accessAllPer[$borrowItem->access_id] = $accessAll[$borrowItem->access_id]/$borrowTotal*100;
        }
        foreach($accessAllPer as $key=>$item){
            print_r("$key => $accessAll[$key] => $item%<br>");
        }

    }
}
