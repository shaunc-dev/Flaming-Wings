<?php

require("connect.php");
$types = array();
$types["types"] = array();

$result = $connect->query("select * from recipetype") or die ($connect->error);
while ($row = $result->fetch_assoc()) {
    array_push($types["types"], (object) [
        "id" => $row["recipe_typeid"],
        "name" => $row["recipe_type"]
    ]);
}

echo json_encode($types);

?>