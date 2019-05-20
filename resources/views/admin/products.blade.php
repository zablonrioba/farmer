@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper" style="min-height: 611px;margin-left:0px">

    <section class="content-header">
        <h1>
          Products
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Products</li>
        </ol>
      </section>
      <br>
      <div class="margin">
        <div class="alert text-center" style="background:rgb(36,40,43); opacity:0.9; color:#b8c7ce" role="alert"><span>Waddup Admin, Make Your website active by adding new products.....Got something in mind? Lets create it.</span>
            <a class="btn btn-primary" style="text-decoration:none" href="/products/create" type="button"><i class="fa fa-plus"></i> New Product</a>
        </div>
        <div class="row">
            <div class="col-md-6 padding">
                    <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title">Recent Products</h3>
            
                              <div class="box-tools pull-right">
                             
                               
                              </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                                                                         
                              <ul class="contacts-list">
                                @if(count($products) > 0)
                                 @foreach ($products as $product)
                                 <li>
                                    <a href='/products/{{$product->id}}/edit'>
                                      <img class="contacts-list-img" style="border-radius:5%;width:80px;" src="{{asset('storage/app_images/'.$product->image)}}" alt="User Image">
                              
                    
                                      <div class="contacts-list-info p-1" style="padding-left:50px">
                                            <span class="contacts-list-name">
                                              <p style="color:black; "> {{$product->name}}
                                                  <small class="contacts-list-date pull-right">2019-03-24 06:53:06</small>
                                              </p>
                                              
                                            </span>
                                        <span class="contacts-list-msg">
                                        <p><span class="pull-left" style="font-weight:bold"><span>price:</span>ksh {{$product->price}}</span><span class="pull-right" style="font-weight:bold"><span>variety:</span>{{$product->variety}}</span></p><br>
                                          <p>{!!substr($product->description,0,100) !!}</p>
                                        </span>
                                      </div>
                                      <!-- /.contacts-list-info -->
                                    </a>
                                  </li>
                                     
                                 @endforeach
                                    
                                
                
              @else
              <li>There Produst yet...create some</li>
              @endif
                                   
                                  
            </ul>                
                                        

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                    

                            </div>
                            <!-- /.box-footer -->
                          </div>
               
            
            </div>
            <div class="col-md-6">
                    <div class="box box-primary">
                            <div class="box-header">
                              <h3 class="box-title">Draft Products</h3>
                
                              <div class="box-tools pull-right">
                                
                              </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="color:white; background:#222d32; height:200px; overflow-y:auto;">
                              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                              <ul class="contacts-list">
                                  @if(count($drafts) > 0)
                                  @foreach($drafts as $post)
                                      <li>
                                        <a href="/posts">
                                          <img class="contacts-list-img" style="border-radius:5%" src="/storage/app_images/{{$post->image}}" alt="User Image">
                
                                          <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                  {{$post->name}}
                                                  <small class="contacts-list-date pull-right">{{$post->created_at}}</small>
                                                </span>
                                            <span class="contacts-list-msg">
                                                <p><span class="pull-left" style="font-weight:bold"><span>price:</span>ksh {{$post->price}}</span><span class="pull-right" style="font-weight:bold"><span>variety:</span>{{$post->variety}}</span></p><br>
                                              <p>{!!substr($post->description,0,100) !!}</p>
                                            </span>
                                          </div>
                                          <!-- /.contacts-list-info -->
                                        </a>
                                        <p>
                                             <a href="/products/{{$post->id}}/edit"><button class="btn btn-primary" ><i class="fa fa-edit text-white"></i> edit</button></a>
                                             <button class="btn btn-primary" onclick="
                                                            var result=confirm('are you sure you want to delete this draft?')
                                                            if(!result){
                                                                event.preventDefault();
                                                            }
                                                            else{
                                                              document.getElementById('<?php echo $post->id ?>').submit();
                                                            }
                                                            " > <i class="fa fa-trash-o text-white"></i> delete</button>
                                                             <a href="/publish/{{$post->id}}" role="button" class="btn btn-primary"><i class="fa fa-send"></i> Publish</a>
                                             <form class="pull-right hidden" method="POST" action="/products/{{$post->id}}" id="{{$post->id}}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button class="btn" onclick="
                                                            var result=confirm('are you sure you want to delete this draft?')
                                                            if(!result){
                                                                event.preventDefault();
                                                            }
                                                            "
                                                            
                                                            >
                                                                <i class="fa fa-trash-o text-primary"></i>
                                                            </button>
                                                          </form>
                                                         
                                            </p>
                                      </li>
                                      @endforeach
                
                                                  @else
                                                  <p>There no drafts yet</p>
                                                  @endif
                                  
                    </ul>
                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer clearfix no-border">
                              <a type="button" href="/posts/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add item</a>
                            </div>
                          </div>
                
            
            </div>
            <div class="col-md-6">
                
                    <div class="box box-primary">
                            <div class="box-header">
                              <h3 class="box-title text-center">Create a New Product</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              
                                    <div class="">
                                      <form role="form" method="post" action="/products" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="1" id="tog" name="toggler"/>
                                        <div class="form-group">
                                            <label class="control-label">Product Name</label>
                                            <input name="name" class="form-control" type="text" placeholder="e.g high breed tomatoes" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Product Description</label>
                                            <textarea name="desc" id="article-ckeditor" class="form-control" rows="8" placeholder="content" ></textarea>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label">Product Price</label>
                                          
                                        <div class="input-group">
                                          <span class="input-group-addon">$</span>
                                          <input name="price" type="text" class="form-control">
                                          <span class="input-group-addon">.00</span>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label">Product Variety</label>
                                        <select name="variety" class="form-control select2" style="width: 100%;">
                                          <option selected="selected">select variety</option>

                                          @if (count($varieties)>0)

                                          @foreach ($varieties as $variety)
                                           <option>{{$variety->name}}</option>
                                          
                                              
                                          @endforeach
                                          @else
                                          
                                          <a href="/varietie">create variety</a>                                              
                                          @endif
                                         

                                        </select>    
                                    
                                    </div>





                                        <div class="form-group">
                                            <label class="control-label">Product Image</label>
                                            <input name="cover" type="file" required>
                                        </div>
                                        
                                        <div class="btn-toolbar">
                                            <div class="btn-group" role="group">
                                                <button onclick="document.getElementById('tog').value= 0" class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save </button>
                                                <button onclick="document.getElementById('tog').value= 1" class="btn btn-primary" type="Submit"><i class="fa fa-cloud-upload"></i> Post </button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                        </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix no-border">
                              
                            </div>
                          </div>
        </div>
    
</div>












  </div>
      

</div>
@endsection