<?php include('menu.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      
        .shopping-cart-sentence {
             font-size: 50px;
            font-weight: bold;
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
// Check if session is already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
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
?>
<?php
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Fetch product details from the database
    $stmt = $mysqli->prepare("SELECT * FROM product WHERE id = ?");
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    $item = [
        'id' => $product['id'],
        'name' => $product['name'],
        'price' => $product['price'],
        'quantity' => $quantity,
        'total' => $product['price'] * $quantity,
    ];

    $_SESSION['cart'][] = $item;

    $stmt->close();
}
?>
<?php
// Update quantity
if (isset($_POST['update_quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity'] = $quantity;
            $item['total'] = $item['price'] * $quantity;
            break;
        }
    }
}

// Remove item
if (isset($_POST['remove_item'])) {
    $product_id = $_POST['product_id'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Remove</th>
                <th>Update Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $grand_total = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $grand_total += $item['total'];
                    echo "<tr>
                        <td>{$item['name']}</td>
                        <td>{$item['price']}</td>
                        <td>{$item['quantity']}</td>
                        <td>{$item['total']}</td>
                        <td>
                            <form method='post'>
                                <input type='hidden' name='product_id' value='{$item['id']}'>
                                <button type='submit' name='remove_item'>Remove</button>
                            </form>
                        </td>
                        <td>
                            <form method='post'>
                                <input type='hidden' name='product_id' value='{$item['id']}'>
                                <input type='number' name='quantity' value='{$item['quantity']}' min='1'>
                                <button type='submit' name='update_quantity'>Update</button>
                            </form>
                        </td>
                    </tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <h2>Grand Total: <?php echo $grand_total; ?></h2>
</body>
</html>
<form method="post">
    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
    <input type="number" name="quantity" value="1" min="1">
    <button type="submit" name="add_to_cart">Add to Cart</button>
</form>
