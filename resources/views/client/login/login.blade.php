@extends('client.layouts.main')
@section('title','Login Client')
@section('content')
<div class="container">
	<div class="row mt-4">
		<div class="col-md-6 order-md-1" style="margin: 0 auto;">
			<h4 class="mb-3">Login user</h4>
			<form class="needs-validation" method="POST" action="{{url('loginclient')}}">
				@csrf
				<div class="mb-3">
					<label for="username">Email</label>
					<div class="input-group">
						<input type="text" class="form-control" name="email" id="username" placeholder="Email" required="">
						<div class="invalid-feedback" style="width: 100%;">
							Your username is required.
						</div>
					</div>
				</div>
				<div class="mb-3">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="address" placeholder="****" required="">
				</div>
				@if (Session::has('err'))
						<span class="invalid-feedback text-danger"><strong>{{ Session::get('err')}}</strong></span>
						@endif
				<hr class="mb-4">
				<div class="row">
					<div class="col-md-6">
					<button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Login</button>
				</div>
				<div class="col-md-6">
						<a class="btn btn-primary btn-lg btn-block mb-5" href="{{route('registerClient.index')}}">Register</a>

					</div>
			</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('scriptClient')
@include('client.shared.scriptClient')
@endsection
