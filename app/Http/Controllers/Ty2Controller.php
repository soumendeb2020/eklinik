<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class Ty2Controller extends Controller {

    use Authorizable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $patientList = DB::table('ty2queue')->select('ty2queue.*')->orderBy('id', 'desc')->get();
        
        //dd($patientList);
        
        /*
          foreach ($patientList as $k=>$v){
          $emp = DB::table('companystaff')->select('companystaff.*')->where('patient_id', '=', $v->id)->orderBy('id', 'desc')->first();
          $patientList[$k]->token_no = $tokval->token_no;
          } */
        return view('ty2.index')->with(compact('patientList'));
        //return view('ty2.index');
    }

    public function ty2profile($id = null){ 
        if ($id != ''){
            $qid = $id;
            $pq_id = \Crypt::decrypt($qid);
            $ty2que = DB::table('ty2queue')->select('ty2queue.*')->where('id', '=', $pq_id)->first();
            $company = DB::table('company')->select('company.*')->where('id', '=', $ty2que->company_id)->first();
            $employees = DB::table('companystaff')->select('companystaff.*')->where('company_id', '=', $company->id)->get();
            
            //echo "<pre>"; print_r($ty2que);  echo "<pre>"; print_r($company); echo "<pre>"; print_r($employees); exit;
            
            return view('ty2.ty2profile', compact('ty2que', 'company', 'employees', 'qid'));
        } else {
            return redirect()->back();
        }
        
        
    }
            
    
}
