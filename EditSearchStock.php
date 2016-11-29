<!DOCTYPE html>
<?php

session_start();

$_SESSION['varname'] = 'varname';

?>

<html>
   <?php
      $var_value = $_GET['varname']; 
      ?>

    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Edit Stock</title>

         <?php include ("templates/imports.php"); ?>
   <!-- PHP --> 
   <?PHP 
   include("dbconnection.php")

   ?>
    <!-- HEADER -->
  </head>
  
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

        <?php include ("templates/navbar.php"); ?>
      <?php include ("templates/sidebar.php"); ?>
       <!--SEARCH--> 
    <div class="content-wrapper">
      
   
           <section class="content">
          <div class="row">
            <div class="col-md-6">
                <a href="EditStock.php"> << Go Back</a>
              <div class="box">
                <div class="box-header">

                  <h3 class="box-title"><b>Edit Stock<?php 
                    $sql = mysqli_query($connect, "SELECT sname FROM stock AS s WHERE stock_id ='".$var_value."';");
                       while ($row = mysqli_fetch_array($sql)){
                          echo "<h3>" .$row['sname']."</h3>"; }

                     
                     ?>
                   </b>
                </div><!-- /.box-header -->
                <div class="box-body">
                   <!-- form start -->
                <form role="form" action="EditStock2.php" method="post">
                    
                    <div class="form-group">
                      <label>Gross Weight</label>
                      <input type="number" step="any" min="0" class="form-control" id="qty" value=
                      <?php 
                        $sql = mysqli_query($connect, "select qty from stock where stock_id='".$var_value."'");
                       $row = mysqli_fetch_array($sql);
                          echo $row['qty'];
                      
                      ?>

                      maxlength="5" name="qty" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Unit of Measurement</label>
                      <select class="form-control" name="unitM" id="unitM" required
                      value="<?php if (isset($_POST['unitM']) && !$flag) echo $_POST['unitM']; ?>">
                   
                      
                         <?php
                            $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement AS u, stock AS s WHERE s.unit_id=u.unit_id AND s.stock_id='".$var_value."'");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['unit_id'] . "\">" . $row['unit_name'] . "</option>";
                            }
                             ?>
                       
                     
                        <?php
                        $sql = mysqli_query($connect, "SELECT * FROM unitmeasurement");
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=\"" . $row['unit_id'] . "\">" . $row['unit_name'] . "</option>";
                        }
                         ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Packaging</label>
                      <select class="form-control" name="pack_name" id="pack_name" required
                      value="<?php if (isset($_POST['pack_name']) && !$flag) echo $_POST['pack_name']; ?>">
                      
                         <?php
                            $sql = mysqli_query($connect, "SELECT * FROM unitpackaging, stock WHERE stock.pack_id=unitpackaging.pack_id AND stock.stock_id='".$var_value."'");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['pack_id'] . "\">" . $row['pack_name'] . "</option>";
                            }
                             ?>
                      
                        <?php
                        $sql = mysqli_query($connect, "SELECT * FROM unitpackaging");
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=\"" . $row['pack_id'] . "\">" . $row['pack_name'] . "</option>";
                        }
                         ?>
                      </select>
                    </div>
                    

                     <div class="form-group">
                      <label for="InputItemName">Stock Name</label>
                      <input type="text" class="form-control" id="InputItemName" value="<?php 
                        $sql = mysqli_query($connect, "select sname from stock where stock_id='".$var_value."';");
                       while ($row = mysqli_fetch_array($sql)){
                          echo $row['sname']; }
                      
                      ?>"  maxlength="60" name="sname" required
                      value="<?php if (isset($_POST['sname']) && !$flag) echo $_POST['sname']; ?>">
                    </div>
                 
                  
                     
                     <div class="form-group">
                      <label>Category/Type</label>
                      <select class="form-control" placeholder="Category/Type" name="type" id="type" required
                      value="<?php if (isset($_POST['type']) && !$flag) echo $_POST['type']; ?>">
                   
                         <?php
                            $sql = mysqli_query($connect, "SELECT * FROM stock, stocktype WHERE stock.stocktype_id=stocktype.stocktype_id AND stock.stock_id = '".$var_value."'");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['stocktype_id'] . "\">" . $row['stock_type'] . "</option>";
                            }
                             ?>
                     
                        <?php
                        $sql = mysqli_query($connect, "SELECT * FROM stocktype");
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=\"" . $row['stocktype_id'] . "\">" . $row['stock_type'] . "</option>";
                        }
                         ?>
                   
                      </select>
                    </div>
                  
                     <div class="form-group">
                      <label>Ingredient Type</label>
                      <select class="form-control" placeholder="Ingredient Types" name="ingtype" id="ingtype" required
                      value="<?php if (isset($_POST['ingtype']) && !$flag) echo $_POST['ingtype']; ?>">
                       
                         <?php
                            $sql = mysqli_query($connect, "SELECT * FROM stock, ingredientname WHERE stock.ingName_id=ingredientname.ingName_id AND stock.stock_id='".$var_value."'");
                            while ($row = mysqli_fetch_array($sql)){
                            echo "<option value=\"" . $row['ingName_id'] . "\">" . $row['ing_name'] . "</option>";
                            }
                             ?>
                      
                        <?php
                        $sql = mysqli_query($connect, "SELECT * FROM ingredientname");
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=\"" . $row['ingName_id'] . "\">" . $row['ing_name'] . "</option>";
                        }
                         ?>
                   
                      </select>
                    </div>
                  
                


                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="EditButton" value="<?php echo $var_value; ?>">Edit Stock</button>
                  </div>
                </form>

            </div><!-- ./wrapper -->
          

          </div><!-- /.tab-pane -->
         
    </div><!-- ./wrapper -->
                 

                </div><!-- /.box-body -->
              </div><!-- /.box -->
           
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

 
  </body>
</html>
