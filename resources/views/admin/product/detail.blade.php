@extends('admin.layouts.main')
@section('title','Product Detail')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4>Product Detail</h4>
  	</div>
  	<div class="card-body row">
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="h5 col-md-2">Product code:</span> {{$product->product_code}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Name:</span> {{$product->name}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Description:</span> {{$product->description}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Display:</span> {{$product->isdisplay}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Promotion:</span> {{$product->promotion}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Quantity:</span> {{$product->quantity}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Category:</span> {{$product->category->name}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Brand:</span> {{$product->brand->name}}</li>
                <li class="list-group-item"><span class="h5 col-md-2">Tags:</span></li>
            </ul>
            <div class="col-md-12 mt-3">
                @foreach($product->tag as $key => $data)
                    <p class="btn-sm btn-primary  float-left ml-4 ">{{ $data->name }}</p>
                @endforeach
            </div>
            
        </div>
        <div class="col-md-6">
            <img src="{{asset('imagesProduct/'.$product->image)}}" style="width: 50%; margin-left: 25%;">
        </div>
        <a class="btn btn-secondary mt-3" href="{{route('product.index')}}">Back</a>  
    </div> 
</div> 
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection
