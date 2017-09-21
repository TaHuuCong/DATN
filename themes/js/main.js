// Price Range

$('#sl2').slider();

var RGBChange = function() {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

// Scroll To Top

$(document).ready(function() {
    $(function() {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
});

// Dropdown Menu Fade
jQuery(document).ready(function() {
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).fadeIn("fast");
        },
        function() {
            $('.dropdown-menu', this).fadeOut("fast");
        });
});

// Slider
// var $item = $('.carousel .item');
// var $wHeight = $(window).height();
// $item.eq(0).addClass('active');
// $item.height($wHeight);
// $item.addClass('full-screen');

// $('.carousel img').each(function() {
//     var $src = $(this).attr('src');
//     var $color = $(this).attr('data-color');
//     $(this).parent().css({
//         'background-image': 'url(' + $src + ')',
//         'background-color': $color
//     });
//     $(this).remove();
// });

// $(window).on('resize', function() {
//     $wHeight = $(window).height();
//     $item.height($wHeight);
// });

// $('.carousel').carousel({
//     interval: 6000,
//     pause: "false"
// });