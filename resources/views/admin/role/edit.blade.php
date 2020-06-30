@extends('admin.layouts.main')
@section('title','Edit Role')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4> Edit Role</h4>
  	</div>
  	<div class="card-body">  
    {{ Form::open(['route'=>['role.update',$role->id],'method'=>'put','enctype '=>'multipart/form-data']) }}
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Name: ','',['class' => 'font-weight-bold']) }}
	            {{ Form::text('name', $role->name, ['class' => 'form-control' ]) }}
	            <span class="text-danger">{{ $errors->first('name')}}</span>
        	</div> 
            <div class="col-md-6">
                {{ Form::label('label: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('label', $role->label, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('label')}}</span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                {{ Form::label('Permission: ','',['class' => 'font-weight-bold']) }}
                {!! Form::select('permissions[]', $permissions, $role->permission,[
                    'class' => 'form-control roles','multiple'=>'multiple'
                ])
                !!}
            </div>
        </div>        
        {{ Form::submit('Update',['class' => 'btn btn-success mt-3 saveabout']) }}
        <a class="btn btn-secondary mt-3" href="{{route('role.index')}}">Back</a>
    {{ Form::close() }} 
    </div> 
</div>
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection