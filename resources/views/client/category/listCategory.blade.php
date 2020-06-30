<div class="card">
	<div class="card-header">
		Categories
	</div>
	<div class="card-body">
		@foreach($categorys as $data)
		 <a class="btn btn-info btn-sm" href="category/{{$data->id}}" style="color: black;text-decoration: none;">{{$data->name}}</a>
		@endforeach
	</div>
</div>