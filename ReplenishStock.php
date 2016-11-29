<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("log_in.php");
}

?>
<html>
  <head>
    <title>Flaming Wings | Replenish Stock</title>

    <?php 
    include("dbconnection.php"); 
    include ("templates/imports.php");
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
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>Replenish Stock</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="replenishstock1.php" method="post">
                  <div class="box-body">
                    <!-- SELECT s.stock_id, sname, r.qty, pack_name FROM stock AS s, unitpackaging AS p, replenishstock AS r WHERE p.pack_id=s.pack_id AND r.stock_id=s.stock_id ORDER BY replenish_id LIMIT 1-->
                   
                     <div class="form-group">
                      <label>Stock Name</label>
                      <select class="form-control" name="sname" required
                      value="<?php if (isset($_POST['sname']) && !$flag) echo $_POST['sname']; ?>">
                        <option value="" disabled selected> -- ID -- Stock Name -- In-stock --</option> 
                        <!-- SELECT SUM(r.qty) AS qty, sname, s.stock_id, pack_name FROM replenishstock AS r, stock AS s, unitpackaging AS p WHERE s.stock_id=r.stock_id AND p.pack_id=s.pack_id GROUP BY s.stock_id-->
                        
                        <?php
                          //SELECT COALESCE(SUM(r.qty), 0) - COALESCE(SUM(w.qty), 0) AS qty, sname FROM replenishstock AS r, withdrawstock AS w, stock AS s WHERE s.stock_id=w.stock_id AND r.stock_id=s.stock_id AND s.stock_id='".$var_value."'
                       
                        $sql = mysqli_query($connect, "SELECT SUM(r.qty) AS qty, sname, s.stock_id, pack_name, s.qty AS sqty, unit_name FROM replenishstock AS r, stock AS s, unitpackaging AS p, unitmeasurement AS u WHERE s.stock_id=r.stock_id AND p.pack_id=s.pack_id AND s.unit_id=u.unit_id GROUP BY s.stock_id");
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=\"" . $row['stock_id'] . "\">".$row['stock_id']. " -- ".$row['sname']. " -- " .$row['qty']. " ".$row['pack_name']. " (" .$row['sqty']. " " .$row['unit_name']. ")</option>"; 
                        }
                         ?>
                      </select>
                      
                    </div>
                      <div class="form-group">
                      <label for="InputQty">Quantity</label>
                      <input type="number" min="0" step="any" class="form-control" id="InputQty" placeholder="Quantity" name="qty" required>
                    </div>

                    <!-- DATE -->
                      <div class="form-group">
                        <label for="inputdtReceived">Date Received</label>
                       
                        <input type="date" class="form-control" id="inputdtReplenished" name="dtReceived" required value="<?php echo date('Y-m-d'); ?>" />
                        
                       </div>  

                    
                    <div class="form-group">
                      <label for="InputRemarks">Remarks</label>
                      <input type="text" class="form-control" rows="3" id="InputRemarks" placeholder="Remarks..." name="remarks" required>
                    </div>
                   
                    <div class="form-group">
                      <label>Person in-charge</label>
                      <select class="form-control" name="user_name" required
                      value="<?php if (isset($_POST['user_name']) && !$flag) echo $_POST['user_name']; ?>">
                        <option value="" disabled selected> -- Employees --</option> 
                     
                        <?php
                        $sql = mysqli_query($connect, "SELECT * FROM users");
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=\"" . $row['user_id'] . "\">" . $row['user_name'] . "</option>";
                        }
                         ?>
                      </select>
                    </div>
                   

                  



                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Replenish Stock</button>
                  </div>
                </form>
              </div><!-- /.box -->




    </div><!-- ./wrapper -->

           <!-- RECENTLY ADDED TABLE -->
              <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>Recently Replenished Stocks</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="recentlyadded" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Stock Name</th>
                         <th>Replenish Qty</th>
                        <th>Remarks</th>
                        <th>Person in-charge</th>
                    

                      </tr>
                    </thead>
                    <tbody>
                     
                       <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                        $sql = mysqli_query($connect, "SELECT replenish_id, r.qty, sname, remarks, user_name FROM replenishstock r, stock s, users u where r.stock_id=s.stock_id and r.user_id=u.user_id order by replenish_id DESC LIMIT 5 ");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['replenish_id']."</td>"; 
                          echo "<td>".$row["sname"]."</td>"; 
                          echo "<td>".$row["qty"]."</td>"; 
                          echo "<td>".$row["remarks"]."</td>"; 
                          echo "<td>".$row["user_name"]."</td>"; 
                          echo "</tr>";

                      
                        }
                         ?>
              
                 
                    </tbody>
             
                  </table>

                </div><!-- /.box-body -->
              </div><!-- /.box -->


    
      
    </div><!-- ./wrapper -->


             



          <!---TABLE FOR STOCK-->
          

    </div><!-- ./wrapper -->

    <script>

$(document).ready(function(e) {
  $("#search").on("input", function {

$.ajax({

  url: "try.php",
  data: {

    namengvalue : "value",
    namengvalue2 : "value2",
    $("#search").val()
  },

  dataType: "json",
  type: "post",
  success: function(data) {
    alert(data.myrealarr[0]);
  }

});

  });
});

    </script>
  </body>
</html>
