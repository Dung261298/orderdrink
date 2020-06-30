@extends('client.layouts.main')
@section('title','Home Client')
@section('content')
<div class="container-fluid"> 
	<div class="py-5 bg-light">
		@if(session('success'))
		<div class="alert alert-success notification">
			{{ session('success') }}
		</div>
		@elseif(Session::has('err')) 
		<div class="alert alert-danger notification">
			{{ session('err') }}
		</div>
		@endif
		@include("client.product.listProduct")
	</div>
</div> 

@endsection
@section('scriptClient')
@include('client.shared.scriptClient')
@endsection
