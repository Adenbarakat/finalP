<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <style>
        header{
    background-image: url("product_images/company.jpg");
    background-size:100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}
   
    </style>
</head>

<body>
<body style="background-image: url('product_images/white1.png');   background-size: cover;
  background-repeat: no-repeat;
  background-position: center;">
    <?php include("nav.php"); ?>
    <br><br><br>
    <header>
        
    </header> 
    <br><br>
    <center>
    <a href="most_buying_client.php">View Most Buying Client</a>
</center>
    <br><br>
<table class="table table-bordered">
<thead>
<th>First Name</th>
<th>Last Name</th>
<th>E-mail</th>
<th>Phone</th>
<th>Status</th>
</thead>
<tbody id="data">
<?php 
$count = 0;
$query = "SELECT * FROM user ORDER BY id";
$sql = mysqli_query($con,$query);
while($row = mysqli_fetch_array($sql)) {
    
?>
<tr>
<td><?php echo $row["name"] ?></td>
<td><?php echo $row["lname"] ?></td>
<td><?php echo $row["email"] ?></td>
<td><?php echo $row["phone"] ?></td>
<td><?php echo $row["status"] ?></td>
<?php
$count += 1;
} ?>
</tr>
<h1> Count Of Users In  is : <?php echo $count; ?></h1>
</tbody>

</table>

</body>
</html>