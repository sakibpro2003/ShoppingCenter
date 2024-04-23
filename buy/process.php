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
        echo "Product buy successfull. Wait for delivery";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM addresses";
$result = $conn->query($sql);




$conn->close();
?>
