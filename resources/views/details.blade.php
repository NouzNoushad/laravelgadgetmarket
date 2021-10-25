@extends('layouts')

@section('content')
<div class="row my-5">
    <div class="col-md-6 m-auto">
        <div class="card card-body">
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('storage/uploads/'.$product['image'])}}" alt="" />
                    <div class="card-body">
						<h5>{{$product['name']}}</h5>
						<h6>Type: {{$product['category']}}</h6>
						<h6>Brand: {{$product['brand']}}</h6>
						<h6>Price: {{$product['price']}}</h6>
                    </div>
                </div>
					<a href="/edit/{{$product['id']}}" class="btn btn-primary form-control mt-2">Edit</a>
					<a href="/delete/{{$product['id']}}" class="btn btn-danger form-control mt-2">Delete</a>
            </div>
        </div>
    </div>
</div>
@stop