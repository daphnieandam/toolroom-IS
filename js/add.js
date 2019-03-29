$(document).ready(function () {
    $("#add").click(function () {
        //var $product = $("select[name$='product']:first").clone();
        var $product = $("select[name$='product']:first").clone();
        $("form").append("<br/>").append($product);
    });
});