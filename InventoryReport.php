<!DOCTYPE html>

<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("log_in.php");
}

?>
<html>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Inventory Report</title> 

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
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>Inventory Report for <?php $month = date("F Y"); echo $month;?></b>
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
                    <!--    <th>End Inventory</th> -->
                      
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                        $sql = mysqli_query($connect, "SELECT stock_id, stock_type, sname FROM stock AS s, stocktype AS type WHERE s.stocktype_id=type.stocktype_id AND deactivate = 0 ORDER BY type.stocktype_id ASC");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['stock_id']."</td>"; //stockcode
                          echo "<td>".$row['stock_type']."</td>"; //type
                          echo "<td><a href='StockReport.php?varname=".$row['stock_id']."'>" .$row['sname']."</a></td>"; //itemname
                        // $currentstock = mysqli_query($connect, "SELECT COALESCE(SUM(r.qty), 0) - COALESCE(SUM(w.qty), 0) AS qty, sname FROM replenishstock AS r, withdrawstock AS w, stock AS s WHERE s.stock_id=w.stock_id AND r.stock_id=s.stock_id AND s.stock_id='".$row['stock_id']."'");

                        //   $numrows = mysqli_num_rows($currentstock); 

                        //  if($numrows == 0){
                        //    echo "<td>" .$row['verifiedqty']."</td>"; 
                        //  } else{
                        //    while($row = mysqli_fetch_array($currentstock)){ 
                        //      echo "<td>" .$row['qty']. "</td>"; 
                          
                        //  }
                        //    echo "</tr>";
                        //  }
                        }

                        $rowcount=mysqli_num_rows($sql); 
                        echo "<b>Total Number of Stocks:</b> " .$rowcount; 

                        
                        $sum = mysqli_query($connect, "SELECT COUNT(stock_id) FROM stock WHERE deactivate = 0"); 
                        $row = mysqli_fetch_array($sum)

                      
                         ?>
                    </tbody>
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
