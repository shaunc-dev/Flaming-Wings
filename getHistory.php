<?php

require ("cashier-controller/connect.php");

if (isset($_POST["start"], $_POST["end"])) {

    $data = array();
    $data["history"] = array();

    $startDate = $_POST["start"];
    $endDate = $_POST["end"];

    $sales_query = "";

    if ($endDate == "") {
        $sales_query = "select * from sales where date(dtSales) = '".$startDate."'";
    } else {
        $sales_query = "select * from sales where date(dtSales) between '".$startDate."' and '".$endDate."'";
    }

    $sales_result = $connect->query($sales_query);

    while ($sales_row = $sales_result->fetch_array(MYSQLI_ASSOC)) {
        $object = new ArrayObject();
        $object["id"] = $sales_row["sales_id"];
        $object["date"] = $sales_row["dtSales"];
        $object["total"] = $sales_row["total"];
        $object["orders"] = array();

        $orders_query = "select sd.sales_id, r.recipe_name, sum(sd.qty) as qty, sum(r.price * sd.qty) as price 
        from sales s, sales_details sd, recipe r 
        where sd.sales_id = s.sales_id && sd.recipe_id = r.recipe_id && sd.sales_id = '".$sales_row["sales_id"]."'
        group by recipe_name";

        $orders_result = $connect->query($orders_query);

        while ($orders_row = $orders_result->fetch_array(MYSQLI_ASSOC)) {

            $orders = new ArrayObject();
            $orders["qty"] = $orders_row["qty"];
            $orders["recipe_name"] = $orders_row["recipe_name"];
            $orders["price"] = $orders_row["price"];

            array_push($object["orders"], $orders);
        }

        array_push($data["history"], $object);

    }

    $connect->close();
    echo json_encode($data);

}

?>