<?php include ("cashier-controller/connect.php"); session_start(); ?>
<?php

function getReport($date = "", $min = "08:00", $max = "15:00") {
    if ($date == "") {
        $date = date("Y-m-d");
    }

    $get_report_statement = $GLOBALS["connect"]->prepare("select r.recipe_name, r.price as unit_price, sum(sd.qty) as qty 
    from sales s, sales_details sd, recipe r 
    where sd.sales_id = s.sales_id && sd.recipe_id = r.recipe_id && date(s.dtSales) = ? && time_format(s.dtSales, '%H:%i') between ? and ?
    group by recipe_name");

    $get_report_statement->bind_param("sss", $date, $min, $max);
    $get_report_statement->execute();
    $get_report_statement_result = $get_report_statement->get_result();
    return $get_report_statement_result;
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Flaming Wings | Sales Report</title>
        <?php include("templates/imports.php"); ?>

        <style>

        .report-print h3 {
            font-family: serif !important;
        }

        .report-print {
            font-family: serif !important;
        }

        img[src='logoo.png'] {
            width: 100%;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px lightgray solid;
        }

        tbody > tr > td:nth-child(1) {
            text-align: left;
            width: 85%;
            padding-left: 30px !important;
        }
        
        tbody > tr > td:nth-child(2) {
            width: 5%;
            text-align: right;
        }

        tfoot tr > td:last-child {
            text-align: right;
        }

        #total {
            font-weight: 700;
        }

        .shift-label {
            text-align: left !important;
            font-weight: 700;
        }

        .report-print {
            background: white;
            margin-top: 10px;
            margin-left: 10px;
            padding: 30px;
        }

        .content-wrapper {
            height: 100%;
        }

        .content {
            /*max-width: 50%;*/
            margin:0;
        }

        .end-of-report {
            text-align: center;
            display: none;
        }

        @media print {
            .btn {
                display: none;
            }
            
            img[src='logoo.png'] {
                width: 250px;
            }

            .content-wrapper {
                height: 100%;
            }

            .report-print {
                padding: 0;
            }

            .end-of-report {
                display: block;
            }

            .content {
                max-width: 100%;
            }
        }
        

        </style>
    </head>
    <body class="skin-red sidebar-mini">
        <div class="wrapper">
            <?php include ("templates/navbar.php"); ?>
            <?php include ("templates/sidebar.php"); ?>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1><a onclick="window.history.back()" style="margin-right: 5px; color: black;cursor: pointer;"><i class="fa fa-chevron-left"></i></a>Tally report</h1>
                </section>
                <section class="content">
                    <div class="report-print">
                        <div class="row">
                            <div class="col-xs-2">
                                <img src="logoo.png" alt="">
                            </div>
                            <div class="col-xs-10">
                                <h3>Flaming Wings Tally Report</h3>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-xs-12">
                                <strong>Report Date: </strong>
                                <span><?=date("F d, Y", strtotime(str_replace('/','-', $_POST["sales-report-date"])))?></span>
                            </div>
                            <div class="col-xs-12">
                                <strong>Total orders: </strong>
                                <span id="total-orders">0</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Recipe name</th>
                                            <th>Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th colspan="2" class="shift-label">Shift 1 (8:00 am - 3:00 pm)</th>
                                        </tr>
                                        <?php 
                                        $data = getReport($_POST["sales-report-date"]);
                                        $total_qty = 0;
                                        while ($row = $data->fetch_assoc()) { $total_qty = intval($row["qty"] + $total_qty); ?>
                                        <tr>
                                            <td><?=$row["recipe_name"]?> (Unit price: <?=$row["unit_price"]?>)</td>
                                            <td><?=$row["qty"]?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <th>Total</th>
                                            <th><span style="float: right;"><?=$total_qty?></span></th>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="shift-label">Shift 2 (3:01 pm - 11:00 pm)</th>
                                        </tr>
                                        <?php 
                                        $data = getReport($_POST["sales-report-date"], "15:01", "23:59");
                                        $total_qty = 0;
                                        while ($row = $data->fetch_assoc()) { $total_qty = intval($row["qty"] + $total_qty); ?>
                                        <tr>
                                            <td><?=$row["recipe_name"]?> (Unit price: <?=$row["unit_price"]?>)</td>
                                            <td><?=$row["qty"]?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <th>Total</th>
                                            <th><span style="float: right;"><?=$total_qty?></span></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-xs-12">
                                <h3 class="end-of-report"># End of report</h3>
                            </div>
                            <div class="col-xs-12">
                                <button onclick="window.print()" class="btn btn-default">Print</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <script>

        function computeTotalPrice() {

            var total = 0;
            $("tbody td:last-child").each(function() {
                console.log($(this).html());
                total += parseInt($(this).html());
            });

            // console.log(total);

            $("#total").html(total);
            $("#total-orders").html(total);

        }
        
        function computeTotalQuantity() {
            var total = 0;
            $("tbody td:first-child").each(function() {
                total += parseInt($(this).html());
            });

            // console.log(total);

            $("#total-orders").html(total);
        }

        computeTotalPrice();
        // computeTotalQuantity();
        window.print();

        </script>
    </body>
</html>