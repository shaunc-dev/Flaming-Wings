<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("login.php");
}

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Conversion</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


   <!-- PHP --> 
   <?PHP 
   include("dbconnection.php")

   ?>

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="MAIN.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Flaming Wings</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


             
              <!-- NOTIFICATION -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>




              <!-- UPPER RIGHT CORNER -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Brooklyn Beckham</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Brooklyn Beckham - Manager
                      <small>Member since Nov. 2016</small>
                    </p>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>






      <!--UPPER LEFT CORNER-->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Brooklyn Beckham</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          



          <!-- SIDEBAR MENU -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <!--DASHBOARD-->
            <li class="treeview">
              <a href="http://localhost/Flaming-Wings/MAIN.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>





            <!---RECIPE -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Recipe</span>
                <span class="label label-primary pull-right"></span>
              </a>

              <ul class="treeview-menu">
                <li><a href="http://localhost/Flaming-Wings/SearchRecipe.php"><i class="fa fa-circle-o"></i> Search Recipe</a></li>
                <li><a href="http://localhost/Flaming-Wings/AddRecipe.php"><i class="fa fa-circle-o"></i> Add Recipe</a></li>
                <li><a href="http://localhost/Flaming-Wings/EditRecipe.php"><i class="fa fa-circle-o"></i> Edit Recipe</a></li>
                <li><a href="http://localhost/Flaming-Wings/DeactivateRecipe.php"><i class="fa fa-circle-o"></i> Deactivate Recipe</a></li>
                 <li><a href="http://localhost/Flaming-Wings/reactivaterecipe.php"><i class="fa fa-circle-o"></i> Reactivate Recipe</a></li>
              </ul>
            </li>




             <!--STOCKS-->
             <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Stocks</span>
                <span class="label label-primary pull-right"></span>
              </a>

              <ul class="treeview-menu">
                <li><a href="http://localhost/Flaming-Wings/SearchStock.php"><i class="fa fa-circle-o"></i> Search Stock</a></li>
                <li><a href="http://localhost/Flaming-Wings/AddStock.php"><i class="fa fa-circle-o"></i> Add new Stock</a></li>
                <li><a href="http://localhost/Flaming-Wings/ReplenishStock.php"><i class="fa fa-circle-o"></i> Replenish Stock</a></li>
                <li><a href="http://localhost/Flaming-Wings/EditStock.php"><i class="fa fa-circle-o"></i> Edit Stock</a></li>
                <li><a href="http://localhost/Flaming-Wings/WithdrawStock.php"><i class="fa fa-circle-o"></i> Withdraw Stock</a></li>
              </ul>
            </li>





            <!--INVENTORY REPORTS-->
         <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i>
                <span>Inventory Reports</span>
                <span class="label label-primary pull-right"></span>
              </a>

              <ul class="treeview-menu">
                <li><a href="http://localhost/Flaming-Wings/InventoryReport.php"><i class="fa fa-circle-o"></i> Inventory Report</a></li>
                <li><a href="http://localhost/Flaming-Wings/VerifyStock.php"><i class="fa fa-circle-o"></i>Stock Controller</a></li>
                <li><a href="http://localhost/Flaming-Wings/MostSold.php"><i class="fa fa-circle-o"></i> Most sold order</a></li>
              </ul>
            </li>
        <!-- /.sidebar -->

         <!--CONVERSION-->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calculator"></i> 
                <span>Conversion</span> 
                <span class="label label-primary pull-right"></span>
              </a>


               <ul class="treeview-menu">
                <li><a href="http://localhost/Flaming-Wings/Conversion.php"><i class="fa fa-circle-o"></i>Conversion Table</a></li>
              
              </ul>
            </li>
      </aside>

           <!--SEARCH--> 
    <div class="content-wrapper">
       <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>CONVERSION TABLE</b></h3>
                  </br>
                  <h5>Unit of Measurement (UOM)</h5>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <form class="form-horizontal" action="Conversion1.php"  method="post" role="form" name="convert">
                  <div class="box-body">
                    <table  id="convert" class="table table-bordered table-hover" name="convertTable">
                      <thead>
                        <th>Qty1</th>
                        <th>UOM1</th>
                        <th> = </th>
                        <th>Qty2</th>
                        <th>UOM2</th>
                      </thead>
                      <td>  <input type="number" class="form-control" id="qty1" name="qty1" placeholder="Qty" 
                        value="<?php if (isset($_POST['qty1'])) echo $_POST['qty1']; ?>" required></td>

                      <td> <select class="form-control" name="unitM1" 
                          value="<?php if (isset($_POST['unitM1'])) echo $_POST['unitM1']; ?>">
                        
                     
                            <?php
                            $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement ORDER BY unit_id DESC LIMIT 1");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['unit_id'] . "\">" . $row['unit_name'] . "</option>";
                            }
                             ?>
                          </select>
                        </td>
                        <td>
                          <b>=</b>
                        </td>
                        <td>
                          
                            <input type="number" class="form-control" id="qty2" name="qty2" placeholder="Qty" 
                            value="<?php if (isset($_POST['qty2'])) echo $_POST['qty2']; ?>" required>
                        
                        </td>

                         <td> <select class="form-control" name="unitM2" 
                          value="<?php if (isset($_POST['unitM2'])) echo $_POST['unitM2']; ?>">
                           <option value="" disabled selected>Unit of Measurement</option> //list of measurements from database
                     
                            <?php
                            $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['unit_id'] . "\">" . $row['unit_name'] . "</option>";
                            }
                             ?>
                          </select>
                        </td>


                    </table>
                   <!-- <div class="form-group">
                      <label for="inputQty" class="col-sm-2 control-label">Quantity Received</label>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" id="inputQty" placeholder="Qty" required>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputdtReceived" class="col-sm-2 control-label">Date Received</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputdtReceived" required value="<?php echo date('Y-m-d'); ?>" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputRemarks" class="col-sm-2 control-label">Remarks</label>
                      <div class="col-sm-10">
                         <textarea class="form-control" rows="3" placeholder="Remarks ..." id="inputRemarks"></textarea>
                       
                      </div>
                    </div>-->
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                  </div><!-- /.box-footer -->
                </form>
                
              </div><!-- /.box -->

              <!-- CONVERSIONS TABLE --> 

            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>CONVERSIONS</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="uomadded" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>QTY1</th>
                        <th>UOM1</th>
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
                          echo "<td>".$row["qty2"]."</td>"; //qty2
                          echo "<td>".$row['uname2']."</td>"; //unit_id1
                      
                          echo "</tr>";

                      
                        }
                         ?>
                    
                     
                    </tbody>
                  </table><a class="footer"><center><a href="ViewConversion1.php">View All</a></center>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              

    </div><!-- ./wrapper -->
          
          





          </div><!-- /.tab-pane -->
         
    </div><!-- ./wrapper -->

      <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>ADD UNIT OF MEASUREMENT (UOM) </b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="AddUOM1.php" method="post">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="uom" >Enter new UOM</label>
                      <input type="text" class="form-control" id="unit_name" maxlength="30" name="unit_name"
                       value="<?php if (isset($_POST['unit_name']) && !$flag) echo $_POST['unit_name']; ?>" required>

                    </div>
                    

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add New UOM</button>
                  </div>
                </form>
              </div><!-- /.box -->

         


              <!-- RECENTLY ADDED TABLE -->
              <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>RECENTLY ADDED UOM</b></h3>
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
                       
                        $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement order by unit_id DESC LIMIT 6");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['unit_id']."</td>"; //unit id
                          echo "<td>".$row["unit_name"]."</td>"; //unit name
                        
                          echo "</tr>";

                      
                        }
                         ?>
                 
                     
                    </tbody>
                  </table>
                    <a class="footer"><center><a href="ViewUOM1.php">View All</a></center></li>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

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
