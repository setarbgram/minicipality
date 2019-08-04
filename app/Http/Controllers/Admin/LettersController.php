<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cementfactory;
use App\Models\Driving;
use App\Models\Fuel;
use App\Models\Insurance;
use App\Models\Insurancesubjecttype;
use App\Models\Laboratory;
use App\Models\Notifications;
use App\Models\Others;
use App\Models\Recertification;
use App\Models\Release;
use App\Models\Releasetype;
use App\Models\ShenasnamePeiman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class LettersController extends Controller
{
    public function index()
    {
        $notificationsObj = new Notifications();
        $notifications = $notificationsObj->getAllNotifications();

        $cementObj = new Cementfactory();
        $cementfactories = $cementObj->getAllCementfactory();

        $drivingObj = new Driving();
        $drivings = $drivingObj->getAllDrivings();


        $fuelObj = new Fuel();
        $fuels = $fuelObj->getAllFuels();

        $releaseObj = new Release();
        $releases = $releaseObj->getAllReleases();

        $insuranceObj = new Insurance();
        $insurances = $insuranceObj->getAllInsurances();


        $recertificationObj = new Recertification();
        $recertifications = $recertificationObj->getAllRecertifications();


        $otherObj = new Others();
        $others = $otherObj->getAllOthers();

        $laboratoryObj = new Laboratory();
        $laboratories = $laboratoryObj->getAllLaboratories();


        return view('pages.letters.lettersList', compact('notifications', 'cementfactories',
            'drivings', 'fuels', 'releases', 'insurances', 'recertifications', 'others', 'laboratories'));
    }

    //    ---------------------------notifications----------------------------

    public function showNotifications()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.notifications.notifications', compact('cotractNum'));
    }


    public function createNotifications(Request $request)
    {
        $notificationsObj = new Notifications();
        $notifications = $notificationsObj->createNotifications($request);
        return Redirect(route('letters'))->with(Session::flash('flash_message', 'اخطار با موفقیت ثبت شد.'));

    }

    public function editNotifications($notificationsId)
    {
        $notificationsObj = new Notifications();
        $notification = $notificationsObj->findNotifications($notificationsId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.notifications.notificationsEdit', compact('notification','cotractNum'));
    }


    //    ---------------------------cementfactory----------------------------

    public function showCementfactory()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.cementfactory.cementfactory', compact('cotractNum'));
    }


    public function createCementfactory(Request $request)
    {
        $cementfactoryObj = new Cementfactory();
        $cementfactory = $cementfactoryObj->createCementfactory($request);
        return Redirect(route('letters'))->with(Session::flash('flash_message', 'سیمان با موفقیت ثبت شد.'));

    }

    public function editCementfactory($cementfactoryId)
    {
        $cementfactoryObj = new Cementfactory();
        $cementfactory = $cementfactoryObj->findCementfactory($cementfactoryId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.cementfactory.cementfactoryEdit', compact('cementfactory','cotractNum'));
    }


    //    ---------------------------driving----------------------------
    public function showDriving()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.driving.driving', compact('cotractNum'));
    }


    public function createDriving(Request $request)
    {
        $drivingObj = new Driving();
        $driving = $drivingObj->createDrivings($request);
        return Redirect(route('letters'))->with(Session::flash('flash_message', 'راهنمایی و رانندگی با موفقیت ثبت شد.'));

    }

    public function editDriving($drivingId)
    {
        $drivingObj = new Driving();
        $driving = $drivingObj->findDrivings($drivingId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.driving.drivingEdit', compact('driving','cotractNum'));
    }

    //    ---------------------------fuel----------------------------
    public function showFuel()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.fuel.fuel', compact('cotractNum'));
    }


    public function createFuel(Request $request)
    {
        $fuelObj = new Fuel();
        $fuel = $fuelObj->createFuels($request);
        return Redirect(route('letters'))->with(Session::flash('flash_message', 'سوخت با موفقیت ثبت شد.'));
    }

    public function editFuel($fuelId)
    {
        $fuelObj = new Fuel();
        $fuel = $fuelObj->findFuels($fuelId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.fuel.fuelEdit', compact('fuel','cotractNum'));
    }

    //    ---------------------------release----------------------------
    public function showRelease()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        $typesObj=new Releasetype();
        $types=$typesObj->getAllTypes();
        return view('pages.letters.release.release', compact('cotractNum','types'));
    }


    public function createRelease(Request $request)
    {
        $releaseObj = new Release();
        $release = $releaseObj->createRelease($request);
        return Redirect(route('letters'))->with(Session::flash('flash_message', 'آزادسازی با موفقیت ثبت شد.'));
    }

    public function editRelease($releaseId)
    {
        $releaseObj = new Release();
        $release = $releaseObj->findRelease($releaseId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        $typesObj=new Releasetype();
        $types=$typesObj->getAllTypes();
        return view('pages.letters.release.releaseEdit', compact('release','cotractNum','types'));
    }


    //    ---------------------------insurance----------------------------
    public function showInsurance()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        $typesObj=new Insurancesubjecttype();
        $types=$typesObj->getAllTypes();
        return view('pages.letters.insurance.insurance', compact('cotractNum','types'));
    }


    public function createInsurance(Request $request)
    {
        $insuranceObj = new Insurance();
        $insurance = $insuranceObj->createInsurance($request);
        return Redirect(route('letters'))->with(Session::flash('flash_message', 'بیمه با موفقیت ثبت شد.'));
    }

    public function editInsurance($insuranceId)
    {
        $insuranceObj = new Insurance();
        $insurance = $insuranceObj->findInsurance($insuranceId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        $typesObj=new Insurancesubjecttype();
        $types=$typesObj->getAllTypes();
        return view('pages.letters.insurance.insuranceEdit', compact('insurance','cotractNum','types'));
    }


    //    ---------------------------recertification----------------------------
    public function showRecertification()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.recertification.recertification', compact('cotractNum'));
    }


    public function createRecertification(Request $request)
    {
        $recertificationObj = new Recertification();
        $recertification = $recertificationObj->createRecertification($request);
        return Redirect(route('letters'))->with(Session::flash('flash_message', 'اصلاحیه با موفقیت ثبت شد.'));
    }

    public function editRecertification($recertificationId)
    {
        $recertificationObj = new Recertification();
        $recertification = $recertificationObj->findRecertification($recertificationId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.recertification.recertificationEdit', compact('recertification','cotractNum'));
    }



    //    ---------------------------others----------------------------
    public function showOthers()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.others.others', compact('cotractNum'));
    }


    public function createOthers(Request $request)
    {
        $othersObj = new Others();
        $others = $othersObj->createOthers($request);
        return Redirect(route('letters'))->with(Session::flash('flash_message', 'متفرقه با موفقیت ثبت شد.'));
    }

    public function editOthers($othersId)
    {
        $othersObj = new Others();
        $others = $othersObj->findOthers($othersId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.others.othersEdit', compact('others','cotractNum'));
    }

    //    ---------------------------laboratory----------------------------
    public function showLaboratory()
    {
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.laboratory.laboratory', compact('cotractNum'));
    }


    public function createLaboratory(Request $request)
    {
        $laboratoryObj = new Laboratory();
        $laboratory = $laboratoryObj->createLaboratory($request);
        return Redirect(route('letters'))->with(Session::flash('flash_message', 'آزمایشگاه با موفقیت ثبت شد.'));
    }

    public function editLaboratory($laboratoryId)
    {
        $laboratoryObj = new Laboratory();
        $laboratory = $laboratoryObj->findLaboratory($laboratoryId);
        $shenaseObj = new ShenasnamePeiman();
        $cotractNum = $shenaseObj->getAllContractID();
        return view('pages.letters.laboratory.laboratoryEdit', compact('laboratory','cotractNum'));
    }

}
