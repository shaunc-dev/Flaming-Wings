<!DOCTYPE html>


<html>
  <head>
    <title>Flaming Wings | Dashboard</title>
    <?php include ("templates/imports.php"); ?>
    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
      <?php include("templates/navbar.php"); ?>
      <?php include("templates/sidebar.php"); ?>
       <!--SEARCH--> 
    <div class="content-wrapper">


            <form action="#" method="get" class="sidebar-form">
            <div class="col-xs-10">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>SEARCH STOCK</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Stock code</label>
                      <div class="col-sm-8">
                        <input type="name" class="form-control" id="inputEmail3" placeholder="Enter stock code">
                      </div>
                    </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Search</button>
                  </div><!-- /.box-footer -->
                </form>
              </div>
            </div>
          </form>



      


           <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>Stock codes</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Stock Code</th>
                        <th>Item name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>M1</td>
                        <td>Chicken</td>
                      </tr>
                      <tr>
                        <td>M2</td>
                        <td>Pork</td>
                      </tr>
                      <tr>
                        <td>C1</td>
                        <td>Ketchup</td>
                      </tr>
                      <tr>
                        <td>C2</td>
                        <td>Mustard</td>
                      </tr>
                      <tr>
                        <td>C3</td>
                        <td>Mayonnaise</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

      </div><!-- /.content-wrapper -->
     


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
  </body>
</html>
