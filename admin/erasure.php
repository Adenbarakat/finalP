<?php
require("db.php");
$id=$_GET['id'];
$sql= "DELETE FROM product WHERE id = '$id'";

$query = mysqli_query($con,$sql);

header("location:products.php");
?>