<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO cart (product_name, product_id, price) VALUES (?, ?, ?)");
$stmt->bind_param("sid", $product_name, $product_id, $price);

$product_name = $_POST['product_name'];
$product_id = $_POST['product_id'];
$price = $_POST['price'];

$stmt->close();
$conn->close();

header("Location: smart_phone2.html");
exit();
?>
