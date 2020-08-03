<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Hello</title>
	<link rel="stylesheet" href="{{ asset('css/mystyle.css')}}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('fontawesome/css/all.css')}}">
	<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{ asset('fontawesome/css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{ asset('fontawesome/css/fontawesome.min.css')}}">
	<script src="{{ asset('js/jquery.js') }}"></script>
<style>
	a:hover{
		text-decoration: none;
	}
</style>		
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg  navbar-light bg-white fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ url('home')}}">Hello</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#features"><i class="fa fa-history"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('peoples') }}"><i class="fa fa-heart"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav><br><br><br>
	
<div class="container-fluid">	
@yield('body')
</div>


<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/babel-polyfill-6.26.0.min.js')}}"></script>
<script src="{{ asset('js/jquery.sticky-nav.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>	

<script>
      // (3) Instantiate StickyNav
      $(document).ready(function() {
       // $('nav').stickynav();
        $('.navbar-toggler-icon').click(function(){
           $('.navbar-collapse').toggle();   
          // alert('hello');     
      });
      });
</script>


<!-- This user menu option model -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-center" style="font-family: bookman old style;">
         <a href="{{ url('profile') }}/{{ session()->get('userId') }}" class="nav-link"><i class="fa fa-user-circle"></i> Profile</a>
         <hr>
         <a href="#" class="nav-link"><i class="fa fa-save"></i> Saved</a>
         <hr>
         <a href="{{ url('edit') }}/{{ session()->get('userId')}}" class="nav-link"><i class="fa fa-edit"></i> Setting</a>
         <hr>
         <a href="{{ url('logout') }}" class="nav-link"><i class="fa fa-sign-out-alt"></i> Logout</a>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

<!-- This add new post model -->
  <div class="modal fade" id="newPost">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Shere new post</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-center" style="font-family: bookman old style;">
          
          <form action="{{ url('addPost')}}" method="post" enctype="multipart/form-data">
            @csrf()

            <label for="file">
              <img src="{{ asset('img/camera.png') }}" width="100px" height="100px" style="cursor:pointer;">
              <input type="file" name="post_img" id="file" class="hidden-lg" required="required">
            </label>
            <div class="form-group text-left">
            <label><i class="fa fa-pen"></i> Say Something..</label>
            <textarea name="post_text" class="form-control form-control-sm" placeholder="Write here..."></textarea>
            </div>
      <input type="hidden" value="{{ session()->get('userId')}}" name="user_id">
            <div class="form-group">
              <input type="submit" name="post-btn" value="Post Now" class="btn  btn-primary">
            </div>
          </form>
        <!-- Modal footer -->
        <div class="modal-footer">
            @foreach($errors->all() as $error)
                <center>{{ $error }}</center>
            @endforeach
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          
        </div>
        
      </div>
    </div>
  </div>
  
</div>

</body>
</html>