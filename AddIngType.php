<?php

session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Add Ingredient Type</title>

     <?php include ("templates/imports.php"); ?>

   


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


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
                  <h3 class="box-title"><b>ADD INGREDIENT TYPE</b></h3>
                 
                </div><!-- /.box-header -->
               <!-- form start -->
                <form role="form" action="AddIngType1.php" method="post">
                  <div class="box-body">
                   
                     <div class="form-group">
                      <label>Ingredient Name</label>
                      <input type="text"  class="form-control" id="ing_name" placeholder="Ingredient Name" name="ing_name" required>
                    </div>
                      <div class="form-group">
                      <label>Emergency Level</label> <h5>This is the minimum amount of the ingredient you should have on hand.</h5> 
                      <input type="number" step="any" min=0 class="form-control" id="emergencyLvl" placeholder="emergencyLvl" name="emergencyLvl" required>

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

          
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add Ingredient Type</button>
                  </div>
                </form>
              </div><!-- /.box -->

              <!-- CONVERSIONS TABLE --> 

            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>INGREDIENT TYPES</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="ingredientTypes" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ingredient Name</th>
                        <th>Emergency Level</th>
                    
                      </tr>
                    </thead>
                    <tbody>
                     
                       <?php
                       
                        $sql = mysqli_query($connect, "SELECT * FROM ingredientname AS i, unitmeasurement AS u WHERE i.unit_id=u.unit_id ORDER BY i.ingName_id DESC LIMIT 5");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['ingName_id']."</td>"; //id
                          echo "<td>".$row["ing_name"]."</td>"; //ing_name
                          echo "<td>".$row['emergencyLvl']." ".$row['unit_name']."</td>"; //emergencyLvl
                      
                      
                          echo "</tr>";

                      
                        }
                         ?>
                   
                     
                    </tbody>

                  </table>
                   </br><center><a href="ViewIngType.php">View All</a></center>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              

    </div><!-- ./wrapper -->
          
          </div><!-- /.tab-pane -->
         
    </div><!-- ./wrapper -->
      <a href="AddStock.php" class="btn btn-info" role="button"><< Go Back to Add Stock</a>
    </br></br>
      <a href="AddRecipe.php" class="btn btn-info" role="button"><< Go Back to Add Recipe</a>
    </br></br>
      <a href="EditTheRecipe.php?varname=<?=$_SESSION['varname']?>" class="btn btn-info" role="button"><< Go Back to Edit Recipe</a>
      

  
  </body>
</html>
