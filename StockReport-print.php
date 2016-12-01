<!DOCTYPE html>
<html>
  <head>
    <title>Flaming Wings | Stock Report</title>
    <?php include ("templates/imports.php"); ?>
   <?PHP 
   include("dbconnection.php")

   ?>

  </head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <img src="logo.jpg" style="width:128px;height:60px;"></img></br></br>
              Flaming Wings
              <small class="pull-right">  
                  <small class="pull-right">
                  <?php 
                    echo "<p>Report Date: " . date("Y-m-d l h:i:sa") . "</p>";

                    ?></small>
                  </small>
            </h2>
          </div><!-- /.col -->
        </div>

     
        </div><!-- /.row -->

        <!-- Table row -->
     <div class="col-xs-6">
          <div class="table-responsive">
             <h3 class="box-title"><b>Stock Report for <?php $month = date("F Y"); echo $month;?></b>
              </br></br>


                 
            <table class="table">
                
              <thead>
                <tr>
                    <th>Stock Code</th>
                    <th>Stock Category/Type</th>
                    <th>Stock Name</th>
              
                </tr>
              </thead>
              <tbody>
                <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                        $sql = mysqli_query($connect, "SELECT stock_id, stock_type, sname FROM stock AS s, stocktype AS type WHERE s.stocktype_id=type.stocktype_id");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['stock_id']."</td>"; //stockcode
                          echo "<td>".$row['stock_type']."</td>"; //type
                          echo "<td>" .$row['sname']."</a></td>"; //itemname
                          echo "</tr>";

                        }

                        $rowcount=mysqli_num_rows($sql); 
                        echo "Total Number of Stocks: " .$rowcount; 
                         ?>
              
              </tbody>
            </table>
            <center>-- END OF STOCK REPORT -- </center>
          </div><!-- /.col -->
        </div><!-- /.row -->
<!--
        <div class="row">
          <!-- accepted payments column -->
  <!--        <div class="col-xs-6">
            <p class="lead">Payment Methods:</p>
            <img src="../../dist/img/credit/visa.png" alt="Visa">
            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="../../dist/img/credit/american-express.png" alt="American Express">
            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
            </p>
          </div><!-- /.col -->
       <!--    <div class="col-xs-6">
            <p class="lead">Amount Due 2/22/2014</p>
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Subtotal:</th>
                  <td>$250.30</td>
                </tr>
                <tr>
                  <th>Tax (9.3%)</th>
                  <td>$10.34</td>
                </tr>
                <tr>
                  <th>Shipping:</th>
                  <td>$5.80</td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td>$265.24</td>
                </tr> -->
              </table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
  </body>
</html>
