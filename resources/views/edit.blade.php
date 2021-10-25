@extends('layouts')

@section('content')

<div class="row my-5">
    <div class="col-md-7 m-auto">
        <div class="card card-body">
            <form action="/edit" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row justify-content-center my-5">
						<div class="col-sm-10 text-center">
							<img src="{{asset('storage/uploads/' . $product['image'])}}" alt="" height=200/>
						</div>
						<div>
							<input type="hidden" name="id" value="{{$product['id']}}">
						</div>
						<div class="col-sm-10 mt-3">
							@if($errors->has('file'))
								<input type="file" class="form-control border-danger" id="file" name="file">
								<small class="text-danger">@error('file'){{$message}}@enderror</small>
							@else
								<input type="file" class="form-control" id="file" name="file">
							@endif
						</div>
						<div class="col-sm-10 mt-2">
							@if($errors->has('name'))
								<input type="text" class="form-control border-danger" id="name" name="name" placeholder="Name">
								<small class="text-danger">@error('name'){{$message}}@enderror</small>
							@else
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$product['name']}}">
							@endif
						</div>
						<div class="col-sm-10 mt-2">
							@if($errors->has('category'))
								<input type="text" class="form-control border-danger" id="category" name="category" placeholder="Type">
								<small class="text-danger">@error('category'){{$message}}@enderror</small>
							@else
								<input type="text" class="form-control" id="category" name="category" placeholder="Type" value="{{$product['category']}}">
							@endif
						</div>
						<div class="col-sm-10 mt-2">
							@if($errors->has('brand'))
								<input type="text" class="form-control border-danger" id="brand" name="brand" placeholder="Brand">
								<small class="text-danger">@error('brand'){{$message}}@enderror</small>
							@else
								<input type="text" class="form-control" id="brand" name="brand" placeholder="Brand" value="{{$product['brand']}}">
							@endif
						</div>
						<div class="col-sm-10 mt-2">
							@if($errors->has('price'))
								<input type="text" class="form-control border-danger" id="price" name="price" placeholder="Price">
								<small class="text-danger">@error('price'){{$message}}@enderror</small>
							@else
								<input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{$product['price']}}">
							@endif
						</div>
						<div class="col-sm-10 mt-3">
							<button type="submit" class="btn btn-primary form-control" name="submit" placeholder="Price">Edit Product</button>
						</div>
					</div>
            </form>
        </div>
    </div>
</div>
@stop