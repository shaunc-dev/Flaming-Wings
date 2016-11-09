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

            .selection {
                margin-top: 20px;
                text-align: left;
            }

            .selection > a {
                display: block;
                padding: 4px;
                color: black;
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
                                <!--<div class="col-xs-12 col-lg-4">
                                    <div class="box box-danger">
                                        <div class="box-header">
                                            <h3 class="box-title">Order #99</h3>
                                            <div class="pull-right">
                                                <small id="date">October 9, 2016</small>
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
                                <div class="col-xs-12 col-lg-4">
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
                                <div class="col-xs-12 col-lg-4">
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
                                <div class="col-xs-12 col-lg-4">
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
                                <div class="col-xs-12 col-lg-4">
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
                                <div class="col-xs-12 col-lg-4">
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
                                </div>-->
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="well well-sm">
                                <h5><strong>Show orders</strong></h5>
                                <div class="selection">
                                    <a href="#" class="active">Today</a>
                                    <a href="#">Last week</a>
                                    <a href="#">Last month</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <script>

            function insertOrder(order) {
                var $columnTemplate = $("<div>", {"class": "col-xs-12 col-lg-4"});
                var $boxTemplate = $("<div>", {"class": "box box-danger"})
                var $boxHeader = $("<div>", {"class": "box-header"})
                .append($("<h3>", {"class": "box-title"}).html("Order #" + order.id))
                .append($("<small>", {"class": "pull-right"}).html("October 9, 2016"));

                $boxTemplate.append($boxHeader);
                $("#orders").append($columnTemplate.html($boxTemplate));

            }

            for (var i = 0; i < 9; i++) {
                insertOrder({"id": i, "date": "2016-11-9"});
            }

        </script>
    </body>
</html>