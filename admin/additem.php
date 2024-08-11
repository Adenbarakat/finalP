 
<?php
	
	//if upload button is pressed
	if(isset($_POST['upload']))
	{
		//the path to store the upload image
		$target = "product_images/".basename($_FILES['image']['name']); //need to change the path
		
		
		// connect to the database
		$connect = mysqli_connect("localhost","root","","projectgmrh");
		//get all the submitted data from the form
		$image = $_FILES['image']['name'];
		$text = $_POST['name'];
		$price=$_POST['price'];
		$qty=$_POST['qty'];
		$catg=$_POST['catg'];
		$detail = $_POST['detail'];
		$sql = "INSERT INTO product(name,price,quantity,image,cat,detail) VALUES ('$text','$price','$qty','$image','$catg','$detail')";
		$query=mysqli_query($connect,$sql); //stores the submitted data into the database table : images
		
		// move the uploaded image into the filder : images
		if(move_uploaded_file($_FILES['image']['tmp_name'],$target) && $query)
		{
			echo "<p>product uploaded successfully</p>";
		}
		else
		{
			echo "<p>There was a problem uploading product</p>";	
		}
	}

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body {
	margin-top: 10%;
	background-color:gray
}


#form-container {
	margin-left: 28%;
	width: 600px;
	height: 300px;
	background-color: none;
	border: 1px  rgb(233, 205, 164) solid;
}
#titile {
	margin-left: 28%;
	width: 602px;
	height: 30px;
	background-color:  #B8860B;
}

input[type="text"], input[type="password"] {
	width: 250px;
	height: 30px;
	margin-top: 10px;
	margin-left: 3.50%;

}

input[type="submit"] {
	width: 500px;
	height: 30px;
	background-color:   #B8860B;
	color: white;
	border: none;
	margin-top: 10px;
	margin-left: 50px;
	cursor: pointer;

}

input[type="submit"]:hover {
	background-color: #B8860B;
}

fieldset {
	width: 600px;
	margin-left: 28%;
	height: 200px;
	margin-top: 15%;
}

h4 {
	color: white;
	text-align: center;
}

#show-password {
	margin-left: 150px;
	font-family: sans-serif;
}

span {
	color: white;
	background-color:  #B8860B;
	border-bottom: 3px solid red;
}

input[type="checkbox"]{
	cursor: pointer;
}

#password-message {
	margin-left: 28%;
	width: 600px;
	height: 200px;
	background-color: solid;
	border: 1px #ff5722 solid;
	display: none;
	margin-top: 1px;

}

.invalid {
	color: #B8860B;
}

.invalid:before {
	position: relative;
	left: -35px;
	content: "✖";
}


.valid {
	color: green;
}

.valid:before {
	position: relative;
	left: -35px;
	content: "✔";
}

h4 {
	text-align: center;
}

p {
	margin-left: 50px;
}

label {
	color:  gray;
	font-style: bold;
}

#signup {
	font-family: sans-serif;
}

a {
	text-decoration-style: double;
	text-decoration-line: unset;
	text-rendering: auto;
}

input[type="checkbox"] {
    margin-left: 7px;
}




</style>

</head>
<body style="background-image: url('product_images/white1.png');   background-size: cover;
  background-repeat: no-repeat;
  background-position: center;">

<?php include("nav.php"); ?>
<div id="titile">
	<h4><strong>Add Product</strong></h4>
	
</div>
 <div id="form-container">
 <form  action="additem.php" method="post" enctype="multipart/form-data">
 		<div>
 			<input type="text" id="name" name="name" placeholder="product Name" autocomplete="off"/>
 			<input type="text" id="price" name="price" placeholder="product price" autocomplete="off"/>
 		</div>
<br>
 		<div>
 			<input type="text" id="qty" name="qty" placeholder="product qty" autocomplete="off"/>
 			<input type="text" id="detail" name="detail" placeholder="product details" autocomplete="off"/>

 			<span id="erro"></span>
 		</div>
<br>

        <div style="margin-left:20px;">
		<input type="file" id="image" name="image"> 
			 <select id="catg" name="catg"> 
<option value="floor">floor</option>
<option value="interior designer">lamp</option>



</select>
 		</div>

 		<div style="margin-top:90px;">
 			<input type="submit" name="upload" id="submit" value="upload product"/>
 			
 		</div>
 	</form>
 </div>

 </body>
</html>









