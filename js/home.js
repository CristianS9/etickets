$(document).ready(function () {
    $(".ls_result_div").css("left", "35.55%");
    /* $(".ls_result_div").css("left: 50%;"); */
    $("#lupa").click(function () {
        $(".mySearch").toggle();
        $(".mySearch").addClass("animated fadeInDown");
    });
});