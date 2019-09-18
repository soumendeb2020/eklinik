<?php

namespace App\Http\Controllers;

use App\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Input;
use \Crypt;
use DB;
use Carbon\Carbon;
use App\Counter;
use App\Role;
 
class CounterController extends Controller {

    //use Authorizable;
    
 
    public function index() {
        $result = Counter::orderBy('id')->paginate();
        return view('counter.index', compact('result'));
    }
    
    public function create() {
        $roles = Role::pluck('name', 'id');
        return view('counter.new', compact('roles'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
        ]);
        $data['name'] = $request['name'];
        $data['created_at'] = date("Y-m-d h:i:s", time());
        $data['updated_at'] = date("Y-m-d h:i:s", time()); 

        if ($department = Counter::create( $data )) {
            flash('Counter has been created.');
        } else {
            flash()->error('Unable to create Counter.');
        }
        return redirect()->route('counter.index'); 
    }
    
    public function show($id) {
        //
    }

    public function edit($id) {
        $user = Counter::find($id);
        return view('counter.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
        ]);
        
        $counter = Counter::findOrFail($id);
        $counter['name'] = $request['name'];

        $counter->save();
        flash()->success('Counter has been updated.');
        return redirect()->route('counter.index');
    }

    public function destroy($id) {
        if (Counter::findOrFail($id)->delete()) {
            flash()->success('Counter has been deleted');
        } else {
            flash()->success('Counter not deleted');
        }
        return redirect()->back();
    }
    
}
