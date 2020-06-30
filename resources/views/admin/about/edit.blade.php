@extends('admin.layouts.main')
@section('title','Edit About')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4> Edit About</h4>
  	</div>
  	<div class="card-body">  
    {{ Form::open(['route'=>['about.update',$about->id],'method'=>'put','enctype '=>'multipart/form-data']) }}
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Title: ','',['class' => 'font-weight-bold']) }}
            	{{ Form::text('title', $about->title, ['class' => 'form-control' ]) }}
            	<span class="text-danger">{{ $errors->first('title')}}</span>
        	</div>
        	<div class="col-md-6">
        		{{ Form::label('Name: ','',['class' => 'font-weight-bold']) }}
	            {{ Form::text('name', $about->name, ['class' => 'form-control' ]) }}
	            <span class="text-danger">{{ $errors->first('name')}}</span>
        	</div> 
        </div>
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Phone: ','',['class' => 'font-weight-bold']) }}
            	{{ Form::text('phone', $about->phone, ['class' => 'form-control' ]) }}
            	<span class="text-danger">{{ $errors->first('phone')}}</span>
        	</div>
        	<div class="col-md-6">
        		{{ Form::label('Email: ','',['class' => 'font-weight-bold']) }}
	            {{ Form::text('email', $about->email, ['class' => 'form-control' ]) }}
	            <span class="text-danger">{{ $errors->first('email')}}</span>
        	</div> 
        </div>
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Logo: ','',['class' => 'font-weight-bold']) }}
            	{{ Form::file('logo', null, ['class' => 'form-control' ]) }}
            	<input type="hidden" value="{{$about->logo}}" name="image"><br>
            	<span class="text-danger">{{ $errors->first('logo')}}</span>
        	</div>
        	<div class="col-md-6">
        		{{ Form::label('Address: ','',['class' => 'font-weight-bold']) }}
	            {{ Form::text('address', $about->address, ['class' => 'form-control' ]) }}
	            <span class="text-danger">{{ $errors->first('address')}}</span>
        	</div> 
        </div>
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Content: ','',['class' => 'font-weight-bold']) }}
	            {{ Form::textarea('content', $about->content, ['class' => 'form-control' ,'rows'=>'4' ]) }}
	            <span class="text-danger">{{ $errors->first('content')}} </span>
        	</div>
        	<div class="col-md-6">
        		{{ Form::label('Time Open: ','',['class' => 'font-weight-bold']) }} 
	            {{ Form::time('timeopen', $about->timeopen, ['class' => 'form-control','id'=>'timeopen' ]) }}
	            <span class="text-danger">{{ $errors->first('timeopen')}}</span>
	            {{ Form::label('Time Close: ','',['class' => 'font-weight-bold']) }}
	            {{ Form::time('timeclose', $about->timeclose, ['class' => 'form-control','id'=>'timeclose' ]) }}
	            <span class="text-danger timeerr">{{ $errors->first('timopen')}}</span>
        	</div> 
        </div> 
        {{ Form::submit('Update',['class' => 'btn btn-success mt-3 saveabout']) }}
        <a class="btn btn-secondary mt-3" href="{{route('about.index')}}">Back</a>
    {{ Form::close() }} 
    </div> 
</div>
<script>
	$(".saveabout").click(function(){
		var timeopen = $("#timeopen").val();
		var timeclose = $("#timeclose").val();
		if (timeclose > timeopen ) {
			return true;	
		}else{
			$(".timeerr").html("Time Close must be greater than Time Open.");
			return false;
		}
	});
</script>
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection