<?php
/**
 * Created by PhpStorm.
 * User: Jubaed
 * Date: 8/19/15
 * Time: 2:31 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Car;
use App\Activity;
use Carbon\Carbon;
class ReportController extends Controller {
    public function index(Request $request){

        if ($request->input('type') == '1'){
            return $this->costRevenue($request);
        }

        else if ($request->input('type') == '2'){
            return $this->priceComparison($request);
        }

        else if ($request->input('type') == '3'){
            return ( "This page is under construction.");
        }

    }

    public function costRevenue(Request $request){

        $trucks = Car::lists('name');
        $truck_list = array();
        foreach($trucks as $truck){
            array_push($truck_list, $truck);
        }

        $revenue = array();
        $activities = $this->getActivityOfOneMonth($request->input('month'),$request->input('year'));
        $costs = array();

        foreach($trucks as $truck){
            array_push($costs, 0);
        }

        foreach($trucks as $truck){
            array_push($revenue, 0);
        }

        foreach ($activities as $activity){
            $key = array_search($activity->car->name, $truck_list);
            $costs[$key] = $costs[$key] + $activity->cost;
            $revenue[$key] = $revenue[$key] + $activity->fare;
        }


        return view('report.index', ['trucks'=>$trucks, 'costs'=>$costs, 'revenue'=>$revenue]);
    }

    public function priceComparison(Request $request){
        $trucks = Car::lists('name');
        $truck_list = array();
        foreach($trucks as $truck){
            array_push($truck_list, $truck);
        }

        $revenue = array();
        $activities = $this->getActivityOfOneMonth($request->input('month'),$request->input('year'));
        $costs = array();

        foreach($trucks as $truck){
            array_push($costs, 0);
        }

        foreach($trucks as $truck){
            array_push($revenue, 0);
        }

        foreach ($activities as $activity){
            $key = array_search($activity->car->name, $truck_list);
            $costs[$key] = $costs[$key] + $activity->cost;
            $revenue[$key] = $revenue[$key] + $activity->fare;
        }


        return view('report.priceComparison', ['trucks'=>$trucks, 'costs'=>$costs, 'revenue'=>$revenue]);
    }

    public function getActivityOfOneMonth($month, $year){
        $date = Carbon::create($year, $month, 1, 0);
        $initial_date = $date->toDateString();
        $last_date =  $date->addMonth()->subDay()->toDateString();
        $trucks=Car::lists('name');
        $activities = Activity::where('date', '>=', $initial_date)->where('date', '<=', $last_date)->get();
        return $activities;
    }

    public function generateReportForm(){
        return view('forms.generateReport');
    }


}