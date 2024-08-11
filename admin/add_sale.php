<?php
require("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];

    // Insert sale data into the sales table
    $sql = "INSERT INTO sales (product_id, quantity) VALUES ('$product_id', '$quantity')";
    if (mysqli_query($con, $sql)) {
        echo "Sale added successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Debugging output
    $sales_sql = "SELECT * FROM sales";
    $sales_result = mysqli_query($con, $sales_sql);
    if ($sales_result) {
        while ($sales_row = mysqli_fetch_assoc($sales_result)) {
            echo "<pre>";
            print_r($sales_row);
            echo "</pre>";
        }
    }

    mysqli_close($con);
}
?>