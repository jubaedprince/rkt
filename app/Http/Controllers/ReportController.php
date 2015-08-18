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

class ReportController extends Controller {
    public function index(){
        return view('report.index', []);
    }
}