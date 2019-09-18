<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class Ty2Controller extends Controller {
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $patientList = DB::table('ty2queue')->select('ty2queue.*')->orderBy('id', 'desc')->get();
        /*
          foreach ($patientList as $k=>$v){
          $emp = DB::table('companystaff')->select('companystaff.*')->where('patient_id', '=', $v->id)->orderBy('id', 'desc')->first();
          $patientList[$k]->token_no = $tokval->token_no;
          } */
        return view('ty2.index')->with(compact('patientList'));
        //return view('ty2.index');
    }
    
    public function createPrintHtml(Request $request){
        $data = $request->all();
        //dd($data);
        $receptDate = Carbon::now()->format('Y-m-d');
        return View('ajax.createPrintHtml')->with(compact('data', 'receptDate'));
    }


    
    public function ty2profile($id = null){ 
        if ($id != ''){
            $qid = $id;
            $pq_id = \Crypt::decrypt($qid);
            $ty2que = DB::table('ty2queue')->select('ty2queue.*')->where('id', '=', $pq_id)->first();
            $company = DB::table('company')->select('company.*')->where('id', '=', $ty2que->company_id)->first();
            $employees = DB::table('ty2queuepatients')->select('ty2queuepatients.*')->where('tytq_id', '=', $ty2que->id)->get();
            
            /*
            $employees = DB::table('ty2queuepatients')->join('companystaff', 'ty2queuepatients.costaff_id', '=', 'companystaff.id')
                                                      ->select('ty2queuepatients.*', 'companystaff.receipt_no', 'companystaff.*')
                                                      ->where('ty2_qid', '=', $pq_id)->get();
            
            
            $employees = DB::table('ty2recepts')->join('companystaff', 'ty2recepts.emp_id', '=', 'companystaff.id')
                                                  ->select('ty2recepts.id as recid', 'ty2recepts.receipt_no', 'companystaff.*')
                                                  ->where('ty2_qid', '=', $pq_id)->get();
            */
            //echo "<pre>"; print_r($ty2que);  echo "<pre>"; print_r($company); echo "<pre>"; print_r($employees); exit;
            
            return view('ty2.ty2profile', compact('ty2que', 'company', 'employees', 'qid'));
        } else {
            return redirect()->back();
        }
        
        
    }
            
     
     public function savety2groupreceipt(Request $request) {
        //echo "<pre>"; print_r($_POST); exit;
        $receptDate = Carbon::now()->format('Y-m-d');
        $expDate = Carbon::now()->addDays(365)->format('Y-m-d');
        DB::table('ty2queuepatients')->where('tytq_id', $_POST['ty2qid'])->update(['receipt_no' => $_POST['receptno'], 'receipt_date' => $receptDate, 'expiry_date' => $expDate, 'action' => 1, 'q_status' =>0]);
        return 1;
     }
    
     public function savety2receipt(Request $request) {
        //echo "<pre>"; print_r($_POST); exit;
        $receptDate = Carbon::now()->format('Y-m-d');
        $expDate = Carbon::now()->addDays(365)->format('Y-m-d');
        //echo $receptDate; echo "<br>"; echo $expDate; echo "<br>"; exit;
        DB::table('ty2queuepatients')->where('id', $_POST['ty2qid'])->update(['receipt_no' => $_POST['receptno'], 'receipt_date' => $receptDate, 'expiry_date' => $expDate, 'action' => 1, 'q_status' =>0]);
        return 1;
         
     }
    
    
    
}
