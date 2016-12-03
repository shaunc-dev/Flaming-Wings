<?php

session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | View Ingredient Types</title>

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
               <a href="AddIngType.php"><< Go Back</a>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>VIEW INGREDIENT TYPE</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                 <div class="box-body">
                  <table id="ingtypeadded" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ingredient Name</th>
                        <th>Emergency Level</th>
                       

                      </tr>
                    </thead>
                    <tbody>
                     
                       <?php
                       
                        $sql = mysqli_query($connect, "SELECT ing.ingName_id AS ingName_id, ing.ing_name AS ing_name, uom.unit_name AS unit_name, ing.emergencyLvl AS emergencyLvl FROM ingredientname ing, unitmeasurement uom where ing.unit_id=uom.unit_id order by ingName_id DESC");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['ingName_id']."</td>"; //unit id
                          echo "<td>".$row["ing_name"]."</td>"; //unit name
                          echo "<td>".$row["emergencyLvl"]. " " .$row['unit_name']."</td>"; //emergency level


                        
                        
                          echo "</tr>";

                      
                        }
                         ?>
                    
                     
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->






        



              

    </div><!-- ./wrapper -->
             
</form>


      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

  </body>
</html>
