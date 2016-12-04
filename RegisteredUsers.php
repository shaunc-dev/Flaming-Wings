<!DOCTYPE html>
<?php

session_start();

?>

<html>
  <head>
    <title>Flaming Wings | Registered Users</title>
    <?php include ("templates/imports.php"); ?>
   <!-- PHP --> 
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
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
               <h3>
                Registered Users
               </h3>


              <!---START OF WRAPPER-->


           <div class="col-md-50">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#manager" data-toggle="tab">Manager</a></li>
                  <li><a href="#stockcontroller" data-toggle="tab">Stock Controller</a></li>
                  <li><a href="#cashier" data-toggle="tab">Cashier</a></li>
                </ul>


                <!--MANAGER TAB-->
                <div class="tab-content">
                 <div class="active tab-pane" id="manager">
                  <table class="table table-bordered">
                    <thead>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Username</th>
                    </thead>
                    <tbody>
                       

                        <?php
                      
                        $sql = mysqli_query($connect, "SELECT firstName, lastName, user_name, employee_type FROM users u, employee_type type WHERE u.user_type_id=type.user_type_id AND employee_type='Manager'"); 
                           while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['firstName']."</td>"; //firstName
                          echo "<td>".$row['lastName']."</td>"; //lastName
                          echo "<td>".$row['user_name']."</td>"; //username
                      
                          echo "</tr>";
                        }

                        ?>
                      </tbody>
                 
                  
                  </table>



                  </div><!-- /.tab-pane -->

  <!--STOCK CONTROLLER TAB-->

                <div class="tab-pane" id="stockcontroller">
                  <table class="table table-bordered">
                     <thead>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Username</th>
                    </thead>
                    <tbody>
                       

                        <?php
                      
                        $sql = mysqli_query($connect, "SELECT firstName, lastName, user_name, employee_type FROM users u, employee_type type WHERE u.user_type_id=type.user_type_id AND employee_type='Stock Controller'"); 
                           while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['firstName']."</td>"; //firstName
                          echo "<td>".$row['lastName']."</td>"; //lastName
                          echo "<td>".$row['user_name']."</td>"; //username
                      
                          echo "</tr>";
                        }

                        ?>
                      </tbody>
                  </table>

                  </div><!-- /.tab-pane -->


  <!--CASHIER TAB-->
                 <div class="tab-pane" id="cashier">
                  <table class="table table-bordered">
                     <thead>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Username</th>
                    </thead>
                    <tbody>
                       

                        <?php
                      
                        $sql = mysqli_query($connect, "SELECT firstName, lastName, user_name, employee_type FROM users u, employee_type type WHERE u.user_type_id=type.user_type_id AND employee_type='Cashier'"); 
                           while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['firstName']."</td>"; //firstName
                          echo "<td>".$row['lastName']."</td>"; //lastName
                          echo "<td>".$row['user_name']."</td>"; //username
                      
                          echo "</tr>";
                        }

                        ?>
                      </tbody>
                  </table>

                  </div><!-- /.tab-pane -->

 
               

                  

             <!-- E N D I N G -->
    </div><!-- ./wrapper -->
          

          </div><!-- /.tab-pane -->
         
    </div><!-- ./wrapper -->
  </body>
</html>
