@extends('client.layouts.main')
@section('title','Home Client')
@section('content')
<div class="container-fluid ">
	<div class="row">
		<div class="col-md-3 mt-4">
			@include("client.category.listCategory")
			@include("client.brand.listBrand")
		</div>
		<div class="col-md-9">
			<div class="py-4 bg-light">
				<div class="row">
					@if($products->count() > 0)
					@foreach($products as $key => $product)
					<div class="col-md-3">
						<div class="card mb-4 box-shadow">
							<a href="{{route('productclient.show',$product->slug)}}" style="color: black;text-decoration: none;">
								<img class="card-img-top" src="{{asset('imagesProduct/'.$product->image)}}" style="height: 100%; width: 100%; display: block;" >
								<div class="card-body">
									<h5><b>{{$product->name}}</b></h5> 
									<span>{{$product->brand->address}}</span>
								</div>
							</a>
							<div class="card-footer">
									@if($product->promotion)
									<span>Promotion: {{number_format($product->promotion)}} VND</span>
									@else
									@endif
								<div class="btn-group">
										<button type="button" class="btn btn-sm btn-outline-danger addcart" data-toggle="modal" data-target="#addtocart" value="{{$product->id}}">Add Cart</button> 
									</div>
							</div>
						</div>
					</div>
					@endforeach
					@else
						<h5 class="mt-5">Không có sản phẩm</h5>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<form action="{{ url('add-to-cart') }}" method="GET">
	<div class="modal fade" id="addtocart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Select size!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<input type="hidden" name="productid" id="productid">
				</div>
				<div class="modal-body row">
					<div class="col-6 col-md-6 sizecontent"></div>
					<div class="col-6 col-md-6">
						<label for="">Quantity:</label>
						<input type="number" name="quantity" class="form-control" value="1">
					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Add to cart</button>
				</div>
			</div>
		</div>
	</div>
</form>
<script>
	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
	$('.addcart').click(function(){
		var product_id = $(this).val(); 
		$('#productid').val(product_id);
		$.ajax({
			type: 'get',
			url: '{{ URL::to('getsize') }}',
			data: {
				product_id: product_id
			},
			success:function(data){
				var size = '';
				var price = '';
				for (var i = 0; i < data.sizes.length; i++) {
					if (i == 0) {
						checked = 'checked';
						price = ' ('+(data.sizes[0].price)+' <kbd class="bg-danger">VNĐ</kbd>)';
					}else{
						checked = '';
						price = ' ('+(data.sizes[i].price)+' <kbd class="bg-danger">VNĐ</kbd>)';
					}
					size +=  '<div class="form-check"><input class="form-check-input" type="radio" name="size" '+checked+' value="'+data.sizes[i].size+'" id="defaultCheck'+i+'"><label class="form-check-label" for="defaultCheck'+i+'">'+data.sizes[i].size.toUpperCase()+price+'</label></div>';
				} 
				$('.sizecontent').html(size);
			}
		});
	});
</script>
@endsection
@section('scriptClient')
@include('client.shared.scriptClient')
@endsection
