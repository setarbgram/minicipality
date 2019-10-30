<?php

namespace App\Http\Controllers\Admin;

use App\Models\Raste;
use App\Models\Rastetype;
use App\Models\Sheet;
use App\Models\Patternagetype;

use App\Models\Sheettype;
use App\Models\ShenasnamePeiman;
use App\Models\Zarayeb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PracticalPropertyController extends Controller
{
    public function index()
    {
        $rasteObj = new Raste();
        $rastes = $rasteObj->getAllRaste();

        $zarayebObj = new Zarayeb();
        $zarayebs = $zarayebObj->getAllZarayeb();

        $sheetObj = new Sheet();
        $sheets = $sheetObj->getAllSheet();

        return view('pages.practicalProperty.practicalPropertyList', compact('rastes', 'zarayebs', 'sheets'));
    }


//    ---------------------------raste----------------------------

    public function showRaste()
    {
        $shenaseObj = new ShenasnamePeiman();
        $rasteTypeObj = new Rastetype();
        $types = $rasteTypeObj->getAllTypes();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.practicalProperty.raste.raste', compact('cotractNum', 'types'));
    }


    public function createRaste(Request $request)
    {
        $rasteObj = new Raste();
        $raste = $rasteObj->createRaste($request);
        return Redirect(route('practicalProperty-List'))->with(Session::flash('flash_message', 'رسته ی نوع برآورد با موفقیت ثبت شد!'));

    }

    public function editRaste($rasteId)
    {
        $rasteObj = new Raste();
        $raste = $rasteObj->findRaste($rasteId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        $rasteTypeObj = new Rastetype();
        $types = $rasteTypeObj->getAllTypes();

        return view('pages.practicalProperty.raste.rasteEdit', compact('raste', 'cotractNum', 'types'));
    }

    public function updateRaste(Request $request)
    {
        $rasteObj = new Raste();
        $rasteObj->updateRaste($request);

        return Redirect(route('practicalProperty-List'))->with(Session::flash('flash_message', 'رسته ی نوع برآورد با موفقیت ویرایش شد!'));

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
        return view('pages.practicalProperty.zarayeb.zarayeb', compact('cotractNum'));
    }


    public function createZarayeb(Request $request)
    {
        $zarayebObj = new Zarayeb();
        $zarayeb = $zarayebObj->createZarayeb($request);
        return Redirect(route('practicalProperty-List'))->with(Session::flash('flash_message', 'ضریب متعلقه با موفقیت ثبت شد!'));

    }


    public function editZarayeb($zarayebId)
    {
        $zarayebObj = new Zarayeb();
        $zarayeb = $zarayebObj->findZarayeb($zarayebId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.practicalProperty.zarayeb.zarayebEdit', compact('zarayeb', 'cotractNum'));
    }

    public function updateZarayeb(Request $request)
    {
        $zarayebObj = new Zarayeb();
        $zarayebObj->updateZarayeb($request);
        return Redirect(route('practicalProperty-List'))->with(Session::flash('flash_message', 'ضریب متعلقه با موفقیت ویرایش شد!'));
    }


    //    ---------------------------sheet----------------------------

    public function showSheet()
    {
        $shenaseObj = new ShenasnamePeiman();
        $sheetTypeObj = new Sheettype();
        $types = $sheetTypeObj->getAllTypes();
        $patternObj = new Patternagetype();
        $patterns = $patternObj->getAllTypes();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.practicalProperty.sheet.sheet', compact('cotractNum', 'types', 'patterns'));
    }


    public function createsheet(Request $request)
    {
        $sheetObj = new Sheet();
        $sheet = $sheetObj->createSheet($request);
        return Redirect(route('practicalProperty-List'))->with(Session::flash('flash_message', 'شیت آزمایشگاهی با موفقیت ثبت شد!'));
    }


    public function editSheet($sheetId)
    {
        $sheetObj = new Sheet();
        $sheet = $sheetObj->findSheet($sheetId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        $sheetTypeObj = new Sheettype();
        $types = $sheetTypeObj->getAllTypes();
        $patternObj = new Patternagetype();
        $patterns = $patternObj->getAllTypes();
        return view('pages.practicalProperty.sheet.sheetEdit', compact('sheet', 'cotractNum', 'types', 'patterns'));
    }


    public function updateSheet(Request $request)
    {
        $sheetObj = new Sheet();
        $sheetObj->updateSheet($request);
        return Redirect(route('practicalProperty-List'))->with(Session::flash('flash_message', 'شیت آزمایشگاهی با موفقیت ویرایش شد!'));
    }

}
