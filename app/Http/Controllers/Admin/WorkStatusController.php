<?php

namespace App\Http\Controllers\Admin;

use App\Models\Adjustmentstate;
use App\Models\Contractextension;
use App\Models\Definitestate;
use App\Models\Predefinitestate;
use App\Models\Temporarystate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkStatusController extends Controller
{
    public function index(){

        $temporaryStateObj = new Temporarystate();
        $temporaryStates = $temporaryStateObj->getAllTemporarystate();


        $adjustmentStateObj = new Adjustmentstate();
        $adjustmentstates = $adjustmentStateObj->getAllAdjustmentstate();


        $predefiniteStateObj = new Predefinitestate();
        $predefinitestates = $predefiniteStateObj->getAllPredefinitestate();

        $definitestateStateObj = new Definitestate();
        $definiteStates = $definitestateStateObj->getAllDefinitestate();

        $contractextensionObj = new Contractextension();
        $contractextensions = $contractextensionObj->getAllContractextension();

        return view('pages.workStatus.workStatusList',compact('temporaryStates','adjustmentstates','predefinitestates','definiteStates','contractextensions'));
    }

}
