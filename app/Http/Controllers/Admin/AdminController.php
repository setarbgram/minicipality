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

class AdminController extends Controller
{
    public function archiveActivity(Request $request)
    {
        try {

            switch ($request['formType']) {
                case "notificationsForm":
                    $notificationsObj = new Notifications();
                    $res = $notificationsObj->archive($request['notification_check']);
                    break;
                case "cementfactoryForm":
                    $cementObj = new Cementfactory();
                    $res = $cementObj->archive($request['cementfactory_check']);
                    break;
                case "drivingForm":
                    $drivingObj = new Driving();
                    $res = $drivingObj->archive($request['driving_check']);
                    break;
                case "fuelsForm":
                    $fuelObj = new Fuel();
                    $res = $fuelObj->archive($request['fuel_check']);
                    break;
                case "releaseForm":
                    $releaseObj = new Release();
                    $res = $releaseObj->archive($request['release_check']);
                    break;
                case "insuranceForm":
                    $insuranceObj = new Insurance();
                    $res = $insuranceObj->archive($request['insurance_check']);
                    break;
                case "recertificationForm":
                    $recertificationObj = new Recertification();
                    $res = $recertificationObj->archive($request['recertification_check']);
                    break;
                case "otherForm":
                    $otherObj = new Others();
                    $res = $otherObj->archive($request['other_check']);
                    break;
                case "laboratoryForm":
                    $laboratoryObj = new Laboratory();
                    $res = $laboratoryObj->archive($request['laboratory_check']);
                    break;
                default:
                    $res = '0';
            }

            return response()->json($res);
        } catch (\Exception $e) {

            \Log::info("status 400");
            \Log::info($e);
            return response()->json([
                'message' => 'Incorrect Credentials',
                'status' => 400
            ], 400);
        }
   }
}
