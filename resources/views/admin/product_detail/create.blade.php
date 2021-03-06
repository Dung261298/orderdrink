@extends('admin.layouts.main')
@section('title','Create Product detail')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4> Create Product detail</h4>
  	</div>
  	<div class="card-body">
    {{ Form::open(['url' => 'admin/product_detail', 'method' => 'post','enctype '=>'multipart/form-data']) }} 
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Product: ','',['class' => 'font-weight-bold']) }}
                {{Form::select('product_id',$product,null,['class' => " form-control",'placeholder'=>'Select Product'])}}
                <span class="text-danger">{{ $errors->first('product_id')}}</span>
        	</div>
            <div class="col-md-3">
                {{ Form::label('Size: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('size', null, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('size')}}</span>
            </div> 
            <div class="col-md-3">
                {{ Form::label('Price: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('price', null, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('price')}}</span>
            </div> 
        </div>
        {{ Form::submit('Save',['class' => 'btn btn-success mt-3 saveabout']) }}
        <a class="btn btn-secondary mt-3" href="{{route('product_detail.index')}}">Back</a>
    {{ Form::close() }} 
    </div> 
</div>
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection
