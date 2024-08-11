<?php
if (session_status() == PHP_SESSION_NONE) {
  // Start the session only if it's not already started
  session_start();
}

require("db.php");
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        if($status == "verfied"){
         // echo "<script>window.location = 'home.php'</script>";
        //  header('Location: login.php');
        //$fname=$fetch_info['fname'];
      }
    }
}  else
{
  header('Location: login.php');
}
?>