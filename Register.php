<!DOCTYPE html>

<html>
  <head>
    <title>Flaming Wings | Registration Page</title>
    <?php include ("templates/imports.php"); ?>

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
            <input type="text" class="form-control" placeholder="First name" attribute="name"
            name="firstName" id="firstName"
            value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"
             required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

            <!-- if more than zero ang length ng username, call check_availability --> 
          <script>

           
          </script>

          <!-- last name -->
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Last name" name="lastName" id="lastName" 
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
            <input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" attribute="name" pattern=".{6,}" title="Must contain more than six characters"
            onkeyup="check_availability()"
            value="<?php if(isset($_POST['user_name'])) echo $_POST['user_name']; ?>" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span id="username_availability_result" class="username_availability_result"></span>

          </div>

          <!-- password --> 
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <!-- retype/confirm password--> 
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Retype password" name="confirm_password" id="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
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

   // $("#user_name").blur(function () {
   //   var username = $(this).val();
   //       if (username == '') {
   //          $("#availability").html("");
   //        }else{
   //         $.ajax({
   //          url: "username_validation.php?uname="+username
   //          }).done(function( data ) {
   //       $("#availability").html(data);
   //     }); 
   //           } 
   //   });

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
        
        //Store the password field objects into variables ...
          var user_name = document.getElementById('user_name');
          //Store the Confimation Message Object ...
          var avail = document.getElementById('username_availability_result');
          //Set the colors we will be using ...
          var goodColor = "#66cc66";
          var badColor = "#ff6666";
        //get the username  
        var username = $("input[name='user_name']").val();  
  
        //use ajax to run the check  
        $.post("username_validation.php", { "uname": username })  
            .done(function(result){  
              console.log(result);
                //if the result is 1  =
                if(result == "1"){  

                   //show that the username is NOT available 
                   user_name.style.backgroundColor = badColor; 

                    $('#username_availability_result').html(username+ ' is Not Available.');
                   
                }else{  
                      //show that the username is available  
                      user_name.style.backgroundColor = goodColor; 
                    $('#username_availability_result').html(username+' is Available. ');  
                }  
        });  
        
}

$("input[name='firstName'], input[name='lastName']").focusout(function() {
            if ($(this).val().length > 0){
              check_availability(); 
            } else {

            }
           });


      
   </script>
  </body>
</html>
