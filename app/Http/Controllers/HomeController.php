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

class HomeController extends Controller {
    public function showHome()
    {
        return view('home');
    }
}