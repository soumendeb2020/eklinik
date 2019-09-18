<?php

namespace App\Http\Controllers;

use App\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Input;
use \Crypt;
use DB;
use Carbon\Carbon;
use App\Department;
use App\Role;
 
class DepartmentController extends Controller {

    //use Authorizable;
    
 
    public function index() {
        $result = Department::orderBy('id')->paginate();
        return view('department.index', compact('result'));
    }
    
    public function create() {
        $roles = Role::pluck('name', 'id');

        return view('department.new', compact('roles'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'letter' => 'required',
            'start' => 'required',
        ]);
        //dd($request->all());
        // Create the user
        $data['name'] = $request['name'];
        $data['letter'] = $request['letter'];
        $data['start'] = $request['start'];
        $data['is_active'] = 1;
        $data['created_at'] = date("Y-m-d h:i:s", time());
        $data['updated_at'] = date("Y-m-d h:i:s", time()); 

        if ($department = Department::create( $data )) {
            //$this->syncPermissions($request, $user);
            flash('User has been created.');
        } else {
            flash()->error('Unable to create user.');
        }

        return redirect()->route('department.index'); 
    }
    
    public function show($id) {
        //
    }

    public function edit($id) {
        $user = Department::find($id);
        //$roles = Role::pluck('name', 'id');
        //$permissions = Permission::all('name', 'id');
        //dd($user);
        return view('department.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'letter' => 'required',
            'start' => 'required',
        ]);

        $department = Department::findOrFail($id);
        $department['name'] = $request['name'];
        $department['letter'] = $request['letter'];
        $department['start'] = $request['start'];

        $department->save();
        flash()->success('Department has been updated.');
        return redirect()->route('department.index');
    }

    public function destroy($id) {
        if (Department::findOrFail($id)->delete()) {
            flash()->success('Department has been deleted');
        } else {
            flash()->success('Department not deleted');
        }
        return redirect()->back();
    }
    
}
