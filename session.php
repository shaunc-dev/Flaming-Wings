<?php

// Session.php will verify the session, if there is no session it will redirect to login page.


   include('dbconnection.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($connect,"select user_name from users where user_name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['user_name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:log_in.php");
   }
?>