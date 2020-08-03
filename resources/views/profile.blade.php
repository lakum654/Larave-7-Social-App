@extends('menu')


@section('body')
<style>
*{
	font-family: bookman old style;
}	
.profile-img{
	width: 100px;
	height: 100px;
	border-radius: 100px;
	float: none;
	margin-left: 60px;
}
.p-container{
	border: 1px solid #ddd;
}
.nav-link{
	color: black;
}

</style>
<div class="container bg-white text-dark">
	<div class="row">
		
		@foreach($rows as $row)
			
		
		<div class="col-lg-4 col-sm-auto text-sm-center"><br><br>
			<img src="{{ asset('uploads')}}/{{ $row->profile }}" class="profile-img">
		</div>
		<div class="col-lg-5 col-sm-auto mt-3"><br>
			<a href="" class="nav-link">{{ $row->username }}</a>
			<a href="">{{ $postCount }} Posts</a> | <a href="">29 Followers</a> | <a href="">{{ $followingCount }} Following</a>
<hr>
<b>{{ $row->name }}</b><br>
<a>{{ $row->bio }}</a>
<a href="{{ url($row->website) }}">{{ $row->website }}</a>
		</div>
		<div class="col-lg-3 col-sm-auto  mt-lg-3"><br>
			<button class="btn btn-sm btn-primary"> <a href="{{ url('edit') }}/{{ session()->get('userId') }}" class="nav-link">Edit <i class="fa fa-edit"></i></a></button>
		</div>

		@endforeach

	</div>
</div>	
<hr>
<scction>
	<div class="container text-center">
		<a href=""><i class="fa fa-images"></i> POSTS</a>
		<div class="row">
			@foreach($allCount as $post)

			<div class="col-lg-3 col-sm-6 col-md-6 col-xl-3 postcountContainer">
			<img src="{{ asset('posts') }}/{{ $post->post }}" class="posted-img">
			</div>

			@endforeach
		</div>
	</div>
</scction>
@endsection