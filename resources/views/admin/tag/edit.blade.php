@extends('admin.layouts.main')
@section('title','Edit Tag')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4> Edit Tag</h4>
  	</div>
  	<div class="card-body">  
    {{ Form::open(['route'=>['tag.update',$tag->id],'method'=>'put','enctype '=>'multipart/form-data']) }}
        <div class="form-group row">
        	<div class="col-md-12">
        		{{ Form::label('Name: ','',['class' => 'font-weight-bold']) }}
	            {{ Form::text('name', $tag->name, ['class' => 'form-control' ]) }}
	            <span class="text-danger">{{ $errors->first('name')}}</span>
        	</div> 
        </div>
        {{ Form::submit('Update',['class' => 'btn btn-success mt-3']) }}
        <a class="btn btn-secondary mt-3" href="{{route('tag.index')}}">Back</a>
    {{ Form::close() }} 
    </div> 
</div>
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection