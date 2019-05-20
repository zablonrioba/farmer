@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper" style="min-height: 611px;margin-left:0px">

    <section class="content-header">
        <h1>
          Orders
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Orders</li>
        </ol>
      </section>
      <br>
      <div class="margin">
          
            <div class="row">
                <div class="col-md-6 col-md-offset-3 padding">
                        <div class="box box-primary">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Recent Orders</h3>
                
                                  <div class="box-tools pull-right">
                                 
                                   
                                  </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                                                                             
                                  <ul class="contacts-list">
                                    @if(count($orders) > 0)
                                     @foreach ($orders as $order)
                                     <li>
                                      
                                         
                                  
                        
                                          <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                  <p style="color:black; "> {{$order->product_name}}
                                                  <small class="contacts-list-date pull-right">{{$order->created_at}}</small>
                                                  </p>
                                                  
                                                </span>
                                            <span class="contacts-list-msg">
                                           
                                              <p>Ordered By: {{$order->username}}</p>
                                            </span>
                                          </div>
                                          <!-- /.contacts-list-info -->
                                       
                                      </li>
                                         
                                     @endforeach
                                        
                                    
                    
                  @else
                  <li>There Orders yet...create some</li>
                  @endif
                                       
                                      
                </ul>                
                                            
    
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer text-center">

                                       {{$orders->links()}}  
    
                                </div>
                                <!-- /.box-footer -->
                              </div>
                   
                
                </div>
</div>
@endsection