$(document).ready(function () {
    $("#add").click(function () {
        //var $tools = $("select[toolname$='tools']:first").clone();
        var $tools = $("select[toolname$='tools']:first").clone();
        $("form").append("<br/>").append($tools);
    });
});