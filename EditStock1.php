<?php 
header("Location: EditSearchStock.php");

  include("dbconnection.php"); 

  $sql_query = "UPDATE stock SET deactivate=1 WHERE stock_id='".$var_value."'"; 

  mysqli_query($connect, $sql_query); 

?>
