<!DOCTYPE html>
<?php

session_start();

?>
<html>
  <head>
    <title>Flaming Wings | Most Sold Order</title>
   <?PHP 
   include("dbconnection.php");
   include("templates/imports.php");

   ?>
   

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
    <?php include ("templates/navbar.php"); ?>
    <?php include ("templates/sidebar.php"); ?>
 <!--SEARCH--> 
    <div class="content-wrapper">
       <section class="content-header">
     
        </section>



        <!-- Main content -->
        <section class="invoice">
          
              <a href="MostSold.php" class="btn btn-primary" role="button">Go back to search</a>
        
          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <h3>Most Sold Orders from  <?php
                    echo $_POST['start_date']; 
                    echo " to " .$_POST['end_date'];  
                    ?></h3>
                <thead>
                  <tr>
                    <th>Most sold order</th>
                    <th>Number of orders</th>
                    <th>Date of Sale</th>
                  </tr>
                </thead>
                <tbody>

                <tr>
                 <!--  <td>January</td>
                 <td>
                 <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '1' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['recipe_name']."<br>";
                  }

                  ?>
                </td>
                <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '1' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['qty']."<br>";
                  }

                  ?>
               </td>
                 </tr>


                <tr>
                  <td>February</td>
                 <td>
                 <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '2' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['recipe_name']."<br>";
                  }

                  ?>
                </td>
                <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '2' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['qty']."<br>";
                  }

                  ?>
               </td>
                </tr>


                <tr>
                  <td>March</td>
                  <td>
                 <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '3' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['recipe_name']."<br>";
                  }

                  ?>
                </td>
                <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '3' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['qty']."<br>";
                  }

                  ?>
               </td>
                </tr>



                <tr>
                  <td>April</td>
                <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '4' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['recipe_name']."<br>";
                    // echo "<td>".$row['qty']."</td>";
                  }

                  ?>
                  </td>
                <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '4' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['qty']."<br>";
                  }

                  ?>
               </td>
                </tr>



                <tr>
                  <td>May</td>
                  <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '5' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['recipe_name']."<br>";
                    // echo "<td>".$row['qty']."</td>";
                  }

                  ?>
                  </td>
                <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '5' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['qty']."<br>";
                  }

                  ?>
               </td>
                </tr>
                <tr>
                  <td>June</td>
                  <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '6' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['recipe_name']."<br>";
                    // echo "<td>".$row['qty']."</td>";
                  }

                  ?>
                  </td>
                <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '6' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['qty']."<br>";
                  }

                  ?>
               </td>
                </tr>
                <tr>
                  <td>July</td>
                 <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '7' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['recipe_name']."<br>";
                    // echo "<td>".$row['qty']."</td>";
                  }

                  ?>
                  </td>
                <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '7' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['qty']."<br>";
                  }

                  ?>
               </td>
                </tr>
                  <tr>
                  <td>August</td>
                          <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '8' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['recipe_name']."<br>";
                    // echo "<td>".$row['qty']."</td>";
                  }

                  ?>
                  </td>
                <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '8' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['qty']."<br>";
                  }

                  ?>
               </td>
                </tr>
                     <tr>
                  <td>September</td>
                          <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '9' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['recipe_name']."<br>";
                    // echo "<td>".$row['qty']."</td>";
                  }

                  ?>
                  </td>
                <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '9' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['qty']."<br>";
                  }

                  ?>
               </td>
                </tr>
                     <tr>
                  <td>October</td>
                          <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '1' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['recipe_name']."<br>";
                    // echo "<td>".$row['qty']."</td>";
                  }

                  ?>
                  </td>
                <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '1' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['qty']."<br>";
                  }

                  ?>
               </td>
                </tr>
                     <tr>
                  <td>November</td>
                          <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '11' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['recipe_name']."<br>";
                    // echo "<td>".$row['qty']."</td>";
                  }

                  ?>
                  </td> -->
               <!--  <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, s.qty FROM `sales` AS s, recipe AS r where s.recipe_id=r.recipe_id and MONTH(dtSales) = '11' ORDER BY qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo $row['qty']."<br>";
                  }

                  ?>
               </td>
                </tr> -->
                <tr>
                          <td>
                
                <td>
                  <?php
                  $sql = mysqli_query($connect, "SELECT recipe_name, sd.qty, s.dtSales FROM sales_details AS sd, sales AS s, recipe AS r WHERE sd.recipe_id=r.recipe_id AND s.dtSales BETWEEN '".$_POST['start_date']."' AND '".$_POST['end_date']."' AND sd.sales_id = s.sales_id ORDER BY sd.qty DESC");
                  while($row = mysqli_fetch_array($sql)){
                    echo "<tr>";
                    echo "<td>".$row['recipe_name']."</td>";
                    echo "<td>".$row['qty']."</td>";
                     echo "<td>".$row['dtSales']."</td>";
                    echo "</tr>"; 
                  }

                  ?>
               </td>
                </tr>
         
         

         

                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

            </section><!-- right col -->
          </div><!-- /.row (main row) -->



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
          



         
    </div><!-- ./wrapper -->
  </body>
</html>
