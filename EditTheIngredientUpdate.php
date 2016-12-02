<?php

include("dbconnection.php");

session_start();

if (!isset($_SESSION["guest"])) {
  header("log_in.php");
}
/*

name ng recipe
type of recipe
ingname
uomname
qtyname

*/



header("url: 3; Location: EditRecipe.php");



?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Edit Recipe</title>
      <?php include ("templates/imports.php"); ?>
 <!-- PHP --> 
   <?PHP 
   include("dbconnection.php");

   ?>

   

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

       
      <?php include ("templates/navbar.php"); ?>
      <?php include ("templates/sidebar.php"); ?>

       <!--SEARCH--> 
    <div class="content-wrapper">

            <div class="box-body">

    	<?php 
 
 
 // $id = mysqli_insert_id($connect); 
     $_SESSION['recipe_id'];
     // echo $_SESSION['varname']; 

    for ($i = 0; $i < sizeof($_POST['ingname']); $i++ ) {

    $query2 = "INSERT INTO recipeingredients (recipe_id, qty, unit_id, ingName_id) VALUES ('".$_SESSION['recipe_id']."', '".$_POST["qtyname"][$i]."', '".$_POST["uomname"][$i]."', '".$_POST["ingname"][$i]."');";
    $result2 = mysqli_query($connect, $query2) or die (mysqli_error($connect));

    }

    // echo "<td>".$_POST['ing_name'][$i]." </td>"; 

    // echo "<td>".$_POST['unitM'][$i]." </td>"; 

    // echo "<td>".$_POST['qty'][$i]." </td>"; 

    // echo "<br>";

    

  ?>

 Edited Recipe! The new Recipe ID is 
                    <?php 
                    $sql = mysqli_query($connect, "SELECT recipe_id FROM recipe ORDER BY recipe_id DESC LIMIT 1;");
                       while ($row = mysqli_fetch_array($sql)){
                          echo "<h3>" .$row['recipe_id']."</h3>"; }

                     
                     ?>
        If the page does not reload in 3 secs, <a href="EditRecipe.php">click here.</a>


</div>
    </div><!-- ./wrapper -->
          



    <script>
        function editRecipe(str) {
        var e = document.getElementById(EditAddIngredient).selectedIndex.value;
        //var strUser = e.

        Console.log(e);
    }
    </script>




  </body>
</html>
