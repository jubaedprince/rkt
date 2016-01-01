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
    return redirect('/home');
});
use App\Activity;
use App\Car;
use App\Nil;
use App\Onday;
use App\Location;
use Carbon\Carbon;
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('/status/', function () {
    $client = new GuzzleHttp\Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://vts.m2mbd.com',
        // You can set any number of default request options.
        'timeout'  => 2.0,
        'cookies' => true
    ]);

    $response = $client->post('index.php', [
        'form_params' => [
            'user' => 'rubaiyatkamal',
            'password' => 'k2a3m4a5l',

        ]
    ]);
   // dd($response);


   $response = $client->get('http://vts.m2mbd.com/group/vehicle_state.php');
    $code = $response->getStatusCode();
    $body = $response->getBody();
    while (!$body->eof()) {
        echo $body->read(1024);
    }


//
//    $activity = App\Activity::findOrFail(46);
//    $onday = $activity->onday;
//     dd($activity->date->format('d/m/Y') );
//
//    $activities = App\Activity::orderBy('created_at', 'desc')->take(10)->get();
//    return $activities;

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
//    $activity = Activity::findOrFail(45);
//    return $activity->getType;
//    dd($activity);

//    $car = Car::findOrFail(1);
//    $car->activity->comment = "hi";
//    $car->activity->save();
//    return $car->activity->comment;
//    dd($car->activity);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [
        'as' => 'home', 'uses' => 'HomeController@showHome'
    ]);

    Route::get('/car-status', [
        'as' => 'car-status', 'uses' => 'CarStatusController@index'
    ]);

    Route::get('/activity-list', [
        'as' => 'activity-list', 'uses' => 'ActivityController@showListView'
    ]);



    Route::post('/process', [
        'as' => 'process', 'uses' => 'HomeController@processForm'
    ]);

    Route::post('/process/onday', [
        'as' => 'process.onday', 'uses' => 'HomeController@processOndayForm'
    ]);

    Route::get('/process/onday', [
        'as' => 'process.ondayForm', 'uses' => 'HomeController@processOndayFormView'
    ]);

    Route::post('/process/onday/other-cost-item', [
        'as' => 'process.ondayForm.other-cost-item', 'uses' => 'HomeController@addOtherCostItem'
    ]);

    Route::post('/process/nil', [
        'as' => 'process.nil', 'uses' => 'HomeController@processNilForm'
    ]);

    Route::get('/process/nil', [
        'as' => 'process.nilForm', 'uses' => 'HomeController@processNilFormView'
    ]);

    Route::post('/process/maintenance', [
        'as' => 'process.maintenance', 'uses' => 'HomeController@processMaintenanceForm'
    ]);

    Route::get('/process/maintenance', [
        'as' => 'process.maintenanceForm', 'uses' => 'HomeController@processMaintenanceFormView'
    ]);


    //report
    Route::group(['prefix' => 'report'], function () {

        Route::post('/price-comparison', [
            'as' => 'price-comparison', 'uses' => 'ReportController@processPriceComparison'
        ]);

        Route::get('/price-comparison', [
            'as' => 'price-comparison', 'uses' => 'ReportController@priceComparison'
        ]);

        Route::post('/monthly-cost-revenue', [
            'as' => 'monthly-cost-revenue', 'uses' => 'ReportController@processMonthlyCostRevenue'
        ]);

        Route::get('/monthly-cost-revenue', [
            'as' => 'monthly-cost-revenue', 'uses' => 'ReportController@monthlyCostRevenue'
        ]);
    });


    Route::get('activity/{id}/delete', [
        'as' => 'activity.delete', 'uses' => 'ActivityController@destroy'
    ]);

    Route::resource('activity', 'ActivityController', ['only', ['edit', 'update']]);


    Route::post('/process/maintenance/item', [
        'as' => 'process.maintenance.item', 'uses' => 'HomeController@addItem'
    ]);


    Route::get('/process/maintenance/item/{item}/delete', [
        'as' => 'process.maintenance.item.delete', 'uses' => 'HomeController@deleteItem'
    ]);

    Route::post('/process/maintenance/item-name', [
        'as' => 'process.maintenance.item-name', 'uses' => 'HomeController@addItemName'
    ]);

    Route::get('/process/maintenance/item-name', [
        'as' => 'process.maintenance.item-name', 'uses' => 'HomeController@addItemNameView'
    ]);



});
//