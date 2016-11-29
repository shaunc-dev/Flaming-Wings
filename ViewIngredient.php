<!DOCTYPE html>
<html>
  <head>
    <title>Flaming Wings | Search Recipe</title>
   <?PHP 
   include ("templates/imports.php");
   include("dbconnection.php");

   ?>

   

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
      <?php include("templates/navbar.php"); ?>
      <?php include("templates/sidebar.php"); ?>
    <div class="content-wrapper">


<?php

$query = "SELECT recipe_name from recipe where recipe_id = '".$_POST["ViewRecipeButton"]."'";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {



?>
      
       <div class="row">
            <div class="col-md-6">
              <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3><?php echo $row["recipe_name"];?></h3>

<?php

}

?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="recentlyadded" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Ingredients</th>
                          <th>Unit of Measurement</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody id="ingredients">
                      <?php

                      $query2 = "SELECT ri.qty myqty, unit_name unitname, ing_name ingname FROM recipeingredients ri, recipe r, ingredientname i, unitmeasurement u WHERE ri.recipe_id = '".$_POST["ViewRecipeButton"]."' AND i.ingName_id = ri.ingName_id AND u.unit_id = ri.unit_id AND r.recipe_id = ri.recipe_id";
                      $result2 = mysqli_query($connect, $query2) or die (mysqli_error($connect));

                      while ($row2 = mysqli_fetch_array($result2)) {
                        ?>

                      <tr>
                        <td>
                          <?php echo $row2["ingname"];  ?>
                        </td>
                        <td>
                          <?php echo $row2["unitname"];  ?>
                        </td>
                        <td>
                          <?php echo $row2["myqty"];  ?>
                        </td>
                      </tr>
                        <?php
                      }

                      ?>
                    </tbody>
                  </table>

                  <br>
                  <a href="SearchRecipe.php" class="btn btn-primary" role="button">Go to Search Recipe</a>
                  <a href="AddStock.php" class="btn btn-primary" role="button">Go to Add Stock</a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>

    </div><!-- ./wrapper -->
  </body>
</html>
