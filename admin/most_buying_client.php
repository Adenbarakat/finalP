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
  </body>
  <?php include("nav.php"); ?>
    <br><br><br> <br><br><br> <br><br><br> <br><br><br>
   <center> 
<?php
// Connect to the database
$con = mysqli_connect("localhost", "root", "", "projectgmrh");
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Adjust the query to use user_email for joining users and orders
$sql = "SELECT user.id AS user_id, user.name, user.email, COUNT(payment_details.id) AS purchase_count
        FROM user
        JOIN payment_details ON user.email = payment_details.email
        GROUP BY user.id, user.name, user.email
        ORDER BY purchase_count DESC
        LIMIT 1";

$result = $con->query($sql);

if ($result === false) {
    die("Query failed: " . $con->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Client ID: " . $row["user_id"] . "<br>";
    echo "Name: " . $row["name"] . "<br>";
    echo "Email: " . $row["email"] . "<br>";
    echo "Number of Purchases: " . $row["purchase_count"] . "<br>";
} else {
    echo "No purchases found.";
}

$con->close();
?>
</center>