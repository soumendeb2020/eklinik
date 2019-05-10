<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class Ty2Controller extends Controller
{
     use Authorizable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $patientList = DB::table('ty2queue')->select('ty2queue.*')->orderBy('id', 'desc')->get();
        /*
        foreach ($patientList as $k=>$v){
            $emp = DB::table('companystaff')->select('companystaff.*')->where('patient_id', '=', $v->id)->orderBy('id', 'desc')->first();
            $patientList[$k]->token_no = $tokval->token_no;
        } */
        return view('ty2.index')->with(compact('patientList'));
        //return view('ty2.index');
    }//////
}
