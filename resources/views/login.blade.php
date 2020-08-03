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
   /* font-family: 'Jim Nightshade', cursive; */
   font-family: 'New Rocker', cursive;
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
        <h4 class="text-center m-3">Hello Log In</h4>
        <form action=" {{ url('login') }}" method="POST">
            @csrf()
        <input type="text" name="email" class="form-control bg-light" placeholder="Phone number,username or email" id='form-control'>
        <input type="password" name="password" class="form-control bg-light" placeholder="Password">
        <button type="Submit" class="btn w-100 mb-2">Log In</button>
        _________________ OR _________________

        <a href="" class="nav-link text-center">Login with Facebook</a>
        <small><a href="{{ url('send-password') }}" class="nav-link font-weight-normal text-center">Forgot password ?</a></small>
</div><br>
        <div class="login-container container  h-auto bg-white p-4">
            <a>Don't have an account ? <a href="{{ url('register') }}" class="text-center font-weight-bold">Sign in</a>
        </div>  
</div>

@foreach($errors->all() as $error)
    
    <center class="text-danger">{{ $error }}</center>

@endforeach     

<center class="font-weight-bold">{{ session()->get('message') }}</center>

</body>
</html>