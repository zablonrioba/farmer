<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

class OrderController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(auth()->user()->role=="customer"){
          return view('/index');
       }
         $orders=Order::orderBy('id','desc')->paginate(7);
        return view('admin.orders')->with('orders',$orders);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user= User::find($request->user);
        $max=count($request->orders);
        $a=0;
     
     for ($i=0; $i < $max; $i++) { 

        $neworder=new Order;
        $neworder->user_id=$user->id;
        $neworder->username=$user->name;
        $neworder->product_id=$request->orders[$i]['id'];
        $neworder->product_name=$request->orders[$i]['name'];
        $neworder->save();
         
     }
       
     
    }

 


 

}
