<?php

namespace App\Http\Controllers\Admin;

use App\Models\Adjustmentstate;
use App\Models\Cementfactory;
use App\Models\Contractextension;
use App\Models\Definitestate;
use App\Models\Delivery;
use App\Models\Driving;
use App\Models\Fuel;
use App\Models\Insurance;
use App\Models\Laboratory;
use App\Models\Notifications;
use App\Models\Others;
use App\Models\Predefinitestate;
use App\Models\Raste;
use App\Models\Recertification;
use App\Models\Release;
use App\Models\Sheet;
use App\Models\Temporarystate;
use App\Models\Zarayeb;
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

    public function archiveStatus(Request $request)
    {
        try {

            switch ($request['formType']) {
                case "temporarystateForm":
                    $temporaryStateObj = new Temporarystate();
                    $res = $temporaryStateObj->archive($request['temporaryState_check']);
                    break;
                case "adjustmentstateForm":
                    $adjustmentStateObj = new Adjustmentstate();
                    $res = $adjustmentStateObj->archive($request['adjustmentState_check']);
                    break;
                case "predefinitestateForm":
                    $predefiniteStateObj = new Predefinitestate();
                    $res = $predefiniteStateObj->archive($request['predefiniteState_check']);
                    break;
                case "definiteStatesForm":
                    $definitestateStateObj = new Definitestate();
                    $res = $definitestateStateObj->archive($request['definiteState_check']);
                    break;
                case "contractextensionsForm":
                    $contractextensionObj = new Contractextension();
                    $res = $contractextensionObj->archive($request['contractextension_check']);
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


    public function archiveProperty(Request $request)
    {
        try {

            switch ($request['formType']) {
                case "sheetForm":
                    $sheetObj = new Sheet();
                    $res = $sheetObj->archive($request['sheet_check']);
                    break;
                case "zarayebForm":
                    $zarayebObj = new Zarayeb();
                    $res = $zarayebObj->archive($request['zarayeb_check']);
                    break;
                case "rasteForm":
                    $rasteObj = new Raste();
                    $res = $rasteObj->archive($request['raste_check']);
                    break;
                default:
                    $res =$request['formType'];
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


    public function archiveDelivery(Request $request)
    {
        try {
            $deliveryObj = new Delivery();
            switch ($request['formType']) {
                case "definiteDeliveryForm":
                    $res = $deliveryObj->archive($request['definiteDelivery_check']);
                    break;
                case "temporaryDeliveryForm":
                    $res = $deliveryObj->archive($request['temporaryDelivery_check']);
                    break;

                default:
                    $res =$request['formType'];
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
