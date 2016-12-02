<?php 
session_start();
?>

<!DOCTYPE html>
<?php

$_SESSION['varname'] = $_GET['varname'];
?>

<html>
 <?php
      $var_value = $_GET['varname']; 

      ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Edit Recipe</title>

     <?php include ("templates/imports.php"); ?>
 <!-- PHP --> 
   <?PHP 
   include("dbconnection.php");

   ?>

   <style type="text/css">
        .IngredientDelete {
            background: none;
            color: red;
            border: none;
            font-size: 1.5em;
        }
   </style>

   

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

          
      <?php include ("templates/navbar.php"); ?>
      <?php include ("templates/sidebar.php"); ?>



       <!--SEARCH--> 
    <div class="content-wrapper">


<?php

$query = "SELECT recipe_name from recipe where recipe_id = '".$var_value."'";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {



?>


       <form action ="EditTheRecipeUpdate.php" method ="post">
       <div class="row">
            <div class="col-md-6">
              <div class="col-xs-12">
                 <a href="EditRecipe.php"><< Back</a>
              <div class="box box-primary">
                <div class="box-header">
                  <h3><?php echo $row["recipe_name"];?></h3>
                  <input type="text" class="form-control" id="recipe_name" name="recipe_name" required
                      value="<?php 
                      $rname = mysqli_query($connect, "SELECT recipe_name from recipe where recipe_id = '".$var_value."'"); 
                    
                       while ($row = mysqli_fetch_array($rname)){
                        echo "". $row['recipe_name'] . ""; 
                       }
                       ?>"></input>
                     

                  <label>Category/Type</label>
                    <select class="form-control" name="recipe_type" id="recipe_type" required> 
                    
                         <?php
                            $sql = mysqli_query($connect, "SELECT recipe_type, type.recipe_typeid FROM recipetype AS type, recipe AS r WHERE r.recipe_typeid=type.recipe_typeid AND r.recipe_id='".$var_value."'");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['recipe_typeid'] . "\">" . $row['recipe_type'] . "</option>";
                            }
                             ?>" 
                        <?php
                            $sql = mysqli_query($connect, "SELECT * FROM recipetype");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['recipe_typeid'] . "\">" . $row['recipe_type'] . "</option>";
                            }
                             ?>
                      </select>



<?php

}

?>
                </div><!-- /.box-header -->



                <div class="box-body">
                  <table id="recentlyadded" class="table table-bordered table-hover">
                    <label>Add New Ingredients</label>
                    <thead>
                      <tr>
                        <th>Ingredients</th>
                          <th>Unit of Measurement</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody id="ing">
                  
                        <!--- NEW INGREDIENTS FOR RECIPE --> 

                      <tr>

                    
                      <td> 
                    <select class="form-control" id="AddIngredient" name="ing_name" value="<?php if (isset($_POST['ing_name'])) echo $_POST['ing_name']; ?>">  
                      <option value="" disabled selected>Ingredients</option>
                      <?php
                            $sql = mysqli_query($connect, "SELECT * FROM ingredientname");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['ingName_id'] . "\">" . $row['ing_name'] . "</option>";
                            }
                             ?>"> <!--list of measurements from database -->
                           
                      </select>     </td>


                    <td>
                    <select class="form-control" id="UOM" name="unitM" value="<?php if (isset($_POST['unitM'])) echo $_POST['unitM']; ?>" > 
                      <option value="" disabled selected>Unit of Measurement</option> 
                          <?php
                            $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['unit_id'] . "\">" . $row['unit_name'] . "</option>";
                            }
                             ?>"
                      </option> <!-- list of measurements from database -->
                          
                      </select> </td>
                                        
                

                         <td> 
                    <input type="number" class="form-control" id="InputQty" placeholder="Quantity" name="qty" value="<?php if(isset($_POST['qty'])) echo $_POST['qty']; ?>" ></td>
                      

                      </tr>

                  


                    </tbody>

                  </table>

                  <br>
                    <p><strong>Note:</strong> If the ingredient does not exist in the dropdown list, click <a href="AddIngType.php" id="addingtype" style="color:red">here.</a></p>
                  <!-- button to add ingredient --> 
                  <button type="button" id="IngredientAdd" class="btn btn-primary">Add Ingredient</button>
                 
                <button type="submit" class="btn btn-primary" name="varname" value="<?php echo $_GET['varname'] ;?>" href="EditTheRecipeUpdate.php" style="float: right;">EDIT RECIPE</button>
                </div><!-- /.box-body -->

              </div><!-- /.box -->

            </div>

      

    </div><!-- ./wrapper -->

            <div class="row">
            <div class="col-md-6">
              <div class="col-xs-12">
              </br>
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><b>CURRENT INGREDIENTS FOR RECIPE</b></h3>
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
                          <?php

                      $query2 = "SELECT ri.qty myqty, unit_name unitname, ing_name ingname, i.ingName_id ingName_id, ri.unit_id
                      FROM recipeingredients ri, recipe r, ingredientname i, unitmeasurement u
                      WHERE ri.recipe_id = '".$var_value."'  && i.ingName_id = ri.ingName_id && u.unit_id = ri.unit_id && r.recipe_id = ri.recipe_id";
                      $result2 = mysqli_query($connect, $query2) or die (mysqli_error($connect));

                      while ($row2 = mysqli_fetch_array($result2)) {
                        ?>

                      <tr>
                        <td>
                            <?php                                  
                                  echo "<p name='ingname[]' value=\"" . $row2['ingname'] . "\">" . $row2['ingname'] . "</p>";  
                                  echo "<input id='ingname' type='hidden' name='ingname[]' value=\"" . $row2['ingName_id'] . "\" />"; 
                               ?>
                       <!--    <?php //echo "p name='ingname[]' id='ingname'" . $row2["ingname"] . "</p>"?>
                          <input name="ingname[]" id="ingname" value="<?php // echo $row2['ingname']; ?>" />  -->
                        </td>

                        <td>
                           <select class="form-control" name="uomname[]" id="uomname">
                                
                               <?php                                  
                                  echo "<option selected value=\"" . $row2['unit_id'] . "\">" . $row2['unitname'] . "</option>";  
                             
                                $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement");
                                while ($row3 = mysqli_fetch_array($sql)){
                                echo "<option value=\"" . $row3['unit_id'] . "\">" . $row3['unit_name'] . "</option>";
                                }
                                 ?>

                          </select>
                     
                        </td>

                        <td>
                               <input type="number" step="any" min="0" class="form-control" id="qtyname" value="<?php echo $row2["myqty"];?>" maxlength="5" name="qtyname[]" required />
                        </td>
                      <td>
                        <button type="button" class="IngredientDelete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
          
     </form>
          



    <script>
        function editRecipe(str) {
        var e = document.getElementById(EditAddIngredient).selectedIndex.value;
        //var strUser = e.

        console.log(e);
    }
    </script>

    <script>
        $("#IngredientAdd").on("click", function() {
          console.log($("#AddIngredient").val());
          $("#ingredients").append("<tr><td>"+ $("#AddIngredient option:selected").text() +"<input type='hidden' name='ingname[]' id='ingname' value="+ $("#AddIngredient").val() +" /></td><td>"+ $("#UOM option:selected").text() +"<input type='hidden' id='uomname' name='uomname[]' value='"+ $("#UOM").val() +"'/></td><td>"+ $("#InputQty").val() +"<input type='hidden' name='qtyname[]' id='qtyname' value="+ $("#InputQty").val() +" /></td></td>"+"<td><button type='button' class='IngredientDelete'><i class='fa fa-trash-o' aria-hidden='true'></i></button></td></td></tr>");

//javascript to remove an ingredient  
          $(".IngredientDelete").on("click", function() {
              $(this).parent().parent().remove();
          });
        });

        $(".IngredientDelete").on("click", function() {
            $(this).parent().parent().remove();
        });
    </script>




  </body>
</html>