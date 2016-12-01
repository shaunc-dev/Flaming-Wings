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
      <form action="Conversion.php" method="get" class="sidebar-form">
            <div class="col-xs-10">
              <a href="Conversion.php"><< Go Back</a>
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>CONVERSIONS</b></h3>
                </div><!-- /.box-header -->
           
            <div class="box-body">
                  <table id="uomadded" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>QTY1</th>
                        <th>UOM1</th>
                        <th> = </th>
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
                          echo "<td>=</td>"; 
                          echo "<td>".$row["qty2"]."</td>"; //qty2
                          echo "<td>".$row['uname2']."</td>"; //unit_id1
                      
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
