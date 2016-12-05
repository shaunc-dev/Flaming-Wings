

<?php
 
  session_start();
?>
 <!-- PHP --> 
  
   
  <!-- // if($_SERVER["REQUEST_METHOD"] == "POST") {
  //     // username and password sent from form 
  //     $myusername = mysqli_real_escape_string($connect,$_POST['user_name']);
  //     $mypassword = mysqli_real_escape_string($connect,$_POST['password']); 
      
  //     $sql = "SELECT user_id FROM users WHERE user_name = '$myusername' and password = '$mypassword'";
  //     $result = mysqli_query($connect,$sql);
  //     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      
      // $count = mysqli_num_rows($result);
      // // If result matched $myusername and $mypassword, table row must be 1 row
    
      //   if($count == 1) {
      //      session_register($myusername);
      //      $_SESSION["login_user"] = $myusername;
         
      //      header("location: main.php");
       //  }else {
       //    $error = "Your Login Name or Password is invalid";
       // }
     
   ?> -->
   <!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Log In</title>
  <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
   
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="dist/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/js/app.min.js"></script>
  
    <!-- PHP --> 
    <?PHP
    include("dbconnection.php"); 
    ?>
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
         <img src="logo-transparent.png" alt="Mountain View">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Log in here</p>

        <form action="login.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" 
            id="user_name" 
            name="user_name"
            value="<?php if(isset($_POST['user_name'])) echo $_POST['user_name']; ?>" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" 
            id="password" 
            name="password"
            value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          
          <div class="row">
            <div class="col-xs-15">
               <center><input type = "submit" value = " Submit "/><br />
             <!--   <div style = "font-size:11px; color:#cc0000; margin-top:10px">
              //  <?php
              //  echo "" .$error . ""?>
              </div>  -->
                <div id="errMsg" style = "font-size:13px; color:#cc0000; margin-top:10px">
                <?php if(!empty($_SESSION['errMsg'])) { echo $_SESSION['errMsg']; } ?>
                </div>
              <?php unset($_SESSION['errMsg']); ?>
              </center>
            </div><!-- /.col -->


          
          </div>
        </form>
      

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

 
   
  </body>
 
</html>
