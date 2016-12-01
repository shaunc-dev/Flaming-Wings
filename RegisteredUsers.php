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
