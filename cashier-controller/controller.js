var itemSelected = null;
var itemIds = new Array();
var itemQuantities = new Array();

function reInitializeOrders() {
    console.log("Resetting values...");
    $(".box-body").removeClass("item-focus");
    $("#orders tr").remove();
    itemIds = new Array();
    itemQuantities = new Array();
    itemSelected = new Object();
    computeTotalCost();
}

function insertItem(item) {
    var $itemName = $("<h3>", {"class": "box-title"}).text(item.name);
    var $itemHeader = $("<div>", {"class": "box-header with-border"}).append($itemName);
    var $itemDescription = $("<div>", {"class": "box-body"})
    .append($("<small>").text("Php " + item.price))
    // .append("<br>")
    // .append($("<small>").text(item.pieces_left + " pieces left"));
    
    var $boxTemplate = $("<div>", {"class": "box box-primary box-solid"}).append($itemHeader).append($itemDescription);
    var $columnTemplate = $("<div>", {"class": "col-sm-3"}).append($boxTemplate);
    
    $boxTemplate.on("click", function() {
        selectItem($itemDescription, item);
    });

    return $columnTemplate;
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
    $deleteColumn = $("<td>").html($deleteButton);
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
            if (data === 'success') {
                console.log(data);
                reInitializeOrders();
            }
        },
        error: function(errorThrown) {
            console.log(errorThrown);
        }
    });
}

function fetchItems() {
    // mock recipe list (will integrate with the database soon)
    for (var i = 1; i <= 30; i++) {
        $("#items").append(insertItem(
            {
                id: i,
                name: "Flaming Wings " + i,
                price: "50.00",
                // pieces_left: "50",
                type: 1
            }
        ));
    }
}

fetchItems();

$("#cancel").on("click", function() {
    reInitializeOrders();
});

$("#confirm-orders").on("click", function() {
    var itemOrders = new Object();
    itemOrders.id = itemIds;
    itemOrders.quantity = itemQuantities;
    
    if (itemOrders.id.length > 0 && itemOrders.quantity.length > 0) {
        sendOrders(itemOrders);
    }
});

$("#add-to-orders").on("click", function() {
    var orderQuantity = $("#order-quantity").val();
    var piecesLeft = parseInt(itemSelected.pieces_left);

    // if (orderQuantity <= piecesLeft) {
        addToOrder(
            { 
                name: itemSelected.name,
                quantity: orderQuantity,
                price: piecesLeft * orderQuantity
            }
        );

        itemIds.push(itemSelected.id);
        itemQuantities.push(orderQuantity);
        $("#order-quantity").val(1);
    // } else {
    //     $("#order-quantity").val(this.val());
    // }
});