<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="medicine_cart.css">
</head>
<body>
    <h1>Your Cart Details</h1>
    <?php
        require_once "config.php";
        session_start();
        $username = $_SESSION['username'];
        $query= "SELECT * FROM user where username = ?";
        $checking = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($checking, "s", $username);
        mysqli_stmt_execute($checking);
        $result = mysqli_stmt_get_result($checking);
        if($result)
        {
            echo '<table id = "Medicines">';
            echo "<thead>";
            echo " ";
            echo "<th>Serial No</th>";
            echo "<th>Username</th>";
            echo "<th>Medicine id</th>";
            echo "<th>Medicine Name</th>";
            echo "<th>Quantity</th>";
            echo "<th width=320>Cost</th>";
            echo "<th width=320>Date And time</th>";
            echo " ";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td class='medicine_id'>" . $row['sr.no'] . "</td>";
                echo "<td class='medicine_name'>" . $row['username'] . "</td>";
                echo "<td class='disease'>" . $row['Medicine_id'] . "</td>";
                echo "<td class='selling_price'>" . $row['Medicine_Name'] . "</td>";
                echo "<td class='instock'>" . $row['quantity'] . "</td>";
                echo "<td class='price_cost'>" . $row['price_cost'] . "</td>";
                echo "<td class='date_time'>" . $row['date_time'] . "</td>";
                echo "&nbsp;";
                echo "</td>";
                echo "</tr>";
            }
            echo "</td></tr>";
            echo "</tbody>";
            echo "</table>";
        }
   ?>
</body>
</html>
