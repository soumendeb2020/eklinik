<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Crypt;
use DB;
use Carbon\Carbon;
use App\Laboratory;

class SettingsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $patientList = array();
        $arr = DB::table('patientqueues')->select('patientqueues.*')->where('is_active', '=', 1)->where('department_id', '=', 3)->orderBy('id', 'asc')->get();
        foreach ($arr as $k => $v) {
            $tokval = DB::table('patientqueues')->select('patientqueues.*')->where('patient_id', '=', $v->id)->orderBy('id', 'desc')->first();
            $patientList[$k]['pqueue'] = $v;
            $patientList[$k]['patientdet'] = DB::table('patients')->select('patients.*')->where('id', '=', $v->patient_id)->first();
        }
        $department = DB::table('department')->select('department.*')->whereIn('id', [1, 2])->where('is_active', '=', 1)->get();
        return view('setting.index')->with(compact('patientList', 'department'));
    }

}
