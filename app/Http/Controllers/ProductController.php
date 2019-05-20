<?php

namespace App\Http\Controllers;

use App\Product;
use App\Variety;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


// publish a post
public function publish($id){
    $post = Product::find($id);
    $post->status='posted';
    $post->save();
   
    return redirect('/products');
     

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

        $products=Product::where('status','posted')->orderBy('id','desc')->get();
        $drafts=Product::where('status','draft')->orderBy('id','desc')->get();
        $varieties=Variety::where('status','active')->get();
   
        return view('admin.products')->with('products',$products)->with('drafts',$drafts)->with('varieties',$varieties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role=="customer"){
            return view('/index');
         }
        $varieties=Variety::where('status','active')->get();
        return view('admin.productscreate')->with('varieties',$varieties);
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $state=$request->input('toggler');

        if($state==1){
            $this->validate($request,[
                'name'=>'required',
                'desc'=>'required',
                'cover'=>'image',
                'price'=>'required',
                'variety'=>'required'
      
            ]);
    
            if($request->hasFile('cover')){
    
                
            
              // get filename with extension
              $fileNameWithExtension=$request->file('cover')->getClientOriginalName();
              // get just file name
              $fileName=pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
              // get just extension
              $extension=$request->file('cover')->getClientOriginalExtension();
              // file name to Store
              $fileNameToStore=$fileName.'_'.time().'.'.$extension;
              // upload the image
              $path=$request->file('cover')->storeAs('public/app_images',$fileNameToStore);
            
             
              $product=new Product;
              $product->name=$request->input('name');
              $product->description=$request->input('desc');
              $product->price=$request->input('price');
              $product->variety=$request->input('variety');
              $product->image = $fileNameToStore;
              $product->status='posted';
              $product->save();
            
            }
        }
            else{
                $this->validate($request,[
                    'name'=>'required',
                    'desc'=>'required',
                    'cover'=>'image',
                    'price'=>'required',
                    'variety'=>'required'
                ]);
        
                if($request->hasFile('cover')){
        
                    
                
                  // get filename with extension
                  $fileNameWithExtension=$request->file('cover')->getClientOriginalName();
                  // get just file name
                  $fileName=pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
                  // get just extension
                  $extension=$request->file('cover')->getClientOriginalExtension();
                  // file name to Store
                  $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                  // upload the image
                  $path=$request->file('cover')->storeAs('public/app_images',$fileNameToStore);
                
                 
                  $product=new Product;
                  $product->name=$request->input('name');
                  $product->description=$request->input('desc');
                  $product->price=$request->input('price');
                  $product->variety=$request->input('variety');
                  $product->image = $fileNameToStore;
                  $product->status='draft';
                  $product->save();
                
                }
            }
            return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        if(auth()->user()->role=="customer"){
            return view('/index');
         }

         $varieties=Variety::where('status','active')->get();
        $product =Product::find($product->id);

        return view('admin.productedit')->with('product',$product)->with('varieties',$varieties);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name'=>'required',
            'desc'=>'required',
            'cover'=>'image',
            'price'=>'required',
            'variety'=>'required'
        ]);

        if($request->hasFile('cover')){
    
                
            
            // get filename with extension
            $fileNameWithExtension=$request->file('cover')->getClientOriginalName();
            // get just file name
            $fileName=pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            // get just extension
            $extension=$request->file('cover')->getClientOriginalExtension();
            // file name to Store
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            // upload the image
            $path=$request->file('cover')->storeAs('public/app_images',$fileNameToStore);
          
           
            $product=Product::find($product->id);
            $product->name=$request->input('name');
            $product->description=$request->input('desc');
            $product->price=$request->input('price');
            $product->variety=$request->input('variety');
            $product->image = $fileNameToStore;
            $product->save();
            
            return redirect('/products');
          
          }
          else{
            $product=Product::find($product->id);
            $product->name=$request->input('name');
            $product->description=$request->input('desc');
            $product->price=$request->input('price');
            $product->variety=$request->input('variety');
            $product->save();

            return redirect('/products');

          }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       
        $post=Product::find($product->id);
        if($post->delete()){
            return redirect("/products");

        }
    }
}
