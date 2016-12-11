<?php

session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Dashboard</title>

    <style>

		.IngredientDelete {
			background: none;
			border: none;
			color: red;
			font-size: 20px;
		}

    </style>

    <?php include ("templates/imports.php"); ?>

   

    <!-- jQuery 2.1.4 -->
    <!-- jQuery UI 1.11.4 -->
    <!-- // <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 3.3.5 -->

    


  

    <![endif]-->
     <!--<script src="AddIngButton.js"></script>



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

   <form action="NewlyAddedIngredient.php" method="post">
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
                   
                    
                    <!--- INGREDIENTS --> 
                 
                    <table id="addingredient" class="table table-bordered table-hover" name="ingTable">
                     <tr name="ingTable">

                    
                    <!-- FIELDS FOR INGREDIENTS -->
                    <div class="field_wrapper">
                    <div>
                    
                    
                    <b>Quantity</b>
                    <input type="number" class="form-control" id="InputQty" placeholder="Quantity" name="qty" value="<?php if(isset($_POST['qty'])) echo $_POST['qty']; ?>" >
                   


                    <b>Unit of measurement</b>
                    <select class="form-control" id="UOM" name="untiM" value="<?php if (isset($_POST['unitM'])) echo $_POST['unitM']; ?>" > <option value="" disabled selected>Unit of Measurement</option> //list of measurements from database
                            <?php
                            $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['unit_id'] . "\">" . $row['unit_name'] . "</option>";
                            }
                             ?>
                      </select>
                                        
                    <b>Ingredients</b>
                    <select class="form-control" id="AddIngredient" name="ing_name" value="<?php if (isset($_POST['ing_name'])) echo $_POST['ing_name']; ?>">  <option value="" disabled selected>Ingredients</option> //list of measurements from database
                            <?php
                            $sql = mysqli_query($connect, "SELECT * FROM ingredientname order by ing_name asc");
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
                     <p><strong>Note:</strong> If the ingredient does not exist in the dropdown list, click <a href="AddIngType.php" id="addingtype" style="color:red">here.</a></p>
                   
                     <button type="button" id="IngredientAdd" class="btn btn-primary">Add Ingredient</button>
                 
                    <input type="submit" class="btn btn-primary" style="float:right" value="ADD RECIPE" />

                  </div>


    </div><!-- ./wrapper -->
              <!-- RECENTLY ADDED TABLE -->


           <div class="row">
            <div class="col-md-6">
              <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><b>RECENTLY ADDED INGREDIENTS FOR RECIPE</b></h3>
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

                  </table>
                     <div class="box-footer">
                 
                   
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div>

</form>



           <div class="row">
            <div class="col-md-11">
              <div class="col-xs-20">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><b>CURRENT STOCKS</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="recentlyadded" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Stock Code</th>
                        <th>Category/Type</th>
                        <th>Item Name</th>
                        <th>In Stock</th>
                        <th>UOM</th>
                        <th>Packaging</th>

                      </tr>
                    </thead>
                    <tbody>
                     
                       <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                        $sql = mysqli_query($connect, "SELECT * FROM stock NATURAL JOIN stocktype NATURAL JOIN unitmeasurement NATURAL JOIN ingredientname
                          NATURAL JOIN unitpackaging");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['stock_id']."</td>"; //stockcode
                          echo "<td>".$row["stock_type"]."</td>"; //type
                          echo "<td>".$row["sname"]."</td>"; //itemname
                          echo "<td>".$row["qty"]."</td>"; //qty
                          echo "<td>".$row["unit_name"]."</td>"; //unit
                          echo "<td>".$row["pack_name"]."</td>"; //packaging
                          echo "</tr>";

                      
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
