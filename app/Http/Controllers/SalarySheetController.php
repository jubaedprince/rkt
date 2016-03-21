<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\SalarySheet;
use App\Employee;
use App\SalarySheetRecord;

class SalarySheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary_sheets = SalarySheet::all()->sortBy('date');
        return view('hr.salary_sheet.index', compact('salary_sheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr.salary_sheet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::createFromDate($request->year, $request->month, 1);
        $date->hour = 0;
        $date->minute = 0;
        $date->second = 0;

        $salary_sheet = SalarySheet::firstOrCreate(['date' => $date]);

        return redirect('/hr/salary_sheet/' . $salary_sheet->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salary_sheet = SalarySheet::find($id);
        $employees =   Employee::lists('name', 'id')->sort();
        return view('hr.salary_sheet.show', compact('salary_sheet', 'employees'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salary_sheet = SalarySheet::findOrFail($id);
        $salary_sheet->delete();
        return redirect('/hr/salary_sheet');
    }
}
