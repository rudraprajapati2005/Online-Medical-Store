<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="medicine_cart.css">
</head>
<body>

    <div class="header">
        <h1>Available Medicines</h1>
        <Button onclick="Cart()">Show Your Cart </Button>
    </div>

    <!-- $_GET["tablename"]=="medicine" && isset($_GET["tablename"]) -->
<label for="Search">Search  </label>
<input type="text" id="Search" onkeyup="Search()" placeholder="Search...">
<?php
require_once "config.php";
session_start();
if(1){
    $sql = "SELECT * FROM medicines";
    echo "<br>";
    echo "<small id='small'>default it sets quantity to 1</small>";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table id = "Medicines">';
        echo "<thead>";
        echo " ";
        echo "<th>Medicine Id</th>";
        echo "<th>Medicine Name</th>";
        echo "<th>Disease</th>";
        echo "<th>Price </th>";
        echo "<th>In Stock</th>";
        echo "<th width=320>Buy Now </th>";
        echo " ";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td class='medicine_id'>" . $row['Medicine_id'] . "</td>";
            echo "<td class='medicine_name'>" . $row['Medicine_name'] . "</td>";
            echo "<td class='disease'>" . $row['Diseases'] . "</td>";
            echo "<td class='selling_price'>" . $row['selling_price'] . "</td>";
            echo "<td class='instock'>" . $row['in_stock'] . "</td>";
            echo "<td>";
            echo "<form action='User_Purchased.php' method='GET'>";
            echo "<input type='hidden' name='user' value='" . $_SESSION['username']."'>";
            echo "<input type='hidden' name='medicineid' value='" . $row['Medicine_id'] . "'>";
            echo "Quantity : <input type='number' min='0' max='".$row['in_stock']."'
            value='stock' name = 'stock'>";
            echo "      ";
            echo "<button type='submit'>Add to Cart</button>";
            echo "</form>";
            

            echo "&nbsp;";
            echo "</td>";
            echo "</tr>";
        }
        echo "<tr><td colspan=9>";
        echo "<a href='create.php'><button>Create Record</button></a>";
        echo "</td></tr>";
        echo "</tbody>";
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo '<em>No records were found.</em>';
    }
}  else {
    echo "Oops! Something went wrong. Please try again later.";
}
}
?>
<script src = "medicine_cart.js"></script>
</body>
</html>