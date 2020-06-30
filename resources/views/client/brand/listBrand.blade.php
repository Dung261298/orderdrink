<div class="card mt-5">
	<div class="card-header">
		Brands
	</div>
	<div class="card-body">
		@foreach($brands as $data)
		 <a class="btn btn-success btn-sm" href="brand/{{$data->id}}" style="color: black;text-decoration: none;">{{$data->name}}</a>
			
		@endforeach
	</div>
</div>