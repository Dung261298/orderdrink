@extends('admin.layouts.main')
@section('title','Role Detail')
@section('content')
<div class=" mt-3 card" >
    <div class="card-header">
        <h4>Role Detail</h4>
    </div>
    <div class="card-body row">
        <div class="col-md-12">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="h5 col-md-2">Name:</span> {{$role->name}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Label:</span> {{$role->label}}</li>           
                <li class="list-group-item">
                    <span class="h5 col-md-2">Permission:</span>
                </li>
            </ul>
            <div class="col-md-12 mt-3">
                @foreach($role->permission as $key => $data)
                <p class="btn-sm btn-primary float-left ml-4 ">{{ $data->label }}</p>
            @endforeach
            </div>
        </div>
        <a class="btn btn-secondary mt-3 " href="{{route('role.index')}}">Back</a> 
    </div> 
</div> 
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection
