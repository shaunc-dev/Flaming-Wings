<!DOCTYPE html>
<?php

session_start();

?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Add Stock</title>
    <?php include ("templates/imports.php"); ?>



   <!-- PHP --> 
   <?PHP 
   include("dbconnection.php")

   ?>

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

       
      <?php include ("templates/navbar.php"); ?>
      <?php include ("templates/sidebar.php"); ?>


           <!--SEARCH--> 
    <div class="content-wrapper">
       <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>Add New Stock</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="AddStock1.php" method="post">
                  <div class="box-body">

                    <div class="form-group">
                      <label>Gross Weight</label>
                      <input type="number" step="any" min="0" class="form-control" id="qty" placeholder="Quantity" maxlength="5" name="qty" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Unit of Measurement</label>
                      <select class="form-control" name="unitM" required
                      value="<?php if (isset($_POST['unitM']) && !$flag) echo $_POST['unitM']; ?>">
                        <option value="" disabled selected> -- Unit of Measurement --</option> //list of measurements from database
                     
                        <?php
                        $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement");
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=\"" . $row['unit_id'] . "\">" . $row['unit_name'] . "</option>";
                        }
                         ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Packaging</label>
                      <select class="form-control" name="pack_name" required
                      value="<?php if (isset($_POST['pack_name']) && !$flag) echo $_POST['pack_name']; ?>">
                        <option value="" disabled selected> -- Packaging --</option> 
                     
                        <?php
                        $sql = mysqli_query($connect, "SELECT * FROM unitpackaging");
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=\"" . $row['pack_id'] . "\">" . $row['pack_name'] . "</option>";
                        }
                         ?>
                      </select>
                    </div>
                    

                     <div class="form-group">
                      <label for="InputItemName">Stock Name</label>
                      <input type="text" class="form-control" id="InputItemName" placeholder="Enter stock name" maxlength="30" name="sname" required
                      value="<?php if (isset($_POST['sname']) && !$flag) echo $_POST['sname']; ?>">
                    </div>
                 
                  
                     
                     <div class="form-group">
                      <label>Category/Type</label>
                      <select class="form-control" placeholder="Category/Type" name="type" required
                      value="<?php if (isset($_POST['type']) && !$flag) echo $_POST['type']; ?>">
                        <option value="" disabled selected> -- Category/Type --</option> //list of stock type from database

                        <?php
                        $sql = mysqli_query($connect, "SELECT * FROM stocktype");
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=\"" . $row['stocktype_id'] . "\">" . $row['stock_type'] . "</option>";
                        }
                         ?>
                   
                      </select>
                    </div>
                  
                     <div class="form-group">
                      <label>Ingredient Type</label>
                      <select class="form-control" placeholder="Ingredient Types" name="ingtype" required
                      value="<?php if (isset($_POST['ingtype']) && !$flag) echo $_POST['ingtype']; ?>">
                        <option value="" disabled selected> -- Ingredient Types --</option> 
                        <?php
                        $sql = mysqli_query($connect, "SELECT * FROM ingredientname");
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=\"" . $row['ingName_id'] . "\">" . $row['ing_name'] . "</option>";
                        }
                         ?>
                   
                      </select>
                    </div>
                  
                


                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add New Stock</button>
                  </div>
                </form>
              </div><!-- /.box -->



              <!-- RECENTLY ADDED TABLE -->
              <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>Recently Added Stocks</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="recentlyadded" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Stock Code</th>
                        <th>Category/Type</th>
                        <th>Item Name</th>
                        <th>Gross Weight</th>
                        <th>UOM</th>
                        <th>Packaging</th>

                      </tr>
                    </thead>
                    <tbody>
                     
                       <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                        $sql = mysqli_query($connect, "SELECT * FROM stock NATURAL JOIN stocktype NATURAL JOIN unitmeasurement NATURAL JOIN ingredientname
                          NATURAL JOIN unitpackaging WHERE deactivate = 0 ORDER BY stock_id DESC limit 5");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['stock_id']."</td>"; //stockcode
                          echo "<td>".$row["stock_type"]."</td>"; //type
                          echo "<td>".$row["sname"]."</td>"; //itemname
                          echo "<td>".$row["qty"]."</td>"; //gross weight
                          echo "<td>".$row["unit_name"]."</td>"; //unit
                          echo "<td>".$row["pack_name"]."</td>"; //packaging
                          echo "</tr>";

                      
                        }
                         ?>
              
                 
                    </tbody>
                   
                <!--      <tfoot>
                         <div class="box-body">
                    <ul class="pagination">
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                  </ul>
                   </div>
                    </tfoot>  --> 
                  </table>
                   </br><center><a href="ViewStock1.php">View All</a></center>
                </div><!-- /.box-body -->
              </div><!-- /.box -->




    </div><!-- ./wrapper -->
          

          </div><!-- /.tab-pane -->
         
    </div><!-- ./wrapper -->

      <!-- VIEW RECIPES TABLE -->
        <div class="row">
            <div class="col-md-6">
              <div class="col-xs-12">
                <div class="box box-primary">
              
                 <div class="box-header with-border">
                  <h3 class="box-title"><b>Recipes</b></h3>
                </div><!-- /.box-header -->
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
                      
                        <?php
                        $stock_code = isset($_GET['recipe_name']) ? $_GET['recipe_name'] : '';
                        $sql = mysqli_query($connect, "SELECT * FROM recipe NATURAL JOIN recipetype WHERE deactivate = 0 LIMIT 5");
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
                   <a href="AddPackaging.php" class="btn btn-info" role="button">Add Packaging</a>
                   <a href="AddIngType.php" class="btn btn-info" role="button">Add Ingredient Type</a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>
            </div>
          </div>

  
  </body>
</html>
