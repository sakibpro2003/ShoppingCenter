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

$sql = "SELECT id, product_name, product_id, price, date_added FROM cart";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["product_name"] . "</td>";
    echo "<td>" . $row["product_id"] . "</td>";
    echo "<td>/=" . $row["price"] . "</td>";
    echo "<td>" . $row["date_added"] . "</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='5'>No items in the cart</td></tr>";
}
$conn->close();
