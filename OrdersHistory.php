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

            thead > tr > th:first-child {
                width: 10%;
            }

            thead > tr > th:nth-child(2) {
                width: 85%;
            }

            .selection {
                margin-top: 20px;
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
                                    <div class="well well-sm">
                                        <h5><strong>Show orders</strong></h5>
                                        <div class="selection">
                                            <a data-value="now" class="active">Today</a>
                                            <a data-value="lweek">Last week</a>
                                            <a data-value="lmonth">Last month</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="well well-sm">
                                        <h5><strong>Ordered items</strong></h5>
                                        <div class="tally" style="margin-top: 20px;">
                                        </div>
                                    </div>
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