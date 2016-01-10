<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employee;
use Input;
class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        $employees = Employee::all();

        if($request->sort == 'status_dsc'){
            $employees = Employee::all()->sortByDesc('status');
        }else if($request->sort == 'status_asc'){
            $employees = Employee::all()->sortBy('status');
        }
        else if($request->sort == 'name'){
            $employees = Employee::all()->sortBy('name');
        }
        else if($request->sort == 'id'){
            $employees = Employee::all()->sortBy('id');
        }

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

        $employee = Employee::create($request->all());


        if($request->photo){
            $employee->photo = $this->upload();
        }

        $employee->save();

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
            $employee->photo = $this->upload();
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

    public function upload($input_name='photo'){
        $image_file = Input::file($input_name);
        if ($image_file)
        {

            $faker = str_random(28);

            $image = (\Image::make($image_file)->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save('employee_pic/'.$faker . '-' . $image_file->getClientOriginalName()));

            return $image->dirname . '/' . $image->basename;

        }else{

            return null;
        }
    }
}
