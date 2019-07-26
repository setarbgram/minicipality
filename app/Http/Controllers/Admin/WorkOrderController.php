<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContractChoosingType;
use App\Models\Instructions;
use App\Models\ShenasnamePeiman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class WorkOrderController extends Controller
{
    public function index()
    {
        $workOrderObj = new Instructions();
        $orders = $workOrderObj->getAllWorkOrders();
        return view('pages.work-order.workOrderList',compact('orders'));
    }

    public function show()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.work-order.workOrder',compact('cotractNum'));
    }

    public function createWorkOrder(Request $request)
    {
        $workOrderObj = new Instructions();
        $order = $workOrderObj->createWorkOrder($request);
        return Redirect(route('workOrder-list'))->with(Session::flash('flash_message', 'دستور با موفقیت ثبت شد!'));
    }

    public function editWorkOrder($orderId)
    {
        $workOrderObj = new Instructions();
        $order = $workOrderObj->findOrder($orderId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();

        return view('pages.work-order.workOrderEdit', compact('order','cotractNum'));
    }

    public function destroy(Request $request)
    {
        if ($request['order_check']) {
            $workOrderObj = new Instructions();
            $workOrderObj->removeOrder($request);


            return back()->with(Session::flash('flash_message', 'دستور کار با موفقیت حذف شد!'));
        } else {
            return back()->with(Session::flash('flash_d_message', 'انتخاب یک دستور کار الزامی است!'));
        }
    }

}
