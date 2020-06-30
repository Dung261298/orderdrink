@extends('admin.layouts.main')
@section('title','Edit Product')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4> Edit Product</h4>
  	</div>
  	<div class="card-body">  
    {{ Form::open(['route'=>['product.update',$product->id],'method'=>'put','enctype '=>'multipart/form-data']) }}
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Name: ','',['class' => 'font-weight-bold']) }}
	            {{ Form::text('name', $product->name, ['class' => 'form-control' ]) }}
	            <span class="text-danger">{{ $errors->first('name')}}</span>
        	</div> 
            <div class="col-md-2">
                {{ Form::label('Promotion: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('promotion',$product->promotion, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('promotion')}}</span>
            </div>
            <div class="col-md-2">
                {{ Form::label('Quantity: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('quantity', $product->quantity, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('quantity')}}</span>
            </div>
            <div class="col-md-2">
                {{ Form::label('Display(True/False): ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('isdisplay', $product->isdisplay, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('isdisplay')}}</span>
            </div> 
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                {{ Form::label('Category: ','',['class' => 'font-weight-bold']) }}
                {{Form::select('category_id',$category,$product->category_id,['class' => " form-control"])}}
                <span class="text-danger">{{ $errors->first('category_id')}}</span>
            </div>
            <div class="col-md-6">
                {{ Form::label('Brand: ','',['class' => 'font-weight-bold']) }}
                {{Form::select('brand_id',$brand,$product->brand_id,['class' => " form-control"])}}
                <span class="text-danger">{{ $errors->first('brand_id')}}</span>
            </div>
        </div>
        <div class="form-group row">
        	<div class="col-md-6">
        		{{ Form::label('Logo: ','',['class' => 'font-weight-bold']) }}
            	{{ Form::file('logo', null, ['class' => 'form-control' ]) }}
            	<input type="hidden" value="{{$product->image}}" name="image"><br>
            	<span class="text-danger">{{ $errors->first('image')}}</span>
        	</div>
        	<div class="col-md-6">
                {{ Form::label('Description: ','',['class' => 'font-weight-bold']) }}
                {{ Form::textarea('description', $product->description, ['class' => 'form-control' ,'rows'=>'4' ]) }}
                <span class="text-danger">{{ $errors->first('description')}} </span>
            </div>
            <div class="col-md-6">
                {{ Form::label('Tags: ','',['class' => 'font-weight-bold']) }}
                {!! Form::select('tags[]', $tags, $product->tag,[
                    'class' => 'form-control roles','multiple'=>'multiple','id'=>'roles'
                ])
                !!}
            </div>
            <input type="hidden" value="{{$product->product_code}}" name="product_code" hidden> 
        </div>
        {{ Form::submit('Update',['class' => 'btn btn-success mt-3 saveabout']) }}
        <a class="btn btn-secondary mt-3" href="{{route('product.index')}}">Back</a>
    {{ Form::close() }} 
    </div> 
</div>
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection