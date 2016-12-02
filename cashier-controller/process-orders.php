<?php

    require('connect.php');
    session_start();
    $status = "";
    $user_id = $_SESSION["user_id"];

    if (isset($_POST["id"]) && isset($_POST["quantity"])) {
        // inserting the timestamp, and to get the sales_id
        $received_ids = $_POST["id"];
        $received_quantities = $_POST["quantity"];
        $total = $_POST["total"];

        $result = $connect->query("insert into sales (total) values ('".$total."')") or die ($connect->error);

        $sales_id = $connect->insert_id;
        $statement = $connect->prepare("insert into sales_details (sales_id, recipe_id, qty) values ('".$sales_id."', ?, ?)");
        $get_ingredient = $connect->prepare("select ingName_id, qty from recipeingredients where recipe_id = ?");
        $get_qty_from_stock = $connect->prepare("select qty, stock_id, sname from stock where ingName_id = ?");
        $update_qty_in_stock = $connect->prepare("insert into withdrawstock (qty, stock_id, remarks, user_id) values (?, ?, ?, '".$user_id."');");

        if (!$get_ingredient) {
            $status = "error in get_ingredient statement";
        } else if (!$get_qty_from_stock) {
            $status = "error in get_qty_from_stock statement";
        } else if (!$update_qty_in_stock) {
            $status = "error in update_qty_in_stock statement";
        } else if (!$statement) {
            $status = "error in statement";
        } else {
            for ($i = 0; $i < sizeof($received_ids); $i++) {
                $statement->bind_param('ii', $received_ids[$i], $received_quantities[$i]);
                $statement->execute();

                if (!$statement) {
                    $status = $connect->error;
                } else {
                    $get_ingredient->bind_param('i', $received_ids[$i]);
                    $get_ingredient->execute();
                    $get_ingredient_result = $get_ingredient->get_result();

                    if ($get_ingredient_result->num_rows == 0) {
                        $status = "error in get_ingredient || \n num-rows = 0";;
                    } else {
                        while ($get_ingredient_row = $get_ingredient_result->fetch_assoc()) {
                            $ingredient_id = $get_ingredient_row["ingName_id"];
                            $recipe_quantity = $get_ingredient_row["qty"];

                            $get_qty_from_stock->bind_param('i', $ingredient_id);
                            $get_qty_from_stock->execute();
                            $get_qty_from_stock_result = $get_qty_from_stock->get_result();

                            if ($get_qty_from_stock_result->num_rows == 0) {
                                $status = "error in get_qty_from_stock || \n num-rows = 0";
                            } else {
                                while ($row = $get_qty_from_stock_result->fetch_assoc()) {
                                    $new_stock_quantity = $recipe_quantity * $received_quantities[$i];
                                    $update_qty_in_stock->bind_param('iis', $new_stock_quantity, $row["stock_id"], "Withdrawn stock: {$row["sname"]}");
                                    $update_qty_in_stock->execute();

                                    if (!$update_qty_in_stock) {
                                        $status = $connect->error;
                                    } else {
                                        $status = 'success';
                                        $update_qty_in_stock->close();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $statement->close();
        $get_ingredient->close();
        $get_qty_from_stock->close();
    
    }

    echo $status;

?>