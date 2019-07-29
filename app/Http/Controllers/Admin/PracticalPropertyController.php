<?php

namespace App\Http\Controllers\Admin;

use App\Models\Raste;
use App\Models\Rastetype;
use App\Models\Sheet;
use App\Models\ShenasnamePeiman;
use App\Models\Zarayeb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PracticalPropertyController extends Controller
{
    public function index()
    {
        $rasteObj = new Raste();
        $rastes = $rasteObj->getAllRaste();

        $zarayebObj=new Zarayeb();
        $zarayebs=$zarayebObj->getAllZarayeb();

        $sheetObj=new Sheet();
        $sheets=$sheetObj->getAllSheet();

        return view('pages.practicalProperty.practicalPropertyList',compact('rastes','zarayebs','sheets'));
    }


//    ---------------------------raste----------------------------
    public function show()
    {
        $shenaseObj = new ShenasnamePeiman();
        $rasteTypeObj=new Rastetype();
        $types=$rasteTypeObj->getAllTypes();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.communication.communication',compact('cotractNum','types'));
    }


}
