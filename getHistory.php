<?php

include ("cashier-controller/connect.php");

function queryCondition($endDate = "") {
    if ($endDate == "") {
        return " = ?";
    } else {
        return " between ? and ? ";
    }
}

// if (isset($_POST["start"], $_POST["end"])) {

    $data = array();
    $data["orders"] = array();

    // $startDate = $_POST["start"];
    // $endDate = $_POST["end"];
    $startDate = "2016-11-04";
    $endDate = null;

    $orders_query = $connect->prepare("select r.recipe_name, sum(sd.qty) as qty, (r.price * sd.qty) as price from sales s, sales_details sd, recipe r where sd.sales_details_id = s.sales_id && sd.recipe_id = r.recipe_id && s.dtSales".queryCondition(). "group by recipe_name, sales_id order by s.dtSales");

    if (!isset($endDate)) {
        $orders_query->bind_param("s", $startDate);
    } else {
        $orders_query->bind_param("ss", $startDate, $endDate);
    }

    $orders_query->execute();
    $orders_result = $orders_query->get_result();

    foreach ($orders_result->fetch_assoc() as $row) {
        array_push($data["orders"], new ArrayObject($row));
    }

    echo json_encode($data);

    
// } else {

// }

?>