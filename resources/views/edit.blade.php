@extends('menu')
@section('body')
<style>
#label{
	color: dodgerblue;
	cursor: pointer;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-3 border bg-white"><br><br>
			<ul class="list-group list-group-flush">
				<li class="list-group-item"><a href="" class=" active">Edit Profile</a></li>
				<li class="list-group-item"><a href="">Change Password</a></li>
				<li class="list-group-item"><a href="">Apps And Website</a></li>
				<li class="list-group-item"><a href="">Edit Profile</a></li>
			</ul>
		</div>
		<div class="col-8 border bg-white"><br><br>
			@foreach($rows as $row)			
			<form action="{{ url('update') }}" method="POST" enctype="multipart/form-data">
				@csrf()
				
				<div class="form-group text-center">
					<img src="{{ asset('uploads/')}}/{{ $row->profile }}" class="rounded-circle" width="100px" height="100px">
					<label for="file" id="label">
					<i class="fa fa-camera"></i>
					<input type="file" id="file" name="profile">
					</label>
				</div>
				<div class="form-group text-center">
					<a href="#" class="nav-link"> Lakum Mahendra</a>
					@foreach($errors->all() as $error)
						{{ $error }}
					@endforeach
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control form-control-sm" value="{{ $row->username }}" required>
				</div>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control form-control-sm" value="{{ $row->name }}" required>
				</div>
				<div class="form-group">
					<label>Website</label>
					<input type="text" name="website" class="form-control form-control-sm" value="{{ $row->website }}">
				</div>
				<div class="form-group">
					<label>Bio</label>
					<input type="text" name="bio" class="form-control form-control-sm" value="{{ $row->bio }}" required>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control form-control-sm" value="{{ $row->email }}" required><br>
					<button class="btn btn-sm btn-primary text-white">Confirm Email</button>
				</div>
				<div class="form-group">
					<label>Phone Number</label>
					<input type="text" name="phone" class="form-control form-control-sm" value="{{ $row->phone }}" required><br>
				</div>
				<div class="form-group">
					<select name="gender" class="custom-select">
						<option>Male</option>
						<option>Female</option>
					</select>
				</div>
				<div class="form-group">
					<input type="hidden" value="{{ $row->user_id }}" name="id">
					<input type="submit" class="btn btn-primary" name="submit" value="Save">
				</div>
				
			</form>

			@endforeach

		</div>
	</div>
</div>
@endsection