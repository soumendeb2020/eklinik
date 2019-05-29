<?php

namespace App\Http\Controllers;

use App\Consultation;
use Illuminate\Http\Request;
use DB;

class ConsultationController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $patientList = array();
        $arr = DB::table('patientqueues')->select('patientqueues.*')->where('is_active', '=', 1)->whereIn('department_id', [1, 2])->orderBy('id', 'asc')->get();

        //$patientList = DB::table('patients')->select('patients.*')->orderBy('id', 'desc')->get();
        foreach ($arr as $k => $v) {
            $tokval = DB::table('patientqueues')->select('patientqueues.*')->where('patient_id', '=', $v->id)->orderBy('id', 'desc')->first();
            $patientList[$k]['pqueue'] = $v;
            $patientList[$k]['patientdet'] = DB::table('patients')->select('patients.*')->where('id', '=', $v->patient_id)->first();
        }
        $department = DB::table('department')->select('department.*')->whereIn('id', [1, 2])->where('is_active', '=', 1)->get();
        //echo "<pre>"; print_r($patientList); exit;
        return view('consultation.index')->with(compact('patientList','department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation) {
        //
    }

}
