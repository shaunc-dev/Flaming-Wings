<?php

require('connect.php');

// preparing arrays
$recipe = array();
$recipe["recipes"] = array();
$result = $connect->query("select r.recipe_id `id`, r.recipe_name `name`, r.recipe_typeid `type`, r.price `price` from recipe r, recipetype rt where r.recipe_typeid = rt.recipe_typeid") or die ($connect->error);

while ($row = $result->fetch_assoc()) {
    array_push($recipe["recipes"], (object) [
        'id' => $row['id'],
        'name' => $row['name'],
        'type' => $row['type'],
        'price' => $row['price']
    ]);
}

echo json_encode($recipe);

// 

?>