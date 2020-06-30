@extends('admin.layouts.main')
@section('title','Edit Brand')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4> Edit Brand</h4>
  	</div>
  	<div class="card-body">  
    {{ Form::open(['route'=>['brand.update',$brand->id],'method'=>'put','enctype '=>'multipart/form-data']) }}
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Name: ','',['class' => 'font-weight-bold']) }}
	            {{ Form::text('name', $brand->name, ['class' => 'form-control' ]) }}
	            <span class="text-danger">{{ $errors->first('name')}}</span>
        	</div> 
            <div class="col-md-6">
                {{ Form::label('Phone: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('phone', $brand->phone_no, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('phone')}}</span>
            </div>
        </div>
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Logo: ','',['class' => 'font-weight-bold']) }}
            	{{ Form::file('logo', null, ['class' => 'form-control' ]) }}
            	<input type="hidden" value="{{$brand->logo}}" name="image"><br>
            	<span class="text-danger">{{ $errors->first('logo')}}</span>
        	</div>
        	<div class="col-md-6">
        		{{ Form::label('Address: ','',['class' => 'font-weight-bold']) }}
	            {{ Form::text('address', $brand->address, ['class' => 'form-control' ]) }}
	            <span class="text-danger">{{ $errors->first('address')}}</span>
        	</div> 
        </div>
        {{ Form::submit('Update',['class' => 'btn btn-success mt-3 saveabout']) }}
        <a class="btn btn-secondary mt-3" href="{{route('brand.index')}}">Back</a>
    {{ Form::close() }} 
    </div> 
</div>
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection