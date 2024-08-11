<?php
// Function to establish a PDO database connection
function pdo_connect_mysql() {
    try {
        return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    } catch (PDOException $exception) {
        exit('Database connection failed: ' . $exception->getMessage());
    }
}

?>