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
    <li class="treeview">
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
    </section>
</aside>