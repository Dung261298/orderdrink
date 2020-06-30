@extends('client.layouts.main')
@section('title','Register Client')
@section('content')
<div class="container">
	<div class="row mt-5">
		<div class="col-md-6 order-md-2 mb-4" style="margin: 0 auto;">
			<h4 class="mb-3">Register user</h4>
			<form class="needs-validation" novalidate="">
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="firstName">First name</label>
						<input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-6 mb-3">
						<label for="lastName">Last name</label>
						<input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
						<div class="invalid-feedback">
							Valid last name is required.
						</div>
					</div>
				</div>

				<div class="mb-3">
					<label for="username">Username</label>
					<div class="input-group">
						<input type="text" class="form-control" id="username" placeholder="Username" required="">
						<div class="invalid-feedback" style="width: 100%;">
							Your username is required.
						</div>
					</div>
				</div>

				<div class="mb-3">
					<label for="email">Email <span class="text-muted">(Optional)</span></label>
					<input type="email" class="form-control" id="email" placeholder="you@example.com">
					<div class="invalid-feedback">
						Please enter a valid email address for shipping updates.
					</div>
				</div>

				<div class="mb-3">
					<label for="address">Address</label>
					<input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
					<div class="invalid-feedback">
						Please enter your shipping address.
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="cc-name">Phone number</label>
						<input type="text" class="form-control" id="cc-name" placeholder="" required="">
						<div class="invalid-feedback">
							Name on card is required
						</div>
					</div>
					<div class="col-md-6 mb-3">
						<label for="cc-number">Credit card number</label>
						<input type="text" class="form-control" id="cc-number" placeholder="" required="">
						<div class="invalid-feedback">
							Credit card number is required
						</div>
					</div>
				</div>
				<hr class="mb-4">
				<button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Register</button>
			</form>

	</div>
</div>
@endsection
@section('scriptClient')
@include('client.shared.scriptClient')
@endsection