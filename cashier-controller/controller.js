var itemSelected = null;
var itemIds = new Array();
var itemQuantities = new Array();

function reInitializeOrders() {
    console.log("Resetting values...");

    $(".box-body").removeClass("item-focus");
    $("#orders tr").remove();
    itemIds = new Array();
    itemQuantities = new Array();
    itemSelected = null;
    computeTotalCost();
    $("#type-tabs-content .tab-pane .row *").remove();
    fetchItems();
}

function setupTabs() {
    $.ajax({
        url: "cashier-controller/get-types.php",
        dataType: "json",
        success: function(data) {
            for (var i = 0; i < data.types.length; i++) {
                $tablinks = $("<a>", {"href": "#type_" + data.types[i].id, "data-toggle": "tab"}).text(data.types[i].name);
                $tabpanes = $("<div>", {"class": "tab-pane", "id": "type_" + data.types[i].id, "data-type-id": data.types[i].id, "role": "tabpanel"}).append($("<div>", {"class": "row"}));

                $("#type-tabs").append($("<li>").append($tablinks));
                $("#type-tabs-content").append($tabpanes);

            }

            $("a[href='#type_1']").tab("show");
            
        }, 
        error: function(errorThrown) {
            console.log(errorThrown);
        }
    });
}

function insertInsideTab(type, itemToBeInserted) {
    // console.log(itemToBeInserted);

    $("#type-tabs-content .tab-pane").each(function() {
        if (type == $(this).data("type-id")) {
            $("#type-tabs-content #type_"+type+" .row").append(itemToBeInserted);
        }
    });
}

function insertItem(item) {
    var $itemName = $("<h7>", {"class": ""}).text(item.name);
    var $itemHeader = $("<div>", {"class": "box-header with-border"}).append($itemName);
    var $itemDescription = $("<div>", {"class": "box-body"})
    .append($("<small>").text("₱ " + item.price))
    // .append("<br>")
    // .append($("<small>").text(item.pieces_left + " pieces left"));
    
    var $boxTemplate = $("<div>", {"class": "box box-danger box-solid"}).append($itemHeader).append($itemDescription);
    var $columnTemplate = $("<div>", {"class": "col-sm-2 col-md-4 col-lg-4"}).append($boxTemplate);
    
    $boxTemplate.on("click", function() {
        selectItem($itemDescription, item);
    });

    insertInsideTab(item.type, $columnTemplate);
}

function isUnlocked(boolean) {
    if (boolean) {
        $("#orders tr td:last-child").css("display", "block");
        $("#lock, #clear").css("display", "block");
        $("#cancel").css("display", "none");
        $("#add-to-orders").attr("disabled", true);
        $("#confirm-orders").attr("disabled", true);
    } else {
        $("#manager-password").val("");
        $("#orders tr td:last-child").css("display", "none");
        $("#lock, #clear").css("display", "none");
        $("#cancel").css("display", "block");
        $("#add-to-orders").attr("disabled", false);
        $("#confirm-orders").attr("disabled", false);
    }
}

function selectItem($selectedItem, itemProperties) {
    $(".box-body").removeClass("item-focus");
    $selectedItem.addClass("item-focus");
    this.itemSelected = itemProperties;
}

function addToOrder(itemSelected) {
    // console.log(itemSelected);
    var $itemOrdered = "";
    $row = $("<tr>");
    
    $deleteButton = $("<span>", {"class": "glyphicon glyphicon-trash", "style": "color: #f56954;"});
    $deleteColumn = $("<td>").append($deleteButton);
    $itemQuantity = $("<td>").html(itemSelected.quantity);
    $itemName = $("<td>").html(itemSelected.name);
    $itemPrice = $("<td>").html(itemSelected.price.toFixed(2));
    
    $itemOrdered = $row.append($itemQuantity).append($itemName).append($itemPrice).append($deleteColumn);
    $("#orders").append($itemOrdered);
    computeTotalCost();

    $deleteButton.on("click", function() {
        var itemOrderedIndex = $itemOrdered.index();
        itemIds.splice(itemOrderedIndex, 1);
        itemQuantities.splice(itemOrderedIndex, 1);
        
        $itemOrdered.remove();
        computeTotalCost();
    });
}

function computeTotalCost() {
    var total_cost = 0;
    $("#orders tr td:nth-child(3)").each(function() {
        total_cost += parseFloat($(this).text());
    });

    total_cost = Number(total_cost).toFixed(2);
    $("#total-cost").html(total_cost);
}

function sendOrders(finalizedOrders) {
    // ajax here to send the Object
    $.ajax({
        url: "cashier-controller/process-orders.php",
        data: finalizedOrders,
        dataType: "html",
        method: "POST",
        success: function(data) {
            console.log(data);
            if (data == "success") {
                generateAlert("Customer's order is confirmed!", "success");
                reInitializeOrders();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
            console.log(textStatus);
            console.log(jqXHR);
        }
    });
}

function fetchItems() {
    $.ajax({
        url: "cashier-controller/get-recipes.php",
        dataType: "json",
        success: function(data) {
            for (var i = 0; i < data.recipes.length; i++) {
                insertItem(data.recipes[i]);
            }
        },
        error: function(errorThrown) {
            console.log(errorThrown);
        }
    });
}

function initializeListeners() {
    $("#clear").on("click", function() {
        reInitializeOrders();
        isUnlocked(false);
        generateAlert("Order has been cancelled!", "danger");
    });

    $("#lock").on("click", function() {
        isUnlocked(false);
    });

    $("#cancel").on("click", function() {
        $("#unlock-modal").modal();
        $("#manager-password").focus();
        $("#unlock-button").on("click", function() {
            var jqXHR = $.post("cashier-controller/access-verification.php", { password: $("#manager-password").val() });
            jqXHR.done(function (data) {
                console.log(data);
                if (data == "true") {
                    isUnlocked(true);
                    $("#unlock-modal").modal("hide");
                } else {
                    // something to alert
                }
            });
        });
    });

    $("#confirm-orders").on("click", function() {
        var itemOrders = new Object();
        itemOrders.id = itemIds;
        itemOrders.quantity = itemQuantities;
        itemOrders.total = parseFloat($("#total-cost").text());
        
        if (itemOrders.id.length > 0 && itemOrders.quantity.length > 0) {
            sendOrders(itemOrders);
        }
    });

    $("#add-to-orders").on("click", function() {

        if (itemSelected == null) {
            generateAlert("Select an item first!", "danger");
        } else {
            var orderQuantity = $("#order-quantity").val();

            if (orderQuantity > 0) {
                addToOrder(
                    { 
                        name: itemSelected.name,
                        quantity: orderQuantity,
                        price: itemSelected.price * orderQuantity
                    }
                );

                itemIds.push(itemSelected.id);
                itemQuantities.push(orderQuantity);
                $("#order-quantity").val(1);
            } else  {
                generateAlert("An item should have a quantity!", "danger");
            }
        }
    });
}

/**
 * @param alertType type of alert to generate (possible values are success, info, warning, and danger)
 */
function generateAlert(message, alertType) {
    $(".alert").remove();
    var alertIcon = "";

    if (alertType == "danger") {
        alertIcon = "icon fa fa-ban";
    } else if (alertType == "info") {
        alertIcon = "icon fa fa-info";
    } else if (alertType == "warning") {
        alertIcon = "icon fa fa-warning";
    } else if (alertType == "success") {
        alertIcon = "icon fa fa-check";
    }

    $alert = $("<div>", {
        "class": "alert alert-" + alertType + "",
    }).html($("<i>", {"class": alertIcon})).append(message);
    $(".alert-overlay").append($alert).show();

    setTimeout(function() {
        $(".alert").fadeOut();
    }, 5000);
}

// initialize everything below

setupTabs();
fetchItems();
initializeListeners();
