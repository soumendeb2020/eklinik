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

class CallController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $counter = DB::table('counters')->select('counters.*')->get();
        $department = DB::table('department')->select('department.*')->where('is_active', '=', 1)->get();
        return view('call.index')->with(compact('counter', 'department'));
    }

}
