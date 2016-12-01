<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("login.php");
}

?>
<html>
  <head>
    <title>Flaming Wings | Most Sold Order</title>
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
       <section class="content-header">
     
        </section>



        <!-- Main content -->
        <section class="invoice">
          
          <form action = "OutputMSO.php" method ="post">
          <div class="box box-primary">
                <div class="box-header">
                  <h3><center><b>Search Most Sold Order</b></center></h3>
                </div>
                <div class="box-body">

               
                 <h4><center><b>Start Date</b></center></h4>
                 <center><input type="date" name="start_date"></center>
                 <br>
                 <h4><center><b>End Date</b><center></h4>
                 <center><input type="date" name="end_date"><center>
                 <br>
                 <br>
                <center><input type="submit" class="btn btn-primary" value="SEARCH" /></center>
                
                </div><!-- /.box-body -->
            </form>
      


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
          



         
    </div><!-- ./wrapper -->
  </body>
</html>
