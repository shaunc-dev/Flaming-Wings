<!DOCTYPE html>
<?php

session_start();


?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Add Packaging</title>

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
                  <h3 class="box-title"><b>ADD PACKAGING </b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="AddPackaging1.php" method="post">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="uom" >Enter new Packaging</label>
                      <input type="text" class="form-control" id="pack_name" maxlength="30" name="pack_name"
                       value="<?php if (isset($_POST['pack_name']) && !$flag) echo $_POST['pack_name']; ?>" required>

                    </div>
                    

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add New Packaging</button>
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
                        <th>Packaging Name</th>
                       

                      </tr>
                    </thead>
                    <tbody>
                     
                       <?php
                       
                        $sql = mysqli_query($connect, "SELECT * FROM unitpackaging ORDER BY pack_id desc");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['pack_id']."</td>"; //unit id
                          echo "<td>".$row["pack_name"]."</td>"; //unit name
                        
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
        <a href="AddStock.php" class="btn btn-info" role="button"><< Go Back to Add Stock</a>
  
  </body>
</html>
