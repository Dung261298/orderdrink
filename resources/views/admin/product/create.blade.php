@extends('admin.layouts.main')
@section('title','Create Product')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4> Create Product</h4>
  	</div>
  	<div class="card-body">
    {{ Form::open(['url' => 'admin/product', 'method' => 'post','enctype '=>'multipart/form-data']) }} 
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Name: ','',['class' => 'font-weight-bold']) }}
	            {{ Form::text('name', null, ['class' => 'form-control' ]) }}
	            <span class="text-danger">{{ $errors->first('name')}}</span>
        	</div>
            <div class="col-md-3">
                {{ Form::label('Promotion: ','',['class' => 'font-weight-bold']) }}
                {{ Form::number('promotion', null, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('promotion')}}</span>
            </div> 
            <div class="col-md-3">
                {{ Form::label('Quantity: ','',['class' => 'font-weight-bold']) }}
                {{ Form::number('quantity', null, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('quantity')}}</span>
            </div> 
        </div>
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Category: ','',['class' => 'font-weight-bold']) }}
	            {{Form::select('category_id',$category,null,['class' => " form-control",'placeholder'=>'Select Category'])}}
	            <span class="text-danger">{{ $errors->first('category_id')}}</span>
        	</div>
            <div class="col-md-6">
                {{ Form::label('Brand: ','',['class' => 'font-weight-bold']) }}
                {{Form::select('brand_id',$brand,null,['class' => " form-control",'placeholder'=>'Select Category'])}}
                <span class="text-danger">{{ $errors->first('brand_id')}}</span>
            </div> 
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="image">
                  {{ Form::label('Image: ','',['class' => 'font-weight-bold']) }}
                </div>
                <div class="">
                  {{ Form::file('image', null, ['class' => 'form-control' ]) }}
                </div>
                <br>
                <span class="text-danger">{{ $errors->first('image')}}</span>
            </div>
            <div class="col-md-6">
                {{ Form::label('Description: ','',['class' => 'font-weight-bold']) }}
                {{ Form::textarea('description', null, ['class' => 'form-control' ,'rows'=>'4' ]) }}
                <span class="text-danger">{{ $errors->first('description')}} </span>
            </div>
            <div class="col-md-6">
                {{ Form::label('Tags: ','',['class' => 'font-weight-bold']) }}
                {{ Form::select('tags[]', $tags,null,[
                    'class' => 'form-control roles','multiple'=>'multiple','id'=>'roles'])
                }}
                <span class="text-danger">{{ $errors->first('tags')}} </span>
            </div> 
        </div>

        {{ Form::submit('Save',['class' => 'btn btn-success mt-3 saveabout']) }}
        <a class="btn btn-secondary mt-3" href="{{route('product.index')}}">Back</a>
    {{ Form::close() }} 
    </div> 
</div>
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection
