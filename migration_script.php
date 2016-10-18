<?php

global $status;
$status = "Running script...";
echo $status;

$connect = new mysqli("localhost:3306", "root", "", "flamingwings");
$tablename = "sales_details";

if (!$connect) {
    echo $connect->error;
}

// create the sales_details table for migration
$maketable = $connect->query("create table if not exists sales_details
(`sales_details_id` int(11) not null auto_increment,
`sales_id` int(11) not null,
`recipe_id` int(11) not null,
`qty` int(100) not null, primary key(`sales_details_id`)) engine=MyISAM");

if ($maketable === TRUE) {
    // get the total row count on sales first.
    $result = $connect->query("select count(sales_id) total_rows from sales");
    $rows = 0;

    if ($result) {
        $resultCount = $result->fetch_array(MYSQLI_ASSOC);
        $rows = $resultCount["total_rows"];

    // getting the records 1 by 1
        for ($i = 0; $i < $rows; $i++) {
            $result = $connect->query("select sales_id, recipe_id, qty from sales limit ".$i.",1");
            $resultrow = $result->fetch_array(MYSQLI_ASSOC);

            migrateData($resultrow["sales_id"], $resultrow["recipe_id"], $resultrow["qty"]);
        }

        $status = "Status done";
        echo $status;
    } else {
        echo $connect->error;
    }
} else {
    echo $connect->error;
}

// function to transfer sale data to another table
function migrateData($sales_id, $recipe_id, $qty) {
    global $connect, $tablename;

    $query = "insert into ".$tablename." (sales_id, recipe_id, qty) 
    values ('".$sales_id."', '".$recipe_id."', '".$qty."')";

    $result = $connect->query($query);

    if ($result) {
        echo $connect->error;
    }
}

?>