<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Attachment;

class AttachmentController extends Controller
{

    public function create($employeeId)
    {
        return view('hr.employee.attachment.create', compact('employeeId'));
    }

    public function store($employeeId, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'file' => 'required'
        ]);

        $attachment = new Attachment();
        $attachment->employee_id = $employeeId;
        $attachment->name = $request->name;
        $attachment->location = $this->upload($request->name);

        $attachment->save();

        return redirect()->to('/hr/employee/'. $employeeId);
    }

    public function destroy($employeeId, $attachmentId)
    {
        $attachment = Attachment::findOrFail($attachmentId);
        //TODO::doesnt work for some reason
        \File::delete($attachment->location);

        $attachment->delete();
        return redirect()->to('/hr/employee/'. $employeeId);
    }

    public function upload($name){
        $file = \Input::file('file');
        if ($file)
        {
            $faker = str_random(28);
            $destinationPath = 'uploads'; // upload path
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $fileName = $name . '-' . $faker .'.'.$extension; // renameing image
            $file->move($destinationPath, $fileName); // uploading file to given path

            return '/uploads/'.$fileName;

        }else{
            return null;
        }
    }
}
