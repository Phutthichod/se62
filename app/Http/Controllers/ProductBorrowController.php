<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productborrow;

class ProductBorrowController extends Controller
{
    public function __constructor()
    {
    }
    public function index()
    {
        return view('productborrow');
    }
}
