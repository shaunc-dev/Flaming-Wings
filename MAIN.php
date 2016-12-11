<?php

  session_start(); 
?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->

    <?php include ("templates/imports.php"); ?>
    
    <style>

      .content-header > * {
        display: inline-block;
      }

    </style>

   <?PHP 
   include("dbconnection.php")


   ?>

   

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">


      <?php include ("templates/navbar.php"); ?>
      <?php include ("templates/sidebar.php"); ?>



  <!--DASHBOARD CONTENT--> 
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
          <small>Control panel</small>

          <?php 


            echo "<h4 style='float: right; margin: 0;'><b>Today is: </b> " . date('l jS \of F Y h:i:s A') . "</h4>";
        
             ?>
        
        </section>

     <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">

            <div class="col-lg-3 col-xs-6">

              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">

                  <h3>Top Orders</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="MostSold.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->




            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>Inventory</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="InventoryReport.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->





            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>Stocks</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="SearchStock.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->




            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>Recipes</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="SearchRecipe.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->



         <!--TIMELINE-->
          <section class="content-header">
          <h1>
            Timeline
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- row -->
          <div class="row">
            <div class="col-md-9">
              <!-- The time line -->
              <ul class="timeline">
                <!-- timeline item -->
                <li>
                  <i class="fa fa-bar-chart bg-yellow"></i>
                  <div class="timeline-item">
                               <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>Emergency Level</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="recentlyadded" class="table table-bordered table-hover">
                    <thead>
                      Stocks Needed for Replenishing
                    </br>
                      <tr>
                      
                        <th>Stock Name</th>
                        <th>Emergency Level</th>
                        <th>Current Stock</th>
                      
                      
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $ingredients_query= "SELECT ingredientname.ingName_id, recipeingredients.qty FROM ingredientname, unitmeasurement, recipeingredients WHERE ingredientname.unit_id=unitmeasurement.unit_id AND recipeingredients.ingName_id=ingredientname.ingName_id AND recipeingredients.unit_id=unitmeasurement.unit_id"; 

                        // // get all stocks
                        //   $sql = mysqli_query($connect, "SELECT stock_id, stock_type, sname FROM stock AS s, stocktype AS type WHERE s.stocktype_id=type.stocktype_id AND deactivate='0'");

                        // while ($row = mysqli_fetch_array($sql)){
                        // // get all stocks with emergencylvl less than current stock; iterate 
                        //     $currentstock_checker = mysqli_query($connect, "SELECT stock_id, stocktype.stock_type AS type, sname, emergencyLvl
                        //             FROM stock, stocktype 
                        //             WHERE deactivate='0'
                        //             AND stocktype.stocktype_id=stock.stocktype_id
                        //             AND stock.stock_id='".$row['stock_id']."'
                        //             AND emergencyLvl >= (SELECT SUM(r.qty) - SUM(w.qty)
                        //                                 FROM replenishstock r, withdrawstock w, stock
                        //                                 WHERE r.stock_id=stock.stock_id
                        //                                  AND w.stock_id=stock.stock_id
                        //                                  AND stock.stock_id='".$row['stock_id']."')
                        //             "); 

                        //     if (!$currentstock_checker) {
                        //           printf("Error: %s\n", mysqli_error($connect));
                        //           exit();
                        //       }
                        //     while ($row2 = mysqli_fetch_array($currentstock_checker)){

                        // get replenishstock
                        $need_stock = array();

                        $replenish_query = mysqli_query($connect, "SELECT r.stock_id as stockid, sname, SUM(r.qty) as replenish_quantity, emergencyLvl
                                                        FROM stock s, replenishstock r
                                                        WHERE s.stock_id=r.replenish_id
                                                        group by r.stock_id");

                        while ($replenish_row = mysqli_fetch_assoc($replenish_query)) {
                            $withdraw_query = mysqli_query($connect, "SELECT SUM(w.qty) as withdraw_quantity FROM stock s, withdrawstock w WHERE s.stock_id=w.stock_id && w.stock_id = '{$replenish_row["stockid"]}'") or die (mysqli_error($connect));

                            while ($withdraw_row = mysqli_fetch_assoc($withdraw_query)) {
                                $current_stock = 0;
                                $current_stock = $replenish_row["replenish_quantity"] - $withdraw_row["withdraw_quantity"];

                                if ($current_stock <= $replenish_row["emergencyLvl"]) {
                                    array_push($need_stock, array(

                                        "sname" => $replenish_row["sname"],
                                        "stock_id" => $replenish_row["stockid"],
                                        "current_stock" => $current_stock,
                                        "emergencyLvl" => $replenish_row["emergencyLvl"]

                                        )
                                    );
                                }
                            }
                        }

                        // get withdrawstock

                        //  
                        for ($i = 0; $i < sizeof($need_stock); $i++) { ?>

                        <tr>
                            <td><?=$need_stock[$i]['sname']?></td>
                            <td><?=$need_stock[$i]['emergencyLvl']?></td>
                            <td><?=$need_stock[$i]['current_stock']?></td>
                        </tr>

                        <?php } ?>
                 
                    </tbody>
                  </table>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </li>

                <!-- END timeline item -->


                <!-- timeline item -->


             <!--CALENDAR-->
             
                     <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
               
              </div><!-- /.nav-tabs-custom -->              

              <!-- Calendar -->

         
                <!-- END timeline item -->

         

               

            </section><!-- right col -->
          </div><!-- /.row (main row) -->





      


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    


      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
  </body>
</html>
