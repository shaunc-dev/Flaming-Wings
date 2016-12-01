<?php 

session_start(); 
include("dbconnection.php");

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Flaming Wings | Orders History</title>
        <?php include("templates/imports.php"); ?>
        <style>

            .divider {
                width: 100%;
                border: 1px lightgray solid;
            }

            .orders {
                margin-top: 20px;
            }

            thead tr th:nth-child(1) {
                width: 100%;
            }

            .box-footer > span {
                float: right;
            }

            .box-body {
                height: 500px;
                overflow-y: scroll;
                overflow-x: auto;
            }

            .selection-container {
                height: auto;
                overflow-y: hidden;
                overflow-x: hidden;
            }

            thead > tr > th:first-child {
                width: 10%;
            }

            thead > tr > th:nth-child(2) {
                width: 85%;
            }

            .selection {
                text-align: left;
            }

            .selection > a {
                display: block;
                padding: 4px;
                color: black;
                cursor: pointer;
            }

            .selection > a.active, .selection > a.active:hover {
                color: white;
                background: rgba(225, 72, 53, 1.0);
            }

            .selection > a:hover {
                color: white;
                background: rgba(249, 151, 141, 1.0);
            }

            .tally1, .tally2, .total-tally {
                border: 1px lightgray solid;
                padding: 10px;
                margin-bottom: 20px;
            }

            .total-tally {
                border: none;
                padding-top: 0;
                padding-bottom: 5px;
                margin-bottom: 0;
            }

        </style>
    </head>
    <body class="sidebar-mini skin-red">
        <div class="wrapper">
            <?php include("templates/navbar.php");?>
            <?php include("templates/sidebar.php");?>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>Orders History</h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row" id="orders">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box box-danger">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Show orders</h3>
                                        </div>
                                        <div class="box-body selection-container">
                                            <div class="selection">
                                                <a data-value="now" class="active">Today</a>
                                                <a data-value="lweek">Last week</a>
                                                <a data-value="lmonth">Last month</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="box box-danger">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Ordered items</h3>
                                        </div>
                                        <div class="box-body selection-container">
                                            <div class="tally1">
                                                <strong>Shift 1 (8:00 am - 3:00 pm)</strong>
                                            </div>
                                            
                                            <div class="tally2">
                                                <strong>Shift 2 (3:01 pm - 11:00 pm)</strong>
                                            </div>
                                            <div class="total-tally">
                                                <strong>Total</strong>
                                                <span class="pull-right" id="total-tally">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <form action="generate-sales-report.php" method="post">
                                        <div class="box box-danger">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Generate sales report</h3>
                                            </div>
                                            <div class="box-body" style="height: auto; overflow-y: hidden;">
                                                <div class="form-group">
                                                    <label for="date">Choose a date</label>
                                                    <input type="date" class="form-control" name="sales-report-date" id="date">
                                                </div>
                                            </div>
                                            <div class="box-footer" style="text-align: right;">
                                                <button class="btn btn-default" type="submit">Print</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <script src="dist/js/orders-history.js">

        </script>
    </body>
</html>