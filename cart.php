<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
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
            flex-basis: 30%;
        }

        .responsive-table .col-3 {
            flex-basis: 15%;
        }

        .responsive-table .col-4 {
            flex-basis: 15%;
        }

        .responsive-table .col-5 {
            flex-basis: 20%;
        }

        .responsive-table .col-6 {
            flex-basis: 10%;
            text-align: center;
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
        <h2 class="text-4xl">Shopping Cart</h2>

        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">ID</div>
                <div class="col col-2">Product Name</div>
                <div class="col col-3">Product ID</div>
                <div class="col col-4">Price</div>
                <div class="col col-5">Added Date & Time</div>
                <div class="col col-6">Action</div>
            </li>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "shopping";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, product_name, product_id, price, date_added FROM cart";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='table-row'>";
                    echo "<div class='col col-1'>" . $row["id"] . "</div>";
                    echo "<div class='col col-2'>" . $row["product_name"] . "</div>";
                    echo "<div class='col col-3'>" . $row["product_id"] . "</div>";
                    echo "<div class='col col-4'>$" . $row["price"] . "</div>";
                    echo "<div class='col col-5'>" . $row["date_added"] . "</div>";
                    echo "<div class='col col-6'><button onclick='deleteItem(" . $row["id"] . ")'>Delete</button></div>";
                    echo "</li>";
                }
            } else {
                echo "<li>No items in the cart</li>";
            }
            $conn->close();
            ?>
        </ul>
        <div class="flex justify-center">
            <button onclick="window.location.href='index.html'" class="btn btn-primary 
            </div>
">Home</button>
        </div>

        <script>
            function deleteItem(id) {
                if (confirm("Are you sure you want to delete this item?")) {
                    var item = document.getElementById("item-" + id);
                    item.parentNode.removeChild(item);
                }
            }
        </script>
</body>

</html>