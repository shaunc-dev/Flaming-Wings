<?php 
session_start();
if (!isset($_SESSION['user_name'])) {
  header("log_in.php");
}
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Edit Recipe</title>
         <?php include ("templates/imports.php"); ?>
  </head>


    <!-- PHP --> 

    <?php 
    include("dbconnection.php"); 
    ?>



   

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

    

           <?php include ("templates/navbar.php"); ?>
      <?php include ("templates/sidebar.php"); ?>



    <div class="content-wrapper">
       <section class="content">
       
            <!-- END OF MODAL -->

        <!--SEARCH-->
      <form action="SearchEditRecipeBar.php" method="post" class="sidebar-form">
            <div class="col-xs-10">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>SEARCH RECIPE TO BE EDITED</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="query" class="col-sm-5 control-label">Search by Recipe ID</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="query" name="query" placeholder="Enter Recipe ID" required>
                      </div>
                    </div>
                  <div class="box-footer">
                   <input type="submit" class="btn btn-info pull-right" value="Submit"/>
                  </div><!-- /.box-footer -->
                </form>
              </div>
            </div>
          </form>




          <!--RECIPES (EDIT)--> 
           <div class="row">
            <div class="col-xs-10">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>EDIT RECIPE</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="stocktable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                         </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="recipeResults" class="table table-bordered table-hover">
                    <thead>

                      <tr>
                        <th>Recipe ID</th> <!--recipe id-->
                        <th>Recipe Type</th> <!--recipe type-->
                        <th>Recipe Name</th> <!--recipe name-->
                     

                      </tr>
                    </thead>
                    <form action="EditTheRecipe.php" method="get">
                    <tbody>
                     
                       <?php
                        $stock_code = isset($_GET['recipe_name']) ? $_GET['recipe_name'] : '';
                          $sql = mysqli_query($connect, "SELECT recipe_id, recipe.recipe_name, recipe_type FROM recipe, recipetype WHERE deactivate != 1 AND recipe.recipe_typeid=recipetype.recipe_typeid order by recipe.recipe_id DESC");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['recipe_id']."</td>"; //recipe id
                          echo "<td>".$row["recipe_type"]."</td>"; //type
                          echo "<td>".$row["recipe_name"]."</td>"; //recipe name
                          echo "<td><a href='EditTheRecipe.php?varname=".$row['recipe_id']."'> Edit</a></td>";

                          echo "</tr>";

                      
                        }
                         ?>
                        
                    </tbody>
                  </form>
                  </table>
                   <div class="box-footer">
                   
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->



            </section><!-- right col -->
          </div><!-- /.row (main row) -->



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



    
      
    </div><!-- ./wrapper -->





          <!---TABLE FOR RECIPE-->




          <!---TABLE FOR RECIPE-->
          

    

   
  </body>
</html>
