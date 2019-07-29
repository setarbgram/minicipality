<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cementfactory;
use App\Models\Driving;
use App\Models\Fuel;
use App\Models\Insurance;
use App\Models\Laboratory;
use App\Models\Notifications;
use App\Models\Others;
use App\Models\Recertification;
use App\Models\Release;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class LettersController extends Controller
{
    public function index()
    {
        $notificationsObj = new Notifications();
        $notifications = $notificationsObj->getAllNotifications();

        $cementObj=new Cementfactory();
        $cementfactories=$cementObj->getAllCementfactory();

        $drivingObj=new Driving();
        $drivings=$drivingObj->getAllDrivings();


        $fuelObj=new Fuel();
        $fuels=$fuelObj->getAllFuels();

        $releaseObj=new Release();
        $releases=$releaseObj->getAllReleases();

        $insuranceObj=new Insurance();
        $insurances=$insuranceObj->getAllInsurances();


        $recertificationObj=new Recertification();
        $recertifications=$recertificationObj->getAllRecertifications();


        $otherObj=new Others();
        $others=$otherObj->getAllOthers();

        $laboratoryObj=new Laboratory();
        $laboratories=$laboratoryObj->getAllLaboratories();


        return view('pages.letters.lettersList',compact('notifications','cementfactories',
            'drivings','fuels','releases','insurances','recertifications','others','laboratories'));
    }

}
