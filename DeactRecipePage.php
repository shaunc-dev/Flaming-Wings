    <?php 
    include("dbconnection.php"); 
    ?>


<?php

echo $_POST['DeactivateRecipeButton']; 
mysqli_query($connect, "UPDATE recipe SET deactivate = '1' WHERE recipe_id = '".$_POST['DeactivateRecipeButton']."'");
header("Location: DeactivateRecipe.php");
?>

