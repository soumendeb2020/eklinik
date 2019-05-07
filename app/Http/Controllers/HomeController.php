<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $department = DB::table('department')->select('department.*')->where('is_active', '=', 1)->get();
        return view('home')->with(compact('department'));
    }

    public function getAddPatientResult() { 
        $searchby = $_POST['scat'];
        $searchname = $_POST['sdt'];
        $type = $_POST['stype'];

        if ($type == 'staffSection') {
            if ($searchby == 'sid') {
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $searchname)->first();
                $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $searchname)->first();
                
                $data['name'] = $det->HR_NAMA_PEKERJA;
                $data['staffid'] = $det->HR_NO_PEKERJA;
                $data['department'] = $staff->HR_JABATAN;
                $data['ic'] = $det->HR_NO_KPBARU;
                $data['dependent'] = '';
                
                return View('ajax.getAddPatientResult')->with(compact('data'));
            } else if ($searchby == 'ic') {
                $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_KPBARU', '=', $searchname)->first();
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                
                $data['name'] = $det->HR_NAMA_PEKERJA;
                $data['staffid'] = $det->HR_NO_PEKERJA;
                $data['department'] = $staff->HR_JABATAN;
                $data['ic'] = $det->HR_NO_KPBARU;
                $data['dependent'] = '';
                
                return View('ajax.getAddPatientResult')->with(compact('data'));
            } else if ($searchby == 'name') {
                $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NAMA_PEKERJA', '=', $searchname)->first();
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();

                $cnt = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NAMA_PEKERJA', '=', $searchname)->count();
                if($cnt > 1){
                    $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NAMA_PEKERJA', '=', $searchname)->get();
                    
                    $k = 1;
                    foreach ($det as $d){
                        $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $d->HR_NO_PEKERJA)->first();
                        $dt['id'] = $d->id;
                        $dt['name'] = $d->HR_NAMA_PEKERJA;
                        $dt['staffid'] = $d->HR_NO_PEKERJA;
                        $dt['department'] = $staff->HR_JABATAN;
                        $dt['ic'] = $d->HR_NO_KPBARU;
                        $dt['dependent'] = '';
                        $data['detail'][$k] = $dt;
                        $k ++;
                    }
                    
                    $data['group'] = "staffSection";
                    return View('ajax.getAddPatientResultList')->with(compact('data'));
                } else {
                    $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NAMA_PEKERJA', '=', $searchname)->first();
                    $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                    
                    $data['name'] = $det->HR_NAMA_PEKERJA;
                    $data['staffid'] = $det->HR_NO_PEKERJA;
                    $data['department'] = $staff->HR_JABATAN;
                    $data['ic'] = $det->HR_NO_KPBARU;
                    $data['dependent'] = '';
                    
                    return View('ajax.getAddPatientResult')->with(compact('data'));
                }               
            }
        } else if ($type == 'dependentSection') {
            if ($searchby == 'ic') {
                $det = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NO_KP', '=', $searchname)->first();
                $data['name'] = $det->HR_NAMA_TANGGUNGAN;
                $data['staffid'] = $det->HR_NO_PEKERJA;
                $data['department'] = '';
                $data['ic'] = $det->HR_NO_KP;
                $data['dependent'] = '';
                return View('ajax.getAddPatientResult')->with(compact('data'));
            } else if ($searchby == 'name') {
                $cnt = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NAMA_TANGGUNGAN', '=', $searchname)->count();
                if($cnt != 1){
                    $det = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NAMA_TANGGUNGAN', '=', $searchname)->get();
                    $data['detail'] = $det; 
                    $data['group'] = "dependentSection";
                    
                    return View('ajax.getAddPatientResultList')->with(compact('data'));
                } else {
                    $det = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NAMA_TANGGUNGAN', '=', $searchname)->first();
                    $data['name'] = $det->HR_NAMA_TANGGUNGAN;
                    $data['staffid'] = $det->HR_NO_PEKERJA;
                    $data['department'] = '';
                    $data['ic'] = $det->HR_NO_KP;
                    $data['dependent'] = '';
                    return View('ajax.getAddPatientResult')->with(compact('data'));
                }
            }

            $data['name'] = $det->HR_NAMA_TANGGUNGAN;
            $data['staffid'] = $det->HR_NO_PEKERJA;
            $data['department'] = '';
            $data['ic'] = $det->HR_NO_KP;
            $data['dependent'] = '';
        } else if ($type == 'otherSection') {
            if ($searchby == 'ic') {
                $det = DB::table('patient')->select('patient.*')->where('ic_number', '=', $searchname)->first();
            } else if ($searchby == 'name') {
                $det = DB::table('patient')->select('patient.*')->where('name', '=', $searchname)->first();
            }
            $data['name'] = $det->name;
            $data['staffid'] = $det->staff_id;
            $data['department'] = '';
            $data['ic'] = $det->ic_number;
            $data['dependent'] = '';
        }
        return View('ajax.getAddPatientResult')->with(compact('data'));
    }

    public function getAddPatientResultdata() {
        //echo "<pre>"; print_r($_POST);  
        $searchby = $_POST['scat'];
        $searchname = $_POST['sdt'];
        $type = $_POST['stype'];

        if ($type == 'staffSection') {
            if ($searchby == 'sid') {
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $searchname)->first();
                $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $searchname)->first();
            } else if ($searchby == 'ic') {
                $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_KPBARU', '=', $searchname)->first();
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
            } else if ($searchby == 'name') {
                $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NAMA_PEKERJA', '=', $searchname)->first();
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
            }
            $data['name'] = $det->HR_NAMA_PEKERJA;
            $data['staffid'] = $det->HR_NO_PEKERJA;
            $data['department'] = $staff->HR_JABATAN;
            $data['ic'] = $det->HR_NO_KPBARU;
            $data['dependent'] = '';
        } else if ($type == 'dependentSection') {
            if ($searchby == 'ic') {
                $det = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NO_KP', '=', $searchname)->first();
                
                $data['name'] = $det->HR_NAMA_TANGGUNGAN;
                $data['staffid'] = $det->HR_NO_PEKERJA;
                $data['department'] = '';
                $data['ic'] = $det->HR_NO_KP;
                $data['dependent'] = '';
            } else if ($searchby == 'name') {
                $cnt = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NAMA_TANGGUNGAN', '=', $searchname)->count();
                if($cnt > 1){
                    $data = 1;
                } else {
                    $det = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NAMA_TANGGUNGAN', '=', $searchname)->first();
                    
                    $data['name'] = $det->HR_NAMA_TANGGUNGAN;
                    $data['staffid'] = $det->HR_NO_PEKERJA;
                    $data['department'] = '';
                    $data['ic'] = $det->HR_NO_KP;
                    $data['dependent'] = '';
                }
            }

        } else if ($type == 'otherSection') {
            if ($searchby == 'ic') {
                $det = DB::table('patient')->select('patient.*')->where('ic_number', '=', $searchname)->first();
            } else if ($searchby == 'name') {
                $det = DB::table('patient')->select('patient.*')->where('name', '=', $searchname)->first();
            }
            $data['name'] = $det->name;
            $data['staffid'] = $det->staff_id;
            $data['department'] = $det->dept_id;
            $data['ic'] = $det->ic_number;
            $data['dependent'] = '';
        }
        return $data;
    }

    public function saveNewPatient() {
        //echo "<pre>"; print_r($_POST); 
        ///    $_POST['staff_id']
        
        if($_POST['type'] == 'otherSection'){
            $typename = 'other';
        } else if($_POST['type'] == 'dependentSection'){
            $typename = 'dependent';
        } else if($_POST['type'] == 'staffSection'){
            $typename = 'staff';
        }
        
        $patientExist = DB::table('patient')->select('patient.*')->where('ic_number', '=', $_POST['ic_number'])->first();
        
        //echo "<pre>"; print_r($patientExist); echo "ok"; //exit;
        
        if($patientExist){
            $lid = $patientExist->id;
        } else {
            $savedata['staff_id'] = $_POST['staff_id'];   
            $savedata['dept_id'] = $_POST['dept_id'];  
            $savedata['ic_number'] = $_POST['ic_number'];
            $savedata['name'] = $_POST['name'];
            $savedata['utype'] = $typename;
            $savedata['ptype'] = $_POST['cat'];
            $savedata['created_at'] = date("Y-m-d h:i:s", time());
            $savedata['updated_at'] = date("Y-m-d h:i:s", time());
            $lid = DB::table('patient')->insertGetId($savedata);
        }

        $dept = DB::table('department')->select('department.*')->where('id', '=', $_POST['department_id'])->first();
        
        
        $queueExist = DB::table('queuelist')->select('queuelist.*')->where('name', '=', $_POST['queueno'])->first();
        if($queueExist){
            $lqno = $queueExist->id;
            $qname = $_POST['queueno'];
        } else {
            
            $saveque['name'] = $_POST['queueno'];
            $saveque['is_active'] = 1;
            $saveque['created_at'] = date("Y-m-d h:i:s", time());
            $saveque['updated_at'] = date("Y-m-d h:i:s", time());
            $lqno = DB::table('queuelist')->insertGetId($saveque);
            $qname = $_POST['queueno'];
        }
        
        $count = DB::table('patientqueue')->where('queueno', '=', $qname)->count();   
        
        $savePatQue['patient_id'] = $lid;
        $savePatQue['staff_id'] = $_POST['staff_id'];    
        $savePatQue['ic_number'] = $_POST['ic_number'];
        $savePatQue['name'] = $_POST['name'];
        $savePatQue['symptopms'] = $_POST['symptopms'];
        $savePatQue['department_id'] = $_POST['department_id'];
        $savePatQue['depart_name'] = $dept->name;
        $savePatQue['utype'] = $_POST['cat'];
        $savePatQue['ptype'] = $_POST['type'];
        $savePatQue['queue_id'] = $lqno;
        $savePatQue['queueno'] = $qname;
        $savePatQue['token_no'] = "C-".str_pad($count + 1, 5, '0', STR_PAD_LEFT);
        $savePatQue['ptype'] = 1;
        $savePatQue['created_time'] = date("h:i:s a", time());
        $savePatQue['created_at'] = date("Y-m-d h:i:s", time());
        $savePatQue['updated_at'] = date("Y-m-d h:i:s", time());
        
        if(DB::table('patientqueue')->insert($savePatQue)){
            return $savePatQue;
        } else {
            return 0;
        }

    }

}
