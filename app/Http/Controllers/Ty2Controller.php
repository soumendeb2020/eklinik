<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('ty2.index');
    }//////
}
