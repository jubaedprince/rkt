<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employee;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        //TODO::later for sorting
//        if($request->sort == 'status_dsc'){
//            $employees = Employee::all()->sortByDesc('status');
//        }else if($request->sort == 'status_asc'){
//            $employees = Employee::all()->sortBy('status');
//        }
//        else if($request->sort == 'status_asc'){
//            $employees = Employee::all()->sortBy('status');
//        }

        $employees = Employee::all()->sortByDesc('status');

        return view('hr.employee.index', compact('employees'));
    }


    public function create()
    {
        return view('hr.employee.create');
    }


    public function store(Request $request)
    {
//        return $request->photo;
        $this->validate($request, [
            'name' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'mobile' => 'required|numeric',
            'national_id' => 'required|numeric',
            'designation' => 'required',
//            'photo' => 'image', TODO::dont know why it doesn't work
            'raid' => 'required|numeric',
            'status' => 'required|boolean',
            'email' => 'email',

        ]);

        Employee::create($request->all());

        return redirect()->to('/hr/employee');

    }


    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return view('hr.employee.show', compact('employee'));
    }


    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('hr.employee.edit', compact('employee'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'mobile' => 'required|numeric',
            'national_id' => 'required|numeric',
            'designation' => 'required',
//            'photo' => 'image', TODO::dont know why it doesn't work
            'raid' => 'required|numeric',
            'status' => 'required|boolean',
            'email' => 'email',

        ]);

        $employee = Employee::findOrFail($id);
        $employee->name = $request->name;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->mobile = $request->mobile;
        $employee->national_id = $request->national_id;
        $employee->designation = $request->designation;
        $employee->raid = $request->raid;
        $employee->status = $request->status;
        $employee->email = $request->email;

        if($request->photo){
            $employee->photo = $request->photo;
        }

        $employee->save();

        return redirect()->to('/hr/employee/'.$id);
    }


    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->to('/hr/employee');
    }
}
