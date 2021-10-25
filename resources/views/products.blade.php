@extends('layouts')

@section('content')
<div class="row mt-5">
    <div class="col-md-12 m-auto" >
	 	<div class="card card-body">
			@if($products->isEmpty())
				@if(Session::get('user'))
					<h3 class="text-center"><a href="/add" class="nav-link">Add products data</a></h3>
				@else
					<h3 class="text-center"><a href="/login" class="nav-link">Please Login & Add products data</a></h3>
				@endif
			@else
				@if(Session::get('status'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<div class="text-center">{{Session::get('status')}}</div>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@endif
				<div class="row row-cols-1 row-cols-md-4 g-4">
					@foreach($products as $product)
					<div class="col">
						<div class="card h-100">
							<img src="{{asset('storage/uploads/'.$product['image'])}}" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">{{$product['name']}}</h5>
							</div>
							@if(Session::get('user'))
								<a href="details/{{$product['id']}}" class="btn btn-info form-control">More Info</a>
							@endif
						</div>
					</div>
					@endforeach
				</div>
			@endif
		</div>
    </div>
</div>
@stop