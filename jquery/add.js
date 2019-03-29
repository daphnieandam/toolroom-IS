$(document).ready(function () {
    $("#more").click(function () {
        //var $tools = $("select[toolname$='toolname']:first").clone();
        var $tools = $("select[toolname$='toolname']:first").clone();
        $("form").append("<br/>").append($toolname);
    });
});