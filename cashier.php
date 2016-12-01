<?php 

session_start(); 
include ("dbconnection.php");

?>

<!DOCTYPE HTML>
<html>

<?php

session_start();

?>

    <head>
        <title>Point of Sales</title>

        <!--stylesheet imports-->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="dist/js/jquery.js"></script>

             <!-- PHP --> 
       <?PHP 
       include("dbconnection.php")

       ?>
        <script>
            $(window).on("load", function() {
                $.post("cashier-controller/check.php")
                .done(function(data) {
                    if (data == "false") {
                        window.location.replace("http://localhost/Flaming-Wings/log_in.php");
                    }
                });
            });
        </script>
        <style>

            .layout-boxed {
                background: #fff;
            }

            .nav-tabs-custom > .nav-tabs > li.active {
                border-top-color: #dd4b39;
                background: #dd4b39 !important;
                color: white;
            }

            .alert {
                position: relative;
                z-index: 1;
            }

            .alert-overlay {
                position: fixed;
                bottom: 5%; 
            }
            
            #lock, #clear {
                display: none;
            }

            .content-wrapper {
                margin-left: 0;
                padding: 30px;
                z-index: 0;
                position: relative;
            }

            .item-focus, .total-background {
                background: #dd4b39;
                color: white;
            }

            #orders tr td:last-child {
                width: 5%;
                display: none;
            }

            #orders tr td:nth-child(1) {
                text-align: right;
                width: 5%;
            }
            
            #orders tr td:nth-child(2) {
                width: 85%;
                text-align: left;
            }

            #orders tr td:nth-child(3) {
                width: 5%;
                text-align: right;
            }

            .nav-tabs {
                overflow: hidden;
                display: -webkit-box;
                display: -moz-box;
            }

            .nav-tabs > li {
                float: none;
            }

            
        </style>
    </head>
    <body class="skin-red">
        <div class="wrapper">
            <?php include("templates/navbar.php"); ?>
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-danger box-solid">
                                    <div class="box-body total-background">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong><h3>Total</h3></strong>
                                            </div>
                                            <div class="col-sm-9" style="text-align: right">
                                                <h3>₱ <span id="total-cost">0.00</span></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="box box-danger">
                                    <div class="box-header">
                                        <h3 class="box-title">Orders</h3>
                                        <div class="box-tools">
                                            <button class="btn btn-danger" id="clear">Clear order</button>
                                        </div>
                                    </div>
                                    <div class="box-body table-responsive no-padding" id="outer" style="height: 543px; overflow-y:auto">
                                        <table class="table table-hover">
                                            <thead class="floating-head">
                                                <tr style="background-color: white">
                                                    <th style="width: 20px; text-align:right">Qty</th>
                                                    <th>Recipe name</th>
                                                    <th style="width: 20px; text-align:right">Price</th>
                                                    <th style="width: 40px"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="orders">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="box-footer">
                                        <div style="float:left">
                                            <button class="btn btn-default" id="cancel">Modify order</button>
                                            <button class="btn btn-danger" id="lock">Lock</button>
                                        </div>
                                        <div style="float: right">
                                            <button id="confirm-orders" class="btn btn-danger">
                                                Confirm order
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Recipes</h3>
                                    </div>
                                    <div class="box-body no-padding">
                                        <div class="nav-tabs-custom" style="height: 600px; overflow-y: auto; overflow-x: hidden; margin-bottom:0">
                                                <ul class="nav nav-tabs" id="type-tabs" style="overflow-x:auto">
                                                </ul>
                                            <div class="tab-content" id="type-tabs-content">
                                            </div>
                                        </div>
                                        <div class="row" id="items"></div>
                                    </div>
                                    <div class="box-footer">
                                        <div class="input-group">
                                            <span class="input-group-addon">How many recipes?</span>
                                            <input type="number" class="form-control" value="1" id="order-quantity">
                                            <div class="input-group-btn">
                                                <button class="btn btn-danger" id="add-to-orders">Add recipe to list</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert-overlay">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="unlock-modal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Please enter password</h4>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="manager-password" placeholder="Password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" id="unlock-button">Unlock</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--script imports-->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="dist/js/app.min.js"></script>
        <script src="cashier-controller/controller.js"></script>
    </body>
</html>