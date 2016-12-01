<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("login.php");
}

?>
<html>
  <head>
    <title>Flaming Wings | Search Stock</title>
   <?PHP 
   include ("templates/imports.php");
   include("dbconnection.php");

   ?>
   

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
      <?php include("templates/navbar.php"); ?>
      <?php include("templates/sidebar.php"); ?>
    <div class="content-wrapper">
      <form action="StockDetails.php" method="get" class="sidebar-form">
            <div class="col-xs-10">
              <a href="AddStock.php"><< Go Back</a>
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>STOCKS</b></h3>
                </div><!-- /.box-header -->
           
            <div class="box-body">
                  <table id="stocktable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Stock Code</th>
                        <th>Stock Category/Type</th>
                       <th>Item Name</th>
                        <th>Gross Weight</th>
                        <th>Current Stock</th>
                    <!--    <th>End Inventory</th> -->
                      
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                        $sql = mysqli_query($connect, "SELECT * FROM stock as s, stocktype as t, unitmeasurement as u, ingredientname as i, unitpackaging as p WHERE s.stocktype_id=t.stocktype_id AND s.unit_id=u.unit_id AND s.ingName_id=i.ingName_id AND s.pack_id=p.pack_id ORDER BY stock_id");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['stock_id']."</td>"; //stockcode
                          echo "<td>".$row['stock_type']."</td>"; //type
                          echo "<td>".$row["sname"]."</td>"; //itemname
                           echo "<td>".$row["qty"]. " ".$row["unit_name"]. " " .$row["pack_name"]. "</td>";  //qty
                          echo "</tr>";

                        }
                         ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

    </div><!-- ./wrapper -->
          



         
    </div><!-- ./wrapper -->
  </body>
</html>
