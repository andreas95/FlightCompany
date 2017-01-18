$(document).ready(function() {

    var active1 = false;
    var active2 = false;
    var active3 = false;
    var active4 = false;

   // $('.nav-bar').on('mousedown touchstart', function() {
    $('.nav-bar').click(function () {
        if (!active1) $(this).find('.nav-home').css({'background-color': '#dd4b39', 'transform': 'translate(0px,125px)'});
        else $(this).find('.nav-home').css({'background-color': 'dimGray', 'transform': 'none'});
        if (!active2) $(this).find('.nav-booking').css({'background-color': '#dd4b39', 'transform': 'translate(60px,105px)'});
        else $(this).find('.nav-booking').css({'background-color': 'darkGray', 'transform': 'none'});
        if (!active3) $(this).find('.nav-account').css({'background-color': '#dd4b39', 'transform': 'translate(105px,60px)'});
        else $(this).find('.nav-account').css({'background-color': 'silver', 'transform': 'none'});
        if (!active4) $(this).find('.nav-contact').css({'background-color': '#dd4b39', 'transform': 'translate(125px,0px)'});
        else $(this).find('.nav-contact').css({'background-color': 'silver', 'transform': 'none'});
        active1 = !active1;
        active2 = !active2;
        active3 = !active3;
        active4 = !active4;

        $(this).find('.nav-home').click(function () {
            window.location.href = "index.php";
        })

        $(this).find('.nav-booking').click(function () {
            window.location.href = "booking.php";
        })

        $(this).find('.nav-account').click(function () {
            window.location.href = "dashboard.php";
        })
        $(this).find('.nav-contact').click(function () {
            window.location.href = "contact.php";
        })

    });


});