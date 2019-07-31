<?php

namespace App\Http\Controllers\Admin;

use App\Models\Records;
use App\Models\Recordtype;
use App\Models\ShenasnamePeiman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class SessionLetterController extends Controller
{
    public function index()
    {
        $sessionLetterObj = new Records();
        $sessionLetters = $sessionLetterObj->getAllSessions();
        return view('pages.session-letter.sessionLetterList',compact('sessionLetters'));
    }

    public function show()
    {
        $shenaseObj = new ShenasnamePeiman();
        $sessionTypeObj=new Recordtype();
        $types=$sessionTypeObj->getAllTypes();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.session-letter.sessionLetter',compact('cotractNum','types'));
    }

    public function createSessionLetter(Request $request)
    {
        $sessionLetterObj = new Records();
        $sessionLetter = $sessionLetterObj->createSessionLetter($request);
        return Redirect(route('sessionLetter-List'))->with(Session::flash('flash_message', 'صورت جلسه با موفقیت ثبت شد!'));
    }

    public function editSessionLetter($sessionId)
    {
        $sessionLetterObj = new Records();
        $session = $sessionLetterObj->findSession($sessionId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        $sessionTypeObj=new Recordtype();
        $types=$sessionTypeObj->getAllTypes();

        return view('pages.session-letter.sessionLetterEdit', compact('session','cotractNum','types'));
    }

    public function destroy(Request $request)
    {
        if ($request['sessionLetter_check']) {
            $sessionLetterObj = new Records();
            $sessionLetterObj->removeSession($request);


            return back()->with(Session::flash('flash_message', 'صورت وضعیت  با موفقیت حذف شد!'));
        } else {
            return back()->with(Session::flash('flash_d_message', 'انتخاب یک صورت وضعیت الزامی است!'));
        }
    }
}
