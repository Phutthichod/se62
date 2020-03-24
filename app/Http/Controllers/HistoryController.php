<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BorrowingList;
class HistoryController extends Controller
{
    function index(){
        $historyAll = BorrowingList::get();
        $tbAll = array();
        foreach($historyAll as $borrowList)
        {
            $tball[]=["id"=>$borrowList['id'],$borrowList->user->thainame,$borrowList['status']];
            
        }
        return view("history",array("tb"=>$tball));
    }
}