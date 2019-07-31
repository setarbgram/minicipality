<?php

namespace App\Http\Controllers\Admin;

<<<<<<< HEAD
use App\Models\Raste;
use App\Models\Rastetype;
use App\Models\Sheet;
=======
use App\Models\Patternagetype;
use App\Models\Raste;
use App\Models\Rastetype;
use App\Models\Sheet;
use App\Models\Sheettype;
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
use App\Models\ShenasnamePeiman;
use App\Models\Zarayeb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Session;

>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f

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
<<<<<<< HEAD
    public function show()
=======
    public function showRaste()
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
    {
        $shenaseObj = new ShenasnamePeiman();
        $rasteTypeObj=new Rastetype();
        $types=$rasteTypeObj->getAllTypes();
        $cotractNum = $shenaseObj->getAllContractID();
<<<<<<< HEAD
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
=======
        return view('pages.practicalProperty.raste.raste',compact('cotractNum','types'));
    }


    

    public function createRaste(Request $request)
    {
        $rasteObj = new Raste();
        $raste = $rasteObj->createRaste($request);
        return Redirect(route('practicalProperty-List'))->with(Session::flash('flash_message', 'رسته ی نوع برآورد با موفقیت ثبت شد!'));

    }

    public function destroyRaste(Request $request)
    {
        if ($request['raste_check']) {
            $rasteObj = new raste();
            $rasteObj->removeRaste($request);

            return redirect('/panel/practical-property/list')->with(Session::flash('flash_message', 'رسته ی نوع برآورد با موفقیت حذف شد!'));
        } else {
            return redirect('/panel/practical-property/list')->with(Session::flash('flash_d_message', 'انتخاب یک رسته ی نوع برآورد الزامی است!'));
        }

    }

    //    ---------------------------zarayeb----------------------------

    public function showZarayeb()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.practicalProperty.zarayeb.zarayeb',compact('cotractNum'));
    }




    public function createZarayeb(Request $request)
    {
        $zarayebObj = new Zarayeb();
        $zarayeb = $zarayebObj->createZarayeb($request);
        return Redirect(route('practicalProperty-List'))->with(Session::flash('flash_message', 'ضرایب متعلقه با موفقیت ثبت شد!'));

    }


    //    ---------------------------sheet----------------------------

    public function showSheet()
    {
        $shenaseObj = new ShenasnamePeiman();
        $sheetTypeObj=new Sheettype();
        $types=$sheetTypeObj->getAllTypes();
        $patternObj=new Patternagetype();
        $patterns=$patternObj->getAllTypes();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.practicalProperty.sheet.sheet',compact('cotractNum','types','patterns'));
    }




    public function createsheet(Request $request)
    {
        $sheetObj = new Sheet();
        $sheet = $sheetObj->createSheet($request);
        return Redirect(route('practicalProperty-List'))->with(Session::flash('flash_message', 'شیت آزمایشگاهی با موفقیت ثبت شد!'));

>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
    }

}
