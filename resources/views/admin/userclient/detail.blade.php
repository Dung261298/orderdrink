@extends('admin.layouts.main')
@section('title','User Client Detail')
@section('content')
<div class=" mt-3 card" >
    <div class="card-header">
        <h4>User Client Detail</h4>
    </div>
    <div class="card-body row">
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="h5 col-md-2">Name:</span> {{$user->name}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Email:</span> {{$user->email}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Address:</span> {{$user->address}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Phone:</span> {{$user->phone}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Password:</span> {{$user->password}}</li>
            </ul>
            
        </div>
        <div class="col-md-6">
            <img src="{{asset('imagesUserClient/'.$user->image)}}" style="width: 50%; margin-left: 25%;">
        </div>
        <a class="btn btn-secondary mt-3" href="{{route('userclient.index')}}">Back</a>  
    </div> 
</div> 
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection
