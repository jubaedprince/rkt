<?php
/**
 * Created by PhpStorm.
 * User: Jubaed
 * Date: 8/31/15
 * Time: 1:02 AM
 */

namespace App\Http\Controllers;
use GuzzleHttp;
use URL;
class CarStatusController extends Controller{
    public function index(){
        $client = new GuzzleHttp\Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vts.m2mbd.com',
            // You can set any number of default request options.
            'timeout'  => 5.0,
            'cookies' => true
        ]);

        $response = $client->post('index.php', [
            'form_params' => [
                'user' => 'rubaiyatkamal',
                'password' => 'k2a3m4a5l',

            ]
        ]);


        $response = $client->get('http://vts.m2mbd.com/group/vehicle_state.php');
        $code = $response->getStatusCode();
        $body = $response->getBody();
        $body = (string)$body;

        $body= str_replace('"../images/car/stopcarimage.png"', URL::asset('image/stopcarimage.png') ,$body);
        $body = str_replace('"../images/car/motioncarimage.png"',URL::asset('image/motioncarimage.png'),$body);
      //  var_dump($body);
//        while (!$body->eof()) {
//            echo $body->read(1024);
//        }

        return view('car-status', ['body' => $body]);
    }
}