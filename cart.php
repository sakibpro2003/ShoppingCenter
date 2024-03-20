<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            font-family: 'lato', sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 26px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .responsive-table {
            margin-top: 20px;
            list-style-type: none;
            padding: 0;
        }

        .responsive-table li {
            border-radius: 5px;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }

        .responsive-table .table-header {
            background-color: #95A5A6;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            display: flex;
            justify-content: space-between;
            padding: 10px;
            margin-bottom: 15px;
            color: #fff;
            border-radius: 5px;
        }

        .responsive-table .col-1 {
            flex-basis: 10%;
        }

        .responsive-table .col-2 {
            flex-basis: 35%;
        }

        .responsive-table .col-3 {
            flex-basis: 20%;
        }

        .responsive-table .col-4 {
            flex-basis: 20%;
        }

        .responsive-table .col-5 {
            flex-basis: 15%;
        }

        @media all and (max-width: 767px) {
            .responsive-table .table-header {
                display: none;
            }

            .responsive-table .table-row {
                box-shadow: none;
            }

            .responsive-table li {
                display: block;
            }

            .responsive-table .col {
                flex-basis: 100%;
                display: flex;
                padding: 10px 0;
            }

            .responsive-table .col:before {
                color: #6C7A89;
                padding-right: 10px;
                content: attr(data-label);
                flex-basis: 50%;
                text-align: right;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Shopping Cart <small>(Responsive)</small></h2>

        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">ID</div>
                <div class="col col-2">Product Name</div>
                <div class="col col-3">Product ID</div>
                <div class="col col-4">Price</div>
                <div class="col col-5">Added Date & Time</div>
            </li>
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
                    echo "<li class='table-row'>";
                    echo "<div class='col col-1'>" . $row["id"] . "</div>";
                    echo "<div class='col col-2'>" . $row["product_name"] . "</div>";
                    echo "<div class='col col-3'>" . $row["product_id"] . "</div>";
                    echo "<div class='col col-4'>$" . $row["price"] . "</div>";
                    echo "<div class='col col-5'>" . $row["date_added"] . "</div>";
                    echo "</li>";
                }
            } else {
                echo "<li>No items in the cart</li>";
            }
            $conn->close();
            ?>
        </ul>

        <a href="index.html" style="display: block; text-align: center; margin-top: 20px; text-decoration: none; color: #333; font-size: 16px;">Back to Shopping</a>
    </div>

    <script src="script.js"></script>
</body>

</html>