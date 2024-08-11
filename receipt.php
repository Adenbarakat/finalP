<?php
require("menu.php");
session_start(); // Start the session

$host = 'localhost';
$user = 'root';
$pass = ''; // Replace with your actual password
$db   = 'projectgmrh';

$totalPrice = 0; // Initialize totalPrice
$fee = 25; // Postage fee
$order_number = rand(1111, 9999); // Generate a random order number
$total_item = 0; // Initialize total_item count

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Receipt</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="billing">
            <center>
                <h4 class="mt-2 mb-3">Your order is confirmed</h4>
                <span class="fs-12 text-black-50">Your order has been confirmed and will be shipped within 14 days</span>
            </center>
            <hr>
            <div class="d-flex flex-row justify-content-between align-items-center order-details">
                <div><span class="d-block fs-12">Ordered Date</span><span class="font-weight-bold"><?php echo date('j F, Y'); ?></span></div>
                <div><span class="d-block fs-12">Order Number</span><span class="font-weight-bold"><?php echo $order_number; ?></span></div>
            </div>
            <hr>
            <?php
            if (!empty($_SESSION['cart'])) { // Verify with the same session key used in the cart
                foreach ($_SESSION['cart'] as $key => $values) {
                    $email = $_SESSION['email'] ?? '';  // Use null coalescing operator for safety
                    $price = $values['price'] ?? 0; // Default price to 0 if not provided
                    $qty = $values['quantity'] ?? 0; // Default quantity to 0 if not provided
                    
                    // Only display items with a quantity > 0
                    if ($qty > 0) {
                        $totalPrice += ($price * $qty);
                        $total_item += $qty;

                        // Display product details
                        echo '<div class="d-flex justify-content-between align-items-center product-details">';
                        echo '<div class="d-flex flex-column justify-content-between ml-2">';
                        echo '<span class="fs-12">Qty: ' . htmlspecialchars($qty) . ' </span>';
                        echo '</div></div>';
                        echo '<div class="product-price"><h5>' . htmlspecialchars($price * $qty) . '</h5></div>';
                        echo '</div>';
                    }
                }

                // Display total items and total price
                echo '<div>Total Items: ' . htmlspecialchars($total_item) . '</div>';
                echo '<div>Total Price: ' . htmlspecialchars($totalPrice) . '</div>';
            }
            ?>
            <br><br>
            <span class="d-block">Estimated delivery date</span><span class="font-weight-bold text-success">
                <?php $time = strtotime("+14 Days");
                echo date("j F, Y", $time);
                ?>
            </span>
            <hr>
            <div class="mt-5 amount row">
                <div class="col-md-6" style="margin-left:400px;">
                    <div class="billing">
                        <div class="d-flex justify-content-between"><span>Subtotal</span><span class="font-weight-bold"><?php echo htmlspecialchars($totalPrice); ?></span></div>
                        <div class="d-flex justify-content-between mt-2"><span>Postage</span><span class="font-weight-bold"><?php echo htmlspecialchars($fee); ?> </span></div>
                        <hr>
                        <div class="d-flex justify-content-between mt-1"><span class="font-weight-bold">Total</span><span class="font-weight-bold text-success"><?php echo htmlspecialchars($totalPrice + $fee); ?> </span></div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="d-flex justify-content-between align-items-center footer">
                <div class="thanks"><span class="d-block font-weight-bold">Thank You For Ordering</span></div>
                <div class="d-flex flex-column justify-content-end align-items-end"><span class="d-block font-weight-bold">For Any Other Help</span><span>Call - 053-5432236</span></div>
            </div>
        </div>
    </div>

    <?php
    // Clear the shopping cart session after order confirmation
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $values) {
            unset($_SESSION['cart'][$key]);
        }
    }
    ?>
</body>

</html>
