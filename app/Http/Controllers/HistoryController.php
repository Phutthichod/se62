<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BorrowingList;
class HistoryController extends Controller
{
    function index(){
        $historyAll = BorrowingList::get();
        $tdAll = array();
        // $td = array();
        foreach($historyAll as $borrowList){
            $tdAll[]=[$borrowList['id'],$borrowList->user->thainame,$borrowList['status']];

        }
        return view("history",array("td"=>$tdAll));
        // print_r($tdAll);
        // echo "pppppp";
        // print_r($historyAll);
    }
}
