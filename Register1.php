  <?php 
  
   include("dbconnection.php"); 
   $firstName = $_POST['firstName']; 
   $lastName = $_POST['lastName']; 
   $user_name = $_POST['user_name']; 
   $password = $_POST['password'];
   $confirmpassword = $_POST['confirm_password'];

   //sql query to get user_name 
   
   //if user_name exists, back to register page
   //if not, register ulit 

  $sql_query = "INSERT INTO users(firstName, lastName, user_name, user_type_id, password)
      VALUES ('" . $_POST["firstName"] . "','" . $_POST['lastName'] . "','"  . $_POST['user_name'] . "','" . $_POST['user_type_id'] . "','" . $_POST['password'] . "')"; 

  mysqli_query($connect, $sql_query);
 
 header ("Refresh: 3; url=RegisteredUsers.php"); 

?>