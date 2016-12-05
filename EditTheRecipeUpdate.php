<?php 
  
  include("dbconnection.php"); 
  session_start(); 
 
  // value of chosen recipe 
  $var_value = $_POST['varname']; 

  foreach ($_POST["qtyname"] as $value) {
    echo $value . "<br>";
  }

  
  //update chosen recipe
  //deactivate chosen recipe, set deactivate to 1 
  $deact_query = "UPDATE recipe SET deactivate= '1' WHERE recipe_id ='".$var_value."'"; 
  mysqli_query($connect, $deact_query) or die(mysqli_error($connect)); 

  //add new recipe name, type with new id 
  $query = "INSERT INTO recipe (recipe_name, recipe_typeid, price) VALUES('" . $_POST['recipe_name'] . "', '" . $_POST['recipe_type'] . "', '". $_POST['price']. "')";
  mysqli_query($connect, $query) or die(mysqli_error($connect));

  $last_insert = mysqli_insert_id($connect);

  // delete current ingredients 
  $update_current_ing = "DELETE FROM `recipeingredients` WHERE `recipe_id` = '".$var_value."'"; 
  mysqli_query($connect, $update_current_ing) or die(mysqli_error($connect));

  // // store array of CURRENT ingredients 
  //  for ($i = 0; $i < sizeof($_POST['ingname']); $i++ ) {
  //    $ingredients = array($_POST["qtyname"][$i], $_POST["uomname"][$i], $_POST["ingname"][$i]); 
  //    // echo  $_POST["ingname"][$i] . "<br>";
  //    //update every ingredient id, set qty where ingid = ingname
  //    mysqli_query($connect, "update recipeingredients set unit_id = '".$_POST["uomname"][$i]."', qty = '".$_POST["qtyname"][$i]."' where ingName_id = (select ingName_id from ingredientname where ing_name = '".$_POST["ingname"][$i]."')") or die (mysqli_error($connect));

  //    }
  

  

//  -- NEW ID -- //
  // value of new id

    // $update_current_recipe = mysqli_query($connect, "update recipeingredients set recipe_id = '".$row['maxrecipe']."' where recipe_id = '".$var_value."'");
  

  //add recipes into recipeingredient 

  for ($i = 0; $i < sizeof($_POST['ingname']); $i++ ) {
      $query2 = "INSERT INTO recipeingredients (recipe_id, qty, unit_id, ingName_id) VALUES ('" . $last_insert . "', '" . $_POST["qtyname"][$i]."', '".$_POST["uomname"][$i]."', '".$_POST['ingname'][$i]."');";
     $result2 = mysqli_query($connect, $query2) or die (mysqli_error($connect));
  }

// -- END OF NEW ID -- //

  // for ($i = 0; $i < sizeof($_POST["ingname"]); $i++ ) {
  //   echo $_POST["qtyname"][$i]. "</br>"; 
  //   echo $_POST["uomname"][$i]. "</br>";
  //   echo $_POST["ingname"][$i]. "</br>"; 
  //   echo "</br>"; 
  // }
  

  $_SESSION['recipe_id'] = $last_insert;

  header("Location: EditRecipe.php");


    // update recipeingredients set recipe_id = 'new_recipe_id' where recipe_id = 'old_recipe_id';


    // echo "<td>".$_POST['ing_name'][$i]." </td>"; 

    // echo "<td>".$_POST['unitM'][$i]." </td>"; 

    // echo "<td>".$_POST['qty'][$i]." </td>"; 

    // echo "<br>";
   // echo "<a href='EditTheIngredient.php?varname=".$_POST['recipe_id']."'>Next</a>"; 

 ?>