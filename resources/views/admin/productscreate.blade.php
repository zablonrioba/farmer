@extends('layouts.dashboard')

@section('content')
<section class="content-header">
    <h1>
     Product Create
    </h1>
    <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Product Create</li>
    </ol>
  </section>
  <br>
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title text-center">Create new Product</h3>
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
        {{-- delete function startts here --}}
       
        {{-- delete function ends here --}}
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                  
                </div>
            </div>
        </div>
  </div>

  @endsection