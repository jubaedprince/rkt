<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\OndayOtherCost;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Nil;
use App\Onday;
use App\Activity;
use App\Car;
use App\Location;
use App\Customer;
use Illuminate\Support\Facades\Redirect;
use App\Item;
class ActivityController extends Controller
{

    public function edit($id)
    {
        $activity = Activity::find($id);
        $cars = Car::lists('name', 'id');
        $customers = Customer::lists('name', 'id');
        $locations = Location::lists('name', 'id');
        $costs = null;
        $items = null;
        $ondayOtherCosts = null;
        if($activity->type == "On Day"){
            $data = Onday::where('activity_id', '=', $id)->get()->pop();
            $ondayOtherCosts = OndayOtherCost::where('onday_id', $data->id)->get();
        }
        else if ($activity->type == "Maintenance"){
            $data = Maintenance::where('activity_id', '=', $id)->get()->pop();
            $costs = $activity->maintenance->items;
            $items = Item::lists('name', 'id')->sort();
        }

        else if ($activity->type == "Nil"){
            $data = Nil::where('activity_id', '=', $id)->get()->pop();
        }
        return view('activity.edit', ['activity' => $activity, 'data' => $data, 'cars' => $cars,
            'customers'=>$customers, 'locations'=>$locations, 'costs'=>$costs,  'items'=>$items, 'ondayOtherCosts'=>$ondayOtherCosts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
//        return $request->all();
        if ($request->input('activity_type')=="On Day"){
            $this->validate($request, [
                'cost' => 'required|numeric',
                'fare' => 'required|numeric',
                'market_price' => 'required|numeric',
                'location_id_origin' => 'different:location_id_destination'
            ]);

            $onday = Onday::where("activity_id", '=', $id)->first();
            $onday->type = $request->input('type');
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
                $onday_other_cost = OndayOtherCost::where('onday_id', $onday->id)->where('onday_other_cost_item_id', $key)->first();
                $temp = $onday_other_cost->cost;
                $onday_other_cost->cost = $value;
                $onday->cost =  $onday->cost - $temp;
                $onday->cost =  $onday->cost + $value;
                $onday_other_cost->save();
                $onday->save();
            }

            return redirect()->route('home');

        }
        else if($request->input('activity_type')=="Maintenance"){

            $activity = Activity::findOrFail($request->input('activity_id'));
            $activity->comment = $request->input('comment');
            $activity->save();
            return redirect()->route('home');
        }

        else if($request->input('activity_type')=="Nil"){
            $this->validate($request, [
                'cost' => 'required|numeric'
            ]);

            $nil = Nil::where("activity_id", '=', $id)->first();
            $nil->cost = $request->input('cost');
            $nil->save();
            $activity = Activity::findOrFail($request->input('activity_id'));
            $activity->comment = $request->input('comment');
            $activity->save();
            return redirect()->route('home');
        }

        return $id;

    }

    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();

        $nil = Nil::where('activity_id', '=', $id)->get();
        if($nil->count() > 0){
            $nil->pop()->delete();
        }

        $maintenance = Maintenance::where('activity_id', '=', $id)->get();
        if($maintenance->count() > 0){
            $maintenance->pop()->delete();
        }

        $onday = Onday::where('activity_id', '=', $id)->get();
        if($onday->count() > 0){
            $onday->pop()->delete();
        }


        return Redirect::to('/home');
    }

    public function showListView(Request $request){

//        $activities = Activity::orderBy('created_at', 'desc')->get();

        $activities = Activity::all()->groupBy(function($item){ return $item->date->format('d-M-y'); })->reverse();

//        dd($activities);

        return view('activity.list', ['activities' => $activities]);
    }
}
