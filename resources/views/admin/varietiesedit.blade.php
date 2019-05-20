@extends('layouts.dashboard')

@section('content')
<section class="content-header">
    <h1>
     Varieties Edit
    </h1>
    <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Varieties Edit</li>
    </ol>
  </section>
  <br>
  <div class="margin">
        <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h3>Edit This Variety</h3>
                    <form role="form" method="post" action="/varieties/{{$category->id}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT"/>
                        <div class="form-group">
                            <label class="control-label">Variety Name </label>
                        <input class="form-control" type="text" name="name" value="{{$category->name}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Variety Status</label>
                        <input class="form-control" type="text" name="status" value="{{$category->status}}" readonly="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Variety Description</label>
                        <textarea class="form-control" id="article-ckeditor" name="desc">{{$category->description}}</textarea>
                        </div>
                        <button class="btn btn-primary" role="button" type="submit">Update</button>
                    </form>
                </div>
            </div>
  </div>
  @endsection