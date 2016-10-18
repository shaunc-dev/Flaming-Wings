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


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Stock Report</title>
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
          <img src="logoo.jpg" alt="Mountain View" style="width:200px;height:50px;">
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
            <li class="active treeview">
              <a href="MAIN.php">
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
