<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("login.php");
}

?>
<html>
  <head>
    <title>Flaming Wings | Deactivate Recipe</title>

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
        
          <form action="SearchReactivateRecipe.php" method="post" class="sidebar-form">
            <div class="col-xs-10">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>SEARCH RECIPE TO BE REACTIVATED</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="InputRecipeID" class="col-sm-2 control-label">Recipe ID</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="InputStockCode" name="query" placeholder="Enter recipe name" required>
                      </div>
                    </div>
                  <div class="box-footer">
                    <input type="submit" class="btn btn-info pull-right" value="Submit"/>
                  </div><!-- /.box-footer -->
                </form>
              </div>
            </div>
          </form>

          <div class="row">
            <div class="col-xs-10">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>REACTIVATE RECIPE</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="stocktable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                         </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="recipeResults" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Recipe ID</th> <!--recipe id-->
                        <th>Recipe Type</th> <!--recipe type-->
                        <th>Recipe Name</th> <!--recipe name-->
                     

                      </tr>
                    </thead>
                    <form action="ReactivateRecipee.php" method="post">
                    <tbody>
                    
                     <!-- SELECT * FROM recipe NATURAL JOIN recipetype WHERE deactivate !='0'-->
                       <?php
                        $stock_code = isset($_GET['recipe_name']) ? $_GET['recipe_name'] : '';
                        $sql = mysqli_query($connect, " SELECT recipe_id, recipe.recipe_name, recipe_type FROM recipe, recipetype WHERE deactivate != 0 AND recipe.recipe_typeid=recipetype.recipe_typeid order by recipe.recipe_id DESC");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['recipe_id']."</td>"; //recipe id
                          echo "<td>".$row["recipe_type"]."</td>"; //type
                          echo "<td>".$row["recipe_name"]."</td>"; //recipe name
                          echo '<td><button type="submit" value='.$row['recipe_id'].' class="btn btn-block btn-default btn-sm" name="ReactivateRecipeButton">Reactivate</button>'; 
                          echo "</tr>";

                      
                        }
                         ?>
                        
                    </tbody>
                  </form>
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
  </body>
</html>
