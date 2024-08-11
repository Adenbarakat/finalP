<?php
include('menu.php');

// Database connection details
$host = 'localhost';
$user = 'root';
$pass = '';  // replace with your actual password
$db   = 'projectgmrh';

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .shopping-cart-sentence {
             font-size: 50px;
            font-weight: bold;
            color: #333; /* Adjust the color as needed */
            text-align: center;
            padding: 100px 15% 30px 30px;
   
        }
    </style>
</head>
<body>
    <header>
        <p class="shopping-cart-sentence">Shopping Cart</p>
    </header>
    
</body>
</html>
<?php
function getMostSoldProduct($pdo) {
    $sql = "SELECT * FROM product ORDER BY sales_count DESC LIMIT 1";
    $stmt = $pdo->query($sql);
    return $stmt->fetch(PDO::FETCH_ASSOC);
} 

// Function to add a product to the cart
function addToCart($pdo, $productId, $productName, $productPrice, $quantity = 1) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $stmt = $pdo->prepare("SELECT quantity FROM product WHERE id = ?");
    $stmt->execute([$productId]);
    $availableQuantity = $stmt->fetchColumn();

    if ($availableQuantity !== false && $availableQuantity >= $quantity) { 
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = [
                'quantity' => $quantity,
                'name' => $productName,
                'price' => $productPrice
            ];
        }
        $remainingQuantity = max(0, $availableQuantity - $quantity);
        $updateStmt = $pdo->prepare("UPDATE product SET quantity = ? WHERE id = ?");
        $updateStmt->execute([$remainingQuantity, $productId]);

        echo '<p>Product added to the cart.</p>';
    } else {
        echo '<script>alert("Quantity exceeded the allowed limit or unavailable.")</script>';
    }
}
   

// Handle adding to cart
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    addToCart($pdo, $productId, $productName, $productPrice, $quantity);
}
if (isset($_POST['remove_from_cart']) && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    removeFromCart($productId);
    header('Location: cart.php');
}
// Handle updating the quantity of a product in the cart
if (isset($_POST['update_quantity']) && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    updateQuantity($productId, $quantity);
    header('Location: cart.php');
}

// Function to remove a product from the cart
function removeFromCart($productId) {
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}

function updateQuantity($productId, $quantity) {
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] = $quantity;
    }
}


 
// Database connection details
$host = 'localhost';
$user = 'root';
$pass = '';  // replace with your actual password
$db   = 'projectgmrh';
// Establish a database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Function to display the cart with images in a horizontal layout
function displayCart($pdo) {
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo 'Your cart is empty.';
        return;
    }

    $productIds = array_keys($_SESSION['cart']);
    $placeholders = implode(',', array_fill(0, count($productIds), '?'));

    $stmt = $pdo->prepare("SELECT * FROM product WHERE id IN ($placeholders)");
    $stmt->execute($productIds);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

  
    echo '<div style="display: flex; flex-wrap: wrap; justify-content: center;">';

    $totalPrice = 0;
    

    foreach ($products as $product) {
        $productId = $product['id'];
        $quantity = $_SESSION['cart'][$productId]['quantity'];
        $total = $product['price'] * (int)$quantity; // Ensure $quantity is cast to int
        $totalPrice += $total;

        echo '<div style="border: 10px solid #ccc; margin: 30px; padding: 50px; text-align: center;">';
        echo '<img src="admin/product_images/' . $product['image'] . '" alt="' . $product['name'] . '" style="max-width: 350px;">';
        echo '<p style= "font-size: 20px;font-weight: bold;text-align: center; padding: 10px 10% 20px 20px;">Name: ' . $product['name']. '</p>';
        echo '<p style= "font-size: 20px;font-weight: bold;text-align: center; padding: 0px 10% 20px 20px;">Price: ' . $product['price'] . '</p>';
        echo '<p style= "font-size: 20px;font-weight: bold;text-align: center; padding: 10px 10% 20px 20px;">Quantity: ' . $quantity . '</p>';
        echo '<p style= "font-size: 20px;font-weight: bold;text-align: center; padding: 10px 10% 20px 20px;">Total: ' . $total . '</p>';


        
        echo '<form method="post">';
        echo '<input type="hidden" name="product_id" value="' . $productId . '">';
        echo '<button class="remove-from-cart-button" type="submit" name="remove_from_cart">Remove</button>';
        echo '</form>';

        echo '<form method="post">';
        echo '<input type="hidden" name="product_id" value="' . $productId . '">';
        echo '<input style= "font-size: 30px;font-weight: bold;text-align: center;" type="number" name="quantity" value="' . $quantity . '" min="1" max="30">';
        echo '<button class="update-quantity" type="submit" name="update_quantity">Update</button>';
        echo '</form>';
        echo '</div>'; 
    }


    
 
        // Display total and payment button
    
        echo '<div style="margin-top: 20px; text-align: center;">';
        echo '<p>Total: ' . $totalPrice . '</p>';
        echo '<input type="hidden" name="total_price" value="' . $totalPrice . '">';
        echo '<a href="payment.php"><button type="button" class=" btn--border btn-read btn--animated">🛒Proceed to payment</button></a>';
        echo '</form>';
     
    echo '</div>'; // Closing the div around the total and payment button 
    }
    
    
// Display cart
displayCart($pdo);

?>

<html lang="en">
<head>
    <style>
        body {
            background-image: url("img/white2.png");
    background-size: cover;
    background-repeat: no-repeat;
    display: flex;
    flex-direction: column;
    margin: 0;
    
        }
        /*  styles for the button */
        .remove-from-cart-button {
            transition-duration: 0.4s;
            display: inline-block;
            padding: 5px 10px;
            font-size: 20px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            border: none;
            box-shadow: 0 9px #999;
            font-weight: bold;
            margin: 15px;
        }



       .remove-from-cart-button:hover {
            background-color: #765421;
            color: white;
        }

        .update-quantity {
            transition-duration: 0.4s;
            display: inline-block;
            padding: 5px 10px;
            font-size: 20px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            border: none;
            box-shadow: 0 9px #999;
            font-weight: bold;
            margin: 15px;
        }

        .update-quantity:hover {
            background-color: #765421;
            color: white;
        }

        /* Styles for the button */
        .proceed-to-payment {
            transition-duration: 0.4s;
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
            background-color: #765421;
            color: white;
            margin-top: 20px; /* Adjust the margin as needed */
        }

        .proceed-to-payment:hover {
            background-color: #6c4a1f; /* Adjust the color as needed */
        }

        .wrapper .btn-read {
            margin: 35px 0 0px 18px;
        }

        .btn-read {
            position: relative;
            display: inline-block;
            font-size: 14px;
            padding: 15px 30px;
            overflow: hidden;
            z-index: 1;
            color: #fff;
            background-color: #0d0d0d;
            border: none;
            font-weight: 600;
        }

        .btn--animated:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #B8860B;
            transform: scaleX(0);
            transform-origin: 0 50%;
            transition-property: transform;
            transition-duration: 2s;
            transition-timing-function: ease-out;
            z-index: -1;
        }

        .btn--animated:hover {
            color: #fff;
        }

        .btn--animated:hover:before {
            transform: scaleX(1);
            transition-timing-function: cubic-bezier(0.45, 1.64, 0.47, 0.66);
        }
    </style>
</head>

<body>
<div class="wrapper">
    <a href="category1.php"><button type="button" class="btn--border btn-read btn--animated">Back to products page</button></a>
    <br><br>
</div>
</body>
</html>

