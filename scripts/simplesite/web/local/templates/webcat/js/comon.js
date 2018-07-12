$(document).ready(function () {
    $(".hamburger").click(function () {
        $(this).toggleClass("is-active");
        $(".top-logo").toggleClass("closed");
        $(".tel-number").toggleClass("closed");
        $(".adaptiv").toggleClass("closed");
        $(".header-scroll").toggleClass("header-scroll-active");

    });
    $("#contacts_in_header").click(function () {
        $('.hamburger').toggleClass("is-active");
        $(".top-logo").toggleClass("closed");
        $(".tel-number").toggleClass("closed");
        $(".adaptiv").toggleClass("closed");
        $(".header-scroll").toggleClass("header-scroll-active");
        $('html, body').animate({scrollTop: $('#contacts').position().top}, 700);

        return false; // выключаем стандартное действие


    });

});
