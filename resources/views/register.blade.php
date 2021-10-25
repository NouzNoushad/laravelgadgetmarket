@extends('layouts')

@section('content')
<div class="row my-5">
	<div class="col-md-7 m-auto">
		<div class="card card-body">
			<form action="register" method="POST">
				@csrf
				<div class="row justify-content-center my-5">
					<div class="col-sm-10">
						@if($errors->has('name'))
							<input type="text" name="name" class="form-control border-danger" placeholder="Name">
							<small class="text-danger">@error('name'){{$message}}@enderror</small>
						@else
							<input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
						@endif
					</div>
					<div class="col-sm-10 mt-2">
						@if($errors->has('email'))
							<input type="email" name="email" class="form-control border-danger" placeholder="Email">
							<small class="text-danger">@error('email'){{$message}}@enderror</small>
						@else
							<input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
						@endif
					</div>
					<div class="col-sm-10 mt-2">
						@if($errors->has('password'))
							<input type="password" name="password" class="form-control border-danger" placeholder="Password">
							<small class="text-danger">@error('password'){{$message}}@enderror</small>
						@else
							<input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}">
						@endif
					</div>
					<div class="col-sm-10 mt-2">
						@if($errors->has('cpassword'))
							<input type="password" name="cpassword" class="form-control border-danger" placeholder="Confirm Password">
							<small class="text-danger">@error('cpassword'){{$message}}@enderror</small>
						@else
							<input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" value="{{old('cpassword')}}">
						@endif
					</div>
					<div class="col-sm-10 mt-3">
						<button type="submit" name="submit" class="btn btn-primary form-control">Sign Up</button>
					</div>
					<div class="col-sm-10 mt-2">
						<p class="lead">Have an Account? <a href="/login" class="text-decoration-none">Login</a></p>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@stop