<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Hello</title>
	<link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
<style>
*{
	margin: 0;
	padding: 0;
}	
body{
		font-family:bookman old style;
	}
h4{
	font-family:"rounded",cursive;
	font-weight: bold;
}
.form-control{
	border-radius: 1px;
	margin-top: 15px;
}

.btn{
	background: dodgerblue;
	color: white;
	border-radius: 1px;
	margin-top: 15px;
	height: 35px;
}
.login-container{
	width: 350px;
	border: 1px solid #eee;
}
a:hover{text-decoration: none;}

</style>	
</head>
<body class="bg-light">
	<div class="container m-3">	
	<div class="login-container container  h-auto bg-white">
		<form action=" {{ url('submitData') }}" method="POST">
			@csrf()
		<h4 class="text-center m-3">Hello Sign In</h4>
		<center><a class="btn text-center text-white w-100">Log in with Facebook</a></center>
		_________________ OR _________________
		<input type="text" name="email" class="form-control bg-light" placeholder="Mobile Number or Email">
		<input type="text" name="username" class="form-control bg-light" placeholder="Username">
		<input type="password" name="password" class="form-control bg-light" placeholder="Password">
		<button type="Submit" class="btn w-100 mb-2">Sign Up</button><br><br><br>
		</form>
</div>
<br>
		<div class="login-container container  h-auto bg-white p-4">
			<a>Have an account ? <a href="{{ url('/') }}" class="text-center font-weight-bold">Log in</a>
		</div>

 @foreach($errors->all() as $error)
	
	<center class="text-danger">{{ $error }}</center>

@endforeach		

<center class="font-weight-bold">{{ session()->get('message') }}</center>


</div>
</body>
</html>