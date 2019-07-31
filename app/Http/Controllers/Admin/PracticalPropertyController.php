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

    public function createCommunication(Request $request)
    {
        $communicationObj = new Communication();
        $communication = $communicationObj->createCommunication($request);
        return Redirect(route('communication-List'))->with(Session::flash('flash_message', 'ابلاغیه با موفقیت ثبت شد!'));
    }

    public function editCommunication($communicationId)
    {
        $communicationObj = new Communication();
        $communication = $communicationObj->findCommunication($communicationId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        $communicationTypeObj=new Communicationtype();
        $types=$communicationTypeObj->getAllTypes();

        return view('pages.communication.communicationEdit', compact('communication','cotractNum','types'));
    }

    public function destroy(Request $request)
    {
        if ($request['communication_check']) {
            $communicationObj = new Communication();
            $communicationObj->removeCommunication($request);


            return back()->with(Session::flash('flash_message', 'ابلاغیه  با موفقیت حذف شد!'));
        } else {
            return back()->with(Session::flash('flash_d_message', 'انتخاب یک ابلاغیه الزامی است!'));
        }
    }

}
