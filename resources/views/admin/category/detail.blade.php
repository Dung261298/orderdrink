@extends('admin.layouts.main')
@section('title','Category Detail')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4>Category Detail</h4>
  	</div>
  	<div class="card-body row">
        <div class="col-md-12">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="h5 col-md-2">Name:</span> {{$category->name}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Description:</span> {{$category->description}}</li>
            </ul>
            <a class="btn btn-secondary mt-3" href="{{route('category.index')}}">Back</a>
        </div>
    </div> 
</div> 
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection
