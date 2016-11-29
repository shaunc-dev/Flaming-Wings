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
                  <h3 class="box-title"><b>UNIT OF MEASUREMENT (UOM)</b></h3>
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
                       
                        $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement order by unit_id DESC");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['unit_id']."</td>"; //unit id
                          echo "<td>".$row["unit_name"]."</td>"; //unit name
                        
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
