<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Flaming Wings | Dashboard</title>
    <?php include ("templates/imports.php"); ?>

    <?php 
    include("dbconnection.php"); 
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
        <!-- START OF MODAL -->
        <div id="edit" class="modal fade">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                        <b><h3>Replenish Stock</h3></b>
                         
                </div>
               <div class="modal-body">

                 <form class="form-horizontal" action="replenishstock1.php"  method="post" role="form" name="replenishTable">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputQty" class="col-sm-2 control-label">Quantity Received</label>
                      <div class="col-sm-4">
                        <input type="number" step="any" min="0" class="form-control" id="inputQty" placeholder="Qty" required>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputdtReceived" class="col-sm-2 control-label">Date Received (dd/mm/yy)</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputdtReceived" required value="<?php echo date('Y-m-d'); ?>" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputRemarks" class="col-sm-2 control-label">Remarks</label>
                      <div class="col-sm-10">
                         <textarea class="form-control" rows="3" placeholder="Remarks ..." id="inputRemarks"></textarea>
                       
                      </div>
                    </div>
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Replenish</button>
                  </div><!-- /.box-footer -->
                </form>
              </div>
               </div>
             </div>
           </div>
       
            <!-- END OF MODAL -->

         <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>Verify Stock</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="VerifyStock1.php" method="post">
                  <div class="box-body">
                   
                     <div class="form-group">
                      <label>Stock Name</label>
                      <select class="form-control" name="sname" required
                      value="<?php if (isset($_POST['sname']) && !$flag) echo $_POST['sname']; ?>">
                        <option value="" disabled selected> -- ID -- Stock Name -- Qty --</option> 
                        
                        <?php
                        $sql = mysqli_query($connect, "SELECT stock_id, sname, qty, pack_name FROM stock s JOIN unitmeasurement m JOIN unitpackaging p WHERE s.unit_id=m.unit_id AND p.pack_id=s.pack_id");
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=\"" . $row['stock_id'] . "\">".$row['stock_id']. " -- ".$row['sname']. " -- " .$row['qty']. " " .$row['pack_name']. "</option>"; 
                        }
                         ?>
                      </select>
                      
                    </div>
                      <div class="form-group">
                      <label for="InputQty">Actual Quantity</label>
                      <input type="number" min="0" step="any" class="form-control" id="InputQty" placeholder="Quantity" name="qty" required>
                    </div>

                    <!-- DATE -->
                      <div class="form-group">
                        <label for="inputdtReceived">Date Verified</label>
                       
                        <input type="date" class="form-control" id="inputdtReceived" name="dtVerified" required value="<?php echo date('Y-m-d'); ?>" />
                        
                       </div>  

                    
                    <div class="form-group">
                      <label for="InputRemarks">Remarks</label>
                      <input type="text" class="form-control" rows="3" id="InputRemarks" placeholder="Remarks..." name="remarks" required>
                    </div>
                  



                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Verify Stock</button>
                  </div>
                </form>
              </div><!-- /.box -->
  

          <div class="row">
            <div class="col-xs-10">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>REPLENISH STOCK</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="stocktable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                         </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="recentlyadded" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Stock Code</th>
                        <th>Category/Type</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Unit of Measurement</th>
                        

                      </tr>
                    </thead>
                    <tbody>
                     
                       <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                        $sql = mysqli_query($connect, "SELECT * FROM stock NATURAL JOIN stocktype NATURAL JOIN unitmeasurement NATURAL JOIN ingredientname");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['stock_id']."</td>"; //stockcode
                          echo "<td>".$row["stock_type"]."</td>"; //type
                          echo "<td>".$row["sname"]."</td>"; //itemname
                          echo "<td>".$row["qty"]."</td>"; //qty
                          echo "<td>".$row["unit_name"]."</td>"; //unit
                          echo '<td>  <button type="button" class="btn btn-block btn-default btn-sm" data-toggle="modal" data-target="#edit" aria-hidden="true">Replenish</button></td>'; 
                          echo "</tr>";

                      
                        }
                         ?>
                        
                    </tbody>
                  </table>
                   <div class="box-footer">
                   
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->



            </section><!-- right col -->
          </div><!-- /.row (main row) -->



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



    
      
    </div><!-- ./wrapper -->




          <!---TABLE FOR RECIPE-->
          

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
    <script>

$(document).ready(function() {
  $("#query").autocomplete({ 
    source : 'searchs.php',
    select : function(event, ui){
      $("#query").html(ui.item.value); 
    }
  });
 
}); 

    </script>
  </body>
</html>
