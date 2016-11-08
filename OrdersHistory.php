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
                max-height: 500px;
                overflow-y: scroll;
                overflow-x: auto;
            }

            .box-footer {
                display: block !important;
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
                        <div class="col-lg-6">
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Order #99</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body no-padding">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Recipe</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2 x Bacon</td>
                                                <td>20.00</td>
                                            </tr>
                                            <tr>
                                                <td>2 x Bacon</td>
                                                <td>20.00</td>
                                            </tr>
                                            <tr>
                                                <td>2 x Bacon</td>
                                                <td>20.00</td>
                                            </tr>
                                            <tr>
                                                <td>2 x Bacon</td>
                                                <td>20.00</td>
                                            </tr>
                                            <tr>
                                                <td>2 x Bacon</td>
                                                <td>20.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="box-footer">
                                    <strong>Total</strong>
                                    <span>20.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <script>

            function insertOrder(order) {
                var $boxTitle = $("<div>", {"class": "box-header"}).html("Order #" + order.id + " " + $("<small>", moment(order.date)));
            }

        </script>
    </body>
</html>