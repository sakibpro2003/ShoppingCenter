<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching data from POST request
$productName = $_POST['productName'];
$productId = $_POST['productId'];
$price = $_POST['price'];

// Insert data into the database
$sql = "INSERT INTO cart (product_name, product_id, price) VALUES ('$productName', '$productId', '$price')";

if ($conn->query($sql) === TRUE) {
    echo "Product added to cart successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
