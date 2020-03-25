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
            $btnDetailSub = createButton('btn btn-info btn-detailSub','','data-toggle="modal" data-target="#detailSub"','รายละเอียด');
            $tbAll[]=[$borrowList['id'],$borrowList->user->firstName,$borrowList->user->lastName,$borrowList['status'],$borrowList['date_borrow'],[$btnDetailSub,'text-align:center;']];
            
        }
        return view("history",array("tb"=>$tbAll));
    }
}
