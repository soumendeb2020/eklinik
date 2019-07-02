<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use \Crypt;
use DB;
use App\User;
use App\Consultation;
use App\Prescribtion;
use App\Laboratory;
use App\Laboratoryrequest;
use Carbon\Carbon;

class PatientController extends Controller {
    
    use Authorizable;

    public function profile($id = null) {
        //$result = User::latest()->paginate();
        if ($id != ''){
            $qid = $id;
            $pq_id = \Crypt::decrypt($qid);
            
            $pq = DB::table('patientqueues')->select('patientqueues.*')->where('id', '=', $pq_id)->first();
            
             
            $curicno = $pq->ic_number;
            $curtoken = $pq->token_no;
            
            $othpqlist = DB::table('patientqueues')->select('patientqueues.*')->where('ic_number', '=', $curicno)->where('token_no', '!=', $curtoken)->get();
            //echo "<pre>"; print_r($pq); echo "<pre>"; print_r($othpqlist); exit;
            
            $patientData['queueId'] = $qid;
            $patientData['pqueue'] = $pq;
            $patient_detail = DB::table('patients')->select('patients.*')->where('id', '=', $pq->patient_id)->first();
            $patientData['patientdet'] = $patient_detail;

            $dataLab = array();
            $parentpq = DB::table('patientqueues')->select('patientqueues.*')->where('patient_id', '=', $pq->patient_id)->where('depart_name', '=', 'Laboratory')->get();
            $k = 1;
            foreach($parentpq as $pq){
                $dataLab[$k]['labreq'] = DB::table('laboratoryrequests')->select('laboratoryrequests.*')->where('q_id', '=', $pq->id)->first();
                $dataLab[$k]['labtest'] = DB::table('laboratories')->select('laboratories.*')->where('q_id', '=', $pq->id)->first();
                $k++;
            }

            $labtestlist = DB::table('laboratoryrequests')->select('laboratoryrequests.*')->where('q_id', '=', $pq->id)->first();
            $patientData['labtstlist'] = $dataLab;

            if ($patient_detail->staff_id != 0) {
                $staff_detail = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $patient_detail->staff_id)->first();
                $patientData['email'] = $staff_detail->HR_EMAIL;
                $patientData['phone'] = $staff_detail->HR_TELBIMBIT;
                if ($patient_detail->utype == 'staff') {
                    $patientData['dob'] = $staff_detail->HR_TARIKH_LAHIR;
                } else if ($patient_detail->utype == 'dependent') {
                    $dependent_detail = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NO_PEKERJA', '=', $patient_detail->staff_id)->first();
                    $patientData['dob'] = $dependent_detail->HR_TARIKH_LAHIR;
                } else {
                    $patientData['dob'] = '';
                }
            } else {
                $patientData['email'] = '';
                $patientData['phone'] = '';
                $patientData['dob'] = '';
            }

            if ($patientData['dob'] != '') {
                $patientData['age'] = \Carbon::parse($patientData['dob'])->age;
            } else {
                $patientData['age'] = '';
            }

            $drugs = DB::table('drug_list')->select('drug_list.*')->where('drug_name', '!=', '')->get();
            return view('patient.profile', compact('patientData', 'othpqlist', 'drugs'));
        } else {
            return redirect()->back();
        }
    }

    public function getPrescription(){
        //echo "ok"; exit;
    }
    
    public function savePrescription(Request $request) {
        //echo "<pre>"; print_r($_POST); exit;
        $encPatientQueueId = Input::get('pid');
        $pq_id = \Crypt::decrypt(Input::post('pqid'));
        $patientQueue = DB::table('patientqueues')->select('patientqueues.*')->where('id', '=', $pq_id)->first();
        if($patientQueue){
            
        } else {
            
        }
        
        $consSubmit = Input::post('consSubmit');
        $qno = Input::post('qno');
        $symptomp = Input::post('symptomp');
        $temperature = Input::post('temperature');
        $bp = Input::post('blood_presure');
        $bs = Input::post('blood_sugar');
        $rs = Input::post('result');
        
        $medical_certificate = Input::post('medical_certificate');
        $stdate = Input::post('stdate');
        $enddate = Input::post('enddate');
        $totaldays = Input::post('totaldays');
        $time_slip = Input::post('time_slip');
        $onlydate = Input::post('onlydate');
        $sttime = Input::post('sttime');
        $endtime = Input::post('endtime');
        $totaltime = Input::post('totaltime');
        
        if(Input::get('is_medical_certificate') !== ''){
            $is_medical_certificate = Input::post('is_medical_certificate');
            $medical_certificate = Input::post('medical_certificate');
        } else {
            $is_medical_certificate = '';
            $medical_certificate = '';
        }
        
        if(Input::get('is_time_slip') !== ''){
            $is_time_slip = Input::post('is_time_slip');
            $time_slip = Input::post('time_slip');
        } else {
            $is_time_slip = '';
            $time_slip = '';
        }
        
        if($consSubmit == 0){
            $consultation = new Consultation;

            $consultation->q_id = $pq_id;
            $consultation->qno = $qno;
            $consultation->symptomp = $symptomp;
            $consultation->temperature = $temperature;
            $consultation->blood_presure = $bp;
            $consultation->blood_sugar = $bs;
            $consultation->result  = $rs;
            $consultation->medical_certificate  = $medical_certificate;
            $consultation->stdate  = $stdate;
            $consultation->enddate  = $enddate;
            $consultation->totaldays  = $totaldays;
            $consultation->time_slip  = $time_slip;
            $consultation->onlydate  = $onlydate;
            $consultation->sttime  = $sttime;
            $consultation->endtime  = $endtime;
            $consultation->totaltime  = $totaltime;
            $consultation->is_active = 1;
            $consultation->created_at = date('Y-m-d H:i:s');
            $consultation->updated_at = date('Y-m-d H:i:s');
            $consultation->save();
            $lastInsertIdCons = $consultation->id;

            if ($request->has('drugs')) {
                //$drugsList = Input::post('drugs');
                $drugsId = Input::post('drugs');
                $qtyList = Input::post('qty');
                $dossageList = Input::post('dossage');
                $descList = Input::post('desc');
                $noteList = Input::post('note');

                foreach ($drugsId as $k => $v) {
                    if($v['value'] != ''){
                        $drugDet = DB::table('drug_list')->select('drug_list.*')->where('id', '=', $drugsId)->first();
                        $prescribtion = new Prescribtion;
                        $prescribtion->patient_id = $patientQueue->patient_id;
                        $prescribtion->queue_id = $patientQueue->id;
                        $prescribtion->consutants_id = $lastInsertIdCons;
                        $prescribtion->drugs_id = $drugDet->id;
                        $prescribtion->drugs = $drugDet->drug_name;
                        $prescribtion->qty = $qtyList[$k]['value'];
                        $prescribtion->dossage = $dossageList[$k]['value'];
                        $prescribtion->description = $descList[$k]['value'];
                        $prescribtion->note = $noteList[$k]['value'];
                        $prescribtion->is_active = 1;
                        $prescribtion->created_at = date('Y-m-d H:i:s');
                        $prescribtion->updated_at = date('Y-m-d H:i:s');
                        $prescribtion->save();
                    }
                }
            }
            
        } else {
            $consultation = Consultation::find($consSubmit);
            $consultation->q_id = $pq_id;
            $consultation->qno = $qno;
            $consultation->symptomp = $symptomp;
            $consultation->temperature = $temperature;
            $consultation->blood_presure = $bp;
            $consultation->blood_sugar = $bs;
            $consultation->result  = $rs; 
            $consultation->medical_certificate  = $medical_certificate;
            $consultation->stdate  = $stdate;
            $consultation->enddate  = $enddate;
            $consultation->totaldays  = $totaldays;
            $consultation->time_slip  = $time_slip;
            $consultation->onlydate  = $onlydate;
            $consultation->sttime  = $sttime;
            $consultation->endtime  = $endtime;
            $consultation->totaltime  = $totaltime;
            $consultation->is_active = 1;
            $consultation->created_at = date('Y-m-d H:i:s');
            $consultation->updated_at = date('Y-m-d H:i:s');
            $consultation->save();
            $lastInsertIdCons = $consSubmit;
            
            if ($request->has('drugs')) {
                Prescribtion::where('consutants_id', '=', $consSubmit)->delete();
                $drugsId = Input::post('drugs');
                $drugDet = DB::table('drug_list')->select('drug_list.*')->where('id', '=', $drugsId)->first();
                
                $qtyList = Input::post('qty');
                $dossageList = Input::post('dossage');
                $descList = Input::post('desc');
                $noteList = Input::post('note');
                foreach ($drugsId as $k => $v) {
                    if($v['value'] != ''){
                        $drugDet = DB::table('drug_list')->select('drug_list.*')->where('id', '=', $drugsId)->first();
                        $prescribtion = new Prescribtion;
                        $prescribtion->patient_id = $patientQueue->patient_id;
                        $prescribtion->queue_id = $patientQueue->id;
                        $prescribtion->consutants_id = $lastInsertIdCons;
                        $prescribtion->drugs_id = $drugDet->id;
                        $prescribtion->drugs = $drugDet->drug_name;
                        $prescribtion->qty = $qtyList[$k]['value'];
                        $prescribtion->dossage = $dossageList[$k]['value'];
                        $prescribtion->description = $descList[$k]['value'];
                        $prescribtion->note = $noteList[$k]['value'];
                        $prescribtion->is_active = 1;
                        $prescribtion->created_at = date('Y-m-d H:i:s');
                        $prescribtion->updated_at = date('Y-m-d H:i:s');
                        $prescribtion->save();
                    }
                }
            }
        }

        //   ######################################
        $dt = DB::table('patientqueues')->where('id', '=', $pq_id)->first();
        $patientQueueDt = DB::table('patientqueues')->where('id', '=', $pq_id)->first();
        if( DB::table('patientqueues')->where('parent_id', '=', $pq_id)->where('ic_number', '=', $patientQueue->ic_number)->where('department_id', '=', 3)->exists() ){
            return 0;
        } else {
            $savePatQue['parent_id'] = $patientQueueDt->id;
            $savePatQue['patient_id'] = $patientQueueDt->patient_id; 
            $savePatQue['staff_id'] = $patientQueueDt->staff_id;
            $savePatQue['ic_number'] = $patientQueueDt->ic_number; 
            $savePatQue['name'] = $patientQueueDt->name;
            $savePatQue['symptopms'] = $patientQueueDt->symptopms;
            $savePatQue['department_id'] = 3;
            $savePatQue['depart_name'] = 'Dispensary';
            $savePatQue['utype'] = $patientQueueDt->utype;
            $savePatQue['ptype'] = $patientQueueDt->ptype;
            $savePatQue['queue_id'] = $patientQueueDt->queue_id;
            $savePatQue['queueno'] = $patientQueueDt->queueno;

            $count = DB::table('patientqueues')->where('queueno', '=', $patientQueue->queueno)->count();
            $qno = "D-".str_pad($count + 1, 5, '0', STR_PAD_LEFT);
            $savePatQue['token_no'] = $qno;    

            $savePatQue['q_status'] = $patientQueueDt->q_status;
            $savePatQue['is_active'] = 1;
            $savePatQue['created_time'] = date("h:i:s a", time());
            $savePatQue['created_at'] = date("Y-m-d h:i:s", time());
            $savePatQue['updated_at'] = date("Y-m-d h:i:s", time());
            $patId = DB::table('patientqueues')->insertGetId($savePatQue);

            DB::table('patientqueues')->where("id", '=',  $patientQueueDt->id)->update(['is_active'=> 0]);
            return 1;
        }
        //   ######################################
        return $lastInsertIdCons;
    }

    public function laboratoryrequest(Request $request) {
        $pq_id = \Crypt::decrypt(Input::post('labreqpid'));
        $patientQueue = DB::table('patientqueues')->select('patientqueues.*')->where('id', '=', $pq_id)->first();
        $remarks = Input::post('remarks');       
        $bloodtest = $request->has('bloodtest') ? 1: 0;
        $lipids = $request->has('lipids') ? 1: 0;
        $electrolytestest = $request->has('electrolytestest') ? 1: 0;
        $renalfunction = $request->has('renalfunction') ? 1: 0;
        $fbs = $request->has('fbs') ? 1: 0;
        $ultrasound = $request->has('ultrasound') ? 1: 0;

        $savePatQue['parent_id'] = $patientQueue->id;
        $savePatQue['patient_id'] = $patientQueue->patient_id;
        $savePatQue['staff_id'] = $patientQueue->staff_id;
        $savePatQue['ic_number'] = $patientQueue->ic_number;
        $savePatQue['name'] = $patientQueue->name;
        $savePatQue['symptopms'] = $patientQueue->symptopms;
        $savePatQue['department_id'] = 4;
        $savePatQue['depart_name'] = 'Laboratory';
        $savePatQue['utype'] = $patientQueue->utype;
        $savePatQue['ptype'] = $patientQueue->ptype;
        $savePatQue['queue_id'] = $patientQueue->queue_id;
        $savePatQue['queueno'] = $patientQueue->queueno;

        $count = DB::table('patientqueues')->where('queueno', '=', $patientQueue->queueno)->count();
        $qno = "L-".str_pad($count + 1, 5, '0', STR_PAD_LEFT);
        $savePatQue['token_no'] = $qno;    

        $savePatQue['q_status'] = $patientQueue->q_status;
        $savePatQue['is_active'] = 1;
        $savePatQue['created_time'] = date("h:i:s a", time());
        $savePatQue['created_at'] = date("Y-m-d h:i:s", time());
        $savePatQue['updated_at'] = date("Y-m-d h:i:s", time());
        $patId = DB::table('patientqueues')->insertGetId($savePatQue);
  
        $labReq['q_id'] = $patId;
        $labReq['q_no'] = '';
        $labReq['symptomp'] = $patientQueue->symptopms;
        $labReq['bloodtest'] = $bloodtest;
        $labReq['electrolytestest'] = $electrolytestest;
        $labReq['fbs'] = $fbs;
        $labReq['lipids'] = $lipids;
        $labReq['renalfunction'] = $renalfunction;
        $labReq['ultrasound'] = $ultrasound;
        $labReq['remarks'] = $remarks;      
        $labReq['is_active'] = 1;
        $labReq['created_at'] = date("Y-m-d h:i:s", time());
        $labReq['updated_at'] = date("Y-m-d h:i:s", time());        
        $labReqId = DB::table('laboratoryrequests')->insertGetId($labReq); 
        
        DB::table('patientqueues')->where("id", '=',  $patientQueue->id)->update(['is_active'=> 0]);

        return redirect('/consultations');
    }
    
    public function laboratoryPassForm(Request $request){
        $pq_id = \Crypt::decrypt(Input::post('id'));
        if( DB::table('laboratories')->where('q_id', '=', $pq_id)->exists() ){
            $dt = DB::table('patientqueues')->where('id', '=', $pq_id)->first();
            if($dt->parent_id != ''){
                DB::table('patientqueues')->where('id', $dt->parent_id)->update(array('is_active' => 1));
                DB::table('patientqueues')->where('id', $dt->id)->update(array('is_active' => 0));
            } else {
                $patientQueue = DB::table('patientqueues')->where('id', '=', $pq_id)->first();
                
                $savePatQue['parent_id'] = $patientQueue->id;
                $savePatQue['patient_id'] = $patientQueue->patient_id;
                $savePatQue['staff_id'] = $patientQueue->staff_id;
                $savePatQue['ic_number'] = $patientQueue->ic_number;
                $savePatQue['name'] = $patientQueue->name;
                $savePatQue['symptopms'] = $patientQueue->symptopms;
                $savePatQue['department_id'] = 1;
                $savePatQue['depart_name'] = 'Consultation 1';
                $savePatQue['utype'] = $patientQueue->utype;
                $savePatQue['ptype'] = $patientQueue->ptype;
                $savePatQue['queue_id'] = $patientQueue->queue_id;
                $savePatQue['queueno'] = $patientQueue->queueno;

                $count = DB::table('patientqueues')->where('queueno', '=', $patientQueue->queueno)->count();
                $qno = "C-".str_pad($count + 1, 5, '0', STR_PAD_LEFT);
                $savePatQue['token_no'] = $qno;    

                $savePatQue['q_status'] = $patientQueue->q_status;
                $savePatQue['is_active'] = 1;
                $savePatQue['created_time'] = date("h:i:s a", time());
                $savePatQue['created_at'] = date("Y-m-d h:i:s", time());
                $savePatQue['updated_at'] = date("Y-m-d h:i:s", time());
                $patId = DB::table('patientqueues')->insertGetId($savePatQue);
                
                // ## DB::table('patientqueues')->where("id", '=',  $patientQueue->id)->update(['is_active'=> 0]);
            }
            return 1;
        } else {
            return 0;
        }
    }


    public function consultancyPassForm(){
        $pq_id = \Crypt::decrypt(Input::post('id'));
        if( DB::table('patientqueues')->where('id', '=', $pq_id)->exists() ){
            $dt = DB::table('patientqueues')->where('id', '=', $pq_id)->first();
            $patientQueue = DB::table('patientqueues')->where('id', '=', $pq_id)->first();

            if( DB::table('patientqueues')->where('parent_id', '=', $pq_id)->where('ic_number', '=', $patientQueue->ic_number)->where('department_id', '=', 3)->exists() ){
                return 0;
            } else {
                $savePatQue['parent_id'] = $patientQueue->id;
                $savePatQue['patient_id'] = $patientQueue->patient_id; 
                $savePatQue['staff_id'] = $patientQueue->staff_id;
                $savePatQue['ic_number'] = $patientQueue->ic_number;
                $savePatQue['name'] = $patientQueue->name;
                $savePatQue['symptopms'] = $patientQueue->symptopms;
                $savePatQue['department_id'] = 3;
                $savePatQue['depart_name'] = 'Dispensary';
                $savePatQue['utype'] = $patientQueue->utype;
                $savePatQue['ptype'] = $patientQueue->ptype;
                $savePatQue['queue_id'] = $patientQueue->queue_id;
                $savePatQue['queueno'] = $patientQueue->queueno;

                $count = DB::table('patientqueues')->where('queueno', '=', $patientQueue->queueno)->count();
                $qno = "D-".str_pad($count + 1, 5, '0', STR_PAD_LEFT);
                $savePatQue['token_no'] = $qno;    

                $savePatQue['q_status'] = $patientQueue->q_status;
                $savePatQue['is_active'] = 1;
                $savePatQue['created_time'] = date("h:i:s a", time());
                $savePatQue['created_at'] = date("Y-m-d h:i:s", time());
                $savePatQue['updated_at'] = date("Y-m-d h:i:s", time());
                $patId = DB::table('patientqueues')->insertGetId($savePatQue);

                DB::table('patientqueues')->where("id", '=',  $patientQueue->id)->update(['is_active'=> 0]);
                return 1;
            }
            
        } else {
            return 0;
        }
        
    }
    
    
    public function closeDispencery(Request $request) {
        //echo "<pre>"; print_r($_POST); exit;
        $encPatientQueueId = Input::get('pid');
        $pq_id = \Crypt::decrypt(Input::post('pqid'));
        //echo $pq_id; exit;
        //$patientQueue = DB::table('patientqueues')->select('patientqueues.*')->where('id', '=', $pq_id)->first();
        if( DB::table('patientqueues')->where('id', '=', $pq_id)->where('department_id', '=', 3)->exists() ){
            DB::table('patientqueues')->where("id", '=',  $pq_id)->update(['is_active'=> 0]);
            return 1;
        } else {
            return 0;
        }
        //   ######################################
        return $lastInsertIdCons;
    }
    
    
    public function dispenceryprofile($id){
        if ($id != ''){
            $qid = $id;
            $pq_id = \Crypt::decrypt($qid);
            $pq = DB::table('patientqueues')->select('patientqueues.*')->where('id', '=', $pq_id)->first();
            //echo $pq_id; exit;
            //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            $curicno = $pq->ic_number;
            $curtoken = $pq->token_no;
            $othpqlist = DB::table('patientqueues')->select('patientqueues.*')->where('ic_number', '=', $curicno)->where('token_no', '!=', $curtoken)->get();
            $patientData['queueId'] = $qid;
            $patientData['pqueue'] = $pq;
            $patient_detail = DB::table('patients')->select('patients.*')->where('id', '=', $pq->patient_id)->first();
            $patientData['patientdet'] = $patient_detail;
            
            //  ###   Patient laboratory History
            $dataLab = array();
            $parentpq = DB::table('patientqueues')->select('patientqueues.*')->where('patient_id', '=', $pq->patient_id)->where('depart_name', '=', 'Laboratory')->get();
            $k = 1;
            foreach($parentpq as $pq){
                $dataLab[$k]['labreq'] = DB::table('laboratoryrequests')->select('laboratoryrequests.*')->where('q_id', '=', $pq->id)->first();
                $dataLab[$k]['labtest'] = DB::table('laboratories')->select('laboratories.*')->where('q_id', '=', $pq->id)->first();
                $k++;
            }
            $labtestlist = DB::table('laboratoryrequests')->select('laboratoryrequests.*')->where('q_id', '=', $pq->id)->first();
            $patientData['labtstlist'] = $dataLab;
            
            if ($patient_detail->staff_id != 0) {
                $staff_detail = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $patient_detail->staff_id)->first();
                $patientData['email'] = $staff_detail->HR_EMAIL;
                $patientData['phone'] = $staff_detail->HR_TELBIMBIT;
                if ($patient_detail->utype == 'staff') {
                    $patientData['dob'] = $staff_detail->HR_TARIKH_LAHIR;
                } else if ($patient_detail->utype == 'dependent') {
                    $dependent_detail = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NO_PEKERJA', '=', $patient_detail->staff_id)->first();
                    $patientData['dob'] = $dependent_detail->HR_TARIKH_LAHIR;
                } else {
                    $patientData['dob'] = '';
                }
            } else {
                $patientData['email'] = '';
                $patientData['phone'] = '';
                $patientData['dob'] = '';
            }

            if ($patientData['dob'] != '') {
                $patientData['age'] = \Carbon::parse($patientData['dob'])->age;
            } else {
                $patientData['age'] = '';
            }
            //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            if($pq->parent_id > 0){
                $consult = DB::table('consultations')->select('consultations.*')->where('q_id', '=', $pq->parent_id)->first();
                //dd($consult);
                if( $consult ){
                    $consult = DB::table('consultations')->select('consultations.*')->where('q_id', '=', $pq->parent_id)->first();
                    //echo $consult->id; exit;
                    if( DB::table('prescribtions')->select('prescribtions.*')->where('consutants_id', '=', $consult->id)->exists() ){
                        $drugs = DB::table('prescribtions')->select('prescribtions.*')->where('consutants_id', '=', $consult->id)->get();
                    } else {
                        $drugs = array();
                    }    
                } else {
                    return redirect()->back();
                }
                
                 
            } else {
                return redirect()->back();
            }
            
            return view('patient.dispenceryprofile', compact('patientData', 'qid', 'pq', 'consult', 'othpqlist', 'drugs'));
            
        } else {
            return redirect()->back();
        }
    }
      
    public function downloadmedicalcertificate(){

        $qid = $_POST['qid'];
        $pq_id = \Crypt::decrypt($qid);
        
        $pq = DB::table('patientqueues')->select('patientqueues.*')->where('id', '=', $pq_id)->first();
        $parentq = DB::table('patientqueues')->select('patientqueues.*')->where('id', '=', $pq->parent_id)->first();
        $consult = DB::table('consultations')->select('consultations.*')->where('q_id', '=', $pq->parent_id)->first();
        $dayinwordData = $this->numberTowords(intval($consult->totaldays));
        if(intval($consult->totaldays) == 0){
            $dayinword = " ";
        } else if(intval($consult->totaldays) == 1){
            $dayinword = $dayinwordData . " Day";
        } else {
            $dayinword = $dayinwordData . " Day's";
        }
        $cur_date = Carbon::now()->toDateTimeString();
        
        $department = 'Consutation';
        
        return view('patient.downloadmedicalcertificate', compact('pq','parentq','consult','dayinword', 'department', 'cur_date'));
    }
    
    public function dispencerytimeslip(){

        $qid = $_POST['qid'];
        $pq_id = \Crypt::decrypt($qid);
        
        $pq = DB::table('patientqueues')->select('patientqueues.*')->where('id', '=', $pq_id)->first();
        $parentq = DB::table('patientqueues')->select('patientqueues.*')->where('id', '=', $pq->parent_id)->first();
        $consult = DB::table('consultations')->select('consultations.*')->where('q_id', '=', $pq->parent_id)->first();
        $dayinwordData = $this->numberTowords(intval($consult->totaldays));
        if(intval($consult->totaldays) == 0){
            $dayinword = " ";
        } else if(intval($consult->totaldays) == 1){
            $dayinword = $dayinwordData . " Day";
        } else {
            $dayinword = $dayinwordData . " Day's";
        }
        $cur_date = Carbon::now()->toDateTimeString();
        
        $department = 'Consutation';
        
        return view('patient.downloadtimeslip', compact('pq','parentq','consult','dayinword', 'department', 'cur_date'));
    }
    
    public function labpatientprofile($id = null) {
        if ($id != ''){
            $qid = $id;
            $pq_id = \Crypt::decrypt($qid);
            $pq = DB::table('patientqueues')->select('patientqueues.*')->where('id', '=', $pq_id)->first();
            $countReq = DB::table('laboratoryrequests')->select('laboratoryrequests.*')->where('q_id', '=', $pq_id)->count();
            if($countReq > 0){
                $labreq = DB::table('laboratoryrequests')->select('laboratoryrequests.*')->where('q_id', '=', $pq_id)->first();
                $labreqCount = 1;
            } else {
                $labreq = array();
                $labreqCount = 0;
            }

            $patientData['queueId'] = $qid;
            $patientData['pqueue'] = $pq;
            $patient_detail = DB::table('patients')->select('patients.*')->where('id', '=', $pq->patient_id)->first();
            $patientData['patientdet'] = $patient_detail;
            if ($patient_detail->staff_id != 0) {
                $staff_detail = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $patient_detail->staff_id)->first();
                $patientData['email'] = $staff_detail->HR_EMAIL;
                $patientData['phone'] = $staff_detail->HR_TELBIMBIT;
                if ($patient_detail->utype == 'staff') {
                    $patientData['dob'] = $staff_detail->HR_TARIKH_LAHIR;
                } else if ($patient_detail->utype == 'dependent') {
                    $dependent_detail = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NO_PEKERJA', '=', $patient_detail->staff_id)->first();
                    $patientData['dob'] = $dependent_detail->HR_TARIKH_LAHIR;
                } else {
                    $patientData['dob'] = '';
                }
            } else {
                $patientData['email'] = '';
                $patientData['phone'] = '';
                $patientData['dob'] = '';
            }

            if ($patientData['dob'] != '') {
                $patientData['age'] = \Carbon::parse($patientData['dob'])->age;
            } else {
                $patientData['age'] = '';
            }           
            
            return view('patient.labpatientprofile', compact('patientData', 'labreqCount', 'labreq'));
        } else {
            return redirect()->back();
        }
    }
    

    private function syncPermissions(Request $request, $user) {
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);
        $roles = Role::find($roles);
        if (!$user->hasAllRoles($roles)) {
            $user->permissions()->sync([]);
        } else {
            $user->syncPermissions($permissions);
        }
        $user->syncRoles($roles);
        return $user;
    }

    
    public function childdev(Request $request) {
        $tst = "Test child";
        //echo $tst; exit;
        
        return view('patient.child', compact('tst'));
    }
    
    
    public function motherdev(Request $request) {
        $tst = "Test mother";
        //echo $tst; exit;
        
        return view('patient.mother', compact('tst'));
    }
    
    
    
    public function numberTowords($num){

        $ones = array(
        0 =>"ZERO",
        1 => "ONE",
        2 => "TWO",
        3 => "THREE",
        4 => "FOUR",
        5 => "FIVE",
        6 => "SIX",
        7 => "SEVEN",
        8 => "EIGHT",
        9 => "NINE",
        10 => "TEN",
        11 => "ELEVEN",
        12 => "TWELVE",
        13 => "THIRTEEN",
        14 => "FOURTEEN",
        15 => "FIFTEEN",
        16 => "SIXTEEN",
        17 => "SEVENTEEN",
        18 => "EIGHTEEN",
        19 => "NINETEEN",
        "014" => "FOURTEEN"
        );

        $tens = array( 
        0 => "ZERO",
        1 => "TEN",
        2 => "TWENTY",
        3 => "THIRTY", 
        4 => "FORTY", 
        5 => "FIFTY", 
        6 => "SIXTY", 
        7 => "SEVENTY", 
        8 => "EIGHTY", 
        9 => "NINETY" 
        ); 

        $hundreds = array( 
        "HUNDRED", 
        "THOUSAND", 
        "MILLION", 
        "BILLION", 
        "TRILLION", 
        "QUARDRILLION" 
        ); /*limit t quadrillion */

        $num = number_format($num,2,".",","); 
        $num_arr = explode(".",$num); 
        $wholenum = $num_arr[0]; 
        $decnum = $num_arr[1]; 
        $whole_arr = array_reverse(explode(",",$wholenum)); 
        krsort($whole_arr,1); 
        $rettxt = ""; 
        foreach($whole_arr as $key => $i){

            while(substr($i,0,1)=="0")
                $i=substr($i,1,5);
                if($i < 20){ 
                    /* echo "getting:".$i; */
                    $rettxt .= $ones[$i]; 
                }elseif($i < 100){ 
                    if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
                    if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
                }else{ 
                    if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
                    if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
                    if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
                } 
                if($key > 0){ 
                    $rettxt .= " ".$hundreds[$key]." "; 
                }
        } 
        if($decnum > 0){
            $rettxt .= " and ";
            if($decnum < 20){
                $rettxt .= $ones[$decnum];
            }elseif($decnum < 100){
                $rettxt .= $tens[substr($decnum,0,1)];
                $rettxt .= " ".$ones[substr($decnum,1,1)];
            }
        }
        return $rettxt;
    }


        
}
