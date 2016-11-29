

<?php

  header ("Refresh: 3; url=AddPackaging.php"); 
?>
<!DOCTYPE html>
<?php

session_start();

?>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Withdraw Stock</title>
    

       <?php include ("templates/imports.php"); ?>

   
    <!-- HEADER -->
  </head>
  
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

         
      <?php include ("templates/navbar.php"); ?>
      <?php include ("templates/sidebar.php"); ?>

<html>
<body>
<?php 
  include("dbconnection.php"); 

	

	$sql_query = "INSERT INTO unitpackaging(pack_name)
			VALUES ('".$_POST["pack_name"]."')"; 

	mysqli_query($connect, $sql_query); 
 
  

?>

 <div class="content-wrapper">
       <section class="content">
         <div class="box box-primary">
        Packaging added! 
        If the page does not reload in 3 secs, <a href="AddPackaging.php">click here.</a>
      </div>
        </section>
      </div>
</body>
 
  </body>
</html>
