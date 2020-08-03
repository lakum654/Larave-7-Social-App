@extends('menu')



@section('body')
<h5><i class="fa fa-users"></i> Around Peoples</h5>
<div class="container border bg-white overflow-y-scroll w-75" style="font-family: geogiri">
	
	<table class="bordered w-100">
		@foreach($users as $user)
		<tr>
			<td><img src="{{ asset('uploads')}}/{{$user->profile }}" class="user-img">

			</td>
			<td>{{ $user->name }}<br><small>{{ $user->username }}</small></td>
			<td><a href="{{ url('addfollowing')}}/{{$user->user_id }}" class="btn btn-primary btn-sm" id="following-btn">Follow</a></td>
		</tr>		
		@endforeach

	</table>	
</div>
<script>
	$(document).ready(function(){
		
        $(document).on("click","#following-btn",function(){
            this.style.background = 'green';
            this.style.display = 'none';
       });
    });
</script>
@endsection