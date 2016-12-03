

<!DOCTYPE html>
<?php

session_start();

?>
   <meta charset="utf-8">
   <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Add Stock</title>

       <?php include ("templates/imports.php"); ?>
   <!-- PHP --> 
   <?PHP 
   include("dbconnection.php")

   ?>
    <!-- HEADER -->
  </head>


<?php

  header ("url=AddStock.php"); 
?>
  
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

     
       
      <?php include ("templates/navbar.php"); ?>
      <?php include ("templates/sidebar.php"); ?>

<html>
<body>

 <div class="content-wrapper">
       <section class="content">
         <div class="box box-primary">
        Stock added! 
        If the page does not reload in 3 secs, <a href="AddStock.php">click here.</a>


<?php 
  include("dbconnection.php"); 

  $sql_query = "INSERT INTO stock(sname, qty, unit_id, ingName_id, pack_id, stocktype_id)
      VALUES ('" . $_POST["sname"] . "','" . $_POST['qty'] . "','"  . $_POST['unitM'] . "','" . $_POST['ingtype'] . "','" . $_POST['pack_name'] . "','" . $_POST['type'] . "')"; 
  mysqli_query($connect, $sql_query); 

  //get new id of new stock 
$max_stock = mysqli_query($connect, "SELECT MAX(stock_id) AS maxstock FROM stock"); 


$row = mysqli_fetch_assoc($max_stock);



  // INSERT ROW SA WITHDRAWSTOCK 
  $withdraw_query = "INSERT INTO withdrawstock(qty, stock_id, remarks, user_id) VALUES ('0', '" . $row['maxstock'] . "', 'Added New Stock', '1')"; 
  mysqli_query($connect, $withdraw_query); 
  // INSERT ROW SA REPLENISHSTOCK

  $replenish_query = "INSERT INTO replenishstock(qty, stock_id, remarks, user_id) VALUES ('0', '".$row['maxstock']."','Added New Stock','1')"; 
 mysqli_query($connect, $replenish_query); 

  //INSERT ROW SA VERIFYSTOCK 

  $verify_query = "INSERT INTO verifystock(verifiedqty, stock_id, remarks, user_id) VALUES ('0', '".$row['maxstock']."','Added New Stock','1')"; 
 mysqli_query($connect, $verify_query); 

  // $stock_query = "SELECT stock_id FROM stock WHERE sname='" . $_POST["sname"] . "'"; 
  // $stock_id = mysqli_query($connect, $stock_query); 

  // while ($row = mysqli_fetch_array($stock_id)){
  //        $sid = $row->$stock_id;

  //         $withdrawsql = "INSERT INTO `withdrawstock` (`withdraw_id`, `dtWithdrawn`, `qty`, `stock_id`, `remarks`, `user_id`) VALUES (NULL, CURRENT_TIMESTAMP, '0', '".$sid."', '', '0')"; 
    
  // mysqli_query($connect, $withdrawsql); 
 
  // $replenishsql = "INSERT INTO `replenishstock` (`replenish_id`, `dtReceived`, `qty`, `stock_id`, `remarks`, `user_id`) VALUES (NULL, CURRENT_TIMESTAMP, '0', '".$sid."', '', '0')"; 
    
  // mysqli_query($connect, $replenishsql); \
    
      
 

?>
      </div>
        </section>
      </div>
</body>
  </body>
</html>
