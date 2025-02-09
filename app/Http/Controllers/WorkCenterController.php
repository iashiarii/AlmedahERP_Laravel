<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\MachinesManual;
use App\Models\WorkCenter;
use Illuminate\Http\Request;

class WorkCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machines_manual = MachinesManual::all();
        $employee = Employee::all();
        return view('modules.BOM.newWorkCenter', ['machines_manuals' => $machines_manual, 'employees' => $employee]);//
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wc_code = "MOUNT-"; //initialize prefix "mount-"
        $form_data = $request->input();
        $wc_label = $form_data['wc_label'];
        $words = explode(' ', $wc_label);
        $wc_code .= strtoupper($words[0]); //get wc_label first word
        $wc_type = $form_data['wc_type'];

        $work_center = new WorkCenter(); //inserting all the necessary data/value needed
        $work_center->wc_code = $wc_code;
        $work_center->wc_label = $wc_label;
        $work_center->wc_type = $wc_type;
        if(isset($form_data['employee_id'])){ //checks if theres employee ID
            $work_center->employee_id = $form_data['employee_id'];
        }
        if(isset($form_data['machine_code'])){ //checks if theres machine_code
            $work_center->machine_code = $form_data['machine_code'];
        }

        $work_center->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkCenter  $workCenter
     * @return \Illuminate\Http\Response
     */
    public function show(WorkCenter $workCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkCenter  $workCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkCenter $workCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkCenter  $workCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkCenter $workCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkCenter  $workCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkCenter $workCenter)
    {
        //
    }
}
