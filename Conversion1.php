
<!DOCTYPE html>
<?php

session_start();

?>
   <meta charset="utf-8">
   <?php

  header ("Refresh: 3; url=Conversion.php"); 
?>
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Conversion</title>
    <!-- HEADER -->
  </head>
     <?php include ("templates/imports.php"); ?>

  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">


      <?php include ("templates/navbar.php"); ?>
      <?php include ("templates/sidebar.php"); ?>

<html>
<body>
<?php 
include("dbconnection.php"); 

	$sql_query = "INSERT INTO conversion(unit_id1, qty1, unit_id2, qty2)
			VALUES ('" . $_POST['unitM1'] . "','" . $_POST['qty1'] . "','" . $_POST['unitM2'] . "','" . $_POST['qty2'] . "')"; 

	mysqli_query($connect, $sql_query); 
		

  

?>

 <div class="content-wrapper">
       <section class="content">
         <div class="box box-primary">
        Conversion added! 
        If the page does not reload in 3 secs, <a href="Conversion.php">click here.</a>
      </div>
        </section>
      </div>
</body>
  </body>
</html>

