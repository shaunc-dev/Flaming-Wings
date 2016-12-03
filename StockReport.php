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
       <!--SEARCH--> 
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
                     
                      // GET UNIT NAME OF STOCK AND PAIR IT WITH UNIT NAME OF INGRDEIENT TYPE 

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
                 
                  <!--SELECT *, (r.qty - w.qty) FROM replenishstock AS r, withdrawstock AS w WHERE r.stock_id=w.stock_id
                  SELECT (r.qty - w.qty) FROM replenishstock AS r, withdrawstock AS w WHERE r.stock_id=w.stock_id AND r.stock_id = 1
                  -->
                  <?php
                  //sql - select w.qty 
                  //set to 0
                  // $check = mysqli_query($connect, "SELECT w.qty FROM withdrawstock AS w, stock AS s WHERE w.stock_id=s.stock_id AND s.stock_id = '".$varname."'");  
                  //  $numrows = mysqli_num_rows($check); 
                  // if($numrows == 0){ 
                  //   echo "<b>yo</b>"; 
                  // } 

                  // $currentstock = mysqli_query($connect, "SELECT (r.qty - w.qty) AS qty FROM replenishstock AS r, withdrawstock AS w WHERE r.stock_id=w.stock_id AND r.stock_id = '".$var_value."' ");

                  // // $numrows = mysqli_num_rows($currentstock); 

                  // // if($numrows == 0){
                  // //   echo "<h4><b>Current Stock : </b> 0</h4>"; 
                  // // } else{
                  //   while($row = mysqli_fetch_array($currentstock)){ 
                  //     echo "<h4><b>Current Stock : </b>" .$row['qty']. "</h4>"; 
                    
                  // }
                  //SELECT (SUM(r.qty)) - (SUM(w.qty)), r.qty AS replenishqty, w.qty AS withdrawqty, sname FROM withdrawstock AS w, stock AS s, replenishstock AS r WHERE s.stock_id=w.stock_id AND r.stock_id=w.stock_id AND s.stock_id= '6'

                 
                  $currentstock = mysqli_query($connect, "SELECT COALESCE(SUM(r.qty), 0) - COALESCE(SUM(w.qty), 0) AS qty, sname FROM replenishstock AS r, withdrawstock AS w, stock AS s WHERE s.stock_id=w.stock_id AND r.stock_id=s.stock_id AND s.stock_id='".$var_value."'"); 

                  $numrows = mysqli_num_rows($currentstock); 

                  if($numrows == 0){
                    echo "<h4><b>Current Stock : </b> 0</h4>"; 
                  } else{
                     while($row = mysqli_fetch_array($currentstock)){ 
                       echo "<h4><b>Current Stock : </b>" .$row['qty']. "</h4>"; 
                  }
                  }
                  ?>

                  <?php
                  $actualstock = mysqli_query($connect, "SELECT verifiedqty FROM `verifystock`, `stock`
                    WHERE verifystock.stock_id=stock.stock_id
                    AND stock.stock_id= '".$var_value."'
                    ORDER BY verify_id DESC
                    LIMIT 1");
                  $numrows = mysqli_num_rows($actualstock); 

                  if($numrows == 0){
                    echo "<h4></br><b>Physical Count : </b> 0</h4>"; 
                  } else{
                    while($row = mysqli_fetch_array($actualstock)){ 
                      echo "<h4></br><b>Physical Count </b>: " .$row['verifiedqty']. "</h4>"; 
                    
                  }
                  }
                  
                  ?>
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
              <a href="StockReport-print.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>


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
  </body>
</html>
