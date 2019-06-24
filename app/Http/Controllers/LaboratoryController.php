<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use \Crypt;
use DB;
use Carbon\Carbon;
use App\Laboratory;

class LaboratoryController extends Controller
{
     use Authorizable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patientList = array();
        $arr = DB::table('patientqueues')->select('patientqueues.*')->where('is_active', '=', 1)->where('department_id', '=', 4)->orderBy('id', 'asc')->get();
        foreach ($arr as $k => $v) {
            $tokval = DB::table('patientqueues')->select('patientqueues.*')->where('patient_id', '=', $v->id)->orderBy('id', 'desc')->first();
            $patientList[$k]['pqueue'] = $v;
            $patientList[$k]['patientdet'] = DB::table('patients')->select('patients.*')->where('id', '=', $v->patient_id)->first();
        }
        $department = DB::table('department')->select('department.*')->whereIn('id', [1, 2])->where('is_active', '=', 1)->get();
        return view('laboratory.index')->with(compact('patientList','department'));

    }

    
    public function saveLaboratorytest(Request $request) {

        $pq_id = \Crypt::decrypt(Input::post('pqid'));
        $patientQueue = DB::table('patientqueues')->select('patientqueues.*')->where('id', '=', $pq_id)->first();
        $symptomp = Input::post('btsypt');
        if( DB::table('laboratories')->where('q_id', '=', $pq_id)->exists() ){
            $lab = Laboratory::where('q_id', '=', $pq_id)->first();
            $lab->symptomp = $symptomp;
            $lab->btdate = Input::post('btdate');
            $lab->glucose = Input::post('btglucose');
            $lab->hb = Input::post('bthb');
            $lab->btrefno = Input::post('btrefno');
            $lab->elecdate = Input::post('elecdate');
            $lab->bicarbonate = Input::post('bicarbonate');
            $lab->chloride = Input::post('chloride');
            $lab->elecrefno = Input::post('elecrefno');
            $lab->fbsdate = Input::post('fbsdate');
            $lab->fbs = Input::post('fbs');
            $lab->fbsrefno = Input::post('fbsrefno');
            $lab->lipdate = Input::post('lipdate');
            $lab->hdl_Cholesterol = Input::post('hdl_Cholesterol');
            $lab->ldl_Cholesterol = Input::post('ldl_Cholesterol');
            $lab->total_Cholesterol = Input::post('total_Cholesterol');
            $lab->total_Cholesterol_ratio = Input::post('total_Cholesterol_ratio');
            $lab->triglyceride = Input::post('triglyceride');
            $lab->gggg = Input::post('gggg');
            $lab->liprefno = Input::post('liprefno');
            $lab->rfdate = Input::post('rfdate');
            $lab->urea = Input::post('urea');
            $lab->creatinine = Input::post('creatinine');
            $lab->uric_acid = Input::post('uric_acid');
            $lab->calcium = Input::post('calcium');
            $lab->corrected_calcium = Input::post('corrected_calcium');
            $lab->phospate = Input::post('phospate');
            $lab->rfrefno = Input::post('rfrefno');
            $lab->usdate = Input::post('usdate');
            $lab->presentation_lie = Input::post('presentation_lie');
            $lab->heart_rate = Input::post('heart_rate');
            $lab->biparietal_diameter = Input::post('biparietal_diameter');
            $lab->femur_length = Input::post('femur_length');
            $lab->estimated_present = Input::post('estimated_present');
            $lab->sex = Input::post('sex');
            $lab->abnormalities = Input::post('abnormalities');
            $lab->usrefno = Input::post('usrefno');          
            $lab->is_active = 1;
            $lab->updated_at = date('Y-m-d H:i:s');
            $lab->update();
        } else {
            $lab = new Laboratory;
            $lab->q_id = $patientQueue->id;
            $lab->qno = $patientQueue->token_no;
            $lab->parent_q_id = $patientQueue->patient_id;
            $lab->parent_qno = '';
            $lab->symptomp = $symptomp;
            $lab->btdate = Input::post('btdate');
            $lab->glucose = Input::post('btglucose');
            $lab->hb = Input::post('bthb');
            $lab->btrefno = Input::post('btrefno');
            $lab->elecdate = Input::post('elecdate');
            $lab->bicarbonate = Input::post('bicarbonate');
            $lab->chloride = Input::post('chloride');
            $lab->elecrefno = Input::post('elecrefno');
            $lab->fbsdate = Input::post('fbsdate');
            $lab->fbs = Input::post('fbs');
            $lab->fbsrefno = Input::post('fbsrefno');
            $lab->lipdate = Input::post('lipdate');
            $lab->hdl_Cholesterol = Input::post('hdl_Cholesterol');
            $lab->ldl_Cholesterol = Input::post('ldl_Cholesterol');
            $lab->total_Cholesterol = Input::post('total_Cholesterol');
            $lab->total_Cholesterol_ratio = Input::post('total_Cholesterol_ratio');
            $lab->triglyceride = Input::post('triglyceride');
            $lab->gggg = Input::post('gggg');
            $lab->liprefno = Input::post('liprefno');
            $lab->rfdate = Input::post('rfdate');
            $lab->urea = Input::post('urea');
            $lab->creatinine = Input::post('creatinine');
            $lab->uric_acid = Input::post('uric_acid');
            $lab->calcium = Input::post('calcium');
            $lab->corrected_calcium = Input::post('corrected_calcium');
            $lab->phospate = Input::post('phospate');
            $lab->rfrefno = Input::post('rfrefno');
            $lab->usdate = Input::post('usdate');
            $lab->presentation_lie = Input::post('presentation_lie');
            $lab->heart_rate = Input::post('heart_rate');
            $lab->biparietal_diameter = Input::post('biparietal_diameter');
            $lab->femur_length = Input::post('femur_length');
            $lab->estimated_present = Input::post('estimated_present');
            $lab->sex = Input::post('sex');
            $lab->abnormalities = Input::post('abnormalities');
            $lab->usrefno = Input::post('usrefno');
            $lab->is_active = 1;
            $lab->created_at = date('Y-m-d H:i:s');
            $lab->updated_at = date('Y-m-d H:i:s');
            $lab->save();
        }
        return 1;
    }
    
    
    public function mystore()
    {
        return view('laboratory.mystore');
    }//
}
