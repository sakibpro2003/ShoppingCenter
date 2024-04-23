<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "shopping";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $region = $_POST["region"];
    $state = $_POST["state"];
    $zipcode = $_POST["zipcode"];

    $sql = "INSERT INTO addresses (fullname, email, address, city, region, state, zipcode) VALUES ('$fullname', '$email', '$address', '$city', '$region', '$state', '$zipcode')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM addresses";
$result = $conn->query($sql);

echo "<style>";
echo ".address-list { margin-top: 20px;  }";
echo ".address-item { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }";
echo ".address-links a { margin-right: 10px; text-decoration: none; color: #007bff; }";
echo ".address-links a:hover { text-decoration: underline; }";
echo "</style>";

if ($result->num_rows > 0) {
    echo "<div class='address-list'>";
    while ($row = $result->fetch_assoc()) {
        // echo count($row+2);
        echo "<div class='address-item '>";
        echo "Full Name: " . $row["fullname"] . " - Email: " . $row["email"] . " - Address: " . $row["address"] . " - City: " . $row["city"] . " - Region: " . $row["region"] . " - State: " . $row["state"] . " - Zipcode: " . $row["zipcode"];
        echo "<div class='address-links'>";
        echo "<a href='delete.php?id=" . $row["id"] . "'>Delete</a>";
        echo "<a href='update.php?id=" . $row["id"] . "'>Update</a>";
        echo "</div>"; 
        echo "</div>"; 
    }
    echo "</div>"; 
} else {
    echo "0 results";
}

$conn->close();
?>
