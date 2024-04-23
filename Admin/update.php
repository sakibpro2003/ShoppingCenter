<?php
$host = "localhost"; 
$username = "root";
$password = "";
$database = "shopping";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id']) && !empty(trim($_GET['id']))){
    $id = trim($_GET["id"]);
    
    $sql = "SELECT * FROM addresses WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $param_id);
        $param_id = $id;
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $fullname = $row["fullname"];
                $email = $row["email"];
                $address = $row["address"];
                $city = $row["city"];
                $region = $row["region"];
                $state = $row["state"];
                $zipcode = $row["zipcode"];
            } else {
                echo "No records found.";
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
            exit();
        }
        $stmt->close();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $region = $_POST["region"];
    $state = $_POST["state"];
    $zipcode = $_POST["zipcode"];

    $sql = "UPDATE addresses SET fullname=?, email=?, address=?, city=?, region=?, state=?, zipcode=? WHERE id=?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssssi", $fullname, $email, $address, $city, $region, $state, $zipcode, $id);
        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Address</title>
</head>
<body>
    <h2>Update Address</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="<?php echo $address; ?>"><br>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city" value="<?php echo $city; ?>"><br>
        <label for="region">Region:</label><br>
        <input type="text" id="region" name="region" value="<?php echo $region; ?>"><br>
        <label for="state">State:</label><br>
        <input type="text" id="state" name="state" value="<?php echo $state; ?>"><br>
        <label for="zipcode">Zipcode:</label><br>
        <input type="text" id="zipcode" name="zipcode" value="<?php echo $zipcode; ?>"><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
