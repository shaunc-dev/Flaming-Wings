<?php

  header ("Refresh: 3; url=ReplenishStock.php"); 
?>
<!DOCTYPE html>

<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("login.php");
}

?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>Flaming Wings | Replenish Stock</title>
    
   <?PHP 
   include("dbconnection.php");
   include ("templates/imports.php");

   ?>
    <!-- HEADER -->
  </head>
  
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
      <?php include("templates/navbar.php"); ?>
      <?php include("templates/sidebar.php"); ?>
<?php

  $sql_query = "INSERT INTO replenishstock(dtReceived, qty, stock_id, remarks, user_id) 
  VALUES ('".$_POST['dtReceived']."', '".$_POST['qty']."', '".$_POST['sname']."','".$_POST['remarks']."','".$_SESSION['user_id']."')"; 

  
  mysqli_query($connect, $sql_query); 
    
 
  

?>

 <div class="content-wrapper">
       <section class="content">
         <div class="box box-primary">
        Replenished stock! 
        If the page does not reload in 3 secs, <a href="ReplenishStock.php">click here.</a>
      </div>
        </section>
      </div>
  </body>
</html>
