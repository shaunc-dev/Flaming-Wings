
<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("login.php");
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Flaming Wings | Search Recipe</title>
    <?php include ("templates/imports.php"); ?>
   <?PHP 
   include("dbconnection.php")

   ?>

   

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
      <?php include("templates/navbar.php"); ?>
      <?php include("templates/sidebar.php"); ?>
       <!--SEARCH--> 
    <div class="content-wrapper">
      <form action="SearchRecipeBar.php" method="post" class="sidebar-form">
            <div class="col-xs-10">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>SEARCH RECIPE</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="query" class="col-sm-2 control-label">Recipe ID</label>
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


          <div id="view" class="modal fade">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                        <b><h4>
                       
                </div>
               <div class="modal-body">
                <table id="viewTable" class="table table-bordered table-hover" name="viewTable">
                          <tbody>
                                <?php
                                 $sql_query = "SELECT recipe_name FROM recipe WHERE recipe_id=1"; 
                                    mysqli_query($connect, $sql_query); 
                                    
                               
                                    echo "<td>" .$_POST['recipe_name']; "</td>"

                                    
                                ?> 
                                <a href="SearchRecipe.php">Go Back</a>
                          
                          </tbody>
                          </table>
                     
                    </div>
                    </form>
               </div>
             </div>
           </div>


      <section class="content-header">
      <h3>Recipes</h3> 
      </section>
       <section class="content">

          <div class="row">
            <div class="col-xs-10">
              <div class="box">
              
                <div class="box-body">
                  <table id="recipeTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Recipe Type</th>
                        <th>Recipe Name</th>
                      
                      </tr>
                    </thead>
                    <form action="ViewIngredient.php" method="post">
                    <tbody> 
                      <!--SELECT * FROM recipe r JOIN recipetype rtype WHERE r.recipe_typeid=rtype.recipe_typeid AND deactivate ='0'-->
                      
                      
                        <?php
                        $stock_code = isset($_GET['recipe_name']) ? $_GET['recipe_name'] : '';
                        $sql = mysqli_query($connect, "SELECT recipe_id, recipe.recipe_name, recipe_type FROM recipe, recipetype WHERE deactivate = 0 AND recipe.recipe_typeid=recipetype.recipe_typeid ORDER BY recipe.recipe_id DESC");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['recipe_id']."</td>"; //recipe id
                          echo "<td>".$row["recipe_type"]."</td>"; //type
                          echo "<td>".$row["recipe_name"]."</td>"; //recipe name
                          echo '<td>  <button type="submit" value='.$row['recipe_id'].' class="btn btn-block btn-default btn-sm" name="ViewRecipeButton">View</button></td>'; 
                          echo "</tr>";

                      
                        }
                         ?>
                   
                    </tbody>
                  </form>
                  </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            </div>
            </div><!-- /.box-body -->




    </div><!-- ./wrapper -->
  </body>
</html>
