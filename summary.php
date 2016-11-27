<!DOCTYPE HTML>
<html>
    <head>
        <title>Summary of Sales</title>
        <?php include ('templates/imports.php'); ?>
        <style>

            .selection {
                /*margin-top: 20px;*/
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

            #sales-performance {
                width: 100%;
            }

            @media print {
                #sales-performance {
                    width: 50%;
                }
            }

        </style>
    </head>
    <body class="sidebar-mini skin-red">
        <div class="wrapper">
            <?php include('templates/navbar.php'); ?>
            <?php include('templates/sidebar.php'); ?>
            
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>Summary</h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12 col-md-9">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Sales Performance</h3>
                                    <small>Comparing today and yesterday</small>
                                </div>
                                <div class="box-body">
                                    <canvas id="sales-performance"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Choose a comparison</h3>
                                </div>
                                <div class="box-body">
                                    <div class="selection">
                                        <a data-value="now" class="active">Today</a>
                                        <a data-value="lweek">Last week</a>
                                        <a data-value="lmonth">Last month</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <script src="dist/js/orders-history.js"></script>
        <script>
            processSummary();
        </script>
    </body>
</html>