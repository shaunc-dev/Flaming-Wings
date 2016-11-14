<?php

require ("cashier-controller/connect.php");

function queryCondition($endDate = "") {
    if ($endDate == "") {
        return " = ? ";
    } else {
        return " between ? and ? ";
    }
}

// if (isset($_POST["start"], $_POST["end"])) {

    $data = array();

    // $startDate = $_POST["start"];
    // $endDate = $_POST["end"];
    $startDate = "2016-11-04";
    $endDate = "2016-11-09";

    $sales_query = $connect->prepare("select * from sales where dtSales".queryCondition($endDate));
    $orders_query = $connect->prepare("select sd.sales_id, r.recipe_name, sum(sd.qty) as qty, sum(r.price * sd.qty) as price 
    from sales s, sales_details sd, recipe r 
    where sd.sales_details_id = s.sales_id && sd.recipe_id = r.recipe_id && sd.sales_id = ?
    group by recipe_name;");

    if ($endDate == "") {
        $sales_query->bind_param("s", $startDate);
    } else {
        $sales_query->bind_param("ss", $startDate, $endDate);
    }

    $sales_query->execute();
    $sales_result = $sales_query->get_result();

    while ($sales_row = $sales_result->fetch_array(MYSQLI_ASSOC)) {
        $object = new ArrayObject();
        $object["id"] = $sales_row["sales_id"];
        $object["date"] = $sales_row["dtSales"];
        $object["total"] = $sales_row["total"];
        $object["orders"] = array();

        $orders_query->bind_param("i", $sales_row["sales_id"]);
        $orders_query->execute();
        $orders_result = $orders_query->get_result();

        while ($orders_row = $orders_result->fetch_array(MYSQLI_ASSOC)) {
            $orders = new ArrayObject();
            $orders["qty"] = $orders_row["qty"];
            $orders["recipe_name"] = $orders_row["recipe_name"];
            $orders["price"] = $orders_row["price"];

            array_push($object["orders"], $orders);
        }

        array_push($data, $object);
    }

    echo json_encode($data);

    
// } else {

// }

?>