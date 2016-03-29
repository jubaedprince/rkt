<?php
/**
 * Created by PhpStorm.
 * User: Jubaed
 * Date: 8/17/15
 * Time: 10:54 PM
 */

namespace App\Http\Controllers;

use App\OndayOtherCost;
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
use App\OndayOtherCostItem;

use DB;
use Session;
use Input;
use Carbon;
class HomeController extends Controller {
    public function showHome(){
        Session::forget('maintenance');
        $cars = Car::lists('name', 'id')->sort();
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
        $carbon_date = Carbon\Carbon::createFromFormat('m/d/Y', $date);
        // dd($carbon_date->format('Y-m-d'));
        $activity->date = $carbon_date->format('Y-m-d');
        $activity->car_id = $car_id;
        $activity->save();
        $activities = Activity::orderBy('created_at', 'desc')->take(10)->get();

        Session::put('activity', $activity);

        if ($type == '1'){
            return redirect()->route('process.ondayForm');
        }
        else if($type == '2'){
            return redirect()->route('process.maintenanceForm');
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
        $locations = Location::lists('name', 'id')->sort();
        $activity = Session::get('activity');
        $ondayOtherCostItems = OndayOtherCostItem::lists('name', 'id');
       // Session::forget('activity');
        return view('home', [ 'type'=> '1','activity' => $activity, 'customers' => $customers, 'locations' => $locations, 'activities' => $activities, 'ondayOtherCostItems' => $ondayOtherCostItems]);
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

        //adding onday other costs
        $other_cost = $request->input('other_cost');
        foreach ($other_cost as $key => $value){
            if($value){
                $onday_other_cost = OndayOtherCost::create(['cost'=> $value]);
                $onday_other_cost->onday_id = $onday->id;
                $onday_other_cost->onday_other_cost_item_id = $key;
                $onday_other_cost->save();
                $onday->cost =  $onday->cost + $value;
                $onday->save();
            }
        }

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
        $activity = Session::get('activity');
        $activity->comment = $request->comment;
        $activity->save();
        Session::forget('maintenance');

        // getting all of the post data
        $file = array('image' => Input::file('image'));

        // checking file is valid.
        if (Input::file('image')) {
            $destinationPath = 'uploads'; // upload path
            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

            $activity->maintenance->upload = '/uploads/'.$fileName;
            $activity->maintenance->save();
        }

        return redirect()->route('home');
    }
    public function processMaintenanceFormView(){
        $activity = Session::get('activity');
        $items = Item::lists('name', 'id')->sort();
        $old_maintenance = Session::get('maintenance');
        if($old_maintenance == null) {
            $maintenance = new Maintenance;
            $maintenance->activity_id = $activity->id;
            $maintenance->save();
            Session::put('maintenance', $maintenance);
        }else{
            $maintenance = $old_maintenance;
        }
        $costs = Maintenance::find($maintenance->id)->items;
        $activities = Activity::orderBy('created_at', 'desc')->take(10)->get();
        return view('home', [ 'type'=> '2', 'activity' => $activity, 'activities' => $activities, 'items'=>$items, 'maintenance_id'=>$maintenance->id, 'costs'=>$costs]);

       // Session::forget('activity');

//        return view('home', [ 'type'=> '2', 'activity' => $activity, 'activities' => $activities]);
    }

    public function addItem(Request $request){
//        return "hi";
        $maintenance_item = Maintenance::find($request->maintenance_id)->items()->save(Item::find($request->item), ['cost' => $request->cost]);
        $maintenance =  Maintenance::find($request->maintenance_id);
        $maintenance->cost =  $maintenance->cost + $request->cost;
        $maintenance->save();
        return redirect()->back();
    }

    public function deleteItem($item, Request $request){
        $pivot = DB::table('item_maintenance')->where('id', $item)->first();

        $maintenance =  Maintenance::find($pivot->maintenance_id);
        $maintenance->cost =  $maintenance->cost - $pivot->cost;
        $maintenance->save();

        $result = DB::table('item_maintenance')->where('id', $item)->delete();
//        return $result;
        return redirect()->back();
    }

    public function addItemNameView(){
        return "add item";
    }

    public function addItemName(Request $request){
        $item = Item::create($request->all());
        return redirect()->back();
    }

    public function addOtherCostItem(Request $request){
        $otherCostItem = OndayOtherCostItem::create($request->all());
        return redirect()->back();
    }
}