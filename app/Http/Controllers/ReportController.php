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

    public function priceComparison(){
        return view('forms.priceComparison');
    }

    public function processPriceComparison(Request $request){
//        dd($request->all());
        //one month's activities grouped according to date
        $activities = $this->getActivityOfOneMonth($request->month,$request->year)->sortBy('date')->groupBy(function($item){ return $item->date->format('d'); });

        $date_array = [];
        $market_price_array =[];
        $fare_array=[];

        $data_point = [];
        $collection = collect();


        foreach ($activities as $date => $value) {
            $temp = [];
            foreach ($value as $i){
                if($i->market_price == 0){
                    continue;
                }
                array_push($temp, [$i->market_price, $i->fare]);
            }
            if ($temp != null){
                $collection[$date] = $temp;
            }

        }
        $market_rate = [];
        $fare = [];
        $dates = [];

        //   dd($collection);
        foreach ($collection as $key => $item) {

//        $collection = $collection->each(function ($item, $key) {
            $c = 1;
            foreach ($item as $data_point){
                array_push($market_rate, $data_point[0]);
                array_push($fare, $data_point[1]);
                if($c ==1) {
                    array_push($dates, $key);
                }
                else{
                    array_push($dates, " ");
                }
                $c+=1;
            }
        };
        $total_fare= array_sum($fare);
        $total_market_rate = array_sum($market_rate);
        $rate = 0;
        if($total_fare != null && $total_market_rate!=null){
            // TODO::check the math.
            $change = $total_fare - $total_market_rate ;
            $rate = $change/$total_market_rate*100;
        }

        $date = $this->getDateString($request);

        return view('report.priceComparison', ['market_rate'=>$market_rate, 'fare'=>$fare, 'dates'=>$dates, 'rate'=>$rate, 'date'=>$date]);
    }

    public function monthlyCostRevenue(){
        return view('forms.monthlyCostRevenue');
    }

    public function processMonthlyCostRevenue(Request $request){
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

        $date = $this->getDateString($request);

        return view('report.index', ['trucks'=>$trucks, 'costs'=>$costs, 'revenue'=>$revenue, 'date'=>$date]);
    }

    public function getDateString($request){
        $monthNum  = $request->month;
        $monthName =  date('F', mktime(0, 0, 0, $monthNum, 10));
        return $monthName. ' ' .$request->year;
    }

}