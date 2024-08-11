<?php include('menu.php') ?>
<?php
// Start session to use session variables for the cart
session_start();

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

// Function to add a product to the cart
function addToCart($pdo, $productId, $productName, $productPrice, $requestedQuantity) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $stmt = $pdo->prepare("SELECT quantity FROM product WHERE id = ?");
    $stmt->execute([$productId]);
    $availableQuantity = $stmt->fetchColumn();

    if ($availableQuantity !== false && $availableQuantity >= $requestedQuantity) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $requestedQuantity;
        } else {
            $_SESSION['cart'][$productId] = [
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => $requestedQuantity
            ];
        }

        $newQuantity = $availableQuantity - $requestedQuantity;
        $updateStmt = $pdo->prepare("UPDATE product SET quantity = ? WHERE id = ?");
        $updateStmt->execute([$newQuantity, $productId]);

        echo '<script>alert("Product added to the cart.");</script>';
    } else {
        echo '<script>alert("Insufficient stock for this product.");</script>';
    }
}

// When a product is added to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    addToCart($pdo, $productId, $productName, $productPrice, $quantity);
}

// Function to get all products
function getAllProducts($pdo) {
    $stmt = $pdo->query('SELECT * FROM product');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$products = getAllProducts($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body {
            background-image: url("img/white2.png");
            background-size: cover;
            background-repeat: no-repeat;
        }
        .products-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }
        .item {
            width: 200px;
            padding: 20px;
            text-align: center;
           
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .item img {
            width: 100%;
            height: auto;
            max-height: 150px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .item img:hover {
            transform: scale(1.1);
        }
        .add-to-cart-button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            border: none;
            border-radius: 5px;
            background-color: #765421;
            color: white;
            transition: background-color 0.3s ease;
        }
        .add-to-cart-button:hover {
            background-color: black;
        }
        input[type="number"] {
            width: 60px;
            padding: 5px;
            font-size: 16px;
            text-align: center;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="products-container">
    <?php foreach ($products as $product): ?>
        <div class="item">
            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
            <img src="admin/product_images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
            <p>Available: <?php echo htmlspecialchars($product['quantity']); ?></p>
            
            <form method="post">
                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                <input type="hidden" name="product_name" value="<?phpecho htmlspecialchars($product['name']); ?>">
                <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product['price']); ?>">
                <label for="quantity_<?php echo htmlspecialchars($product['id']); ?>">Quantity:</label>
                <input type="number" id="quantity_<?php echo htmlspecialchars($product['id']); ?>" name="quantity" value="1" min="1" max="<?php echo htmlspecialchars($product['quantity']); ?>">
               <br><br><br>
                <button type="submit" name="add_to_cart" class="add-to-cart-button">Add to Cart</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
