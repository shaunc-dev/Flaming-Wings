<?php 
header ("url=SearchRecipe.php"); 
include("dbconnection.php"); 

$r_query = "";

//$query = mysqli_real_escape_string($_POST['query']); 


  

?>


<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("login.php");
}

?>
<html>
  <head>
    <title>Flaming Wings | Search Recipe</title>
    <?php include("templates/imports.php"); ?>
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
      <?php include("templates/navbar.php"); ?>
      <?php include("templates/sidebar.php"); ?>

<div class="content-wrapper">



  <div class='row'>
            <div class='col-xs-10'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'><b>Results</b></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>

                  <?php 
                  if (empty($_POST['query']) || $_POST["query"] == "0") { 
                        echo "There are no results.";
                  } else {

                    $sql = "SELECT recipe_id, recipe_name, recipe_type FROM recipe r, recipetype rt WHERE r.recipe_typeid=rt.recipe_typeid AND recipe_id LIKE '".$_POST['query']."'  AND deactivate = 0"; 
              
                    $r_query = mysqli_query($connect, $sql);
                    
                  ?>

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
                        
                      </tr>
                    </thead>
                    <form action="DeactivateRecipee.php" method="post">
                    <tbody>

<?php



                        while ($row = mysqli_fetch_array($r_query)){ 
	

	 					              echo "<tr>"; 
                          echo "<td>".$row['recipe_id']."</td>"; 
                          echo "<td>".$row['recipe_name']."</td>"; 
                          echo "<td>".$row['recipe_type']."</td>"; 
                          echo '<td>  <button type="submit" value='.$row['recipe_id'].' class="btn btn-block btn-default btn-sm" name="DeactivateRecipeButton">Deactivate</button></td>';
                          echo "</tr>";


}
}
}
?>
                  </tbody>
                </form>
                  </table>
                </b>
                  <a href="DeactivateRecipe.php">Search Again</a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

  


    </div><!-- ./wrapper -->
  </body>
</html>

 