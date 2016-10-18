<?php

    require('connect.php');
    $status = "";

    if (isset($_POST["id"]) && isset($_POST["quantity"])) {
        // inserting the timestamp, and to get the sales_id
        $result = $connect->query("insert into sales () values ()");

        $sales_id = $connect->insert_id;
        $statement = $connect->prepare("insert into sales_details (sales_id, recipe_id, qty) values ('".$sales_id."', ?, ?)");

        for ($i = 0; $i < sizeof($_POST["id"]); $i++) {
            $statement->bind_param('ii', $_POST["id"][$i], $_POST["quantity"][$i]);
            $statement->execute();

            if (!$statement) {
                $status = $connect->error();
            } else {
                $status = "success";
            }
        }
    
    }

    echo $status;
    $connect->close();

?>