@extends('admin.layouts.main')
@section('title','Create Category')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4> Create Category</h4>
  	</div>
  	<div class="card-body">
    {{ Form::open(['url' => 'admin/category', 'method' => 'post','enctype '=>'multipart/form-data']) }} 
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Name: ','',['class' => 'font-weight-bold']) }}
	            {{ Form::text('name', null, ['class' => 'form-control' ]) }}
	            <span class="text-danger">{{ $errors->first('name')}}</span>
        	</div>
            <div class="col-md-6">
                {{ Form::label('Description: ','',['class' => 'font-weight-bold']) }}
                {{ Form::textarea('description', null, ['class' => 'form-control','rows'=>'4'  ]) }}
                <span class="text-danger">{{ $errors->first('description')}} </span>
            </div>
        </div>
        <div class="form-group">
            {{ Form::submit('Save',['class' => 'btn btn-success mt-3 saveabout']) }}
            <a class="btn btn-secondary mt-3" href="{{route('category.index')}}">Back</a>
        </div>
    {{ Form::close() }} 
    </div> 
</div>
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection
