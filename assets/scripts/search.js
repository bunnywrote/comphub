$(document).ready(function () {

    $("#searchItem").click(function () {

        // bind the user entry value to a variable
        var value = $("#searchWindow").val();

        if(value.length > 1) {
            $.get("/?type=search&query="+value, function (data) {
                // parse JSON string into JS-Object
                var products = JSON.parse(data);

                // build a string of the items
                var items = "";

                // iterate through the items and show them
                for (var i = 0; i < products.length; i++){
                    items += '<li><a href=/'+ products[i].url+'>'+ products[i].name +'</li>'
                }

                // set the html content
                $("#items").html(items);
            });
        }
    });

});