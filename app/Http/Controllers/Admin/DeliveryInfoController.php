<?php

namespace App\Http\Controllers\Admin;

use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryInfoController extends Controller
{
    public function index(){

        $deliveryObj = new Delivery();
        $temporaryDeliveries = $deliveryObj->getAllTemporaryDelivery();
        $definiteDeliveries = $deliveryObj->getAllDefiniteDelivery();

        return view('pages.deliveryInfo.deliveryInfoList',compact('temporaryDeliveries','definiteDeliveries'));

    }
}
