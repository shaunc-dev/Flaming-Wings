<?php

session_start();

?>

<?php

  header ("Refresh: 3; url=AddIngType.php"); 
?>
<!DOCTYPE html>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Add Ingredient Type</title>
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

	$sql_query = "INSERT INTO ingredientname(ing_name, emergencyLvl, unit_id)
			VALUES ('".$_POST["ing_name"]. "','" .$_POST["emergencyLvl"]."', '".$_POST['unitM']."')"; 

	mysqli_query($connect, $sql_query); 
		

  

?>

 <div class="content-wrapper">
       <section class="content">
         <div class="box box-primary">
        Ingredient Type added! 
        If the page does not reload in 3 secs, <a href="AddIngType.php">click here.</a>
      </div>
        </section>
      </div>
</body>
  </body>
</html>

