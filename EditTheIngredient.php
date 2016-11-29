<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("log_in.php");

include("dbconnection.php");

// // ask how to pass varname from editthrecipeupdate.php to this 
// $id = mysqli_insert_id($connect); 
// $_SESSION['recipe_id'] = $id;
 // value of chosen recipe 
  $var_value = $_POST['varname']; 
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Edit Ingredients</title>
    <?php include ("templates/imports.php"); ?>

    <!-- jQuery 2.1.4 -->
    <!-- jQuery UI 1.11.4 -->
    <!-- // <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 3.3.5 -->

    <!-- HEADER -->
  </head>
  
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
     
      <?php include ("templates/navbar.php"); ?>
      <?php include ("templates/sidebar.php"); ?>




       <!--SEARCH--> 
    <div class="content-wrapper">

   <form action="EditTheIngredientUpdate.php" method="post">
       <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>EDIT INGREDIENT</b></h3></br>
                </div><!-- /.box-header -->
                <!-- form start -->

                  <div class="box-body">
                   
                  <!--   <?php 
                    echo $_GET['recipe_id']; 
                    ?> -->
                    <!--- INGREDIENTS --> 
                 
                    <table id="addingredient" class="table table-bordered table-hover" name="ingTable">
                     <tr name="ingTable">

                    
                    <!-- FIELDS FOR INGREDIENTS -->
                    <!-- NOTE: MUST BE DEFAULT -->
                    <div class="field_wrapper">
                    <div>

                    
                    <b>Quantity</b>
                    <input type="number" class="form-control" id="InputQty" placeholder="Quantity" name="qty" value="<?php if(isset($_POST['qty'])) echo $_POST['qty']; ?>" >
                   


                    <b>Unit of measurement</b>
                    <select class="form-control" id="UOM" name="uomname" value="<?php if (isset($_POST['unitM'])) echo $_POST['unitM']; ?>" > <option value="" disabled selected>Unit of Measurement</option> //list of measurements from database
                            <?php
                            $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['unit_id'] . "\">" . $row['unit_name'] . "</option>";
                            }
                             ?>
                      </select>
                                        
                    <b>Ingredients</b>
                    <select class="form-control" id="AddIngredient" name="ingname" value="<?php if (isset($_POST['ingname'])) echo $_POST['ingname']; ?>">  <option value="" disabled selected>Ingredients</option> //list of measurements from database
                            <?php
                            $sql = mysqli_query($connect, "SELECT * FROM ingredientname");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['ingName_id'] . "\">" . $row['ing_name'] . "</option>";
                            }
                             ?>
                      </select>   


                    </div>
                    </div>
                      </p>
                  </div>

<!-- Dito yung code dati / just in case-->
                       
                      </tr>    
                 </table>
                    </div>

                </form>
              </div><!-- /.box -->
                <div class="box-footer">
     
                    <a href="AddIngType.php" class="btn btn-primary" role="button" style="float: right;">Add Ingredient Type</a>
                     <button type="button" id="IngredientAdd" class="btn btn-primary">Add Ingredient</button> 
                   

                   
                  </div>


    </div><!-- ./wrapper -->
              <!-- RECENTLY ADDED TABLE -->


           <div class="row">
            <div class="col-md-6">
              <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><b>INGREDIENTS FOR RECIPE</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="recentlyadded" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Ingredient</th>
                        <th>Unit of Measurement</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody id="ingredients">
                       
                    </tbody>
                 
                  </div>

                  </table>
                </div><!-- /.box-body -->

              </div><!-- /.box -->
                 <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="EditIng" value="<?php echo $var_value; ?>">EDIT RECIPE</button>
                   
                   
                  </div>
            </div>




</form>
       <div class="row">
            <div class="col-md-11">
              <div class="col-xs-20">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><b>CURRENT INGREDIENTS</b></h3>
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

                      $query2 = "SELECT ri.qty myqty, unit_name unitname, ing_name ingname FROM recipeingredients ri, recipe r, ingredientname i, unitmeasurement u
                       WHERE ri.recipe_id = '".$var_value."' && i.ingName_id = ri.ingName_id && u.unit_id = ri.unit_id && r.recipe_id = ri.recipe_id";
                      $result2 = mysqli_query($connect, $query2) or die (mysqli_error($connect));

                      while ($row2 = mysqli_fetch_array($result2)) {
                        ?>

                      <tr>
                        <td contenteditable='true'>
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
                </div><!-- /.box-body -->
              </div><!-- /.box -->
           
            </div>




    

         
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

     <!-- jQuery 2.1.4 -->
    <!-- jQuery UI 1.11.4 -->
    <!-- // <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

   
    <script>
   
    $(document).ready(function() { 
       //javascript to add the ingredient 

        $("#IngredientAdd").on("click", function() {
          console.log($("#AddIngredient").val());
          $("#ingredients").append("<tr><td>"+ $("#AddIngredient option:selected").text() +"<input type='hidden' name='ingname[]' value="+ $("#AddIngredient").val() +" /></td><td>"+ $("#UOM option:selected").text() +"<input type='hidden' name='uomname[]' value='"+ $("#UOM").val() +"'/></td><td>"+ $("#InputQty").val() +"<input type='hidden' name='qtyname[]' value="+ $("#InputQty").val() +" /></td></td>"+"<td><button type='button' class='IngredientDelete'><i class='fa fa-trash-o' aria-hidden='true'></i></button></td></td></tr>");

//javascript to remove an ingredient
          $(".IngredientDelete").on("click", function() {
            $(this).parent().parent().remove();
          }); 

        });
      
    });

    </script>
    
  </body>
</html>
