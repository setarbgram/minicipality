<?php

namespace App\Http\Controllers\Admin;

use App\Models\Workstation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class WorkstationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workstation = new Workstation();
        $workstations = $workstation->getAllStations();
        return view("pages.workstations.list",compact('workstations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.workstations.create');
    }

    public function store(Request $request)
    {
        $group = new Workstation();
        $group = $group->createSation($request);
        return Redirect(route('workstations'))->with(Session::flash('flash_message', 'Workstation is created successfully'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workstation  $workstation
     * @return \Illuminate\Http\Response
     */
    public function edit($stationId)
    {
        $workstation = new Workstation();
        $workstation = $workstation->findStation($stationId);
        return view('pages.workstations.show', compact('workstation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workstation  $workstation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $group = new Workstation();
        $group->updateStation($request);

        return Redirect(route('workstations'))->with(Session::flash('flash_message', 'Workstations is updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workstation  $workstation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (count($request['workstation_check'])) {

            foreach ($request['workstation_check'] as $activityId) {
                $activity = Workstation::where('id', $activityId)->first();
            }
            Workstation::destroy($request['workstation_check']); //users:name of checkbox
            return back()->with(Session::flash('flash_d_message', 'The Workstation is deleted successfully!'));
        } else {
            return back()->with(Session::flash('flash_d_message', 'Choose at least one Item!'));
        }
    }
}
