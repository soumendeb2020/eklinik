<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DispensaryController extends Controller
{
     use Authorizable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dispensary.index');
    }////
}
