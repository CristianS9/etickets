$(document).ready(function () {
    $(".ls_result_div").css("left: 50%;");
    $("#lupa").click(function () {
        $(".mySearch").show();
        $(".mySearch").addClass("animated fadeInRight");

    });

    $(".mySearch").click(function () {
        $(".ls_result_div").css("left: 50%;");
    });
});