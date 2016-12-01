<!DOCTYPE html>


<html>
   <?php
      $var_value = $_GET['varname']; 
      ?>
    <title>Flaming Wings | Stock Report</title>
    <?php include ("templates/imports.php"); ?>
   <?PHP 
   include("dbconnection.php")

   ?>
    <!-- HEADER -->
  </head>
  
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
      <?php include("templates/navbar.php"); ?>
      <?php include("templates/sidebar.php"); ?>
      <!--SEARCH--> 
    <div class="content-wrapper">
      <section class="content">
          
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>Stock Report for <?php $month = date("F Y");

                    $sql = mysqli_query($connect, "SELECT sname FROM stock AS s WHERE stock_id ='".$var_value."';");
                       while ($row = mysqli_fetch_array($sql)){
                          echo "<h3>" .$row['sname']."</h3>"; }

                     // echo $sql; 
                     echo $month; 
                     ?>
                   </b>
                  </br></br>
                  <small class="pull-right">
                  <?php 
                    echo "<p>Report Date: " . date("Y-m-d l h:i:sa") . "</p>";

                    ?>
                  </small>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="stocktable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Stock Code</th>
                        <th>Stock Category/Type</th>
                        <th>Stock Name</th>
                        <th>Gross Weight</th>
                        <th>Unit of Measurement</th>
                        <th>Ingredient Type</th>
                        <th>Packaging</th>
                    <!--    <th>End Inventory</th> -->
                      
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                     
                      

                        $sql = mysqli_query($connect, "SELECT stock_id, stock_type, sname, qty, unit_name, ing_name, pack_name FROM stock AS s, stocktype AS type, unitmeasurement AS uom, ingredientname AS ingname, unitpackaging AS packname WHERE s.stocktype_id=type.stocktype_id AND s.unit_id=uom.unit_id AND s.ingName_id=ingname.ingName_id AND s.pack_id=packname.pack_id AND stock_id = '".$var_value."';");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['stock_id']."</td>"; //stockcode
                          echo "<td>".$row['stock_type']."</td>"; //type
                          echo "<td>".$row['sname']."</td>"; //itemname
                          echo "<td>".$row['qty']."</td>"; //qty
                          echo "<td>".$row['unit_name']."</td>"; //type
                          echo "<td>".$row['ing_name']."</td>"; //itemname
                          echo "<td>".$row['pack_name']."</td>"; //stockcode
                     
                          echo "</tr>";

                      
                        }
                         ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>



                  <!-- REPLENISH -->
                
                  <h5><b>Replenish History</b></h5>
             
                <div class="box-body">
                  <table id="recentlyadded" class="table table-bordered table-hover">
                   <!-- <thead>
                      <tr>
                        <th>Replenish Date</th>
                        <th>Replenish ID</th>
                        <th>Replenish Qty</th>
                        <th>Stock Name</th>
                        <th>Remarks</th>
                    

                      </tr>
                    </thead>-->
                    <tbody>
                     
                       <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                        $sql = mysqli_query($connect, "SELECT dtReceived, replenish_id, r.qty, sname, remarks FROM `replenishstock` AS r, stock AS s WHERE s.stock_id=r.stock_id AND s.stock_id ='".$var_value."' ORDER BY replenish_id DESC;");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['dtReceived']." #" .$row['replenish_id']. " Replenished Qty: " .$row['qty']. " Remarks: <i> " .$row['remarks']."</td>"; 
                          echo "</tr>";

                      
                        }
                         ?>
              
                 
                    </tbody>
                   </div>
                 </div>
               </table>
                    <! -- end of replenish table --> 

                    <!-- Withdraw Table -->
           
                  <h5><b>Withdraw History</b></h5>
            
                <div class="box-body">
                  <table id="withdraw" class="table table-bordered table-hover">
                  
                    <tbody>
                     
                       <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                        $sql = mysqli_query($connect, "SELECT dtReceived, replenish_id, r.qty, sname, remarks FROM `replenishstock` AS r, stock AS s WHERE s.stock_id=r.stock_id AND s.stock_id ='".$var_value."' ORDER BY replenish_id DESC;");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['dtReceived']." #" .$row['replenish_id']. " Replenished Qty: " .$row['qty']. " Remarks: <i> " .$row['remarks']."</td>"; 
                          echo "</tr>";

                      
                        }
                         ?>
              
                 
                    </tbody>
                   </div>
                  </table>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
                   <!-- end of replenish table -->

                       <!-- Withdraw Table -->
           
                  <h5><b>Verify History</b></h5>
            
                <div class="box-body">
                  <table id="withdraw" class="table table-bordered table-hover">
                  
                    <tbody>
                     
                       <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                        $sql = mysqli_query($connect, "SELECT dtReceived, replenish_id, r.qty, sname, remarks FROM `replenishstock` AS r, stock AS s WHERE s.stock_id=r.stock_id AND s.stock_id ='".$var_value."' ORDER BY replenish_id DESC;");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['dtReceived']." #" .$row['replenish_id']. " Replenished Qty: " .$row['qty']. " Remarks: <i> " .$row['remarks']."</td>"; 
                          echo "</tr>";

                      
                        }
                         ?>
              
                 
                    </tbody>
                   </div>
                  </table>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
                

                </div><!-- /.box-body -->
              </div><!-- /.box -->

              
                   
             
                  </table>

                </div><!-- /.box-body -->
              </div><!-- /.box -->

            <div class="row no-print">
            <div class="col-xs-12">
              <a href="InventoryReport-print.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            </div>
          </div>

      </div><!-- /.content-wrapper -->


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
  </body>
</html>

     