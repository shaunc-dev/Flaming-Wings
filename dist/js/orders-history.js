function insertOrder(order) {
    var $columnTemplate = $("<div>", {"class": "col-xs-12"});
    var $boxTemplate = $("<div>", {"class": "box box-danger collapsed-box"})

    var $boxHeader = $("<div>", {"class": "box-header"})
    .append($("<h3>", {"class": "box-title"})
        .html("Order #" + order.id).append($("<small>", {"style": "margin-left: 10px"}).html(moment(order.date).format("MMMM D, YYYY"))))
    .append($("<div>", {"class": "box-tools pull-right"})
        .html($("<button>", {"class": "btn btn-box-tool", "data-widget": "collapse", "type": "button"})
            .html($("<i>", {"class": "fa fa-plus"}))
            )
        );
    var total = order.total;
    var toFixedTotal = parseFloat(total).toFixed(2);

    var $boxBody = $("<div>", {"class": "box-body no-padding"});
    var $boxFooter = $("<div>", {"class": "box-footer"})
    .append($("<strong>").html("Total"))
    .append($("<span>", {"class": "pull-right"}).html(toFixedTotal));

    // Table contents

    var $table = $("<table>", {"class": "table table-responsive"});
    var $tableHead = $("<thead>")
    .append($("<tr>")
        .append($("<th>").html("Qty"))
        .append($("<th>").html("Recipe name"))
        .append($("<th>").html("Price"))
    );
    
    var $tableBody = $("<tbody>");

    for (var i = 0; i < order.orders.length; i++) {
        var price = order.orders[i].price;
        var toFixedPrice = parseFloat(price).toFixed(2);
        $tableBody
        .append($("<tr>")
            .append($("<td>").html(order.orders[i].qty))
            .append($("<td>").html(order.orders[i].recipe_name))
            .append($("<td>").html(toFixedPrice))
        );
    }

    // end of table contents

    // merging all of the parts of the box class
    $table.append($tableHead).append($tableBody);
    $boxBody.append($table);

    $boxTemplate.append($boxHeader).append($boxBody).append($boxFooter);
    $("#orders").append($columnTemplate.html($boxTemplate));

}

function placeTally(talliedOrder) {
    var $row = $("<div>", {"class": "row", "style": "margin-bottom: 8px;"});
    var $recipeColumn = $("<div>", {"class": "col-xs-8"})
        .html(talliedOrder.recipe_name);
    var $quantityColumn = $("<div>", {"class": "col-xs-4"})
        .html($("<strong>", {"style": "float: right;"}).html(talliedOrder.qty));

    $row.append($recipeColumn).append($quantityColumn);
    $(".tally").append($row);
}

function tallyOrders(orders) {
    console.log(orders);
    var tallyArray = new Array();

    // getting all orders first then extracting only the name and quantity
    for (var i = 0; i < orders.length; i++) { // orders
        for (var j = 0; j < orders[i].orders.length; j++) { // order details
            var orderTally = new Object();
            orderTally.recipe_name = orders[i].orders[j].recipe_name;
            orderTally.qty = orders[i].orders[j].qty;
            tallyArray.push(orderTally);
        }
    }

    // combining all order quantities
    for (var i = 0; i < tallyArray.length; i++) {
        for (var j = 0; j < tallyArray.length; j++) {
            if (i == j) {
                j++;
            } else {
                if (tallyArray[i].recipe_name.trim() == tallyArray[j].recipe_name.trim()) {
                    tallyArray[i].qty = parseInt(tallyArray[i].qty) + parseInt(tallyArray[j].qty);
                    tallyArray.splice(j, 1);
                    j = 0;
                }
            }
        }
    }

    for (var i = 0; i < tallyArray.length; i++) {
        placeTally(tallyArray[i]);
        // console.log(tallyArray[i]);
    }
}

function removeOrders() {
    $("#orders *:not(#no-orders)").remove();
    $(".tally *").remove();
}

function initializeListeners() {
    $(".selection > a").on("click", function() {
        $(".selection > a").removeAttr("class");
        $(this).attr("class", "active");
        removeOrders();
        processDate($(this).data("value"));
    });

    $(".selection > a:first-child").trigger("click");
}

function getOrdersFromDate(min, max) {
    $.ajax({
        url: "getHistory.php", 
        data: {"start": min, "end": max},
        dataType: "json",
        method: "POST"})
    .done(function(data) {
        console.log(data);
        setTimeout(function() { tallyOrders(data.history) }, 0);
        if (data.history.length == 0) {
            $("#no-orders").css("display", "block");
        } else {
            for (var i = 0; i < data.history.length; i++) {
                insertOrder(data.history[i]);
            }
        }
    });
}

function processDate(date) {
    if (date.toLowerCase() == "now") {
        var today = moment().format("YYYY-MM-DD");

        getOrdersFromDate(today, "");
    } else if (date.toLowerCase() == "lmonth") {
        var min = moment().subtract(1, "month").format("YYYY-MM-01");
        var max = moment().subtract(1, "month").format("YYYY-MM-" + moment().subtract(1, "month").daysInMonth());

        getOrdersFromDate(min, max);
    } else if (date.toLowerCase() == "lweek") {
        var min = moment(moment().subtract(1, "week").format("YYYY-MM-DD")).day("Sunday").format("YYYY-MM-DD");
        var max = moment(moment().subtract(1, "week").format("YYYY-MM-DD")).day("Saturday").format("YYYY-MM-DD");

        getOrdersFromDate(min, max);
    } else {
        console.log("date is null");
    }
}


initializeListeners();