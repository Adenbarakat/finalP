sign//
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
                $sql = "INSERT INTO user(fname,lname, email,password,phone) VALUES ('$fname','$lname','$email','$password','$phone')";
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
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
  
body {
    font-family: 'Poppins', sans-serif;
    background: url(img/tepol.jpg) ;
    background-size: cover;}

.page-container {
margin: 120px auto 0 auto;
}

h1 {
	font-size: 30px;
	font-weight: 700;
	text-shadow:0 1px 4px rgba(0,0,0,.2);
	text-align:center;
}
h1{
    font-size: 30px;
	font-weight: 700;
	text-shadow:0 1px 4px rgba(0,0,0,.2);
	text-align:center; 
}

form {
position:relative;
width:305px;
margin:15px auto 0 auto;
text-align:center;

}

input {
width:270px;
height:42px;
margin-top:25px;
padding:0 15px;
background:#2d2d2d;
background:rgba(45,45,45,.15);
-moz-border-radius: 6px;
-webkit-border-radius:6px;
text-align:center;
border-radius:6px;
border:1px solid #3d3d3d;
border:1px solid rgba(255,255,255,.15);
-moz-box-shadow:0 2px 3px 0 rgba(0,0,0,.1) inset;
-webkit-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
font-family: 'PT Sans', Helvetica, Arial, sans-serif;
font-size:16px;
color:#fff;
text-shadow:0 1px 2px rgba(0,0,0,.1);
-o-transition: all .2s;
-moz-transition: all .2s;
-webkit-transition: all .2s;
-ms-transition: all .2s;
}

button {
cursor:pointer;
width:300px;
height:44px;
margin-top:25px;
padding:0;
background-color:#fff;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
border-radius: 6px;
border:1px solid #ff730e;
}
</style>
</head>
<body>
    <br>
<div class="container d-flex justify-content-center" style="margin-left:250px;">
    <div class="row my-5">
        <div class="col-md-6 text-left text-white lcol">
            <div class="greeting">
            </div>
            
        </div>
        <div class="col-md-6 rcol">
            <form class="sign-up.php" method="post">
            <h2>הרשמה</h2> 
            <div class="form-group fone mt-2"> <i class="fas fa-user"></i> <input type="text"  name="fname"class="form-control" placeholder=":שם פרטי" required> </div>
                <div class="form-group fone mt-2"> <i class="fas fa-user"></i> <input type="text" name="lname" class="form-control" placeholder=":שם משפחה"required> </div>
                <div class="form-group fone mt-2"> <i class="fas fa-envelope"> </i><input type="text" name="email"  class="form-control" placeholder=" :דואל "required> </div>
                <div class="form-group fone mt-2"> <i class="fas fa-lock"></i> <input type="tel" name="phone"class="form-control" placeholder=":מספר טלפון"required></div>
                <div class="form-group fone mt-2"> <i class="fas fa-lock"></i> <input type="password" name="password"class="form-control" placeholder=":סיסמה"required></div>
                <div class="form-group fone mt-2"> <i class="fas fa-lock"></i> <input type="password"name="cpassword" class="form-control" placeholder=":אישור סיסמה"required>

                    <div class="image"><i class="fas fa-eye"></i></div>
                    </form>  <button class="btn btn-success mt-5" style="background-color:LightGray;" type="submit" name="sign" value="Sign-Up">שליחה</button>
        </div></div>
    </div>
</div>
</body>
</html>
login'''
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

</head>
<head>
<style>

body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to left,#B0C4DE, gray ,#708090);
    background-size: cover;
}
.container
{
    direction:right;
;
}
.panel h2{
     color: #000;
     font-size:30px;
     margin:0 0 10px 0;
    }
.panel p { 
    color:#000;
     font-size:14px;
      margin-bottom:40px; 
      line-height:24px;
    }
.login-form .form-control {
  background: rgb(255, 255, 255) none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 10px;
  font-size: 14px;
  width: 250px;
  height:40px;
    line-height: 50px;
}
.main-div {
  background: #ffffff71 none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;
  max-width: 30%;
  direction: rtl;
  padding: 50px 70px 1px 71px;
}

.login-form .form-group {
  margin-bottom:15px;
  
}
.login-form{
     text-align:center;
    }
.forgot a {
  color: #213b50;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background:  #000;
  border: 1px solid #d4d4d4;
  border-radius: 10px;
  color: #ffffff;
  font-size: 16px;
  width: 250px;
  height:40px;
  line-height: 50px;
}
.form-heading {
     color:#fff; 
    font-size:90px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background:  rgb(233, 205, 164) none repeat scroll 0 0;
  
}
a{
  color:#000;
}
.button-55 {
  align-self: center;
  background-color: #fff;
  background-image: none;
  background-position: 0 90%;
  background-repeat: repeat no-repeat;
  background-size: 4px 3px;
  border-radius: 15px 225px 255px 15px 15px 255px 225px 15px;
  border-style: solid;
  border-width: 2px;
  box-shadow: rgba(0, 0, 0, .2) 15px 28px 25px -18px;
  box-sizing: border-box;
  color: #41403e;
  cursor: pointer;
  display: inline-block;
  font-family: Neucha, sans-serif;
  font-size: 1rem;
  line-height: 23px;
  outline: none;
  padding: .50rem;
  text-decoration: none;
  transition: all 235ms ease-in-out;
  border-bottom-left-radius: 15px 255px;
  border-bottom-right-radius: 225px 15px;
  border-top-left-radius: 255px 15px;
  border-top-right-radius: 15px 225px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-55:hover {
  box-shadow: rgba(0, 0, 0, .3) 2px 8px 8px -5px;
  transform: translate3d(0, 2px, 0);
}

.button-55:focus {
  box-shadow: rgba(0, 0, 0, .3) 2px 8px 4px -6px;
}
.border-md {
    border-width: 2px;
}

</style>

</head>
<br>
<br>
<br>
<bt>
<body>
  <div id="LoginForm">
<div class="container">
<h1 class="form-heading"></h1>
<div class="login-form">
<div class="main-div">
  <div class="panel">
 <h2>התחברות</h2>
 </div>
  <form id="Login" action="login.php" method="POST">

      <div class="form-group">


          <input type="email" name="email" class="button-55" id="inputEmail" placeholder=":דואל">

      </div>

      <div class="form-group">

          <input type="password" name="password" class="button-55" id="inputPassword" placeholder="סיסמה:">

      </div>
      <div class="form-group">
                    <button class="button-55" type="submit" name="login" class="btn btn-primary" style=" width: 210px;" >כניסה</button>
                    </div>
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <span class="px-2 small text-muted font-weight-bold text-muted" >~~~~~~~~~~~או~~~~~~~~~~~</span>
                    </div>
                    <a href="sign.php" class="button-55"   class="btn btn-primary" > יצירת חשבון</a>
                    <a href="admin/adminlog.php"  class="button-55"  class="btn btn-primary" >כניסת מנהל </a>

                    
 <h4>

  </form>

  </div>
</div></div></div>
</div>

</body>
</html>
mnhel
<?php
session_start();
require("db.php");
if(isset($_POST['login'])){
  $username = $_POST['username'];
  $Password = $_POST['password'];
  $sql="SELECT * FROM admin where username = '$username' AND password='$Password'";
 $query=mysqli_query($con,$sql);
  if(mysqli_num_rows($query)>0)
  {
    echo '<script> alert("welcome"); </script>';
      header('location:index.php');
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
    <title>Document</title>
   
</head>
<head>
<style>

body {
    font-family: 'Poppins', sans-serif;
    background: url(admin.jpg) ;
	  background-attachment:fixed;
    background-size:100% 100%;
}
.container
{
    direction:right;
;
}
.panel h2{
     color: #000;
     font-size:30px;
     margin:0 0 10px 0;
    }
.panel p { 
    color:;
     font-size:14px;
      margin-bottom:40px; 
      line-height:24px;
    }
.login-form .form-control {
  background: rgb(255, 255, 255) none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 10px;
  font-size: 14px;
  width: 250px;
  height:40px;
    line-height: 50px;
}
.main-div {
  background: #ffffff71 none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;
  max-width: 30%;
  direction: rtl;
  padding: 50px 70px 1px 71px;
}

.login-form .form-group {
  margin-bottom:15px;
  
}
.login-form{
     text-align:center;
    }
.forgot a {
  color: #213b50;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background:  #000;
  border: 1px solid #d4d4d4;
  border-radius: 10px;
  color: #ffffff;
  font-size: 16px;
  width: 250px;
  height:40px;
  line-height: 50px;
}
.form-heading {
     color:#fff; 
    font-size:90px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background:  rgb(233, 205, 164) none repeat scroll 0 0;
  
}
a{
  color:#000;
}

</style>
<link href="login.css" rel="stylesheet" id="bootstrap-css">

</head>
<br>
<br>
<br>
<bt>
<body>
  <div id="LoginForm">
<div class="container">
<h1 class="form-heading"></h1>
<div class="login-form">
<div class="main-div">
  <div class="panel">
 <h2>התחברות מנהל</h2>
 </div>
  <form id="Login" action="" method="POST">

      <div class="form-group">


          <input type="text" name="username" class="form-control" id="inputEmail" placeholder=":שם משתמש">

      </div>

      <div class="form-group">

          <input type="password" name="password" class="form-control" id="inputPassword" placeholder="סיסמא:">

      </div>
      
      <button type="submit" name="login" class="btn btn-primary">כניסה</button>
  </form>
<br><br>
  </div>
</div></div></div>
</div>

</body>
</html>
create_function<?php
require("menu.php");

if (isset($_GET['action'])){
	if ($_GET['action'] == 'delete'){
		foreach ($_SESSION['shopping_cart'] as $key => $values){
			if($values["item_id"] == $_GET['id'])
      {
          if($values['user_email'] == $_SESSION['email'])
          {
                $qty=$values['item_qty'];
                $sql="update product set quantity='$qty' where id='".$_GET['id']."'";
                $res=mysqli_query($con,$sql);
                if($res)
                {
                unset($_SESSION['shopping_cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
         }
			}
    }
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
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
.table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}
@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
		width:10%;
		display: inline !important;
	}
	.actions .btn{
		width:36%;
		margin:1.5em 0;
	}
	
	.actions .btn-info{
		float:left;
	}
	.actions .btn-danger{
		float:right;
	}
	
	table#cart thead { display: none; }
	table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
	table#cart tbody tr td:first-child { background: #333; color: #fff; }
	table#cart tbody td:before {
		content: attr(data-th); font-weight: bold;
		display: inline-block; width: 8rem;
	}
	
	
	
	table#cart tfoot td{display:block; }
	table#cart tfoot td .btn{display:block;}
	
}
body {
       background-image:url('img/body6.jpg');
	background-attachment:fixed;
    background-size:100% 100%;
}
    </style>
</head>
<body>
 
    <br>
    <?php 
$shop = "סל קניות";
if(!empty($_SESSION['shopping_cart']))
{
	?>
<div class="container">
    <div class="text-center" style="font-size:20px;"><?php echo $shop; ?></div>
    <br>
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">מוצר</th>
							<th style="width:10%">מחיר</th>
							<th style="width:8%">כמות</th>
							<th style="width:22%" class="text-center">סכום</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
                    <?php
$total = 0;
foreach($_SESSION["shopping_cart"] as $keys => $values)
{
  if($values['user_email'] == $_SESSION['email'])
  {
      ?>
					<tbody>
						<tr>
							<td data-th="Product">
                                
								<div class="row">
                                               

									<div class="col-sm-2 hidden-xs"><img src="admin/product_images/<?php echo $values["item_image"]; ?>" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<p><?php echo $values["item_name"]; ?></p>
									</div>
								</div>
							</td>
							<td data-th="Price"><?php echo $values["item_price"]; ?> ₪</td>
							<td data-th="Quantity">
								<h5 class="text-center">1</h5>
							</td>
							<td data-th="Subtotal" class="text-center"><?php echo $values["item_price"] * $values["item_quantity"]; ?> ₪</td>
							<td class="actions" data-th="">
                            <a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>" name="remove"  data-abc="true"> 
                            <i class="fa fa-trash-o"></i>
	              </a> 
							</td>
						</tr>
           
					</tbody>
                    <?php 
                $total+=$values["item_price"] * $values["item_quantity"];
                ?>
                <?php
                }
                }
                ?>
					<tfoot>
				
						<tr>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total : <?php echo $total; ?> ₪</strong>&nbsp;&nbsp;&nbsp;</td>
                           
							<td><a href="payment.php" class="btn btn-warning "><button class="btn btn-warning "  name="checkout"> המשך להזנת פרטים אישיים  <i class="fa fa-angle-right"></i></button></a></td>
                         
                        </tr>
					</tfoot>
				</table>
</div>
<?php
}
else
{
	echo "<center >
	<h1>your shopping cart is empty</h1>
	</center>";
}
?>
<br><br>
<?php include("foter.php"); ?>
</body>
</html>