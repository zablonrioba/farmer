@extends('layouts.dashboard')

@section('content')
<section class="content-header">
    <h1>
     Product Edit
    </h1>
    <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Product Edit</li>
    </ol>
  </section>
  <br>
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title text-center">Edit This Product</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  
                        <div class="">
                        <form role="form" method="post" action="/products/{{$product->id}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT"/>
                                    <div class="form-group">
                                            <label class="control-label">Product Image</label>
                                    <img class="img-responsive" src="/storage/app_images/{{$product->image}}" style="height:200px"><br>
                                             
                                                    <div class="btn btn-primary btn-file">
                                                      <i class="fa fa-pencil"></i> Change Image
                                                      <input type="file" name="cover">
                                                    </div>
                                                  
                                    
                                        </div>
                                    <div class="form-group">
                                            <label class="control-label" for="user_id">Product id</label>
                                    <input class="form-control" type="text" readonly="" name="product_id" value="#0{{$product->id}}">
                                        </div>
                                    <div class="form-group">
                                        <label class="control-label">Product name</label>
                                    <input name="name" class="form-control" value="{{$product->name}}" type="text" placeholder="e.g Best Photoshoot techniques" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">product Description</label>
                                    <textarea name="desc" id="article-ckeditor" class="form-control" rows="8" placeholder="content" >{{$product->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">Product Price</label>
                                            
                                          <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                          <input name="price" type="text" class="form-control" value="{{$product->price}}">
                                            <span class="input-group-addon">.00</span>
                                          </div>
                                        </div>
  
                                        <div class="form-group">
                                          <label class="control-label">Product Variety</label>
                                          <select name="variety" class="form-control select2" style="width: 100%;">
                                          
                                            @if (count($varieties)>0)

                                          @foreach ($varieties as $variety)
                                          
                                           
                                          @if ($variety->name==$product->variety)
                                          <option selected="selected">{{$variety->name}}</option>
                                          @else
                                          <option>{{$variety->name}}</option>
                                          @endif
                                              
                                          @endforeach
                                          @else
                                          
                                          <a href="/varietie">create variety</a>                                              
                                          @endif
                                         
                                          </select>    
                                      
                                      </div>
                                  
                                    
                                    <div class="btn-toolbar">
                                        <div class="btn-group" role="group">
                                            <button onclick="
                                            var result=confirm('Are you sure you want to delete this Post?');
                                            if( result ){
                                                event.preventDefault();
                                                document.getElementById('del').submit();
                                            }
                                            " 
                                            class="btn btn-primary" type="button"><i class="fa fa-trash-o"></i> Delete </button>




                                            <button  class="btn btn-primary" type="Submit"><i class="fa fa-cloud-upload"></i> Update </button>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
        {{-- delete function startts here --}}
        <form id="del" class="pull-right" method="POST" action="/products/{{$product->id}} " style="display:none">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            
            
          </form>
        {{-- delete function ends here --}}
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                  
                </div>
            </div>
        </div>
  </div>

  @endsection