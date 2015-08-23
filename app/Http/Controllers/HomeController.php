<?php
/**
 * Created by PhpStorm.
 * User: Jubaed
 * Date: 8/17/15
 * Time: 10:54 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Car;
use App\Customer;
use App\Location;
use App\Activity;

use App\Onday;
use App\Nil;
use App\Item;
use App\Maintenance;

use DB;
use Session;
class HomeController extends Controller {
    public function showHome(){
        $cars = Car::lists('name', 'id');
        $activities = Activity::orderBy('created_at', 'desc')->take(10)->get();
        return view('home', ['cars' => $cars, 'activities' => $activities]);
    }

    public function processForm(Request $request){

        $this->validate($request, [
            'date' => 'required|date',
        ]);

        $car_id = $request->input('car');
        $date = $request->input('date');
        $type = $request->input('type');

        $activity = new Activity;
        $activity->date = $date;
        $activity->car_id = $car_id;
        $activity->save();
        $activities = Activity::orderBy('created_at', 'desc')->take(10)->get();

        Session::put('activity', $activity);

        if ($type == '1'){
            return redirect()->route('process.ondayForm');
        }
        else if($type == '2'){
            return redirect()->route('process.maintenanceForm');
//            $items = Item::lists('name', 'id');
//            $maintenance = new Maintenance;
//            $maintenance->activity_id = $activity->id;
//            $maintenance->save();
//            return view('home', [ 'type'=> '2', 'activity' => $activity, 'activities' => $activities, 'items'=>$items, 'maintenance_id'=>$maintenance->id]);
          //  return view('home', [ 'type'=> '2', 'activity' => $activity, 'activities' => $activities]);
        }

        else if ($type == '3'){
          //nil
            return redirect()->route('process.nilForm');
        }

        else{
            //error
        }
    }

    public function processOndayFormView(){

        $activities = Activity::orderBy('created_at', 'desc')->take(10)->get();
        $customers = Customer::lists('name', 'id');
        $locations = Location::lists('name', 'id');
        $activity = Session::get('activity');
       // Session::forget('activity');
        return view('home', [ 'type'=> '1','activity' => $activity, 'customers' => $customers, 'locations' => $locations, 'activities' => $activities]);
    }

    public function processOndayForm(Request $request){
        $this->validate($request, [
            'cost' => 'required|numeric',
            'fare' => 'required|numeric',
            'market_price' => 'required|numeric',
            'location_id_origin' => 'different:location_id_destination'
        ]);

        $onday = new Onday;
        $onday->type = $request->input('type');
        $onday->activity_id = $request->input('activity_id');
        $onday->location_id_origin = $request->input('location_id_origin');
        $onday->customer_id = $request->input('customer');
        $onday->location_id_destination = $request->input('location_id_destination');
        $onday->cost = $request->input('cost');
        $onday->fare = $request->input('fare');
        $onday->market_price = $request->input('market_price');
        $onday->save();
        $activity = Activity::findOrFail($request->input('activity_id'));
        $activity->comment = $request->input('comment');
        $activity->save();
        return redirect()->route('home');
    }

    public function processNilForm(Request $request){
        $this->validate($request, [
            'cost' => 'required|numeric'
        ]);

        $nil = new Nil;
        $nil->activity_id = $request->input('activity_id');
        $nil->cost = $request->input('cost');
        $nil->save();
        $activity = Activity::findOrFail($request->input('activity_id'));
        $activity->comment = $request->input('comment');
        $activity->save();
        return redirect()->route('home');
    }

    public function processNilFormView(){
        $activity = Session::get('activity');
       // Session::forget('activity');
        $activities = Activity::orderBy('created_at', 'desc')->take(10)->get();
        return view('home', [ 'type'=> '3', 'activity' => $activity, 'activities' => $activities]);
    }
    public function processMaintenanceForm(Request $request){
        $this->validate($request, [
            'cost' => 'required|numeric',
        ]);
        $maintenance = new Maintenance;
        $maintenance->activity_id = $request->input('activity_id');
        $maintenance->cost = $request->input('cost');
        $maintenance->save();
        $activity = Activity::findOrFail($request->input('activity_id'));
        $activity->comment = $request->input('comment');
        $activity->save();
        return redirect()->route('home');
    }
    public function processMaintenanceFormView(){
        $activity = Session::get('activity');
       // Session::forget('activity');
        $activities = Activity::orderBy('created_at', 'desc')->take(10)->get();
        return view('home', [ 'type'=> '2', 'activity' => $activity, 'activities' => $activities]);
    }

//    public function addItem(Request $request){
//        //return ($request->all());
//        DB::table('item_maintenance')->insert(
//            array('item_id' => $request->input('item'), 'maintenance_id' => $request->input('maintenance_id'), 'cost' => $request->input('cost') )
//        );
//        $activities = Activity::orderBy('created_at', 'desc')->take(10)->get();
//        $maintenance = Maintenance::findOrFail($request->input('maintenance_id'));
//        $activity = $maintenance->activity;
//        $items = Item::lists('name', 'id');
//        return view('home', [ 'type'=> '2', 'activity' => $activity, 'activities' => $activities, 'items'=>$items, 'maintenance_id'=>$request->input('maintenance_id')]);
//        //return redirect()->back()->with(['maintenance_id' => $request->input('maintenance_id')]);
//    }


}