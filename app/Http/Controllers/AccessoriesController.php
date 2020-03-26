<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accessories;
use App\Catagories;
use Input;

class AccessoriesController extends Controller
{
    function indexAdmin(){
        $id = request()->route('id');
        $dataCat = Catagories::find($id);
        $acces = Catagories::find($id)->accessories()->get();
        return view('accessAdmin',["acces"=>$acces],["dataCat"=>$dataCat]);
    }

    function indexUser(){
        $id = request()->route('id');
        $dataCat = Catagories::find($id);
        $acces = Catagories::find($id)->accessories()->get();
        return view('accessUser',["acces"=>$acces],["dataCat"=>$dataCat]);
    }

    function insertCatagories(Request $cat){
        $catagName = $cat->get('catagories-name');
        $catagMessage = $cat->get('message-text');
        $catagPicture = $cat->file('catagories-picture');
        $icon_name = time().".png";
        $CAT = new Catagories();
        $CAT->name = $catagName;
        $CAT->description = $catagMessage;
        $CAT->save();
        if($catagPicture != null){
            $path = "img/catagories/$CAT->id/";
            $CAT->icon = $path.$icon_name;
            $CAT->update();
            $catagPicture->move($path, $icon_name);
        }
        return redirect("/1");
    }

    function editCatagories(Request $cat){
        $catagID = $cat->get('catagID');
        $catagName = $cat->get('catagories-name-edit');
        $catagMessage = $cat->get('message-text-edit');
        $catagPicture = $cat->file('catagories-picture-edit');
        $icon_name = time().".png";

        $catagEdit = Catagories::find($catagID);
        if($catagEdit->name != $catagName)
            $catagEdit->name = $catagName;
        if($catagEdit->description != $catagMessage)
            $catagEdit->description = $catagMessage;
        $catagEdit->update();

        if($catagPicture != null){
            $path = "img/catagories/$catagEdit->id/";
            $catagEdit->icon = $path.$icon_name;
            $catagEdit->update();
            $catagPicture->move($path, $icon_name);
        }
        return redirect("/1");
    }

    function daleteCatagories(Request $cat){
        $catSave = $cat->get('save');

        $catagName = $cat->get('catagories-name');
        $catagMessage = $cat->get('message-text');
        $catagPicture = $cat->file('catagories-picture');

        $icon_name = time().".png";
        $CAT = new Catagories();
        $CAT->name = $catagName;
        $CAT->description = $catagMessage;
 
        $CAT->save();
        $path = "img/catagories/$CAT->id/";
        $CAT->icon = $path.$icon_name;
        $CAT->update();
        $catagPicture->move($path, $icon_name);
        
    }

    function insertAccessories(Request $acc){
        $catagID = $acc->get('catagID');
        $accessName = $acc->get('access-name');
        $accessNumber = $acc->get('access-number');
        $accessMessage = $acc->get('message-text');
        $accessPicture = $acc->file('access-picture');
        $icon_name = time().".png";
        $accessCheck = $acc->get('exampleRadios');

        $CAT = new Accessories();
        $CAT->name = $accessName;
        $CAT->access_key = $accessNumber;
        $CAT->description = $accessMessage;
        $CAT->isBorrow = $accessCheck;
        $CAT->catagories_id = $catagID;
        $CAT->save();

        if($accessPicture != null){
            $path = "img/accessories/$CAT->id/";
            $CAT->icon = $path.$icon_name;
            $CAT->update();
            $accessPicture->move($path, $icon_name);
        }
        return redirect("accessoriesAdmin/$catagID");
    }

    function editAccessories(Request $acc){
        // print_r($acc->all());
        $catagID = $acc->get('catagID');
        $accessID = $acc->get('accessID');
        $accessName = $acc->get('access-name-edit');
        $accessNumber = $acc->get('access-number-edit');
        $accessMessage = $acc->get('message-text-edit');
        $accessPicture = $acc->file('access-picture-edit');
        $icon_name = time().".png";
        $accessCheck = $acc->get('exampleRadios-edit');

        $accEdit = Accessories::find($accessID);
        if($accEdit->name != $accessName)
            $accEdit->name = $accessName;
        if($accEdit->access_key != $accessNumber)
            $accEdit->access_key = $accessNumber;
        if($accEdit->description != $accessMessage)
            $accEdit->description = $accessMessage;
        if($accEdit->isBorrow != $accessCheck)
            $accEdit->isBorrow = $accessCheck;
        $accEdit->update();
       
        if($accessPicture != null){
            $path = "img/accessories/$accEdit->id/";
            $accEdit->icon = $path.$icon_name;
            $accEdit->update();
            $accessPicture->move($path, $icon_name);
        }
        return redirect("accessoriesAdmin/$catagID");
    }


}

// $acces = Catagories::find($id)->accessories()->get();
// $acces = Accessories::where("catagories_id",$id)->get();