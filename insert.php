<?php
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

// Prepare and bind the parameters
$stmt = $conn->prepare("INSERT INTO cart (product_name, product_id, price) VALUES (?, ?, ?)");
$stmt->bind_param("sid", $product_name, $product_id, $price);

// Set parameters and execute
$product_name = $_POST['product_name'];
$product_id = $_POST['product_id'];
$price = $_POST['price'];
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: smart_phone2.html"); // Redirect back to the index page
exit();
?>
