@extends('admin.layouts.main')
@section('title','Edit User')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4> Edit Admin User</h4>
  	</div>
  	<div class="card-body">  
    {{ Form::open(['route'=>['user.update',$user->id],'method'=>'put','enctype '=>'multipart/form-data']) }}
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Name: ','',['class' => 'font-weight-bold']) }}
	            {{ Form::text('name', $user->name, ['class' => 'form-control' ]) }}
	            <span class="text-danger">{{ $errors->first('name')}}</span>
        	</div> 
            <div class="col-md-6">
                {{ Form::label('Email: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('email', $user->email, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('name')}}</span>
            </div>
            <div class="col-md-6">
                {{ Form::label('Password: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('password', $user->password, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('name')}}</span>
            </div>
            <div class="col-md-6">
                {{ Form::label('Address: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('address', $user->address, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('name')}}</span>
            </div> 
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                {{ Form::label('Logo: ','',['class' => 'font-weight-bold']) }}
                {{ Form::file('logo', null, ['class' => 'form-control' ]) }}
                <input type="hidden" value="{{$user->image}}" name="image"><br>
                <span class="text-danger">{{ $errors->first('image')}}</span>
            </div>
            <div class="col-md-6">
                {{ Form::label('Phone: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('phone', $user->phone, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('phone')}}</span>
            </div>
            <div class="col-md-6">
                {{ Form::label('Roles: ','',['class' => 'font-weight-bold']) }}
                {!! Form::select('roles[]', $roles, $user->role,[
                    'class' => 'form-control roles','multiple'=>'multiple','id'=>'roles'
                ])
                !!}
            </div>
        </div>        
        {{ Form::submit('Update',['class' => 'btn btn-success mt-3 saveabout']) }}
        <a class="btn btn-secondary mt-3" href="{{route('user.index')}}">Back</a>
    {{ Form::close() }} 
    </div> 
</div>
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection