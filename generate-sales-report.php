<?php include ("cashier-controller/connect.php"); session_start(); ?>
<?php

function getReport($date = "") {
    if ($date == "") {
        $date = date("Y-m-d");
    }

    $get_report_statement = $connect->prepare("select r.recipe_name, sum(sd.qty) as qty, sum(r.price * sd.qty) as price 
    from sales s, sales_details sd, recipe r 
    where sd.sales_id = s.sales_id && sd.recipe_id = r.recipe_id && date(s.dtSales) = ?
    group by recipe_name");

    $get_report_statement->bind_param("s", $date);
    $get_report_statement->execute();
    $get_report_statement_result = $get_report_statement->get_result();
    return $get_report_statement_result->fetch_assoc();
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Flaming Wings | Sales Report</title>
        <?php include("templates/imports.php"); ?>
        <style>

        img[src='logoo.png'] {
            width: 100%;
        }

        </style>
    </head>
    <body>
        <div class="wrapper">
            <header>
                <div class="row">
                    <div class="col-xs-2">
                        <img src="logoo.png" alt="">
                    </div>
                    <div class="col-xs-10">
                        <h3>Sales Report</h3>
                    </div>
                </div>
            </header>
        </div>
    </body>
</html>