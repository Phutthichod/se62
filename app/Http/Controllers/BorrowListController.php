<?php

namespace App\Http\Controllers;

use App\BorrowingList;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class BorrowListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->BorrowingList = new BorrowingList;
    }

    public function index(Request $request)
    {

        if($request->ajax())
        {
            $history = BorrowingList::get();
            $data = array();
            foreach($history as $historylist){
                $data[]=["id"=>$historylist['id'],"firstName"=>$historylist->user->firstName,"lastName"=>$historylist->user->lastName,"status"=>$historylist['status'],"date_borrow"=>$historylist['date_borrow ']];
            }
            //$data = BorrowingList::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        //$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button = '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id=".$data->id." class="delete btn btn-info btn-detailSub">รายละเอียด</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('sample_data');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BorrowingList  $borrowingList
     * @return \Illuminate\Http\Response
     */
    public function show(BorrowingList $borrowingList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BorrowingList  $borrowingList
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowingList $borrowingList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BorrowingList  $borrowingList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BorrowingList $borrowingList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BorrowingList  $borrowingList
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowingList $borrowingList)
    {
        //
    }
}
