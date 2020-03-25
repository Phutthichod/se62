<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BorrowingItem;
use DB;
class AcessoriesHistoryController extends Controller
{
    function index(){
        $historyAll = BorrowingItem::get();
        $tbAll = array();
        $item_data = DB::table('accessories')
                    ->select('name')
                    ->groupBy('name')
                    ->orderBy('name', 'ASC')
                    ->get();
        foreach($historyAll as $borrowItem)
        {
            $btnDetailSub = createButton('btn btn-info btn-detailSub','','data-toggle="modal" data-target="#detailSub"','รายละเอียด');
            $tbAll[]=[$borrowItem['id'],$borrowItem['borrowing_list_id'],$borrowItem['access_id'],$borrowItem->accessory->name,$borrowItem->borrowingList->status,$borrowItem->borrowingList->date_borrow,[$btnDetailSub,'text-align:center;']];
            
        }
        //return view("history_item",compact('item_data'));
        return view("history_item",["item_data"=>$item_data,"tb"=>$tbAll]);
        //return view("history_item",array("tb"=>$tbAll));
    }
}
