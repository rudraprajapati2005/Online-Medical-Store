<?php
  define('DB_SERVER', '127.0.0.1'); // Why it is 127.0.0.1?💡
  define('DB_USERNAME', 'root'); //include username
  define('DB_PASSWORD', ''); //include password
  define('DB_NAME', 'employee'); //include database name
  
  /* Attempt to connect to MySQL/MariaDB database */
  $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  
  // Check connection
  if ($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  } else {
      echo "Welcome!";
  }
?>