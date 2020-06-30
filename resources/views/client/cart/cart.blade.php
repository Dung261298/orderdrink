@extends('client.layouts.main')
@section('title','Cart Product')
@section('content')
<div class="container">
	<div class="my-3 p-3 bg-white">
		@if(session('success'))
		<div class="alert alert-success notification">
			{{ session('success') }}
		</div>
		@elseif(Session::has('err')) 
		<div class="alert alert-danger notification">
			{{ session('err') }}
		</div>
		@endif
		<h3 class="border-bottom border-gray pb-2 mb-0">Cart</h3>  
		<div style="overflow-x: auto;">
		<?php $total = 0 ?>
		@if(session('cart'))
		@foreach(session('cart') as $id => $details)
		<?php $total += $details['price'] * $details['quantity'] ?>
		<div class=" row col-md-12 border-bottom border-gray mt-2">
			<div class="col-2 col-md-1">
				<img src="{{asset('imagesProduct/'.$details['image'])}}"   style="width: 100%;">
			</div> 
			<div class="col-2 col-md-4"> 
				<strong class="text-gray-dark">{{$details['name']}}</strong> 
				<p>Size: <kbd class="bg-danger">{{strtoupper($details['size'])}}</kbd>
					Price: {{$details['price']}}
				<kbd class="bg-danger">VNĐ</kbd></p>
			</div>
			<div class="col-3 col-md-2 mt-2">  
				<input type="number" name="quantity[]" min="1" max="30" value="{{$details['quantity']}}" class="text-center form-control col-12 col-sm-12 col-md-8"  id="product_quantity{{$details['id']}}"> 
			</div>
			<div class="col-2 col-md-2 mt-3"> 
				<b>Total: {{$details['price'] * $details['quantity']}} <kbd class="bg-danger">VNĐ</kbd></p></b>
			</div>
			<div class="col-2 text-right"> 
				<button class="btn btn-danger btn-sm remove-from-cart" value="{{$details['id']}}" data-toggle="modal" data-target="#exampleModal" style="height: 33px;width: 33px; margin-right: 5px;">X</button> 
			</div>  
		</div> 
		@endforeach 
		</div>
	<small class="d-block text-left mt-3">
		<button type="button" class="btn btn-outline-secondary">Payment</button>
		<button type="button" class="btn btn-outline-secondary">
Online payment</button>
	</small>
	@else 
	<p>Cart is empty!</p>
	@endif
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel">Delete product form cart!</h4>
			</button>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-danger delete">Delete</button>
		</div>
	</div>
</div>
</div>
<script>
	$(".remove-from-cart").click(function (e) {
		var id = $(this).val();
		$(".delete").click(function(){
			$.ajax({
				url: '{{ url('remove-from-cart') }}',
				method: "DELETE",
				data: {_token: '{{ csrf_token() }}', id: id},
				success: function (response) {
					window.location.reload();
				}
			});
		});
	});
	$(".update-cart").click(function (e) { 
		var id = $(this).val();
		var quantity = $("#product_quantity"+id).val();
		$.ajax({
			url: '{{ url('update-cart') }}',
			method: "patch",
			data: {_token: '{{ csrf_token() }}', id: id, quantity: quantity},
			success: function (response) {
				window.location.reload();
			}
		});
	});
</script>
@endsection
@section('scriptClient')
@include('client.shared.scriptClient')
@endsection
