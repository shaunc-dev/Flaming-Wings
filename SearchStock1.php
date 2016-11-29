<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("login.php");
}

?>

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
    <div class="content-wrapper">
      
   
           <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <a href="InventoryReport.php"> << Go Back</a>
              <div class="box">
                <div class="box-header">

                  <h3 class="box-title"><b>Stock Report for <?php $month = date("F Y");

                    // $query = "SELECT sname FROM stock AS s, stocktype AS type WHERE s.stocktype_id=type.stocktype_id
                    //       AND stock_id ='".$var_value."';"; 
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
                </br>
                  REMAINING STOCK: -- 
                      </div><!-- /.box-body -->
              </div><!-- /.box -->





                  <!-- REPLENISH -->

           <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                
                  <h5><b>Replenish History</b></h5>
                </div>
                <div class="box-body">
                  <table id="recentlyadded" class="table table-bordered table-hover">
                   <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Remarks</th>
                        <th>Person in-charge</th>
                        <th>Date Replenished</th>
                      
                    

                      </tr>
                    </thead>
                    <tbody>
                     
                       <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                        $sql = mysqli_query($connect, "SELECT dtReceived, replenish_id, r.qty, sname, remarks, user_name FROM `replenishstock` AS r, stock AS s, users AS u WHERE s.stock_id=r.stock_id AND r.user_id=u.user_id AND s.stock_id ='".$var_value."' ORDER BY replenish_id DESC;");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>" .$row['qty']."</td>"; 
                          echo "<td>".$row['remarks']."</td>"; 
                           echo "<td>".$row['user_name']."</td>"; 
                          echo "<td>".$row['dtReceived']."</td>"; 
                          echo "</tr>";

                      
                        }
                         ?>
              
                 
                    </tbody>
                   </div>
                 </div>
            
                  </table>
                    <! -- END OF REPLENISH TABLE --> 

                    <!-- WITHDRAW TABLE-->
           
                  <h5><b>Withdraw History</b></h5>
            
                <div class="box-body">
                  <table id="withdraw" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th> Qty</th>
                        <th>Remarks</th>
                        <th>Person in-charge</th>
                        <th>Date Withdrawn</th>
                      
                    

                      </tr>
                    </thead>
                  
                    <tbody>
                     
                       <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                        $sql = mysqli_query($connect, "SELECT w.qty, remarks, user_name, dtWithdrawn, withdraw_id FROM withdrawstock AS w, users AS u, stock AS s WHERE w.user_id=u.user_id AND s.stock_id = w.stock_id AND s.stock_id = '".$var_value."' ORDER BY withdraw_id desc");
                    
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['qty']." </td>";
                          echo "<td>".$row['remarks']."</td>";
                          echo "<td>".$row['user_name']."</td>"; 
                          echo "<td>".$row['dtWithdrawn']."</td>";
                       
                          echo "</tr>";

                      
                        }
                         ?>
              
                 
                    </tbody>
                   </div>
                  </table>
    
                  <!-- END OF WITHDRAW TABLE --> 
                  
                  <!-- VERIFY TABLE -->
           
                <h5><b>Verify History</b></h5>
                
                <div class="box-body">
                  <table id="verify" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Remarks</th>
                        <th>Person in-charge</th>
                        <th>Date Verified</th>
                      
                    

                      </tr>
                    </thead>
                  
                    <tbody>
                      <!--SELECT verifiedqty, remarks, user_name, dtVerified, verify_id FROM verifystock AS v, users AS u WHERE v.user_id=u.user_id AND stock_id = '5' ORDER BY verify_id DESC
                     -->
                       <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';

                  

           

                        $sql = mysqli_query($connect, "SELECT verifiedqty, remarks, user_name, dtVerified, verify_id, verifystock.stock_id FROM verifystock, users AS u, stock WHERE verifystock.user_id=u.user_id AND stock.stock_id=verifystock.stock_id AND stock.stock_id = '".$var_value."' ORDER BY verify_id DESC");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                        
                          echo "<td>".$row['verifiedqty']." </td>";
                          echo "<td>".$row['remarks']."</td>";
                          echo "<td>".$row['user_name']."</td>"; 
                          echo "<td>".$row['dtVerified']."</td>";
                       
                     
                          echo "</tr>";

                      
                        }
                         ?>
              
                 
                    </tbody>
                   </div>
                  </table>
                  <!-- END OF VERIFY TABLE -->

    </div><!-- ./wrapper -->
          

          </div><!-- /.tab-pane -->
         
    </div><!-- ./wrapper -->
                 

                </div><!-- /.box-body -->
              </div><!-- /.box -->
             <div class="row no-print">
            <div class="col-xs-12">
              <a href="InventoryReport-print.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            </div>
          </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->

              
                   
             
              
       

                </div><!-- /.box-body -->
              </div><!-- /.box -->


      </div><!-- /.content-wrapper -->
     


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
