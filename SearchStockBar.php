<?php 
header ("url=SearchStock.php"); 
include("dbconnection.php"); 

//$query = mysqli_real_escape_string($_POST['query']); 
$r_query = "";




?>

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
  <head>
    <title>Flaming Wings | Search Stock</title>
    <?php include("templates/imports.php"); ?>

   <?PHP 
   include("dbconnection.php")

   ?>
   

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
      <?php include("templates/navbar.php"); ?>
      <?php include("templates/sidebar.php"); ?>
       <!--SEARCH STOCK--> 
    <div class="content-wrapper">

  <div class='row'>
            <div class='col-xs-10'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'><b>Results</b></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                  <?php 
                  
                if (empty($_POST['query']) || $_POST["query"] == "0") { 
                  echo "There are no results.";
               
                 
                  }else{
                   
                    $sql = "SELECT stock_id, stock_type, sname, qty, unit_name FROM stock s, stocktype st, unitmeasurement unitM WHERE s.stocktype_id=st.stocktype_id AND unitM.unit_id=s.unit_id AND s.stock_id LIKE '".$_POST['query']."'";
                    $r_query = mysqli_query($connect, $sql);
                  
                  ?>
                  <?php

                  $numrows = mysqli_num_rows($r_query); 

                  if($numrows == 0){
                    echo "There are no results.";

  } else {

  ?>
                  <table id='example2' class='table table-bordered table-hover'>
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



while ($row = mysqli_fetch_array($r_query)){ 
	

	 					echo "<tr>"; 
                          echo "<td>".$row['stock_id']."</td>"; 
                          echo "<td>".$row['stock_type']."</td>"; 
                          echo "<td>".$row['sname']."</td>"; 
                          echo "<td>".$row['qty']."</td>";
                          echo "<td>".$row['unit_name']."</td>"; 
                          echo "</tr>";


}
}
}

?>
                    </tbody>
                  </table>
                </b>

                <?php
                  //sql - select w.qty 
                  //set to 0
                  // $check = mysqli_query($connect, "SELECT w.qty FROM withdrawstock AS w, stock AS s WHERE w.stock_id=s.stock_id AND s.stock_id = '".$varname."'");  
                  //  $numrows = mysqli_num_rows($check); 
                  // if($numrows == 0){ 
                  //   echo "<b>yo</b>"; 
                  // } 

                  $currentstock = mysqli_query($connect, "SELECT (r.qty - w.qty) AS qty FROM replenishstock AS r, withdrawstock AS w WHERE r.stock_id=w.stock_id AND r.stock_id = '".$var_value."' ");

                  $numrows = mysqli_num_rows($currentstock); 

                  if($numrows == 0){
                    echo "<b>Current Stock : </b> 0"; 
                  } else{
                    while($row = mysqli_fetch_array($currentstock)){ 
                      echo "<b>Current Stock : </b>" .$row['qty']. ""; 
                    
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
                    echo "</br><b>Actual Stock : </b> 0"; 
                  } else{
                    while($row = mysqli_fetch_array($actualstock)){ 
                      echo "</br><b>Actual Stock </b>: " .$row['verifiedqty']. ""; 
                    
                  }
                  }
                  
                  ?>
                  <a href="SearchStock.php">Search Again</a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              

  


    </div><!-- ./wrapper -->
  </body>
</html>

 