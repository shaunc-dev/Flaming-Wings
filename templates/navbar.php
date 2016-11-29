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

            <!-- UPPER RIGHT CORNER -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <?php 
                        $sql = mysqli_query($connect, "SELECT firstName, lastName FROM users WHERE user_name = '".$_SESSION['user_name']."'"); 
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<span class='hidden-xs'>" . $row['firstName'] . " " . $row['lastName'] .  "</span>";}?> 
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            <p>
                                <?php 
                                    $sql = mysqli_query($connect, "SELECT firstName, lastName FROM users WHERE user_name = '".$_SESSION['user_name']."'"); 
                                    while ($row = mysqli_fetch_array($sql)){
                                    echo "<p>" . $row['firstName'] . " " . $row['lastName'] .  "</p>";}?> 
                            </p>
                        </li>
                        <li class="user-footer">
                          <div class="pull-right">
                             <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                           </div>
                      </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>