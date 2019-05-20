<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Variety;
use App\Product;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == "customer"){
            return view('/index');
        }
         $users=User::orderBy('id','desc')->get();
         $orders=Order::orderBy('id','desc')->get();
         $varieties=Variety::orderBy('id','desc')->get();
         $products=Product::orderBy('id','desc')->get();
        return view('home')->with('users',$users)->with('orders',$orders)->with('varieties',$varieties)->with('products',$products);
    }
}
