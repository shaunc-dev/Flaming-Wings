<?php 
session_start();
?>

<!DOCTYPE html>
<?php

$_SESSION['varname'] = 'varname';
?>

<html>
 <?php
      $var_value = $_GET['varname']; 

      ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Edit Recipe</title>
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
   include("dbconnection.php");

   ?>

   <style type="text/css">
        .IngredientDelete {
            background: none;
            color: red;
            border: none;
            font-size: 1.5em;
        }
   </style>

   

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
                <li><a href="SearchRecipe.php"><i class="fa fa-circle-o"></i> Search Recipe</a></li>
                <li><a href="AddRecipe.php"><i class="fa fa-circle-o"></i> Add Recipe</a></li>
                <li><a href="EditRecipe.php"><i class="fa fa-circle-o"></i> Edit Recipe</a></li>
                <li><a href="DeactivateRecipe.php"><i class="fa fa-circle-o"></i> Deactivate Recipe</a></li>
                <li><a href="reactivaterecipe.php"><i class="fa fa-circle-o"></i> Reactivate Recipe</a></li>
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
                <li><a href="SearchStock.php"><i class="fa fa-circle-o"></i> Search Stock</a></li>
                <li><a href="AddStock.php"><i class="fa fa-circle-o"></i> Add new Stock</a></li>
                <li><a href="ReplenishStock.php"><i class="fa fa-circle-o"></i> Replenish Stock</a></li>
                <li><a href="EditStock.php"><i class="fa fa-circle-o"></i> Edit Stock</a></li>
                <li><a href="WithdrawStock.php"><i class="fa fa-circle-o"></i> Withdraw Stock</a></li>
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
                <li><a href="InventoryReport.php"><i class="fa fa-circle-o"></i> Inventory Report</a></li>
                <li><a href="VerifyStock.php"><i class="fa fa-circle-o"></i>Stock Controller</a></li>
                <li><a href="MostSold.php"><i class="fa fa-circle-o"></i> Most sold order</a></li>
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
                <li><a href="Conversion.php"><i class="fa fa-circle-o"></i>Conversion Table</a></li>
             
              </ul>
            </li>
      </aside>



       <!--SEARCH--> 
    <div class="content-wrapper">


<?php

$query = "SELECT recipe_name from recipe where recipe_id = '".$var_value."'";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {



?>


       <form action ="EditTheRecipeUpdate.php" method ="post">
       <div class="row">
            <div class="col-md-6">
              <div class="col-xs-12">
                 <a href="EditRecipe.php"><< Back</a>
              <div class="box box-primary">
                <div class="box-header">
                  <h3><?php echo $row["recipe_name"];?></h3>
                  <input type="text" class="form-control" id="recipe_name" name="recipe_name" required
                      value="<?php 
                      $rname = mysqli_query($connect, "SELECT recipe_name from recipe where recipe_id = '".$var_value."'"); 
                    
                       while ($row = mysqli_fetch_array($rname)){
                        echo "". $row['recipe_name'] . ""; 
                       }
                       ?>"></input>
                     

                  <label>Category/Type</label>
                    <select class="form-control" name="recipe_type" id="recipe_type" required> 
                    
                         <?php
                            $sql = mysqli_query($connect, "SELECT recipe_type, type.recipe_typeid FROM recipetype AS type, recipe AS r WHERE r.recipe_typeid=type.recipe_typeid AND r.recipe_id='".$var_value."'");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['recipe_typeid'] . "\">" . $row['recipe_type'] . "</option>";
                            }
                             ?>" 
                        <?php
                            $sql = mysqli_query($connect, "SELECT * FROM recipetype");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['recipe_typeid'] . "\">" . $row['recipe_type'] . "</option>";
                            }
                             ?>
                      </select>



<?php

}

?>
                </div><!-- /.box-header -->



                <div class="box-body">
                  <table id="recentlyadded" class="table table-bordered table-hover">
                    <label>Add New Ingredients</label>
                    <thead>
                      <tr>
                        <th>Ingredients</th>
                          <th>Unit of Measurement</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody id="ing">
                  
                        <!--- NEW INGREDIENTS FOR RECIPE --> 

                      <tr>

                    
                      <td> 
                    <select class="form-control" id="AddIngredient" name="ing_name" value="<?php if (isset($_POST['ing_name'])) echo $_POST['ing_name']; ?>">  
                      <option value="" disabled selected>Ingredients</option>
                      <?php
                            $sql = mysqli_query($connect, "SELECT * FROM ingredientname");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['ingName_id'] . "\">" . $row['ing_name'] . "</option>";
                            }
                             ?>"> <!--list of measurements from database -->
                           
                      </select>     </td>


                    <td>
                    <select class="form-control" id="UOM" name="unitM" value="<?php if (isset($_POST['unitM'])) echo $_POST['unitM']; ?>" > 
                      <option value="" disabled selected>Unit of Measurement</option> 
                          <?php
                            $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['unit_id'] . "\">" . $row['unit_name'] . "</option>";
                            }
                             ?>"
                      </option> <!-- list of measurements from database -->
                          
                      </select> </td>
                                        
                

                         <td> 
                    <input type="number" class="form-control" id="InputQty" placeholder="Quantity" name="qty" value="<?php if(isset($_POST['qty'])) echo $_POST['qty']; ?>" ></td>
                      

                      </tr>

                  


                    </tbody>

                  </table>

                  <br>
                  <!-- button to add ingredient --> 
                  <button type="button" id="IngredientAdd" class="btn btn-primary">Add Ingredient</button>
                 
                <button type="submit" class="btn btn-primary" name="varname" value="<?php echo $_GET['varname'] ;?>" href="EditTheRecipeUpdate.php" style="float: right;">EDIT RECIPE</button>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
      

    </div><!-- ./wrapper -->

            <div class="row">
            <div class="col-md-6">
              <div class="col-xs-12">
              </br>
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><b>CURRENT INGREDIENTS FOR RECIPE</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="recentlyadded" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Ingredient</th>
                        <th>Unit of Measurement</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody id="ingredients">
                          <?php

                      $query2 = "SELECT ri.qty myqty, unit_name unitname, ing_name ingname, i.ingName_id ingName_id, ri.unit_id
                      FROM recipeingredients ri, recipe r, ingredientname i, unitmeasurement u
                      WHERE ri.recipe_id = '".$var_value."'  && i.ingName_id = ri.ingName_id && u.unit_id = ri.unit_id && r.recipe_id = ri.recipe_id";
                      $result2 = mysqli_query($connect, $query2) or die (mysqli_error($connect));

                      while ($row2 = mysqli_fetch_array($result2)) {
                        ?>

                      <tr>
                        <td>
                            <?php                                  
                                  echo "<p name='ingname[]' value=\"" . $row2['ingname'] . "\">" . $row2['ingname'] . "</p>";  
                                  echo "<input id='ingname' type='hidden' name='ingname[]' value=\"" . $row2['ingname'] . "\" />"; 
                               ?>
                       <!--    <?php //echo "p name='ingname[]' id='ingname'" . $row2["ingname"] . "</p>"?>
                          <input name="ingname[]" id="ingname" value="<?php // echo $row2['ingname']; ?>" />  -->
                        </td>

                        <td>
                           <select class="form-control" name="uomname[]" id="uomname">
                                
                               <?php                                  
                                  echo "<option selected value=\"" . $row2['unit_id'] . "\">" . $row2['unitname'] . "</option>";  
                             
                                $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement");
                                while ($row3 = mysqli_fetch_array($sql)){
                                echo "<option value=\"" . $row3['unit_id'] . "\">" . $row3['unit_name'] . "</option>";
                                }
                                 ?>

                          </select>
                     
                        </td>

                        <td>
                               <input type="number" step="any" min="0" class="form-control" id="qtyname" value="<?php echo $row2["myqty"];?>" maxlength="5" name="qtyname[]" required />
                        </td>
                      <td>
                        <button type="button" class="IngredientDelete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                      </td>
                      </tr>
                        <?php
                      }

                      ?>

                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          
     </form>
          


    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <script>
        function editRecipe(str) {
        var e = document.getElementById(EditAddIngredient).selectedIndex.value;
        //var strUser = e.

        console.log(e);
    }
    </script>

    <script>
        $("#IngredientAdd").on("click", function() {
          console.log($("#AddIngredient").val());
          $("#ingredients").append("<tr><td>"+ $("#AddIngredient option:selected").text() +"<input type='hidden' name='ingname[]' id='ingname' value="+ $("#AddIngredient").val() +" /></td><td>"+ $("#UOM option:selected").text() +"<input type='hidden' id='uomname' name='uomname[]' value='"+ $("#UOM").val() +"'/></td><td>"+ $("#InputQty").val() +"<input type='hidden' name='qtyname[]' id='qtyname' value="+ $("#InputQty").val() +" /></td></td>"+"<td><button type='button' class='IngredientDelete'><i class='fa fa-trash-o' aria-hidden='true'></i></button></td></td></tr>");

//javascript to remove an ingredient  
          $(".IngredientDelete").on("click", function() {
              $(this).parent().parent().remove();
          });
        });

        $(".IngredientDelete").on("click", function() {
            $(this).parent().parent().remove();
        });
    </script>




  </body>
</html>