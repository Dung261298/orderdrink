@extends('admin.layouts.main')
@section('title','Brand Detail')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4>Brand Detail</h4>
  	</div>
  	<div class="card-body row">
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="h5 col-md-2">Name:</span> {{$brand->name}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Phone no:</span> {{$brand->phone_no}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Address:</span> {{$brand->address}}</li>
            </ul>
            <a class="btn btn-secondary mt-3" href="{{route('brand.index')}}">Back</a>
        </div>
        <div class="col-md-6">
            <img src="{{asset('imagesBrand/'.$brand->logo)}}" style="width: 50%; margin-left: 25%;">
        </div>  
    </div> 
</div> 
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection
