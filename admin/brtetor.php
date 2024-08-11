<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel - Appointments</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('product_images/white1.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">

<?php
include("nav.php"); // Include your navigation or any necessary files

// Establish your database connection assuming $con is your MySQLi connection object
$con = mysqli_connect("localhost","root","","projectgmrh");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Get the current month and year
$currentMonth = date('m');
$currentYear = date('Y');

// SQL query to select appointments for the current month
$query = "SELECT * FROM appointments WHERE MONTH(date) = $currentMonth AND YEAR(date) = $currentYear ORDER BY date";

// Execute the query
$sql = mysqli_query($con, $query);

?>
<div class="container mt-4">
<br><br><br>
    <h2>Appointments for Current Month</h2>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Treatment</th>
                <th>Timeslot</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($sql)) {
                echo '<tr>';
                echo '<td>' . $row["name"] . '</td>';
                echo '<td>' . $row["email"] . '</td>';
                echo '<td>' . $row["phone"] . '</td>';
                echo '<td>' . $row["treatment"] . '</td>';
                echo '<td>' . $row["timeslot"] . '</td>';
                echo '<td>' . $row["date"] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php

// Close the database connection
mysqli_close($con);
?>
</body>
</html>
