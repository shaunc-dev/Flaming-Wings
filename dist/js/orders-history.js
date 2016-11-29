/**
 * inserts receipt to the order list
 * @param order the order that should be inserted
 */

var total_tally = 0;

function insertOrder(order) {
    var $columnTemplate = $("<div>", {"class": "col-xs-12"});
    var $boxTemplate = $("<div>", {"class": "box box-danger collapsed-box"})

    var $boxHeader = $("<div>", {"class": "box-header"})
    .append($("<h3>", {"class": "box-title"})
        .html("Order #" + order.id).append($("<small>", {"style": "margin-left: 10px"})
        .html(moment(order.date).format("MMMM D, YYYY"))
            .append(", " + moment(order.date).format("h:m A"))))
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

        total_tally += parseInt(order.orders[i].qty);
    }

    // end of table contents

    // merging all of the parts of the box class
    $table.append($tableHead).append($tableBody);
    $boxBody.append($table);

    $boxTemplate.append($boxHeader).append($boxBody).append($boxFooter);
    $("#orders").append($columnTemplate.html($boxTemplate));

    $("#total-tally").html(total_tally);

}

/**
 * placing tallies to their appropriate shiftSeparation
 * @param talliedOrder the tallied data
 * @param shift the shift of the orders
 */

function placeTally(talliedOrder, shift) {
    var $row = $("<div>", {"class": "row", "style": "margin-bottom: 4px; margin-top: 4px;"});
    var $recipeColumn = $("<div>", {"class": "col-xs-8"})
        .html(talliedOrder.recipe_name);
    var $quantityColumn = $("<div>", {"class": "col-xs-4"})
        .html($("<strong>", {"style": "float: right;"}).html(talliedOrder.qty));

    $row.append($recipeColumn).append($quantityColumn);
    $row.appendTo(".tally" + shift);
}

/**
 * organizing and tallying orders
 * @param orders the order data
 * @param shift check what shift the order is (accepts only 1 or 2 (1st shift or 2nd shift)) 
 */

function tallyOrders(orders, shift) {
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
        placeTally(tallyArray[i], shift);
    }

    $("#total-tally").html(total_tally);
}

/**
 * resetting orders and the tally
 */

function removeOrders() {
    $("#orders *:not(#no-orders)").remove();
    $(".tally1 *:not(strong), .tally2 *:not(strong)").remove();
    total_tally = 0;
    $("#total-tally").html(total_tally);
}

/**
 * initializing all button listeners on the page
 */

function initializeListeners() {
    $(".selection > a").on("click", function() {
        $(".selection > a").removeAttr("class");
        $(this).attr("class", "active");
        removeOrders();
        processDate($(this).data("value"));
    });

    $(".selection > a:nth-child(2)").trigger("click");
}

/**
 * separating the orders to their shifts
 * @param history the history data from the server (as JSON)
 */

function shiftSeparation(history) {
    var shift1 = new Array();
    var shift2 = new Array();

    for (var i = 0; i < history.length; i++) {
        var isShift1 = false;

        for (var hour = 8; hour <= 15; hour++) {
            if (moment(history[i].date).hour() == hour) {
                isShift1 = true;
                break;
            }
        }

        if (isShift1 == true) {
            shift1.push(history[i]);
        } else {
            shift2.push(history[i]);
        }
    }

    setTimeout(function() {tallyOrders(shift1, 1)}, 0);
    setTimeout(function() {tallyOrders(shift2, 2)}, 0);
}

/**
 * gets order history from the server given the range
 * @param min the minimum date range (accepts only YYYY-MM-DD format)
 * @param max the maximum date range (accepts only YYYY-MM-DD format)
 */

function getOrdersFromDate(min, max) {
    var history;
    $.ajax({
        url: "getHistory.php", 
        data: {"start": min, "end": max},
        dataType: "json",
        method: "POST"})
    .done(function(data) {
        history = data;
        // setupDateBoxes(history.history);
        shiftSeparation(data.history);
        if (data.history.length == 0) {
            $("#no-orders").css("display", "block");
        } else {
            for (var i = 0; i < data.history.length; i++) {
                insertOrder(data.history[i]);
            }
        }
    });
}

function setupDateBoxes(history) {
    console.log(history);
    var historyArray = history;
    for (var i = 0; i < historyArray.length; i++) {
        for (var j = 0; j < historyArray.length; j++) {
            if (i == j) {
                j++;
            } else {
                if (moment(historyArray[i].date).format("YYYY-MM-DD") == moment(historyArray[j].date).format("YYYY-MM-DD")) {
                    historyArray.splice(j, 1);
                }
            }
        }
    }

    console.log(history);
    // console.log(historyArray);
    // historyArray.splice(0, 1);
    // console.log(historyArray);

}

/**
 * converts the button values to dates for processing
 * @param date the button value
 */

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