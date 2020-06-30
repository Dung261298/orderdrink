@extends('admin.layouts.main')
@section('title','About Detail')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4>About Detail</h4>
  	</div>
  	<div class="card-body row">
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="h5 col-md-2">Title:</span> {{$about->title}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Name:</span> {{$about->name}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Phone:</span> {{$about->phone}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Email:</span> {{$about->email}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Address:</span> {{$about->address}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Time Open:</span> {{$about->timeopen}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Time Close:</span> {{$about->timeclose}}</li>
            </ul>
        </div>
        <div class="col-md-6">
            <img src="{{asset('images/'.$about->logo)}}" style="width: 50%; margin-left: 25%;">
            <p class="mt-4"><span class="h5">Content: </span>{{$about->content}}</p>
        </div>  
    </div> 
</div> 
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection
