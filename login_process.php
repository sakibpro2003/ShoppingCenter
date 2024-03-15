<?php
session_start();

// Establish connection to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// SQL to check if the user exists
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists, verify password
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // Password is correct, set session variables and redirect to dashboard
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        header("Location: index.html");
        exit();
    } else {
        // Password is incorrect
        // echo "Incorrect password";
        header("Location: login.html");
    }
} else {
    // User does not exist
    // echo "User not found";
    header("Location: login.html");
}

$conn->close();
?>
