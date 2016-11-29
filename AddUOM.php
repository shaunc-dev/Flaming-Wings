<!DOCTYPE html>
<?php

session_start();

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Add Unit of Measurement</title>

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
                  <h3 class="box-title"><b>ADD UNIT OF MEASUREMENT (UOM) </b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="Conversion2.php" method="post">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="uom" >Enter new UOM</label>
                      <input type="text" class="form-control" id="unit_name" maxlength="30" name="unit_name"
                       value="<?php if (isset($_POST['unit_name']) && !$flag) echo $_POST['unit_name']; ?>" required>

                    </div>
                    

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add New UOM</button>
                  </div>
                </form>
              </div><!-- /.box -->

         


              <!-- RECENTLY ADDED TABLE -->
              <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>RECENTLY ADDED</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="uomadded" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>UOM Name</th>
                       

                      </tr>
                    </thead>
                    <tbody>
                     
                       <?php
                       
                        $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['unit_id']."</td>"; //unit id
                          echo "<td>".$row["unit_name"]."</td>"; //unit name
                        
                          echo "</tr>";

                      
                        }
                         ?>
                     <!-- <tr>
                        <td>0001</td>
                        <td>Rice</td>
                        <td>Pasta/Rice</td>
                        <td>10</td>
                        <td>sack/s</td>
                       
                      </tr>
                      <tr>
                        <td>0002</td>
                        <td>Alaska Crema</td>
                        <td>Dairy</td>
                        <td>46</td>
                        <td>piece/s</td>
                      
                      </tr>
                        <tr>
                        <td>0003</td>
                        <td>Century Tuna</td>
                        <td>Canned Goods</td>
                        <td>2</td>
                        <td>can/s</td>
                      
                      </tr>-->
                     
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->



    </div><!-- ./wrapper -->
          
          





          </div><!-- /.tab-pane -->
         
    </div><!-- ./wrapper -->


  </body>
</html>
