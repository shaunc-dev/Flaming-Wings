<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
   include("dbconnection.php")

   ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>

      $(document).ready(function () {
       $("#user_name").blur(function () {
        var username = $(this).val();
          if (username == '') {
            $("#availability").html("");
          }else{
            $.ajax({
            url: "username_validation.php?uname="+username
            }).done(function( data ) {
          $("#availability").html(data);
       }); 
       } 
       });
      });
    </script>
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <img src="logo-transparent.png" alt="Mountain View">
      </div>

      <div class="register-bogx-body">
        <p class="login-box-msg">Register a new membership</p>
     
        <form action="Register1.php" method="post" id="register" onsubmit="return checkPass()">
          <!-- First name --> 
           <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="First name" name="firstName" id="firstName" oninput="makeUsername()"
            value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <!-- last name -->
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Last name" name="lastName" id="lastName" oninput="makeUsername()"
            value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

        
          <!-- employee type --> 
           <div class="form-group has-feedback">   
            <select class="form-control" name="user_type_id" required
              value="<?php if (isset($_POST['user_type_id']) && !$flag) echo $_POST['user_type_id']; ?>"> 
              <option value="" disabled selected> -- User Type --</option> 
                     
             <?php
                $sql = mysqli_query($connect, "SELECT user_type_id, employee_type FROM employee_type");
                while ($row = mysqli_fetch_array($sql)){
                echo "<option value=\"" . $row['user_type_id'] . "\">" . $row['employee_type'] . "</option>";
                }
               ?>

            </select>
          </div>
          <!-- username --> 
          <div class="form-group has-feedback">
            <input type="UserName" class="form-control" placeholder="Username" name="user_name" pattern=".{6,}" title="Must contain more than six characters"
            value="<?php if(isset($_POST['user_name'])) echo $_POST['user_name']; ?>" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <div id="username_availability_result"></div>

          </div>

          <!-- password --> 
          <div class="form-group has-feedback">
            <input type="Password" class="form-control" placeholder="Password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <!-- retype/confirm password--> 
          <div class="form-group has-feedback">
            <input type="Password" class="form-control" placeholder="Retype password" name="confirm_password" id="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
            onkeyup="checkPass(); " required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span> <span id="confirmMessage" class="confirmMessage"></span>
          </div>

          <!--register button --> 
          <div class="form-group">
            
           <!--   <p><button class="btn btn-block btn-danger" type="submit" id="rButton">Register</button></p> -->

           <center><input type="submit" value="REGISTER"></center>
            
          </div>
        </form>
    
     
      </div><!-- /.form-box -->
    </div><!-- /.register-box --> 


  
   <script>

   $("#lastName, #firstName").focusout(function() {

    var name = ($("#firstName").val().toLowerCase() + "_" + $("#lastName").val().toLowerCase()).replace(" ", "_");
    // var username = name.replace(" ", "_");


    $("input[name='user_name']").val(name);
    // console.log($("#firstName").val());
   });

   // checkPassword 


      function checkPass()
      {
          //Store the password field objects into variables ...
          var pass1 = document.getElementById('password');
          var pass2 = document.getElementById('confirm_password');
          //Store the Confimation Message Object ...
          var message = document.getElementById('confirmMessage');
          //Set the colors we will be using ...
          var goodColor = "#66cc66";
          var badColor = "#ff6666";
          //Compare the values in the password field 
          //and the confirmation field
          var ok = true; 

          if(pass1.value == pass2.value){
              //The passwords match. 
              //Set the color to the good color and inform
              //the user that they have entered the correct password 
              pass2.style.backgroundColor = goodColor;
              message.style.color = goodColor;
              message.innerHTML = "Passwords match!"

          }else{
              //The passwords do not match.
              //Set the color to the bad color and
              //notify the user.
              pass2.style.backgroundColor = badColor;
              message.style.color = badColor;
              message.innerHTML = "Passwords do not match!"
              ok = false; 


          }
          return ok; 
      } 
  
   //function to check username availability  
function check_availability(){  
  
        //get the username  
        var username = $('#username').val();  
  
        //use ajax to run the check  
        $.post("username_validation.php", { username: username },  
            function(result){  
                //if the result is 1  
                if(result == 1){  
                    //show that the username is available  
                    $('#username_availability_result').html(username + ' is Available');  
                }else{  
                    //show that the username is NOT available  
                    $('#username_availability_result').html(username + ' is not Available');  
                }  
        });  
        
  // makeUsername 
function makeUsername(){
      // //add mo yung current value ng fname and/or lname sa may username input
      // //Use jquery API
     var fName = $('#firstName').val(); 
      var lName = $('#lastName').val(); 

      if(fName == null && lName == null){ 
        fName = ""; 
        lName = ""; 
      } else { 


      //  // document.getElementsById('user_name')[0].value= fName "_" lName;
      //  //document.getElementById("user_name").value = "You wrote: " + fName + lName; 
      //  document.getElementById("user_name").value = username;

   //  $("#lastName").focusout(function(){
   //     document.getElementById("user_name").value = fName.toLowerCase + lName.toLowerCase; 
   // }); 

    $('#user_name').text(fName + lName); 
  }
  }


      
   </script>
  </body>
</html>
