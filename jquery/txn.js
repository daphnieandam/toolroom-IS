$(document).ready(function () {
    $("#plus").click(function () {
        var $tools = $("select[toolname$='tools']:first").clone();
        $("form").append("<br/>").append($tools);
    });
});