<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index(){
        $approved_users = User::where('approved', 1)->get();
        $unapproved_users = User::where('approved', 0)->get();
        return view('user.index', compact('approved_users', 'unapproved_users'));
    }

    public function rejectUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function approveUser($id){
        $user = User::find($id);
        $user->approved = true;
        $user->save();
        return redirect()->back();
    }
}
