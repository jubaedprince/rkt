<?php

namespace App\Http\Controllers;

use App\SalarySheetRecord;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employee;
use App\SalarySheet;

class SalarySheetSalarySheetRecordsController extends Controller
{


    public function store(Request $request)
    {
        //TODO:: add validation later
        $salary_sheet_record = SalarySheetRecord::create($request->all());
        return redirect('/hr/salary_sheet/'.$request->salary_sheet_id);
    }



    public function edit($salarySheetId, $salarySheetRecordId)
    {
        $salary_sheet = SalarySheet::find($salarySheetId);
        $employees =   Employee::lists('name', 'id')->sort();
        $salary_sheet_record = SalarySheetRecord::find($salarySheetRecordId);
        return view('hr.salary_sheet.edit', compact('salary_sheet', 'employees', 'salary_sheet_record'));
    }


    public function update(Request $request, $salarySheetId, $salarySheetRecordId)
    {
        $input = $request->all(); /* Request all inputs */
        $salary_sheet_record = SalarySheetRecord::find($request->salary_sheet_record_id);
//        dd($salary_sheet_record);
        $salary_sheet_record->fill($input); /* Fill the inputs with new values */

        $salary_sheet_record->save(); /* Save the new values in database */

        return redirect('/hr/salary_sheet/'.$request->salary_sheet_id);
    }


    public function destroy($salarySheetId, $salarySheetRecordId)
    {
        $salary_sheet_record = SalarySheetRecord::findOrfail($salarySheetRecordId);
        $salary_sheet_record->delete();
        return redirect('/hr/salary_sheet/'. $salarySheetId);
    }
}
