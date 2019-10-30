<?php

namespace App\Http\Controllers\Admin;

use App\Models\Delivery;
use App\Models\Deliverytype;
use App\Models\ShenasnamePeiman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class DeliveryInfoController extends Controller
{
    public function index(){

        $deliveryObj = new Delivery();
        $temporaryDeliveries = $deliveryObj->getAllTemporaryDelivery();
        $definiteDeliveries = $deliveryObj->getAllDefiniteDelivery();
        return view('pages.deliveryInfo.deliveryInfoList',compact('temporaryDeliveries','definiteDeliveries'));

    }

    public function temporaryDeliveryShow()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        $deliveryTypeObj= new Deliverytype();
        $types=$deliveryTypeObj->getAllTypes();
        $dType=0;
        return view('pages.deliveryInfo.deliveryInfo',compact('cotractNum','dType','types'));
    }

    public function definiteDeliveryShow()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        $deliveryTypeObj= new Deliverytype();
        $types=$deliveryTypeObj->getAllTypes();
        $dType=1;
        return view('pages.deliveryInfo.deliveryInfo',compact('cotractNum','dType','types'));
    }

    public function createDelivery(Request $request)
    {
        $deliveryObj=new Delivery();
        $delivery=$deliveryObj->createdelivery($request);
        return Redirect(route('deliveryInfo'))->with(Session::flash('flash_message', 'تحویل با موفقیت ثبت شد!'));
    }

    public function editDelivery($deliveryId)
    {
        $deliveryObj = new Delivery();
        $delivery = $deliveryObj->findDelivery($deliveryId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        $deliveryTypeObj= new Deliverytype();
        $types=$deliveryTypeObj->getAllTypes();
        return view('pages.deliveryInfo.deliveryInfoEdit', compact('delivery','cotractNum','types'));
    }

    public function updateDelivery(Request $request)
    {
        $deliveryObj = new Delivery();
        $deliveryObj->updateDelivery($request);

        return Redirect(route('deliveryInfo'))->with(Session::flash('flash_message', 'تحویل با موفقیت ویرایش شد!'));

    }

   


}
