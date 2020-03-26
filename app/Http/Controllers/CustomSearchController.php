<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomSearchController extends Controller
{
    function index(Request $request)
    {
        if(request()->ajax())
        {
            if(!empty($request->filter_status))
            {
                $data = DB::table('borrowing_list')
                        ->select('id','user_id','teacher_name','staff_id','project_name','description','status','update','date_borrow','period')
                        ->where('status',$request->filter_status)
                        ->get();
            }
            else
            {
                $data = DB::table('borrowing_list')
                        ->select('id','user_id','teacher_name','staff_id','project_name','description','status','update','date_borrow','period')
                        ->get();
            }
            return datatables()->of($data)->make(true);
        }
        
        return view('sample_data');
    }
}
