<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContractChoosingType;
use App\Models\ShenasnamePeiman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DocumentProcessController extends Controller
{

    public function index()
    {
        $shenaseObj = new ShenasnamePeiman();
        $shenases = $shenaseObj->getAllShenase();

        return view('pages.document-process.contractorList',compact('shenases'));
    }

    public function show()
    {
        $cotractTypeObj = new ContractChoosingType();
        $cotractTypes = $cotractTypeObj->getAll();

        return view('pages.document-process.contractor',compact('cotractTypes'));
    }

    public function createShenasnamePeiman(Request $request)
    {
        $shenaseObj = new ShenasnamePeiman();
        $shenase = $shenaseObj->createShenase($request);
        return Redirect(route('contractor-list'))->with(Session::flash('flash_message', 'شناسه پیمان با موفقیت ثبت شد!'));
    }

    public function editShenasnamePeiman($shenaseId)
    {
        $shenaseObj = new ShenasnamePeiman();
        $shenase = $shenaseObj->findShenase($shenaseId);
        $cotractTypeObj = new ContractChoosingType();
        $cotractTypes = $cotractTypeObj->getAll();

        return view('pages.document-process.documentEdit', compact('shenase','cotractTypes'));
    }

    public function destroy(Request $request)
    {
        if ($request['shenase_check']) {
            $shenaseObj = new ShenasnamePeiman();
            $shenaseObj->removeShenase($request);

//            foreach ($request['shenase_check'] as $shenaseId) {
//                $shenase = $shenaseObj->findShenase($shenaseId);
//            }
//            ShenasnamePeiman::destroy($request['shenase_check']); //users:name of checkbox
            return back()->with(Session::flash('flash_message', 'شناسه پیمان با موفقیت حذف شد!'));
        } else {
            return back()->with(Session::flash('flash_d_message', 'انتخاب یک شناسه پیمان الزامی است!'));
        }
    }
}
