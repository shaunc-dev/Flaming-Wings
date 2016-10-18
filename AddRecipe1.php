<?php 
	header ("url=AddRecipe.php"); 
	include("dbconnection.php"); 

 $sql_query1 = "INSERT INTO recipe(recipe_name, recipe_typeid)
		VALUES ('" . $_POST['recipe_name'] . "'," .  $_POST['recipe_type'] . ")"; 

	mysqli_query($connect, $sql_query1); 

 $sql_query2 = "INSERT INTO ingredients(qty, unit_id, ingName_id, recipe_id)
		VALUES ('" . $_POST['qty'] . "'," .  $_POST['unitM'] . "'," . $_POST['ing_name'] . ")"; 

	mysqli_query($connect, $sql_query2); 
	
	echo $sql_query2; 
	echo "Recipe added!";

?>
