@extends('admin.layouts.main')
@section('title','Create User')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4> Create User Admin Client</h4>
  	</div>
  	<div class="card-body">
    {{ Form::open(['url' => 'admin/userclient', 'method' => 'post','enctype '=>'multipart/form-data']) }}
     
        <div class="form-group row">
        	<div class="col-md-6">
                {{ Form::label('Name: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('name', null, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('name')}}</span>
            </div>
            <div class="col-md-6">
                {{ Form::label('Password: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('password', null, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('password')}}</span>
            </div> 
            <div class="col-md-6">
                {{ Form::label('Address: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('address', null, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('address')}}</span>
            </div>
            <div class="col-md-6">
                {{ Form::label('Email: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('email', null, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('email')}}</span>
            </div> 
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                {{ Form::label('Image:') }} <br/>
                {{ Form::file('image',['class' => 'form-control', 'id' => 'filename']) }}
                <br>
                <span class="text-danger">{{ $errors->first('image')}}</span>
            </div>
           <div class="col-md-6">
                {{ Form::label('Phone: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('phone', null, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('phone')}}</span>
            </div>
        </div>

        {{ Form::submit('Save',['class' => 'btn btn-success mt-3 saveabout']) }}
        <a class="btn btn-secondary mt-3" href="{{route('userclient.index')}}">Back</a>
    {{ Form::close() }} 
    </div> 
</div>
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection
