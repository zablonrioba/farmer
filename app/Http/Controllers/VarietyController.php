<?php

namespace App\Http\Controllers;

use App\Variety;
use Illuminate\Http\Request;

class VarietyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
 
// change the variety status
public function status($id){


  
       $category=Variety::find($id);
       if($category->status=='pending'){
        $category->status='active';
        $category->save();
       }
        else{
            $category->status='pending';
            $category->save(); 
        }
    
    return redirect('/varieties');
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
        $varieties=Variety::all();
        return view('admin.varieties')->with('varieties',$varieties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name'=>'required',
            'desc'=>'required',
  
        ]);
        $category=new Variety();
      $category->name=$request->input('name');
      $category->description=$request->input('desc');
      $category->status='active';
      $category->save();

      return redirect('/varieties');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Variety  $variety
     * @return \Illuminate\Http\Response
     */
    public function show(Variety $variety)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Variety  $variety
     * @return \Illuminate\Http\Response
     */
    public function edit(Variety $variety)
    {
        if(auth()->user()->role=="customer"){
            return view('/index');
         }
      $variety=Variety::find($variety->id);

      return view('admin.varietiesedit')->with('category',$variety);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Variety  $variety
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variety $variety)
    {
        $category=Variety::find($variety->id);
        if(!$category){
            return "404 error";
        }
        else{
          $this->validate($request,[
              'name'=>'required',
              'desc'=>'required',
              'status'=>'required',
    
          ]);
          $category->name=$request->input('name');
          $category->status=$request->input('status');
          $category->description=$request->input('desc');
          $category->save();
  
          return redirect('/varieties');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variety  $variety
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variety $variety)
    {
        $category=Variety::find($variety->id);
        if($category->delete()){
          
            return redirect('/varieties');
    }
   
}
}
