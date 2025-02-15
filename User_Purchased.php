<?php
   require_once "config.php";
   session_start();
   if($_SERVER['REQUEST_METHOD'] == "GET")
   {
      $sql = "SELECT * from medicines where Medicine_id = ?";
      $result = mysqli_prepare($link, $sql);
      $id = $_GET['medicineid'];
      $username = $_SESSION['username'];
      $quantity = $_GET['stock'];

      if($quantity == '')
      $quantity = 1;
    
      mysqli_stmt_bind_param($result, "s", $id);
      $check = "SELECT * FROM user WHERE username = ? AND Medicine_id = ?";
      $stmt_check = mysqli_prepare($link, $check);
      mysqli_stmt_bind_param($stmt_check, "ss", $username, $id);
      mysqli_stmt_execute($stmt_check);
      $query = mysqli_stmt_get_result($stmt_check);

     if(mysqli_stmt_execute($result) && mysqli_num_rows($query) === 0){
      
     $row = mysqli_stmt_get_result($result)->fetch_assoc();
 
       $insert = "INSERT INTO user (username, Medicine_id, Medicine_Name, quantity, price_cost) values (?, ?, ?, ?, ?)";

       $price_cost = $row['selling_price'] * $quantity;
       $medicine_name = $row['Medicine_name'];
       $res2 = mysqli_prepare($link, $insert);
       mysqli_stmt_bind_param($res2, "sssdd", $username, $id, $medicine_name,$quantity, $price_cost);
         
       mysqli_stmt_execute($res2);


       $update = "UPDATE medicines SET in_stock = in_stock - $quantity where Medicine_id = $id";
       mysqli_query($link,$update);
      }
     header('Location: medicine_cart.php');
   }
?>

