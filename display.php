<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, product_name, product_id, price FROM cart";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row["id"] . " - Product Name: " . $row["product_name"] . " - Product ID: " . $row["product_id"] . " - Price: /=" . $row["price"] . "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
