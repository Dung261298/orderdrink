@extends('admin.layouts.main')
@section('title','Product Detail')
@section('content')
<h2 style="width: 100%">Product Detail listings </h2>
<a href="{{route('product_detail.create')}}" type="button" class="btn btn-primary">Add new</a>
@if(Session::has('message'))
<div id="mydiv" style="position:absolute; right: 10px; top: 10px;" class="float-right mt-2 alert alert-success alert-dismissible fade show" role="alert" style="position: absolute;">
	<strong>{{ Session::get('message') }}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@elseif(Session::has('err'))
<div id="mydiv" style="position:absolute; right: 10px; top: 100px;" class="float-right mt-2 alert alert-success alert-dismissible fade show" role="alert" style="position: absolute;">
	<strong>{{ Session::get('err') }}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
<div class="card mt-4">
	<div class=" card-header ">
		<div class="row">
			<div class="col-md-6 ">
				<h3>List</h3>
			</div>
			
		</div>
	</div>
	<table class="table table-hover card-body" >
		<thead>
			<tr>
				<th>STT</th>
				<th>Product</th>
				<th>Size</th>
				<th>Price(VND)</th>
				<th width="100">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($product_details as $key => $data)
			<tr>
				<td>{{++$key}}</td>
				<td>{{$data->product->name}}</td> 
				<td>{{$data->size}}</td> 
				<td> {{number_format($data->price)}}</td>
				<td width="120">
					<a type="button" class="fas fa-trash-alt deletebutton text-danger btn" data-id="{{$data->id}}" data-toggle="modal" data-target="#Modal" >
					</a>
					<a href="{{route('product_detail.edit',$data->id)}}"><i class="far fa-edit"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

{{Form::open(['route' => ['productdetail_delete'], 'method' => 'DELETE'])}}  
@include('admin.modal.modaldelete')
{{ Form::close() }}
<script>
	$(document).on('click','.deletebutton',function(){
		var id=$(this).attr('data-id');
		$('#id').val(id);
	});
</script>
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection