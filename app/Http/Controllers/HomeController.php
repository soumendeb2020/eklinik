<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use \Crypt;

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

        $department = DB::table('department')->select('department.*')->where('is_active', '=', 1)->where('id', '!=', 5)->get();
        toastr()->success('Have fun storming the castle!', 'Miracle Max Says');

        $patientList1 = array();
        $arr1 = DB::table('patientqueues')->select('patientqueues.*')->where('is_active', 1)->whereIn('department_id', [1])->orderBy('id', 'asc')->limit(10)->get();

        foreach ($arr1 as $k => $v) {
            $tokval = DB::table('patientqueues')->select('patientqueues.*')->where('patient_id', '=', $v->id)->orderBy('id', 'desc')->first();
            $patientList1[$k]['pqueue'] = $v;
            $patientList1[$k]['patientdet'] = DB::table('patients')->select('patients.*')->where('id', '=', $v->patient_id)->first();
        }
        
        $patientList2 = array();
        $arr2 = DB::table('patientqueues')->select('patientqueues.*')->where('is_active', 1)->whereIn('department_id', [2])->orderBy('id', 'asc')->limit(10)->get();

        foreach ($arr2 as $k => $v) {
            $tokval = DB::table('patientqueues')->select('patientqueues.*')->where('patient_id', '=', $v->id)->orderBy('id', 'desc')->first();
            $patientList2[$k]['pqueue'] = $v;
            $patientList2[$k]['patientdet'] = DB::table('patients')->select('patients.*')->where('id', '=', $v->patient_id)->first();
        }
        
        $labpatientList = array();
        $labarr = DB::table('patientqueues')->select('patientqueues.*')->where('is_active', '=', 1)->where('is_active', 1)->where('department_id', '=', 4)->orderBy('id', 'asc')->limit(10)->get();
        foreach ($labarr as $k => $v) {
            $tokval = DB::table('patientqueues')->select('patientqueues.*')->where('patient_id', '=', $v->id)->orderBy('id', 'desc')->first();
            $labpatientList[$k]['pqueue'] = $v;
            $labpatientList[$k]['patientdet'] = DB::table('patients')->select('patients.*')->where('id', '=', $v->patient_id)->first();
        }
        
        return view('home')->with(compact('department', 'patientList1', 'patientList2', 'labpatientList'));
    }

    public function getAddPatientResult(Request $request) {
        $searchby = $_POST['scat'];
        $searchname = $_POST['sdt'];
        $type = $_POST['stype'];
        if ($type == 'staffSection') {
            if ($searchby == 'sid') {
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $searchname)->first();
                if($staff){
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
                    $data['dependendcount'] = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->count();
                    $data['dependend'] = DB::table('hr_maklumat_tanggungan')->join('ge_paramtable', 'hr_maklumat_tanggungan.HR_HUBUNGAN', '=', 'ge_paramtable.ORDINAL')
                                                                            ->select('hr_maklumat_tanggungan.*', 'ge_paramtable.SHORT_DESCRIPTION', 'ge_paramtable.LONG_DESCRIPTION', 'ge_paramtable.LONG_DESCRIPTION')
                                                                            ->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)
                                                                            ->where('ge_paramtable.GROUPID', '=', 125)->get();
                    //echo "<pre>"; print_r($data); exit;
                    
                    return View('ajax.getAddPatientListResult')->with(compact('data'));
                } else {
                    return 0;
                }
            } else if ($searchby == 'ic') {
                $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_KPBARU', '=', $searchname)->first();
                if($det){
                    $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                    $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                    $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                    $data['name'] = $det->HR_NAMA_PEKERJA;
                    $data['staffid'] = $det->HR_NO_PEKERJA;
                    $data['departmentid'] = $dept->GE_KOD_JABATAN;
                    $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                    $data['ic'] = $det->HR_NO_KPBARU;
                    $data['related'] = '';
                    $data['dependendcount'] = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->count();
                    $data['dependend'] = DB::table('hr_maklumat_tanggungan')->join('ge_paramtable', 'hr_maklumat_tanggungan.HR_HUBUNGAN', '=', 'ge_paramtable.ORDINAL')
                                                                            ->select('hr_maklumat_tanggungan.*', 'ge_paramtable.SHORT_DESCRIPTION', 'ge_paramtable.LONG_DESCRIPTION', 'ge_paramtable.LONG_DESCRIPTION')
                                                                            ->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)
                                                                            ->where('ge_paramtable.GROUPID', '=', 125)->get();
                    //echo "ok"; exit;  
                    //echo "<pre>"; print_r($data); exit;  
                    
                    return View('ajax.getAddPatientListResult')->with(compact('data'));
                } else {
                    return 0;
                }
            } else if ($searchby == 'name') {
                //$det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NAMA_PEKERJA', '=', $searchname)->first();

                $cnt = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NAMA_PEKERJA', '=', $searchname)->count();
                if($cnt < 1){
                    return 0;
                } else if($cnt > 1){
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
                } else if($cnt == 1){
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
                    $data['dependendcount'] = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->count();
                    $data['dependend'] = DB::table('hr_maklumat_tanggungan')->join('ge_paramtable', 'hr_maklumat_tanggungan.HR_HUBUNGAN', '=', 'ge_paramtable.ORDINAL')
                                                                            ->select('hr_maklumat_tanggungan.*', 'ge_paramtable.SHORT_DESCRIPTION', 'ge_paramtable.LONG_DESCRIPTION', 'ge_paramtable.LONG_DESCRIPTION')
                                                                            ->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)
                                                                            ->where('ge_paramtable.GROUPID', '=', 125)->get();
                    
                    
                    
                    //echo "<pre>"; print_r($data); exit;
                    
                    return View('ajax.getAddPatientListResult')->with(compact('data'));
                }               
            }
        } else if ($type == 'dependentSection') {
            if ($searchby == 'ic') {
                $det = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NO_KP', '=', $searchname)->first();
                if($det){
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
                } else {
                    return 0;
                }

            } else if ($searchby == 'name') {
                $cnt = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NAMA_TANGGUNGAN', '=', $searchname)->count();
                if($cnt < 1){
                    return 0;
                } else if($cnt > 1){
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
                } else if($cnt == 1){
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
                $det = DB::table('patients')->select('patients.*')->where('ic_number', '=', $searchname)->where('utype', '=', 'other')->first();
                
                if($det){
                    $data['name'] = $det->name;
                    $data['staffid'] = $det->staff_id;
                    $data['departmentid'] = '';
                    $data['department'] = '';
                    $data['ic'] = $det->ic_number;
                    $data['related'] = '';

                    return View('ajax.getAddPatientResult')->with(compact('data'));
                } else {
                    return 0;
                }
                
            } else if ($searchby == 'name') {
                $cnt = DB::table('patients')->select('patients.*')->where('name', '=', $searchname)->where('utype', '=', 'other')->count();
                if($cnt == 0){
                    return 0;
                } else if($cnt > 1){
                    $det = DB::table('patients')->select('patients.*')->where('name', '=', $searchname)->where('utype', '=', 'other')->get();
                    $k = 1;
                    foreach ($det as $d){
                        $dt['id'] = $k;
                        $dt['name'] = $d->name;
                        $dt['staffid'] = 0;
                        $dt['departmentid'] = 0;
                        $dt['department'] = '';
                        $dt['ic'] = $d->ic_number;
                        $dt['related'] = '';
                        $data['detail'][$k] = $dt;
                        $k ++;
                    }
                    $data['group'] = "otherSection";
                    return View('ajax.getAddPatientResultList')->with(compact('data'));
                } else if($cnt == 1){
                    $det = DB::table('patients')->select('patients.*')->where('name', '=', $searchname)->where('utype', '=', 'other')->first();
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
    }

    public function getAddPatientResultdata() {
        $searchby = $_POST['scat'];
        $searchname = $_POST['sdt'];
        $type = $_POST['stype'];
        
        if ($type == 'staffSection') {
            if ($searchby == 'sid') {
                $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $searchname)->first();
                if($staff){
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
                } else {
                    $data = 0;
                }
            } else if ($searchby == 'ic') {
                $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_KPBARU', '=', $searchname)->first();
                if($det){
                    $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                    $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                    $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                    $data['name'] = $det->HR_NAMA_PEKERJA;
                    $data['staffid'] = $det->HR_NO_PEKERJA;
                    $data['departmentid'] = $dept->GE_KOD_JABATAN;
                    $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                    $data['ic'] = $det->HR_NO_KPBARU;
                    $data['related'] = '';
                } else {
                    $data = 0;
                }
            } else if ($searchby == 'name') {
                $cnt = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NAMA_PEKERJA', '=', $searchname)->count();
                if($cnt == 0){
                    $data = 0;
                } else if($cnt > 1){
                    $data = 1;
                } else if($cnt == 1){
                    $det = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NAMA_PEKERJA', '=', $searchname)->first();
                    if($det){
                        $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                        $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                        $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                        $data['name'] = $det->HR_NAMA_PEKERJA;
                        $data['staffid'] = $det->HR_NO_PEKERJA;
                        $data['departmentid'] = $dept->GE_KOD_JABATAN;
                        $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                        $data['ic'] = $det->HR_NO_KPBARU;
                        $data['related'] = '';
                    } else {
                        $data = 0;
                    }
                }
            }

        } else if ($type == 'dependentSection') {
            if ($searchby == 'ic') {
                $det = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NO_KP', '=', $searchname)->first();
                if($det){
                    $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                    $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                    $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                    $data['name'] = $det->HR_NAMA_TANGGUNGAN;
                    $data['staffid'] = $det->HR_NO_PEKERJA;
                    $data['departmentid'] = $staff->HR_JABATAN;
                    $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                    $data['ic'] = $det->HR_NO_KP;
                    $data['related'] = $staffdet->HR_NAMA_PEKERJA;
                } else {
                    $data = 0;
                }
            } else if ($searchby == 'name') {
                $cnt = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NAMA_TANGGUNGAN', '=', $searchname)->count();
                if($cnt > 1){
                    $data = 1;
                } else {
                    $det = DB::table('hr_maklumat_tanggungan')->select('hr_maklumat_tanggungan.*')->where('HR_NAMA_TANGGUNGAN', '=', $searchname)->first();
                    if($det){
                        $staff = DB::table('hr_maklumat_pekerjaan')->select('hr_maklumat_pekerjaan.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                        $staffdet = DB::table('hr_maklumat_peribadi')->select('hr_maklumat_peribadi.*')->where('HR_NO_PEKERJA', '=', $det->HR_NO_PEKERJA)->first();
                        $dept = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $staff->HR_JABATAN)->first();

                        $data['name'] = $det->HR_NAMA_TANGGUNGAN;
                        $data['staffid'] = $det->HR_NO_PEKERJA;
                        $data['departmentid'] = $staff->HR_JABATAN;
                        $data['department'] = $dept->GE_KETERANGAN_JABATAN;
                        $data['ic'] = $det->HR_NO_KP;
                        $data['related'] = $staffdet->HR_NAMA_PEKERJA;
                    } else {
                        $data = 0;
                    }
                }
            }

        } else if ($type == 'otherSection') {
            if ($searchby == 'ic') {
                $det = DB::table('patients')->select('patients.*')->where('ic_number', '=', $searchname)->where('utype', '=', 'other')->first();
                if($det){
                    $data['name'] = $det->name;
                    $data['staffid'] = $det->staff_id;
                    $data['departmentid'] = '';
                    $data['department'] = '';
                    $data['ic'] = $det->ic_number;
                    $data['related'] = '';
                } else {
                    $data = 0;
                }
            } else if ($searchby == 'name') {
                $det = DB::table('patients')->select('patients.*')->where('name', '=', $searchname)->where('utype', '=', 'other')->first();
                if($det){
                    $data['name'] = $det->name;
                    $data['staffid'] = $det->staff_id;
                    $data['departmentid'] = '';
                    $data['department'] = '';
                    $data['ic'] = $det->ic_number;
                    $data['related'] = '';
                } else {
                    $data = 0;
                }
            }
        }
        return $data;
    } 

    public function saveNewPatient(Request $request) {
        //dd($_POST);
        if($_POST['type'] == 'amSection'){
            $typename = 'other';
            $utype_name = $_POST['type'];
        } else if($_POST['type'] == 'wmSection'){    
            $typename = 'other';
            $utype_name = $_POST['type'];
        } else if($_POST['type'] == 'okuSection'){    
            $typename = 'other';
            $utype_name = $_POST['type'];
        } else if($_POST['type'] == 'wmasSection'){    
            $typename = 'other';
            $utype_name = $_POST['type'];
        } else if($_POST['type'] == 'dependentSection'){
            $typename = 'dependent';
            $utype_name = $_POST['type'];
        } else if($_POST['type'] == 'staffSection'){
            $typename = 'staff';
            $utype_name = $_POST['type'];
        }
        
        $deptId = $_POST['department_id'];
        
        if($_POST['dept_id'] != ''){
            if($_POST['dept_id'] != 0){
                $deptdt = DB::table('ge_jabatan')->select('ge_jabatan.*')->where('GE_KOD_JABATAN', '=', $_POST['dept_id'])->first();
                $dname = $deptdt->GE_KETERANGAN_JABATAN;
            } else {
                $dname = '';
            }
        } else {
            $dname = '';
        }
        
        $patientExist = DB::table('patients')->select('patients.*')->where('ic_number', '=', $_POST['ic_number'])->first();

        if($patientExist){
            $lid = $patientExist->id;
        } else {
            $savedata['staff_id'] = $_POST['staff_id'] != '' ? $_POST['staff_id'] : 0; 
            $savedata['dept_id'] =  $_POST['dept_id'] != '' ? $_POST['dept_id'] : 0;
            $savedata['dept_name'] = $dname;
            $savedata['ic_number'] = $_POST['ic_number'];
            $savedata['name'] = $_POST['name'];
            $savedata['utype'] = $typename;
            $savedata['utype_name'] = $utype_name;
            $savedata['ptype'] = $_POST['cat'];
            $savedata['created_at'] = date("Y-m-d h:i:s", time());
            $savedata['updated_at'] = date("Y-m-d h:i:s", time()); 
            $lid = DB::table('patients')->insertGetId($savedata);
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
        
        $count = DB::table('patientqueues')->where('queueno', '=', $qname)->count();   

        $savePatQue['parent_id'] = 0;
        $savePatQue['patient_id'] = $lid;
        $savePatQue['staff_id'] = $_POST['staff_id'];    
        $savePatQue['ic_number'] = $_POST['ic_number'];
        $savePatQue['name'] = $_POST['name'];
        $savePatQue['symptopms'] = $_POST['symptopms'];
        $savePatQue['department_id'] = $_POST['department_id'];
        $savePatQue['depart_name'] = $dept->name;
        $savePatQue['utype'] = $typename;
        $savePatQue['utype_name'] = $utype_name;
        $savePatQue['ptype'] = $_POST['cat'];
        $savePatQue['queue_id'] = $lqno;
        $savePatQue['queueno'] = $qname;
        
        if($deptId == 5){
            $savePatQue['token_no'] = "TY2-".str_pad($count + 1, 5, '0', STR_PAD_LEFT);
        } else if($deptId == 4){
            $savePatQue['token_no'] = "L-".str_pad($count + 1, 5, '0', STR_PAD_LEFT);    
        } else if($deptId == 3){
            $savePatQue['token_no'] = "D-".str_pad($count + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $savePatQue['token_no'] = "C-".str_pad($count + 1, 5, '0', STR_PAD_LEFT);
        }

        $savePatQue['q_status'] = 0;
        $savePatQue['is_active'] = 1;
        $savePatQue['created_time'] = date("h:i:s a", time());
        $savePatQue['created_at'] = date("Y-m-d h:i:s", time());
        $savePatQue['updated_at'] = date("Y-m-d h:i:s", time());
        $patQId = DB::table('patientqueues')->insertGetId($savePatQue);

        if($dept->id == 4){
            $labReq['q_id'] = $patQId;
            $labReq['q_no'] = '';
            $labReq['symptomp'] = $_POST['symptopms'];
            $labReq['bloodtest'] = $_POST['bloodtestchk'];
            $labReq['electrolytestest'] = $_POST['electrolytestestchk'];
            $labReq['fbs'] = $_POST['fbschk'];
            $labReq['lipids'] = $_POST['lipidschk'];
            $labReq['renalfunction'] = $_POST['renalfunctionchk'];
            $labReq['ultrasound'] = $_POST['ultrasoundchk'];
            $labReq['remarks'] = "";      
            $labReq['is_active'] = 1;
            $labReq['created_at'] = date("Y-m-d h:i:s", time());
            $labReq['updated_at'] = date("Y-m-d h:i:s", time());        
            $labReqId = DB::table('laboratoryrequests')->insertGetId($labReq);
        }
        return $savePatQue;
    }

    public function getExistingCompany() { 
        $cname = $_POST['cname'];  
        $count = DB::table('company')->select('company.*')->where('name', 'like', $cname.'%')->count();
        if($count){
            $data = DB::table('company')->select('company.*')->where('name', 'like', $cname.'%')->get();
            return View('ajax.getExistingCompany')->with(compact('data'));
        } else {
            return 0;
        }
    }
    
    public function getExistingEmpListById() { 
        $ids = $_POST['ids'];  
        $data = DB::table('company')->select('company.*')->where('id', '=', $ids)->get();
        $emp = DB::table('companystaff')->select('companystaff.*')->where('company_id', '=', $ids)->get();
        //echo "<pre>"; print_r($emp); exit;
        return View('ajax.getExistingEmpListById')->with(compact('data','emp'));
    }
    
    
    public function savenewty2() { 
        //echo "<pre>"; print_r($_POST); exit;
        $cname = $_POST['companyname']; 
        $addr1 = $_POST['addr1'];
        $addr2 = $_POST['addr2'];
        $addr3 = $_POST['addr3'];
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $icno = $_POST['icno'];
        $ty2queueno = $_POST['ty2queueno'];
        $patType = $_POST['patTypety2'];
        $patCat = $_POST['patCatty2'];
        
        $companyExist = DB::table('company')->select('company.*')->where('name', '=', $cname)->first();
        if($companyExist){
            $existCo = DB::table('company')->select('company.*')->where('name', '=', $cname)->first();
            DB::table('company')->where('name', '=', $cname)->update(array('addr1' => $addr1, 'addr2' => $addr2, 'addr3' => $addr3,));
            $lcoid = $existCo->id;
        } else {
            $saveCompany['name'] = $cname;
            $saveCompany['addr1'] = $addr1;
            $saveCompany['addr2'] = $addr2;
            $saveCompany['addr3'] = $addr3;
            $saveCompany['is_active'] = 1;
            $saveCompany['created_at'] = date("Y-m-d h:i:s", time());
            $saveCompany['updated_at'] = date("Y-m-d h:i:s", time());
            $lcoid = DB::table('company')->insertGetId($saveCompany);
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
        
        $count = DB::table('ty2queue')->where('queueno', '=', $qname)->count();
        
        $savety2Que['company_id'] = $lcoid;
        $savety2Que['company_name'] = $cname; 
        $savety2Que['addr1'] = $addr1;
        $savety2Que['addr2'] = $addr2;
        $savety2Que['addr3'] = $addr3;
        $savety2Que['queue_id'] = $lqno;
        $savety2Que['queueno'] = $qname;
        $savety2Que['token_no'] = "T-".str_pad($count + 1, 5, '0', STR_PAD_LEFT);
        $savety2Que['is_active'] = 1;
        $savety2Que['created_time'] = date("h:i:s a", time());
        $savety2Que['created_at'] = date("Y-m-d h:i:s", time());
        $savety2Que['updated_at'] = date("Y-m-d h:i:s", time());
        $lqty2que = DB::table('ty2queue')->insertGetId($savety2Que);

        foreach( $name as $k => $v ){
            if($v != ''){
                $empExist = DB::table('companystaff')->select('companystaff.*')->where('company_id', '=', $lcoid)->where('company_name', '=', $cname)->where('name', '=', $v)->first();
                if($empExist){
                    $existEmp = DB::table('companystaff')->select('companystaff.*')->where('company_id', '=', $lcoid)->where('company_name', '=', $cname)->where('name', '=', $v)->first();
                    DB::table('companystaff')->where('company_id', '=', $lcoid)->where('company_name', '=', $cname)->where('name', '=', $v)->update(array('sex' => $sex[$k], 'ic_number' => $icno[$k]));
                    $lempid = $existEmp->id;
                    
                    $saveTY2queuePatients['tytq_id'] = $lqty2que;
                    $saveTY2queuePatients['company_id'] = $lcoid;
                    $saveTY2queuePatients['company_name'] = $cname;
                    $saveTY2queuePatients['costaff_id'] = $existEmp->id;
                    $saveTY2queuePatients['patient_id'] = 0;
                    $saveTY2queuePatients['staff_id'] = "";
                    $saveTY2queuePatients['ic_number'] = $existEmp->ic_number;
                    $saveTY2queuePatients['name'] = $existEmp->name;
                    $saveTY2queuePatients['symptopms'] = "";
                    $saveTY2queuePatients['department_id'] = 0;
                    $saveTY2queuePatients['depart_name'] = "";
                    $saveTY2queuePatients['utype'] = "";
                    $saveTY2queuePatients['utype_name'] = "";
                    $saveTY2queuePatients['ptype'] = "";
                    $saveTY2queuePatients['sex'] = $existEmp->sex;
                    $saveTY2queuePatients['receipt_no'] = "";
                    $saveTY2queuePatients['created_at'] = date("Y-m-d h:i:s", time());
                    $saveTY2queuePatients['updated_at'] = date("Y-m-d h:i:s", time());
                    $lastTY2queuePatients = DB::table('ty2queuepatients')->insertGetId($saveTY2queuePatients);
                } else {
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

                    $saveTY2queuePatients['tytq_id'] = $lqty2que;
                    $saveTY2queuePatients['company_id'] = $lcoid;
                    $saveTY2queuePatients['company_name'] = $cname;
                    $saveTY2queuePatients['costaff_id'] = $lempid;
                    $saveTY2queuePatients['patient_id'] = 0;
                    $saveTY2queuePatients['staff_id'] = "";
                    $saveTY2queuePatients['ic_number'] = $icno[$k];
                    $saveTY2queuePatients['name'] = $v;
                    $saveTY2queuePatients['symptopms'] = "";
                    $saveTY2queuePatients['department_id'] = 0;
                    $saveTY2queuePatients['depart_name'] = "";
                    $saveTY2queuePatients['utype'] = "";
                    $saveTY2queuePatients['utype_name'] = "";
                    $saveTY2queuePatients['ptype'] = "";
                    $saveTY2queuePatients['sex'] = $sex[$k];
                    $saveTY2queuePatients['receipt_no'] = "";
                    $saveTY2queuePatients['created_at'] = date("Y-m-d h:i:s", time());
                    $saveTY2queuePatients['updated_at'] = date("Y-m-d h:i:s", time());
                    $lastTY2queuePatients = DB::table('ty2queuepatients')->insertGetId($saveTY2queuePatients);
                }  
            }
        }    
        
        //echo "<pre>"; print_r($_POST); exit;
        return redirect()->route('home');

    }
    

    public function getConsultancyqueuedata(Request $request){
        $dept_id = Input::post('type'); 
        $patientList = array();
        $arr = DB::table('patientqueues')->select('patientqueues.*')->where('is_active', '=', 1)->where('department_id', '=', $dept_id)->orderBy('id', 'desc')->get();
        foreach ($arr as $k => $v) {
            $tokval = DB::table('patientqueues')->select('patientqueues.*')->where('patient_id', '=', $v->id)->orderBy('id', 'desc')->first();
            $patientList[$k]['pqueue'] = $v;
            $patientList[$k]['patientdet'] = DB::table('patients')->select('patients.*')->where('id', '=', $v->patient_id)->first();
        }
        return View('ajax.getConsultancyqueuedata')->with(compact('patientList'));
    }
    
    
}
