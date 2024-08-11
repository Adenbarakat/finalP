<?php
session_start();
require("db.php");
        if(isset($_POST['sign']))
        {   
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            if($password !== $cpassword)
            {
                echo "<script> alert('your password must be matched !!'); </script>";
            }
            else
            {
            $sql="SELECT email FROM user where email = '$email'";
             $res=mysqli_query($con,$sql);

            if(mysqli_num_rows($res) > 0)
            {
                echo "<script> alert(' This Email Is already Used!!'); </script>";
            }
           
            else{
                $sql = "INSERT INTO user(fname,lname, email,password,phone,gender) VALUES ('$fname','$lname','$email','$password','$phone','$gender')";
                mysqli_query($con,$sql);
                $_SESSION['email']=$email;
                $_SESSION['password']=$password;
                echo "<script> alert('Thank You'); </script>";
                header('location:login.php');
            }
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
    padding: 0em 1em;


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

.button-85:before {
  content: "";
  background: linear-gradient(
    45deg,
    #ff0000,
    #ff7300,
    #fffb00,
    #48ff00,
    #00ffd5,
    #002bff,
    #7a00ff,
    #ff00c8,
    #ff0000
  );
  position: absolute;
  top: -2px;
  left: -2px;
  background-size: 400%;
  z-index: -1;
  filter: blur(5px);
  -webkit-filter: blur(5px);
  width: calc(540px + 4px);
  height: calc(100% + 4px);
  animation: glowing-button-85 20s linear infinite;
  transition: opacity 0.3s ease-in-out;
  border-radius: 10px;
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
.Error
{
    color: crimson;
    font-size: 13px;
}
    </style>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body style="background-image: url('img/white2.png'); background-size:2000px 1000px; background-repeat: no-repeat; background-position: center;">



<div class="container" style="  font-family:Calibri Light;">
    <div class="row py-5 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
        <h1>Sign Up for Havenly</h1>
            <p>Everyone deserves a beautiful home.</p>
            <img src="img/sign.png" alt="" class="img-fluid mb-9 d-none d-md-block">
           
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form class="sign-up.php" method="post">
                <div class="row">

                    <!-- First Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input type="text" name="fname" placeholder="First Name" required class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Last Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input  type="text" name="lname" placeholder="Last Name" required class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input  type="email" name="email" placeholder="Email Address" required class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                        
                        <input  type="tel" name="phone" placeholder="Phone Number" required class="form-control bg-white border-md border-left-0 pl-3">
                    </div>
                                
                    <!-- Password -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input  type="password" name="password" placeholder="Password" required class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Password Confirmation -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input  type="passwoed" name="cpassword" placeholder="Confirm Password" required class="form-control bg-white border-left-0 border-md">
                    </div>
                    
                        <!-- Job -->
                        <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                                               <label>Gender:</label><br/>
                                  <label><input type="radio" name="gender"  required value="Male" checked /> Male</label>
                                  <label><input type="radio" name="gender" required value="Female" /> Female</label>
                                 <label><input type="radio" name="gender" required value="Other" /> Other</label>
                               <span class="Error"></span>
</div>                            

            </div>
                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                    <button class="button-85" type="submit" name="sign" value="Sign-up" >Sign In To Get Started</button>
                    </div>

                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted"><3</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>
                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p>Already Have An Account? <a href="login.php" class="text-primary ml-2">Sign In</a></p>
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