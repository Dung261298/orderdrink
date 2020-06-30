    @extends('admin.layouts.main')
@section('title','Create Tag')
@section('content')
<div class=" mt-3 card" >
  	<div class="card-header">
    	<h4> Create Tag</h4>
  	</div>
  	<div class="card-body">
    {{ Form::open(['url' => 'admin/tag', 'method' => 'post','enctype '=>'multipart/form-data']) }} 
        <div class="form-group row">
        	<div class="col-md-12">
                {{ Form::label('Name: ','',['class' => 'font-weight-bold']) }}
                {{ Form::text('name', null, ['class' => 'form-control' ]) }}
                <span class="text-danger">{{ $errors->first('name')}}</span>
            </div>

        </div>

        {{ Form::submit('Save',['class' => 'btn btn-success mt-3 saveabout']) }}
        <a class="btn btn-secondary mt-3" href="{{route('tag.index')}}">Back</a>
    {{ Form::close() }} 
    </div> 
</div>
<p style="visibility: hidden;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@endsection
@section('scriptAdmin')
@include('admin.shared.scriptAdmin')
@endsection
