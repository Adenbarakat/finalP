<?php
session_start();
require("db.php");
$status="verfied";
if(isset($_POST['login'])){
  $Email = $_POST['email'];
  $Password = $_POST['password'];
  $sql="SELECT email FROM user where email = '$Email' AND password='$Password'";
 $query=mysqli_query($con,$sql);
  if(mysqli_num_rows($query)>0)
  {
    $_SESSION['email']=$Email;
    $_SESSION['password']=$Password;
    $sql1="update user set status='$status' where email='$Email'";
    mysqli_query($con,$sql1);
    echo '<script> alert("welcome"); </script>';
      header('location:home.php');
  }
  else{
    echo "<script> alert('invalid user'); </script>";
	
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       
        .border-md {
    border-width: 2px;
}

.form-control:not(select) {
    padding: 1.5rem 0.5rem;
}

select.form-control {
    height: 52px;
    padding-left: 0.5rem;
}

.form-control::placeholder {
    color: #ccc;
    font-weight: bold;
    font-size: 0.9rem;
}
.form-control:focus {
    box-shadow: none;
}
h1{
    font-size:50px;
    padding: 0em 2em;


}
p{
    font-size:25px;



}
.button-85 {
  padding: 0.4em 15em;
  border: none;
  outline: none;
  color: rgb(255, 255, 255);
  background: #111;
  cursor: pointer;
  position: relative;
  z-index: 0;
  border-radius: 10px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}



@keyframes glowing-button-85 {
  0% {
    background-position: 0 0;
  }
  50% {
    background-position: 400% 0;
  }
  100% {
    background-position: 0 0;
  }
}

.button-85:after {
  z-index: -1;
  content: "";
  position: absolute;
  width: 540px;
  height: 100%;
  background: #222;
  left: 0;
  top: 0;
  border-radius: 10px;
}

/* CSS */
.button-60 {
  align-items: center;
  appearance: none;
  background-color: #fff;
  border: 1px solid #dbdbdb;
  border-radius: .375em;
  box-shadow: none;
  box-sizing: border-box;
  color: #363636;
  cursor: pointer;
  display: inline-flex;
  font-size: 1rem;
  height: 2.9em;
  width: 100px;
  justify-content: center;
  line-height: 1.5;
  padding: calc(.8em - 1px) 2em;
  position: relative;
  text-align: center;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: top;
  white-space: nowrap;
}

.button-60:active {
  border-color: #4a4a4a;
  outline: 0;
}

.button-60:focus {
  border-color: #485fc7;
  outline: 0;
}

.button-60:hover {
  border-color: #b5b5b5;
}

.button-60:focus:not(:active) {
  box-shadow: rgba(72, 95, 199, .25) 0 0 0 .125em;
}
img{
  width: 500px;
  height: 500px;
}
    </style>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body style="background-image: url('img/company13.png');   background-size: cover;
  background-repeat: no-repeat;
  background-position: center;">




<div class="container" style="  font-family:Calibri Light;">
    <div class="row py-5 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <h1>WELCOME TO RêVES DESIGN</h1>
            <p>“Love of beauty is taste. Creation of beauty is art.” </p>
           
           
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form id="Login" action="login.php" method="post">
                <div class="row">
        
            <h2>Sign in to your Havenly account</h2>           

                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input  type="email" name="email" id="inputEmail" placeholder="Email Address"  class="form-control bg-white border-left-0 border-md">
                    </div>
                    <!-- Password -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input  type="password" name="password" id="inputPassword" placeholder="Password"  class="form-control bg-white border-left-0 border-md">
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                    <button class="button-85" type="submit" name="login" >SIGN IN </button>
                    </div>

                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">או</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>
                     <!-- Submit Button -->
                     <div class="form-group col-lg-6 mx-auto mb-0">
                   <h4>Don't have an account?</h4> 
                     <a href="sign.php" class="button-60"   class="btn btn-primary" > Sign up</a>
                    <a href="admin/adminlog.php"  class="button-60"  class="btn btn-primary" >Admin sign in</a>
                  </div>
                </div>
            </form>
        </div>
    </div>
    <script>
    $(function () {
    $('input, select').on('focus', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
    });
    $('input, select').on('blur', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
    });
})
</script>
</div>

</body>
</html>