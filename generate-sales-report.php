<?php include ("cashier-controller/connect.php"); session_start(); ?>
<?php

function getReport($date = "") {
    if ($date == "") {
        $date = date("Y-m-d");
    }

    $get_report_statement = $GLOBALS["connect"]->prepare("select r.recipe_name, sum(sd.qty) as qty, sum(r.price * sd.qty) as price 
    from sales s, sales_details sd, recipe r 
    where sd.sales_id = s.sales_id && sd.recipe_id = r.recipe_id && date(s.dtSales) = ?
    group by recipe_name");

    $get_report_statement->bind_param("s", $date);
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

        header *, main * {
            font-family: serif !important;
        }

        img[src='logoo.png'] {
            width: 100%;
        }

        th:first-child {
            text-align: right;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px lightgray solid;
        }

        tbody tr td:nth-child(1) {
            text-align: right;
            width: 5%;
        }
        
        tbody tr td:nth-child(2) {
            width: 85%;
            text-align: left;
        }

        tbody tr td:nth-child(3) {
            width: 5%;
            text-align: right;
        }

        tfoot tr td:last-child {
            text-align: right;
        }

        @media print {
            .btn {
                display: none;
            }
            
            img[src='logoo.png'] {
                width: 400px;
            }
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
                        <h3>Flaming Wings Sales Report</h3>
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
            </header>
            <main>
                <div class="row">
                    <div class="col-xs-12">
                        <table>
                            <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Recipe name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $data = getReport($_POST["sales-report-date"]);
                                while ($row = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td><?=$row["qty"]?></td>
                                    <td><?=$row["recipe_name"]?></td>
                                    <td><?=$row["price"]?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" style="text-align: left !important">
                                        <strong>Total</strong>
                                    </td>
                                    <td>
                                        <span id="total">0</span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-xs-12">
                        <h3 style="text-align: center;"># End of report</h3>
                    </div>
                    <div class="col-xs-12">
                        <button onclick="window.print" class="btn btn-danger">Print</button>
                    </div>
                </div>
            </main>
        </div>
        <script>

        function computeTotalPrice() {

            var total = 0;
            $("tbody td:last-child").each(function() {
                total += parseFloat($(this).html());
            });

            // console.log(total);

            $("#total").html(total.toFixed(2));

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
        computeTotalQuantity();
        window.print();

        </script>
    </body>
</html>