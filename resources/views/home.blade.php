@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper" style="min-height: 611px;margin-left:0px">

      <!-- content loaded here -->
          
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <br>
        
        <div class="" style="padding:15px;">
                <div class="box box-primary">
                        <div class="box-body">
                          <div class="alert text-center" style="background:rgb(36,40,43); opacity:0.9; color:#b8c7ce">
        
                            <span>Holla admin, Here You Administrate</span>&nbsp;
                            <span><a class="btn btn-primary" href="/products" style="text-decoration:none">Create A  New Product</a></span>
        
                          </div>
                        </div>


                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Users</span>
                          <span class="info-box-number">
                           {{count($users)}}
                          </span>

                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Orders</span>
                          <span class="info-box-number">
                            {{count($orders)}}
                          </span>

                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-tags"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Varieties</span>
                          <span class="info-box-number">
                            {{count($varieties)}}
                          </span>

                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-tasks"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Products</span>
                        <span class="info-box-number">{{count($products)}}</span>

                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                  </div>

                </div>
                <div>
  <div class="containe" style="padding:15px;">
      <div class="row">
          <div class="col-md-6">
          
          <div class="box box-primary">
            <div class="box-header">Users</div>
          <div class="box-body" style="height:200px; overflow-y:auto; color:white; background:#222d32">
          <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                <tr>
                 
                  <th>Email</th>
                  <th>Role</th>

                  <th>Joined</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                                                 
                    @if (count($users)>0)
                    @foreach ($users as $user)
                    <tr>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td><span class="label label-success">{{$user->created_at}}</span></td>
                          <td>
                          <a href="mailto:{{$user->email}}" class="btn btn-primary btn-sm"><span class="fa fa-send"></span> Mail</a>
                          </td>
                        </tr>
                        
                    @endforeach

                   
                          @else
                    <p>There no users yet</p>
                    @endif

                  
                   
                 
                        
                                                                                                                                                   
                
                </tbody>
              </table>
            </div>
</div>
</div>
          </div>
          <div class="col-md-6"> <div class="box box-primary">
            <div class="box-header">Orders</div>
          <div class="box-body" style="height:200px; overflow-y:auto; color:white; background:#222d32">
          <ul class="contacts-list">
            @if (count($orders)>0)
            @foreach ($orders as $order)
            <li>
                <a href="#">
                  <img class="contacts-list-img" src="/storage/app_images/avatar04.png" alt="User Image">

                  <div class="contacts-list-info">
                        <span class="contacts-list-name">
                          {{$order->username}}
                        <small class="contacts-list-date pull-right">{{$order->created_at}}</small>
                        </span>
                      <span class="contacts-list-msg">{{$order->product_name}}</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
                
            @endforeach
            @else
            <p>There are no orders yet...create some</p>
                
            @endif
                                
                                    
              </ul>
</div>
</div></div>
      </div>
      <div class="row">
          <div class="col-md-6"> <div class="box box-primary">
            <div class="box-header">Varieties</div>
          <div class="box-body" style="height:200px; overflow-y:auto; color:white; background:#222d32">
          <ul class="contacts-list">
            @if (count($varieties)>0)
            <?php $num=1?>
            @foreach ($varieties as $variety)
            <li>
                <a href="#">
                
        
              
                  <div class="contacts-list-info">
                        <span class="contacts-list-name">
                            
                          {{$num}}. {{$variety->name}}
                        <small class="contacts-list-date pull-right">{{$variety->created_at}}</small>
                        </span>
                    
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
              <?php $num++ ?>
                
            @endforeach

            @else

                <p>there no varieties yet...create some</p>
            @endif
      
                              
      
                              
     
      
      
                  <!-- End Contact Item -->
      </ul>
</div>
</div></div>
          <div class="col-md-6"> <div class="box box-primary">
            <div class="box-header">Products</div>
          <div class="box-body" style="height:200px; overflow-y:auto; color:white; background:#222d32">
          <ul class="contacts-list">
            @if (count($products)>0 )

            @foreach ($products as $product)
            <li>
                <a href="/products">
                <img class="contacts-list-img" style="border-radius:5%" src="/storage/app_images/{{$product->image}}" alt="User Image">

                  <div class="contacts-list-info">
                        <span class="contacts-list-name">
                          {{$product->name}}
                        <small class="contacts-list-date pull-right">{{$product->created_at}}</small>
                        </span>
                      <span class="contacts-list-msg"><p>{{$product->variety}}</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
                
            @endforeach
                
            @else
            <p>there are no proucts yet...create some</p>
                
            @endif
                        
                                    
              </ul>
</div>
</div></div>
      </div>
  </div>
</div>
  </div>
</div>













</div>
        </div>
</div>
                       
@endsection
