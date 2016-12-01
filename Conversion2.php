<!DOCTYPE html>
<?php

session_start();

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Conversion</title>

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
                  <h3 class="box-title"><b>CONVERSION TABLE</b></h3>
                  </br>
                  <h5>Unit of Measurement (UOM)</h5>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <form class="form-horizontal" action="Conversion1.php"  method="post" role="form" name="convert">
                  <div class="box-body">
                    <table  id="convert" class="table table-bordered table-hover" name="convertTable">
                      <thead>
                        <th>Qty1</th>
                        <th>UOM1</th>
                        <th> = </th>
                        <th>Qty2</th>
                        <th>UOM2</th>
                      </thead>
                      <td>  <input type="number" class="form-control" id="qty1" name="qty1" placeholder="Qty" 
                        value="<?php if (isset($_POST['qty1'])) echo $_POST['qty1']; ?>" required></td>

                      <td> <select class="form-control" name="unitM1" 
                          value="<?php if (isset($_POST['unitM1'])) echo $_POST['unitM1']; ?>">
                        
                     
                            <?php
                            $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement ORDER BY unit_id DESC LIMIT 1");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['unit_id'] . "\">" . $row['unit_name'] . "</option>";
                            }
                             ?>
                          </select>
                        </td>
                        <td>
                          <b>=</b>
                        </td>
                        <td>
                          
                            <input type="number" class="form-control" id="qty2" name="qty2" placeholder="Qty" 
                            value="<?php if (isset($_POST['qty2'])) echo $_POST['qty2']; ?>" required>
                        
                        </td>

                         <td> <select class="form-control" name="unitM2" 
                          value="<?php if (isset($_POST['unitM2'])) echo $_POST['unitM2']; ?>">
                           <option value="" disabled selected>Unit of Measurement</option> //list of measurements from database
                     
                            <?php
                            $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['unit_id'] . "\">" . $row['unit_name'] . "</option>";
                            }
                             ?>
                          </select>
                        </td>


                    </table>
                   <!-- <div class="form-group">
                      <label for="inputQty" class="col-sm-2 control-label">Quantity Received</label>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" id="inputQty" placeholder="Qty" required>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputdtReceived" class="col-sm-2 control-label">Date Received</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputdtReceived" required value="<?php echo date('Y-m-d'); ?>" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputRemarks" class="col-sm-2 control-label">Remarks</label>
                      <div class="col-sm-10">
                         <textarea class="form-control" rows="3" placeholder="Remarks ..." id="inputRemarks"></textarea>
                       
                      </div>
                    </div>-->
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                  </div><!-- /.box-footer -->
                </form>
                
              </div><!-- /.box -->

              <!-- CONVERSIONS TABLE --> 

            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>CONVERSIONS</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="uomadded" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>QTY1</th>
                        <th>UOM1</th>
                        <th>QTY2</th>
                        <th>UOM2</th>

                      </tr>
                    </thead>
                    <tbody>
                     
                       <?php
                       
                        $sql = mysqli_query($connect, "SELECT conv_id, qty1, u.unit_name as uname1, qty2, u2.unit_name as uname2 FROM conversion as c JOIN unitmeasurement as u on c.unit_id1 = u.unit_id JOIN unitmeasurement as u2 on c.unit_id2 = u2.unit_id LIMIT 5");
                        if (!$sql) {
                              printf("Error: %s\n", mysqli_error($connect));
                              exit();
                          }
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['conv_id']."</td>"; //conv id
                          echo "<td>".$row["qty1"]."</td>"; //qty1
                          echo "<td>".$row['uname1']."</td>"; //unit_id1
                          echo "<td>".$row["qty2"]."</td>"; //qty2
                          echo "<td>".$row['uname2']."</td>"; //unit_id1
                      
                          echo "</tr>";

                      
                        }
                         ?>
                    
                     
                    </tbody>
                  </table><a class="footer"><center><a href="ViewConversion1.php">View All</a></center>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              

    </div><!-- ./wrapper -->
          
          





          </div><!-- /.tab-pane -->
         
    </div><!-- ./wrapper -->

      <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>ADD UNIT OF MEASUREMENT (UOM) </b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="AddUOM1.php" method="post">
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
                  <h3 class="box-title"><b>RECENTLY ADDED UOM</b></h3>
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
                       
                        $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement order by unit_id DESC LIMIT 6");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['unit_id']."</td>"; //unit id
                          echo "<td>".$row["unit_name"]."</td>"; //unit name
                        
                          echo "</tr>";

                      
                        }
                         ?>
                 
                     
                    </tbody>
                  </table>
                    <a class="footer"><center><a href="ViewUOM1.php">View All</a></center></li>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

  </body>
</html>
