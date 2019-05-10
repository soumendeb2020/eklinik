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
        toastr()->success('Have fun storming the castle!', 'Miracle Max Says');
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
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                $data['name'] = $det->HR_NAMA_PEKERJA;
                $data['staffid'] = $det->HR_NO_PEKERJA;
                $data['departmentid'] = $dept->GE_KOD_JABATAN;
                $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                $data['ic'] = $det->HR_NO_KPBARU;
                $data['related'] = '';
                
                return View('ajax.getAddPatientResult')->with(compact('data'));
            } else if ($searchby == 'ic') {
                $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_KPBARU', '=', $searchname)->first();
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                $data['name'] = $det->HR_NAMA_PEKERJA;
                $data['staffid'] = $det->HR_NO_PEKERJA;
                $data['departmentid'] = $dept->GE_KOD_JABATAN;
                $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                $data['ic'] = $det->HR_NO_KPBARU;
                $data['related'] = '';
                
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
                        $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $d->HR_NO_PEKERJA)->first();
                        $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();
                        
                        $dt['id'] = $k;
                        $dt['name'] = $d->HR_NAMA_PEKERJA;
                        $dt['staffid'] = $d->HR_NO_PEKERJA;
                        $dt['departmentid'] = $dept->GE_KOD_JABATAN;
                        $dt['department'] = $dept->GE_KETERANGAN_JABATAN;
                        $dt['ic'] = $d->HR_NO_KPBARU;
                        $dt['related'] = '';
                        $data['detail'][$k] = $dt;
                        
                        $k ++;
                    }
                    
                    $data['group'] = "staffSection";
                    return View('ajax.getAddPatientResultList')->with(compact('data'));
                } else {
                    $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NAMA_PEKERJA', '=', $searchname)->first();
                    $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                    $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                    $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                    $data['name'] = $det->HR_NAMA_PEKERJA;
                    $data['staffid'] = $det->HR_NO_PEKERJA;
                    $data['departmentid'] = $dept->GE_KOD_JABATAN;
                    $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                    $data['ic'] = $det->HR_NO_KPBARU;
                    $data['related'] = '';
                    
                    return View('ajax.getAddPatientResult')->with(compact('data'));
                }               
            }
        } else if ($type == 'dependentSection') {
            if ($searchby == 'ic') {
                $det = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NO_KP', '=', $searchname)->first();
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();


                $data['name'] = $det->HR_NAMA_TANGGUNGAN;
                $data['staffid'] = $staffdet->HR_NO_PEKERJA;
                $data['departmentid'] = $dept->GE_KOD_JABATAN;
                $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                $data['ic'] = $d->HR_NO_KP;
                $data['related'] = $staffdet->HR_NAMA_PEKERJA;
                
                return View('ajax.getAddPatientResult')->with(compact('data'));
            } else if ($searchby == 'name') {
                $cnt = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NAMA_TANGGUNGAN', '=', $searchname)->count();
                if($cnt != 1){
                    $det = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NAMA_TANGGUNGAN', '=', $searchname)->get();
                    $k = 1;
                    foreach ($det as $d){
                        $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $d->HR_NO_PEKERJA)->first();
                        $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $d->HR_NO_PEKERJA)->first();
                        $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                        $dt['id'] = $k;
                        $dt['name'] = $d->HR_NAMA_TANGGUNGAN;
                        $dt['staffid'] = $staffdet->HR_NO_PEKERJA;
                        $dt['departmentid'] = $dept->GE_KOD_JABATAN;
                        $dt['department'] = $dept->GE_KETERANGAN_JABATAN;
                        $dt['ic'] = $d->HR_NO_KP;
                        $dt['related'] = $staffdet->HR_NAMA_PEKERJA;
                        $data['detail'][$k] = $dt;
                        $k ++;
                    }
                    
                    $data['group'] = "dependentSection";
                    return View('ajax.getAddPatientResultList')->with(compact('data'));
                } else {
                    $det = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NAMA_TANGGUNGAN', '=', $searchname)->first();
                    $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                    $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                    $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();
                    
                    $data['name'] = $det->HR_NAMA_TANGGUNGAN;
                    $data['staffid'] = $staffdet->HR_NO_PEKERJA;
                    $data['departmentid'] = $dept->GE_KOD_JABATAN;
                    $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                    $data['ic'] = $det->HR_NO_KP;
                    $data['related'] = $staffdet->HR_NAMA_PEKERJA;

                    return View('ajax.getAddPatientResult')->with(compact('data'));
                } 
            }

        } else if ($type == 'otherSection') {
            if ($searchby == 'ic') {
                $det = DB::table('patient')->select('patient.*')->where('ic_number', '=', $searchname)->where('utype', '=', 'other')->first();
            } else if ($searchby == 'name') {
                $det = DB::table('patient')->select('patient.*')->where('name', '=', $searchname)->where('utype', '=', 'other')->first();
            }
            if($det){
                $data['name'] = $det->name;
                $data['staffid'] = $det->staff_id;
                $data['department'] = '';
                $data['ic'] = $det->ic_number;
                $data['dependent'] = '';
                
                $data['name'] = $det->name;
                $data['staffid'] = $det->staff_id;
                $data['departmentid'] = '';
                $data['department'] = '';
                $data['ic'] = $det->ic_number;
                $data['related'] = '';

                return View('ajax.getAddPatientResult')->with(compact('data'));
            }
        }
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

                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                $data['name'] = $det->HR_NAMA_PEKERJA;
                $data['staffid'] = $det->HR_NO_PEKERJA;
                $data['departmentid'] = $dept->GE_KOD_JABATAN;
                $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                $data['ic'] = $det->HR_NO_KPBARU;
                $data['related'] = '';
                
            } else if ($searchby == 'ic') {
                $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_KPBARU', '=', $searchname)->first();
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                $data['name'] = $det->HR_NAMA_PEKERJA;
                $data['staffid'] = $det->HR_NO_PEKERJA;
                $data['departmentid'] = $dept->GE_KOD_JABATAN;
                $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                $data['ic'] = $det->HR_NO_KPBARU;
                $data['related'] = '';
            } else if ($searchby == 'name') {
                $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NAMA_PEKERJA', '=', $searchname)->first();
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                $data['name'] = $det->HR_NAMA_PEKERJA;
                $data['staffid'] = $det->HR_NO_PEKERJA;
                $data['departmentid'] = $dept->GE_KOD_JABATAN;
                $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                $data['ic'] = $det->HR_NO_KPBARU;
                $data['related'] = '';
            }

        } else if ($type == 'dependentSection') {
            if ($searchby == 'ic') {
                $det = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NO_KP', '=', $searchname)->first();
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                $data['name'] = $det->HR_NAMA_TANGGUNGAN;
                $data['staffid'] = $det->HR_NO_PEKERJA;
                $data['departmentid'] = $staff->HR_JABATAN;
                $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                $data['ic'] = $det->HR_NO_KP;
                $data['related'] = $staffdet->HR_NAMA_PEKERJA;
            } else if ($searchby == 'name') {
                $cnt = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NAMA_TANGGUNGAN', '=', $searchname)->count();
                if($cnt > 1){
                    $data = 1;
                } else {
                    $det = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NAMA_TANGGUNGAN', '=', $searchname)->first();
                    $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                    $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                    $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                    $data['name'] = $det->HR_NAMA_TANGGUNGAN;
                    $data['staffid'] = $det->HR_NO_PEKERJA;
                    $data['departmentid'] = $staff->HR_JABATAN;
                    $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                    $data['ic'] = $det->HR_NO_KP;
                    $data['related'] = $staffdet->HR_NAMA_PEKERJA;
                }
            }

        } else if ($type == 'otherSection') {
            if ($searchby == 'ic') {
                $det = DB::table('patient')->select('patient.*')->where('ic_number', '=', $searchname)->where('utype', '=', 'other')->first();
            } else if ($searchby == 'name') {
                $det = DB::table('patient')->select('patient.*')->where('name', '=', $searchname)->where('utype', '=', 'other')->first();
            }
            
            $data['name'] = $det->name;
            $data['staffid'] = $det->staff_id;
            $data['departmentid'] = '';
            $data['department'] = '';
            $data['ic'] = $det->ic_number;
            $data['related'] = '';
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
            $savedata['staff_id'] = $_POST['staff_id'] != '' ? $_POST['staff_id'] : 0; 
            $savedata['dept_id'] =  $_POST['dept_id'] != '' ? $_POST['dept_id'] : 0;
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

    
    
    public function getExistingCompany() { 
        //echo "<pre>"; print_r($_POST); exit;
        $cname = $_POST['cname'];  
        $data = DB::table('company')->select('company.*')->where('name', 'like', $cname.'%')->get();
        return View('ajax.getExistingCompany')->with(compact('data'));

    }
    
    public function savenewty2() { 
        //echo "<pre>"; print_r($_POST); exit;
        $cname = $_POST['companyname'];  
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $icno = $_POST['icno'];
        $ty2queueno = $_POST['ty2queueno'];
        $patType = $_POST['patType'];
        $patCat = $_POST['patCat'];
        
        $saveCompany['name'] = $cname;
        $saveCompany['is_active'] = 1;
        $saveCompany['created_at'] = date("Y-m-d h:i:s", time());
        $saveCompany['updated_at'] = date("Y-m-d h:i:s", time());
        $lcoid = DB::table('company')->insertGetId($saveCompany);
        
        foreach( $name as $k => $v ){
            $saveEmployee['company_id'] = $lcoid;
            $saveEmployee['company_name'] = $cname;
            $saveEmployee['name'] = $v;
            $saveEmployee['sex'] = $sex[$k];
            $saveEmployee['ic_number'] = $icno[$k];
            $saveEmployee['action'] = 0;
            $saveEmployee['is_active'] = 1;
            $saveEmployee['created_at'] = date("Y-m-d h:i:s", time());
            $saveEmployee['updated_at'] = date("Y-m-d h:i:s", time());
            $lempid = DB::table('companystaff')->insertGetId($saveEmployee);
        }    

        $queueExist = DB::table('ty2queuelist')->select('ty2queuelist.*')->where('name', '=', $ty2queueno)->first();
        if($queueExist){
            $lqno = $queueExist->id;
            $qname = $ty2queueno;
        } else {
            $saveque['name'] = $ty2queueno;
            $saveque['is_active'] = 1;
            $saveque['created_at'] = date("Y-m-d h:i:s", time());
            $saveque['updated_at'] = date("Y-m-d h:i:s", time());
            $lqno = DB::table('ty2queuelist')->insertGetId($saveque);
            $qname = $ty2queueno;
        
        }
        
        $count = DB::table('ty2queuelist')->where('name', '=', $qname)->count();
        
        $savety2Que['company_id'] = $lcoid;
        $savety2Que['company_name'] = $cname;    
        $savety2Que['queue_id'] = $lqno;
        $savety2Que['queueno'] = $qname;
        $savety2Que['token_no'] = "T-".str_pad($count + 1, 5, '0', STR_PAD_LEFT);
        $savety2Que['is_active'] = 1;
        $savety2Que['created_time'] = date("h:i:s a", time());
        $savety2Que['created_at'] = date("Y-m-d h:i:s", time());
        $savety2Que['updated_at'] = date("Y-m-d h:i:s", time());
        $lqty2que = DB::table('ty2queue')->insertGetId($savety2Que);    
        
        //echo "<pre>"; print_r($_POST); exit;
        return redirect()->route('home');

    }
    
    
    
    
}
