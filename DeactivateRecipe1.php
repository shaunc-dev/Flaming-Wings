<?php 
header ("url=DeactivateRecipe.php"); 
include("dbconnection.php"); 

//$query = mysqli_real_escape_string($_POST['query']); 

if (empty($_POST['query'])) { 
    echo 'No results found.'; 

    }else{

      $sql = "SELECT recipe_id, recipe_name, recipe_type FROM recipe r, recipetype rt WHERE r.recipe_typeid=rt.recipe_typeid AND recipe_id LIKE '%".$_POST['query']."%'"; 
     
      
      $r_query = mysqli_query($connect, $sql);
    }


?>


<!DOCTYPE html>
<?php

session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Deactivate Recipe</title>

     <?php include ("templates/imports.php"); ?>

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

        <?php include ("templates/navbar.php"); ?>
      <?php include ("templates/sidebar.php"); ?>

<div class="content-wrapper">
  <div class='row'>
            <div class='col-xs-10'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'><b>Results</b></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                  <?php

                  $numrows = mysqli_num_rows($r_query); 

                  if($numrows == 0){
                    echo "There are no results.";

  } else {

  ?>
                  <table id='example2' class='table table-bordered table-hover'>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Recipe Name</th>
                        <th>Recipe Type</th>
                        <th>Ingredients</th>
                        
                      </tr>
                    </thead>
                    <tbody>

<?php



while ($row = mysqli_fetch_array($r_query)){ 
	

	 					echo "<tr>"; 
                          echo "<td>".$row['recipe_id']."</td>"; 
                          echo "<td>".$row['recipe_name']."</td>"; 
                          echo "<td>".$row['recipe_type']."</td>"; 
                         
                          echo "</tr>";


}
}
?>
      </tbody>
                  </table>
                </b>
                  <a href="SearchRecipe.php">Search Again</a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

  
    <!-- table for audit trail --> 

    </div><!-- ./wrapper -->

    
  </body>
</html>

 