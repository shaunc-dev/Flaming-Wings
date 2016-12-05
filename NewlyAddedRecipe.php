<?php

include("dbconnection.php");

session_start();
/*

name ng recipe
type of recipe
ingname
uomname
qtyname

*/

echo $_POST["recipe_name"]."<br>";
echo $_POST["recipe_type"];

// echo "ingname: ".$_POST["ingname"][$i]."<br>";
// echo "uomname: ".$_POST["uomname"][$i]."<br>";
// echo "qtyname: ".$_POST["qtyname"][$i]."<br>";
// echo "<br>";

$query = "INSERT recipe (recipe_name, recipe_typeid, price) VALUES('".$_POST["recipe_name"]."', '".$_POST["recipe_type"]."', '".$_POST['price']."')";
$result = mysqli_query($connect, $query) or die (mysqli_error($connect));

$id = mysqli_insert_id($connect); 
$_SESSION['recipe_id'] = $id;



header("Location: AddIngredient.php");


?>