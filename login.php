<?php 
session_start();
$_SESSION["guest"] = uniqid();

header("Location: main.php");
include("dbconnection.php"); 

$sql_query = "INSERT INTO session(uniqid)
			VALUES ('" . $_SESSION["guest"] . "')"; 

mysqli_query($connect, $sql_query); 
?>