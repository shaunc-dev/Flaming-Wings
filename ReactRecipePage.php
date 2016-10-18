    <?php 
    include("dbconnection.php"); 
    ?>


<?php

echo $_POST['ReactivateRecipeButton']; 
mysqli_query($connect, "UPDATE recipe SET deactivate = '0' WHERE recipe_id = '".$_POST['ReactivateRecipeButton']."'");
header("Location: reactivaterecipe.php");
?>

