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
        <h4 class="text-center m-3">Forgot Password</h4>
        <form action=" {{ url('sendPassword') }}" method="POST">
            @csrf()
        <input type="text" name="new_password" class="form-control bg-light" placeholder="New Password" id='form-control'>
        <input type="password" name="new_confirm_password" class="form-control bg-light" placeholder="New Confirm Password">
         <input type="text" name="email" class="form-control bg-light" placeholder="Fill E-Email" id="email">
        <button type="Submit" class="btn w-100 mb-2">Send Password</button>
        _________________ OR _________________

        <a href="" class="nav-link text-center">Login with OTP</a><br>
       
</div><br>
        <div class="login-container container  h-auto bg-white p-4">
            <a>Don't have an account ? <a href="{{ url('register') }}" class="text-center font-weight-bold">Sign in</a>
        </div>  
</div>

@foreach($errors->all() as $error)
    
    <center class="text-danger">{{ $error }}</center>

@endforeach     

<center class="font-weight-bold">{{ session()->get('message') }}</center>
<script src="{{ asset('js/jquery-3.4.js') }}"></script>


</body>
</html>