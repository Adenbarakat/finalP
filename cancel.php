<!DOCTYPE html>
<?php include('menu.php') ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cancel</title>
    <style> 
     body {
	background-image:url('img/body6.jpg');
	background-attachment:fixed;
    background-size:100% 100%;
}
h1{
    text-align:center;
}
.form-control {
    display: block;
    width: 10%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;


}

.container{
	padding: 10%;
}
body {
        background-image: url("img/white2.png");
        background-size: cover;
        background-repeat: no-repeat;
    }

</style>
</head>
<body>
<div class="container">

<br><br>
<div style="text-align:center;"><span style=" color:#B8860B;"><span style="font-size:50px;"    
 tabindex="0">Cancel Meeting</span></span><br>
        </div>

 <div style="text-align:center;"><span style=" color: #B8860B"><span style="font-size:25px;"    
 tabindex="0"> </span></span><br>
 <br>
 <br>
<form  method="POST">
   <div>
    <center>

    <div class="form-group">
          <label for="">email</label>
          <br><br><br>
             <input required type="email" class="form-control" name="email" value="<?php echo $_SESSION['email'];?> ">  </div>
             <br><br><br>
                   <button name="submit" type="submit" class="btn btn-primary"style="background-color:#B8860B;">confirm</button>


 </div>
<br><br><br>


<?php

require("db.php");

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    if (isset($_GET['date'])) {
        $date = $_GET['date'];

        echo $date;
        echo $email;
        $cancelSchema = "SELECT * FROM appointments WHERE date>='" . $date . "' AND email='" . $email . "'";
        $cancelQuery = mysqli_query($con, $cancelSchema);

        while ($row = mysqli_fetch_array($cancelQuery)) {
            echo "<script>console.log('" . $row['timeslot'] . "');</script>";
            echo "<form method='post'>";
            echo $row['timeslot'] . "&nbsp;&nbsp;";
            echo $row['date'] . "&nbsp;&nbsp;";
            echo "<input type='checkbox' name='check' value='" . $row['timeslot'] . "'>&nbsp;&nbsp;";
            echo "<input type='hidden' name='email2' value='" . $email . "'>";
            echo "<input type='hidden' name='date' value='" . $row['date'] . "'>";
            echo "<input type='submit' value='Appointment cancellation' name='cancel'><br><br>";
            echo "</form>";
        }
    }
}

$msg = "";
if (isset($_POST['cancel'])) {
    if (isset($_POST['check'])) {
        $check = $_POST['check'];
        $email = $_POST['email2'];
        $date2 = $_POST['date'];
        echo $check;
        echo $date2;
        echo $email;
        // Add validation logic here if needed
        $sql = "DELETE FROM appointments WHERE date='" . $date2  . "' AND timeslot='" . $check . "' AND email='" . $email . "'";
        mysqli_query($con, $sql);
        echo $msg = "<div class='alert alert-danger'>The appointment was successfully canceled</div>";
    }
}

?>



</div>
</div>
</form>
<br><br>


</body>
</html>