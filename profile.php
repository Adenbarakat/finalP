
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <title>profile</title>
    <style>
        body {
            background-image:url('img/background2.png');
            background-attachment:fixed;
            background-size:100% 100%;
            z-index: 1;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: LightGray;
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: LightGray
        }

        .profile-button:focus {
            background: LightGray;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 14px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }

        .container {
            padding: 2%;
        }
    </style>
</head>
<body>
    <?php include('menu.php') ?>
    <div class="container">
    <?php
$errors = array();

if (isset($_POST['saveE'])) {
    $id = $_GET['id'];
    $email = $_POST['email'];

    $email_check = "SELECT * FROM user WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email that you have entered already exists!";
    } else {
        $userSql2 = "UPDATE user SET email='$email' WHERE id='" . $id . "'";
        $query3 = mysqli_query($con, $userSql2);

        $ordersSql = "UPDATE orders SET email='$email' WHERE email='" . $_SESSION['email'] . "'";
        $query4 = mysqli_query($con, $ordersSql);

        $appointment = "UPDATE appointment SET email='$email' WHERE email='" . $_SESSION['email'] . "'";
        $query5 = mysqli_query($con, $appointment);

        $payment_details = "UPDATE payment_details SET email='$email' WHERE email='" . $_SESSION['email'] . "'";
        $query7 = mysqli_query($con, $payment_details);

        if ($query3 && $query4 && $query5 && $query7) {
            $_SESSION['email'] = $email;
            $errors['updated'] = "Your Email Has Been Changed Successfully!";
        } else {
            $errors['email'] = "Failed to update email. Please try again.";
        }
    }
}

if (isset($_POST['saveData'])) {
    $id = $_GET['id'];

    $fname = isset($_POST['name']) ? $_POST['name'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $Sql = "UPDATE user SET name='$fname', lname='$lname', password='$password' WHERE id='" . $id . "'";
    $query2 = mysqli_query($con, $Sql);
    if (!$query2) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    
    $errors['update'] = "Your Details Has Been Changed Successfully !";
}
?>

        <form action="" method="post">
            <div class="container rounded bg-black mt-5 mb-5">
                <?php
                $sql = "SELECT * FROM user WHERE email='" . $_SESSION['email'] . "'";
                $query = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    $name = isset($row['name']) ? $row['name'] : '';
                    $email = isset($row['email']) ? $row['email'] : '';
                    $password = isset($row['password']) ? $row['password'] : '';
                    $phone = isset($row['phone']) ? $row['phone'] : '';
                    $status = isset($row['status']) ? $row['status'] : '';
                
                
                    ?>
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><span class="font-weight-bold"><?php echo $row['name']; ?></span><span class="text-black-50"><?php echo $row['email']; ?></span><span> </span></div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="justify-content-between align-items-center mb-3">
                                    <h3 class="text-center">Account Information</h3>
                                </div>
                                <div class="row mt-2">
    <div class="col-md-6">
        <label class="labels">Name</label>
        <input type="text" class="form-control" name="fname" placeholder="first name" value="<?php echo isset($row['fname']) ? $row['fname'] : ''; ?>" required>
    </div>
    
    <div class="col-md-6">
        <label class="labels">Last Name</label>
        <input type="text" class="form-control" name="lname" placeholder="last name"  value="<?php echo isset($row['lname']) ? $row['lname'] : ''; ?>"  required>

    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <label class="labels">Password</label>
        <input type="text" class="form-control" placeholder="password" name="password" value="<?php echo isset($row['password']) ? $row['password'] : ''; ?>" required>
    </div>
    <div class="mt-5 text-center">
        <button class="btn btn-primary profile-button" style="background-color: LightGray;" type="submit" name="saveData">Save</button>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <label class="labels">Email</label>
        <input type="text" class="form-control" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" name="email" placeholder="email" required>
    </div>
</div>

                                <div class="mt-5 text-center">
                                    <button class="btn btn-primary profile-button" style="background-color:LightGray;" type="submit" name="saveE">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <?php } ?>
            </div>
        </form>
    </div>
    <?php include("foter.php"); ?>
</body>
</html>
