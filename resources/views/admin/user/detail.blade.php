@extends('admin.layouts.main')
@section('title','User Detail')
@section('content')
<div class=" mt-3 card" >
    <div class="card-header">
        <h4>User Admin Detail</h4>
    </div>
    <div class="card-body row">
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="h5 col-md-2">Name:</span> {{$user->name}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Email:</span> {{$user->email}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Address:</span> {{$user->address}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Phone:</span> {{$user->phone}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Password:</span> {{$user->password}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Roles:</span></li>
            </ul>
            <div class="col-md-12 mt-3">
                @foreach($user->role as $key => $data)
                <p class="btn-sm btn-primary  float-left ml-4 ">{{ $data->label }}</p>
            @endforeach
            </div>
            
        </div>
        <div class="col-md-6">
            <img src="{{asset('imagesUser/'.$user->image)}}" style="width: 50%; margin-left: 25%;">
        </div>
        <a class="btn btn-secondary mt-3" href="{{route('user.index')}}">Back</a>  
    </div> 
</div> 
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection
