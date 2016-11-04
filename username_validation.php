<?php
	include("dbconnection.php"); 

	//Gets username value from the URL
$uname = $_GET['uname'];

//Checks if the username is available or not
$query = "SELECT user_name FROM users WHERE user_name = '$uname'";

$result = mysqli_query($connect, $query);

//Prints the result
if (mysqli_num_rows($result)<1) {
 echo "<span class='green'>Available</span>";
}
else{
 echo "<span class='red'>Not available</span>";
}
?>