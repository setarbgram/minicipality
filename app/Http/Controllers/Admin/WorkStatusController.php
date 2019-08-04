<?php

namespace App\Http\Controllers\Admin;

use App\Models\Adjustmentstate;
use App\Models\Adjustmenttype;
use App\Models\Contractextension;
use App\Models\Definitestate;
use App\Models\Predefinitestate;
use App\Models\ShenasnamePeiman;
use App\Models\Temporarystate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class WorkStatusController extends Controller
{
    public function index(){

        $temporaryStateObj = new Temporarystate();
        $temporaryStates = $temporaryStateObj->getAllTemporarystate();


        $adjustmentStateObj = new Adjustmentstate();
        $adjustmentstates = $adjustmentStateObj->getAllAdjustmentstate();


        $predefiniteStateObj = new Predefinitestate();
        $predefinitestates = $predefiniteStateObj->getAllPredefinitestate();

        $definitestateStateObj = new Definitestate();
        $definiteStates = $definitestateStateObj->getAllDefinitestate();

        $contractextensionObj = new Contractextension();
        $contractextensions = $contractextensionObj->getAllContractextension();

        return view('pages.workStatus.workStatusList',compact('temporaryStates','adjustmentstates','predefinitestates','definiteStates','contractextensions'));
    }


    //    ---------------------------Temporarystate----------------------------

    public function showTemporarystate()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.workStatus.temporarystate.temporaryState',compact('cotractNum'));
    }


    public function createTemporarystate(Request $request)
    {
        $temporarystateObj = new Temporarystate();
        $temporarystate = $temporarystateObj->createTemporarystate($request);
        return Redirect(route('workStatus'))->with(Session::flash('flash_message', 'صورت وضعیت موقت با موفقیت ثبت شد.'));

    }

    public function editTemporarystate($temporarystateId)
    {
        $temporarystateObj = new Temporarystate();
        $temporarystate = $temporarystateObj->findTemporarystate($temporarystateId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.workStatus.temporarystate.temporaryStateEdit', compact('temporarystate','cotractNum'));
    }

    //    ---------------------------Adjustmentstate----------------------------


    public function showAdjustmentstate()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        $typeObj=new Adjustmenttype();
        $types=$typeObj->getAllTypes();
        return view('pages.workStatus.adjustmentstate.adjustmentState',compact('cotractNum','types'));
    }


    public function createAdjustmentstate(Request $request)
    {
        $adjustmentstateObj = new Adjustmentstate();
        $adjustmentstate = $adjustmentstateObj->createAdjustmentstate($request);
        return Redirect(route('workStatus'))->with(Session::flash('flash_message', 'صورت وضعیت تعدیل با موفقیت ثبت شد.'));

    }

    public function editAdjustmentstate($adjustmentstateId)
    {
        $adjustmentstateObj = new Adjustmentstate();
        $adjustmentstate = $adjustmentstateObj->findAdjustmentstate($adjustmentstateId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        $typeObj=new Adjustmenttype();
        $types=$typeObj->getAllTypes();
        return view('pages.workStatus.adjustmentstate.adjustmentStateEdit', compact('adjustmentstate','cotractNum','types'));
    }


    //    ---------------------------Predefinitestate----------------------------


    public function showPredefinitestate()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.workStatus.predefinitestate.predefiniteState',compact('cotractNum'));
    }


    public function createPredefinitestate(Request $request)
    {
        $predefinitestateObj = new Predefinitestate();
        $predefinitestate = $predefinitestateObj->createPredefinitestate($request);
        return Redirect(route('workStatus'))->with(Session::flash('flash_message', 'صورت وضعیت ماقبل قطعی با موفقیت ثبت شد.'));
    }

    public function editPredefinitestate($predefinitestateId)
    {
        $predefinitestateObj = new Predefinitestate();
        $predefinitestate = $predefinitestateObj->findPredefinitestate($predefinitestateId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.workStatus.predefinitestate.predefiniteStateEdit', compact('predefinitestate','cotractNum'));
    }

    //    ---------------------------Definitestate----------------------------

    public function showDefinitestate()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.workStatus.definitestate.definiteState',compact('cotractNum'));
    }


    public function createDefinitestate(Request $request)
    {
        $definitestateObj = new Definitestate();
        $definitestate = $definitestateObj->createDefinitestate($request);
        return Redirect(route('workStatus'))->with(Session::flash('flash_message', 'صورت وضعیت قطعی با موفقیت ثبت شد.'));
    }

    public function editDefinitestate($definitestateId)
    {
        $definitestateObj = new Definitestate();
        $definitestate = $definitestateObj->findDefinitestate($definitestateId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.workStatus.definitestate.definiteStateEdit', compact('definitestate','cotractNum'));
    }


    //    ---------------------------Contractextension----------------------------
    public function showContractextension()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.workStatus.contractextension.contractextension',compact('cotractNum'));
    }


    public function createContractextension(Request $request)
    {
        $contractextensionObj = new Contractextension();
        $contractextension = $contractextensionObj->createContractextension($request);
        return Redirect(route('workStatus'))->with(Session::flash('flash_message', 'تمدید قرارداد با موفقیت ثبت شد.'));
    }


    public function editContractextension($contractextensionId)
    {
        $contractextensionObj = new Contractextension();
        $contractextension = $contractextensionObj->findContractextension($contractextensionId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.workStatus.contractextension.contractextensionEdit', compact('contractextension','cotractNum'));
    }


}
