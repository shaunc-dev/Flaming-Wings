

<?php

session_start();


?>
<!DOCTYPE html>
  <head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Edit Stock</title>

      <?php include ("templates/imports.php"); ?>

   <!-- PHP --> 
   <?PHP 
   include("dbconnection.php")

   ?>
    <!-- HEADER -->
  </head>
  
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

           <?php include ("templates/navbar.php"); ?>
      <?php include ("templates/sidebar.php"); ?>


   
<html>
<body>

 <div class="content-wrapper">
       <section class="content">
         <div class="box box-primary">
          


<?php 
  include("dbconnection.php"); 

//$_SESSION['var_value'] = $_GET['stock_id'];
 $var_value = $_POST['EditButton']; 
  $deact_query = "UPDATE stock SET deactivate='1' WHERE stock_id='".$var_value."'"; 

  mysqli_query($connect, $deact_query) or die(mysqli_error($connect)); 

  $sql_query = "INSERT INTO stock(sname, qty, unit_id, ingName_id, pack_id, stocktype_id, deactivate, emergencyLvl)
      VALUES ('" . $_POST["sname"] . "','" . $_POST['qty'] . "','"  . $_POST['unitM'] . "','" . $_POST['ingtype'] . "','" . $_POST['pack_name'] . "','" . $_POST['type'] . "', '0', '". $_POST['emergencyLvl']."')"; 

  mysqli_query($connect, $sql_query) or die(mysqli_error($connect)); 


  // $stock_query = "SELECT stock_id FROM stock WHERE sname='" . $_POST["sname"] . "'"; 
  // $stock_id = mysqli_query($connect, $stock_query); 

  // while ($row = mysqli_fetch_array($stock_id)){
  //        $sid = $row->$stock_id;

  //         $withdrawsql = "INSERT INTO `withdrawstock` (`withdraw_id`, `dtWithdrawn`, `qty`, `stock_id`, `remarks`, `user_id`) VALUES (NULL, CURRENT_TIMESTAMP, '0', '".$sid."', '', '0')"; 
    
  // mysqli_query($connect, $withdrawsql); 
 
  // $replenishsql = "INSERT INTO `replenishstock` (`replenish_id`, `dtReceived`, `qty`, `stock_id`, `remarks`, `user_id`) VALUES (NULL, CURRENT_TIMESTAMP, '0', '".$sid."', '', '0')"; 
    
  // mysqli_query($connect, $replenishsql); 
    
      
 

?>
        Edited stock! The new stock code is <?php 
                    $sql = mysqli_query($connect, "SELECT stock_id FROM stock ORDER BY stock_id DESC LIMIT 1;");
                       while ($row = mysqli_fetch_array($sql)){
                          echo "<h3>" .$row['stock_id']."</h3>"; }

                     
                     ?>
        If the page does not reload in 3 secs, <a href="EditStock.php">click here.</a>

   
      </div>
        </section>
      </div>
</body>
 
  </body>
</html>
