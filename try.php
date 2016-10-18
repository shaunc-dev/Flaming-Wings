<?php

//query

$sql_query = "SELECT * FROM stock"; 

mysqli_query($connect, $sql_query); 
//result mo

//bla bla bla

$myarr = array();
$myarr["myrealarr"] = array();
$myarr["anotherstuff"] = array();

$value1 = 0;
$value2 = 1234;
$value3 = 5678;

array_push($myarr["anotherstuff"], $value1);
array_push($myarr["myrealarr"], $value2);
array_push($myarr["myrealarr"], $value3);

echo json_encode($myarr);


?>