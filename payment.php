<?php
require("menu.php");
require("db.php");

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to update the sales count
function processOrder($productId, $quantitySold, $pdo) {
    // Begin transaction
    $pdo->beginTransaction();
    try {
        // Update the product sales count
        $sql = "UPDATE product SET sales_count = sales_count + ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$quantitySold, $productId]);

        // Commit the transaction
        $pdo->commit();
        echo "Order processed and sales count updated successfully!";
    } catch (Exception $e) {
        // Rollback in case of error
        $pdo->rollback();
        echo "Failed to update sales count: " . $e->getMessage();
    }
}

if (isset($_POST['check'])) {
    // Retrieve form data
    $cardname = $_POST['cardName'];
    $creditnum = $_POST['creditnum'];
    $expiry = $_POST['expiry'];
    $cvv = $_POST['cvv'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $zipcode = $_POST['zipcode'];

    // Prepare and execute the SQL statement for payment details
    $stmt = $con->prepare("INSERT INTO payment_details (cardname, cardnumber, expiry, cvv, address, city, email, phone, zipcode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $con->error);
    }

    $bind = $stmt->bind_param("sssssssss", $cardname, $creditnum, $expiry, $cvv, $address, $city, $email, $phone, $zipcode);
    if ($bind === false) {
        die("Error binding parameters: " . $stmt->error);
    }

    $execute = $stmt->execute();
    if ($execute) {
        $order_number = rand(1111, 9999);

        if (!empty($_SESSION['shopping_cart'])) {
            $stmt = $con->prepare("SELECT MAX(count) AS big FROM orders");
            if ($stmt === false) {
                die("Error preparing statement: " . $con->error);
            }

            $execute = $stmt->execute();
            if ($execute === false) {
                die("Error executing statement: " . $stmt->error);
            }

            $result = $stmt->get_result();
            if ($result === false) {
                die("Error getting result: " . $stmt->error);
            }

            $row = $result->fetch_assoc();
            $count = $row['big'] + 1;

            foreach ($_SESSION['shopping_cart'] as $key => $values) {
                $pro_id = $values['item_id'];
                $name = $values['item_name'];
                $price = $values['item_price'];
                $image = $values['item_image'];
                $qty = $values['item_quantity'];
                $cat = $values['item_cat'];
                $date = date('Y-m-d H:i:s');

                // Prepare and execute the SQL statement for orders
                $stmt = $con->prepare("INSERT INTO orders (product_id, order_number, user_email, image, name, price, qty, date, id, pro_cat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                if ($stmt === false) {
                    die("Error preparing statement: " . $con->error);
                }

                $bind = $stmt->bind_param("iissssisss", $pro_id, $order_number, $email, $image, $name, $price, $qty, $date, $count, $cat);
                if ($bind === false) {
                    die("Error binding parameters: " . $stmt->error);
                }

                $execute = $stmt->execute();
                if (!$execute) {
                    echo "<script>alert('Order insertion failed: " . $stmt->error . "');</script>";
                } else {
                    // Call processOrder to update sales count
                    processOrder($pro_id, $qty, $pdo);
                }
            }
        }
        
        // Redirect to receipt after processing all items
        header("Location: receipt.php");
        exit();
    } else {
        echo "<script>alert('Payment details insertion failed: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            background-image: url("img/white2.png");
            background-size: cover;
            background-repeat: no-repeat;
        }
        .card {
            border: none;
        }
        .form-control {
            border-bottom: 2px solid #eee !important;
            border: none;
            font-weight: 600;
        }
        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #8bbafe;
            outline: 0;
            box-shadow: none;
            border-radius: 0px;
            border-bottom: 2px solid blue !important;
        }
        .inputbox {
            position: relative;
            margin-bottom: 20px;
            width: 100%;
        }
        .inputbox span {
            position: absolute;
            top: 7px;
            left: 11px;
            transition: 0.5s;
        }
        .inputbox i {
            position: absolute;
            top: 13px;
            right: 8px;
            transition: 0.5s;
            color: #3F51B5;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .inputbox input:focus~span {
            transform: translateX(-0px) translateY(-15px);
            font-size: 12px;
        }
        .inputbox input:valid~span {
            transform: translateX(-0px) translateY(-15px);
            font-size: 12px;
        }
        .card-blue {
            background-color: #492bc4;
        }
        .hightlight {
            background-color: #5737d9;
            padding: 10px;
            border-radius: 10px;
            margin-top: 15px;
            font-size: 14px;
        }
        .yellow {
            color: #fdcc49;
        }
        .decoration {
            text-decoration: none;
            font-size: 14px;
        }
        .btn-success {
            color: #fff;
            background-color: #B8860B;
            border-color: #000;
        }
        .btn-success:hover {
            color: #fff;
            background-color: LightGray;
            border-color: #000;
        }
        .decoration:hover {
            text-decoration: none;
            color: #fdcc49;
        }
        h6 {
            text-align: center;
            font-size: 20px;
            color: #B8860B;
        }
        .payment {
            font-size: 50px;
            font-weight: bold;
            color: #333;
            text-align: center;
            padding: 100px 15% 30px 30px;
        }
    </style>
</head>
<body>
    <header>
        <p class="payment">Payment Section</p>
    </header>
    <div class="container">
        <div class="container mt-5 px-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="card p-3">
                        <form action="" method="post">
                            <h6 class="text-uppercase">Payment Information</h6>
                            <div class="inputbox mt-3">
                                <input type="text" name="cardName" class="form-control" required="required">
                                <span>Name on card</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2">
                                        <input type="text" name="creditnum" class="form-control" required="required">
                                        <i class="fa fa-credit-card"></i>
                                        <span>Card Number</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-row">
                                        <div class="inputbox mt-3 mr-2">
                                            <input type="text" name="expiry" class="form-control" required="required">
                                            <span>Expiry</span>
                                        </div>
                                        <div class="inputbox mt-3 mr-2">
                                            <input type="text" name="cvv" class="form-control" required="required">
                                            <span>CVV</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-4">
                                <h6 class="text-uppercase">ADDRESS</h6>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="inputbox mt-3 mr-2">
                                            <input type="text" name="address" class="form-control" required="required">
                                            <span>Street Address</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputbox mt-3 mr-2">
                                            <input type="text" name="city" class="form-control" required="required">
                                            <span>City</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-5">
                                        <div class="inputbox mt-3 mr-2">
                                            <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control" required="required">
                                            <span>Email</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="inputbox mt-3 mr-2">
                                            <input type="tel" name="phone" class="form-control" required="required">
                                            <span>Phone Number</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="inputbox mt-3 mr-2">
                                            <input type="text" name="zipcode" class="form-control" required="required">
                                            <span>Zip code</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 d-flex justify-content-between">
                                <button class="btn btn-success px-3" type="submit" name="check">Pay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</body>
</html>
