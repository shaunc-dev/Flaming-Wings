<?php

session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Add Recipe</title>

       <?php include ("templates/imports.php"); ?>

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



       <!--SEARCH--> 
    <div class="content-wrapper">

   <form action="NewlyAddedRecipe.php" method="post">
       <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>ADD RECIPE</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->



                  <div class="box-body">
                    <div class="form-group">
                      <label for="InputRecipeName">Recipe Name</label>
                      <input type="text" class="form-control" id="InputRecipeName" placeholder="Enter recipe name" name="recipe_name" required
                      value="<?php if (isset($_POST['recipe_name'])) echo $_POST['recipe_name']; ?>">
                    </div>

                     <label>Recipe Category/Type</label>
                      <select class="form-control" name="recipe_type" id="InputRecipeType" required>
                        <option value="" disabled selected> -- Category/Type --</option> 
                         <?php
                            $sql = mysqli_query($connect, "SELECT * FROM recipetype");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['recipe_typeid'] . "\">" . $row['recipe_type'] . "</option>";
                            }
                             ?>
                      </select>

                      <label>Price</label>
                        <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-rouble"></i></span><input type="number" min="0" step=".01" class="form-control" id="price" placeholder="Enter price of recipe" name="price" required
                      value="<?php if (isset($_POST['recipe_price'])) echo $_POST['recipe_price']; ?>">
                    </div>




                </form>
              </div><!-- /.box -->



                 <!--BUTTONS-->
                <div class="box-footer">
     
                    <input type="submit" class="btn btn-primary" value="ADD RECIPE" />
        
                   
                  </div>


    </div><!-- ./wrapper -->
             
</form>


      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

   
    <script>

    $(document).ready(function() { 
        $("#IngredientAdd").on("click", function() {
          console.log($("#AddIngredient").val());
          $("#ingredients").append("<tr><td>"+ $("#AddIngredient option:selected").text() +"<input type='hidden' name='ingname[]' value="+ $("#AddIngredient").val() +" /></td><td>"+ $("#UOM option:selected").text() +"<input type='hidden' name='uomname[]' value='"+ $("#UOM").val() +"'/></td><td>"+ $("#InputQty").val() +"<input type='hidden' name='qtyname[]' value="+ $("#InputQty").val() +" /></td></tr>");
        });
    });

    </script>
    
  </body>
</html>
