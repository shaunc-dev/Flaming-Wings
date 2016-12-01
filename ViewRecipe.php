<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("login.php");
}

?>
<html>
  <head>
    <title>Flaming Wings | View Recipe</title>
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

       <!--SEARCH--> 
  
        <!-- START OF MODAL -->
      <div id="view" class="modal fade">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                        <b><h4>
                       
                </div>
               <div class="modal-body">
                <table id="viewTable" class="table table-bordered table-hover" name="viewTable">
                          <tbody>
                                <?php
                                 $sql_query = "SELECT recipe_name FROM recipe WHERE recipe_id=1"; 
                                    mysqli_query($connect, $sql_query); 
                                    
                               
                                    echo "<td>" .$_POST['recipe_name']; "</td>"
                                    
                                ?> 
                                <a href="ViewRecipe.php">Go Back</a>
                          
                          </tbody>
                          </table>
                     
                    </div>
                    </form>
               </div>
             </div>
           </div>
       
            <!-- END OF MODAL -->


       <!--SEARCH--> 
    <div class="content-wrapper">
      <section class="content-header">
        <h3>Recipes</h3> 
      </section>
       <section class="content">

          <div class="row">
            <div class="col-xs-10">
              <div class="box">
              
                <div class="box-body">
                  <table id="recipeTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Recipe Type</th>
                        <th>Recipe Name</th>
                      
                      </tr>
                    </thead>
                    <tbody> 
                      
                        <?php
                        $stock_code = isset($_GET['recipe_name']) ? $_GET['recipe_name'] : '';
                        $sql = mysqli_query($connect, "SELECT * FROM recipe r JOIN recipetype rtype WHERE r.recipe_typeid=rtype.recipe_typeid");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['recipe_id']."</td>"; //recipe id
                          echo "<td>".$row["recipe_type"]."</td>"; //type
                          echo "<td>".$row["recipe_name"]."</td>"; //recipe name
                          echo '<td>  <button type="button" class="btn btn-block btn-default btn-sm" data-toggle="modal" data-target="#view" aria-hidden="true">View</button></td>'; 
                          echo "</tr>";

                      
                        }
                         ?>
                   
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
      
                </div><!-- /.box-body -->
              </div><!-- /.box -->





            </section><!-- right col -->
          </div><!-- /.row (main row) -->



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      
    </div><!-- ./wrapper -->




          <!---TABLE FOR RECIPE-->
          

   
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
