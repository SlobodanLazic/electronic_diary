$(document).ready(function () {
    toggleFields();
    $("#user_role").change(function () {
        toggleFields();
    });

});

function toggleFields() {
    if ($("#user_role").val() === "4")
        $("#otherServer").show();
    else
        $("#otherServer").hide();
}