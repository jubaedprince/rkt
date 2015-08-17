<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
use App\Activity;
use App\Car;
use App\Nil;
use App\Onday;
use App\Location;
Route::get('/test/', function () {
//    insert activity
//    $activity = new Activity;
//    $activity->car_id = 1;
//    $activity->save();

//    $nil = new Nil;
//    $nil->activity_id = 1;
//    $nil->cost = 32323;
//    $nil->save();

//    $onday = new Onday;
//    $onday->activity_id = 1;
//    $onday->customer_id = 1;
//    $onday->save();


//    $onday = Onday::findOrFail(1);
//    $onday->location_id_destination = 2;
//    $onday->save();
//    return $onday->location_destination;
    //return $onday->->name;

//    $location = Location::findOrFail(1);
//    return $location->onday_origin;
//
//

//
//    $activity = Activity::findOrFail(1);
//    return $activity->car->name;
//    dd($activity);

//    $car = Car::findOrFail(1);
//    $car->activity->comment = "hi";
//    $car->activity->save();
//    return $car->activity->comment;
//    dd($car->activity);
});
Route::get('/home', [
    'as' => 'home', 'uses' => 'HomeController@showHome'
]);
Route::resource('activity', 'ActivityController');