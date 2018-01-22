
$(document).ready(function () {
    $('#slider-list1').freeSimpleSlider({
        dots: false,
        arrows: false,
        time: 3000,
        animation: "basic"
    });

    $('#slider-list2').freeSimpleSlider({
        dots: true,
        arrows: true,
        time: 3000,
        animation: "fade"
    });

    $('#slider-list3').freeSimpleSlider({
        dots: true,
        arrows: true,
        time: 3000,
        animation: "slide"
    });
});
