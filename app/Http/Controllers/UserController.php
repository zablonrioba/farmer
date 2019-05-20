<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    // return all users
    public function allusers(){
        $users=User::all();
        
        return view('admin.userall')->with('users',$users);
    }
}
