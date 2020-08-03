@extends('menu')


@section('body')
<div class="row">
    <div class="col-lg-8 col-sm-12 col-xl-4 col-md-12 bg-white" style="font-family: gieogira;">
        <!-- Start User Post -->
      @forelse($posts as $post)

      <div class="card-header-pills">
        <a href="{{ url('profile') }}/{{ session()->get('userId')}}" class="nav-link text-dark">
            <img src="{{asset('uploads')}}/{{$post->profile}}" class="user-img">
                {{ $post->username }}
                <small>{{ $post->timestamp }}</small><br>
                {{ $post->post_text }}
        </a>
    <a href="#">
        <center>
            <img src="{{asset('posts')}}/{{ $post->post}}" width="80%">
        </center>
    </a>
    <hr>
    <div class="footer">
        <a href="#" id="like-btn" style="margin-left:100px;color:black;">
            <i class="fa fa-heart" style="font-size: 20px;"></i> Like</a>
        <a href="#" style="margin-left:100px;color:black;">
            <i class="fa fa-comment-alt" style="font-size: 20px;"></i> Comment</a>    
        <a href="#" style="margin-left:100px;color:black;">
            <i class="fa fa-share" style="font-size: 20px;"></i> Share</a>
    </div>
      <hr>
</div>



@empty

<p>Now You Can Share you posts.</p>

@endforelse
<!-- End user post -->




<!-- End User Post -->

    </div>
    <div class="col-lg-4 col-sm-12 col-xl-4 col-md-12 bg-light">
        <div class="recent-story">
            <a class="nav-link">Recent Stories</a>
        <ul>
            <li><img src="{{ asset('img/1.png') }}" class="user-img border border-success"> Lakum Hitesh</li>
            <li><img src="{{ asset('img/1.png') }}" class="user-img"> Lakum Mahendra</li>
             <li><img src="{{ asset('img/1.png') }}" class="user-img"> Lakum Mahendra</li>
              <li><img src="{{ asset('img/1.png') }}" class="user-img"> Lakum Mahendra</li>
        </ul>
        </div>
        <a href="#" data-toggle="modal"  data-target="#newPost" class="btn btn-success add-post-btn">            
            <i class="fa fa-plus"></i>
        </a>
           
        
    </div>
</div>


<script>
    $(document).ready(function(){
        $(document).on("click","#like-btn",function(){
            this.style.color = 'red';
        });
    });
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

@endsection