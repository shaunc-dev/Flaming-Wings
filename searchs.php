<?php

$q = $_POST['query'];

include("dbconnection.php");
$query = mysqli_query($connect, "SELECT sname 
FROM stock
WHERE sname LIKE '$q%' LIMIT 5");

$data = array();
while($row = mysql_fetch_array($query)){
$data[]=array('value'=>$row['sname']);
}
echo json_encode($data);
?>