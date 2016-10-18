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


$id = mysqli_insert_id($connect); 

echo "<td>" .$id. "</td>";


for ($i = 0; $i < sizeof($_POST["ingname"]); $i++ ) {

$query2 = "INSERT recipeingredients (recipe_id, qty, unit_id, ingName_id) VALUES ('".$_SESSION['recipe_id']."', '".$_POST["qtyname"][$i]."', '".$_POST["uomname"][$i]."', '".$_POST["ingname"][$i]."');";
$result2 = mysqli_query($connect, $query2) or die (mysqli_error($connect));


echo "<td>".$_POST['ingname'][$i]." </td>"; 

echo "<td>".$_POST['uomname'][$i]." </td>"; 

echo "<td>".$_POST['qtyname'][$i]." </td>"; 

echo "<br>";

}

header("Location: AddRecipe.php");



?>