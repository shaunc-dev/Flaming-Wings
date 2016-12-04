<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("login.php");
}

?>
<html>
  <head>
    <title>Flaming Wings | Stock Controller</title>
    <?php include ("templates/imports.php"); ?>
   <?PHP 
   include("dbconnection.php")

   ?>

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
      <?php include("templates/navbar.php"); ?>
      <?php include("templates/sidebar.php"); ?>
  <div class="content-wrapper">
       <section cl ass="content">
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
                        <option value="" disabled selected> -- ID -- Stock Name -- In-stock --</option> 
                        
                        <?php

                        // SELECT COALESCE(SUM(r.qty), 0) - COALESCE(SUM(w.qty), 0) AS qty, sname FROM replenishstock AS r, withdrawstock AS w, stock AS s WHERE s.stock_id=w.stock_id AND r.stock_id=s.stock_id AND s.stock_id='".$row['stock_id']."'


                        $sql = mysqli_query($connect, "SELECT SUM(r.qty-w.qty) AS qty, sname, s.stock_id, pack_name, s.qty AS sqty, unit_name FROM replenishstock AS r, stock AS s, unitpackaging AS p, unitmeasurement AS u, withdrawstock w WHERE s.stock_id=r.stock_id AND p.pack_id=s.pack_id AND s.unit_id=u.unit_id AND W.stock_id=S.stock_id AND deactivate=0 GROUP BY s.stock_id");
                        while ($row = mysqli_fetch_array($sql)){
                           echo "<option value=\"" . $row['stock_id'] . "\">".$row['stock_id']. " -- ".$row['sname']. " -- " .$row['qty']. " ".$row['pack_name']. " (" .$row['sqty']. " " .$row['unit_name']. ")</option>"; 
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
                  

                    
               <!--         <div class="form-group">
                      <label>Person in-charge</label>
                      <select class="form-control" name="user_name" required
                      value="<?php if (isset($_POST['user_name']) && !$flag) echo $_POST['user_name']; ?>">
                        <option value="" disabled selected> -- Employees --</option> 
                     
                        <?php
                 //       $sql = mysqli_query($connect, "SELECT * FROM users u, employee_type type WHERE type.employee_type='Stock Controller' AND type.user_type_id= u.user_type_id");
                 //       while ($row = mysqli_fetch_array($sql)){
                 //       echo "<option value=\"" . $row['user_id'] . "\">" . $row['user_name'] . "</option>";
                 //       }
                         ?>
                      </select>
                    </div> -->


                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Verify Stock</button>
                  </div>
                </form>
              </div><!-- /.box -->




    </div><!-- ./wrapper -->
          
          

 
          
          





          </div><!-- /.tab-pane -->
         
    </div><!-- ./wrapper -->
  </body>
</html>
