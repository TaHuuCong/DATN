// Price Range

$('#sl2').slider();

var RGBChange = function() {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};
// Scroll To Top
// $(document).ready(function() {
//     $(function() {
//         $.scrollUp({
//             scrollName: 'scrollUp', // Element ID
//             scrollDistance: 300, // Distance from top/bottom before showing element (px)
//             scrollFrom: 'top', // 'top' or 'bottom'
//             scrollSpeed: 300, // Speed back to top (ms)
//             easingType: 'linear', // Scroll to top easing (see http://easings.net/)
//             animation: 'fade', // Fade, slide, none
//             animationSpeed: 200, // Animation in speed (ms)
//             scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
//             //scrollTarget: false, // Set a custom target element for scrolling to the top
//             scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
//             scrollTitle: false, // Set a custom <a> title if required.
//             scrollImg: false, // Set true to use image
//             activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
//             zIndex: 2147483647 // Z-Index for the overlay
//         });
//     });
// });

// Hiệu ứng của Dropdown Menu
jQuery(document).ready(function() {
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).fadeIn("fast");
        },
        function() {
            $('.dropdown-menu', this).fadeOut("fast");
        });
});


// Hiệu ứng khi di chuột vào sản phẩm thì hiện lên thanh shortlinks
$('.product-info').each(function() {
    $(this).hover(
        function() {
            //$(this).children('a').children('img').fadeOut()
            $(this).children('.shortlinks').fadeIn()
        },
        function() {
            //$(this).children('a').children('img').fadeIn()
            $(this).children('.shortlinks').fadeOut()
        }
    );

});


// Hiệu ứng zoom ảnh
$(document).ready(function() {

    $("#zoom_05").elevateZoom({
        gallery: 'gal1',
        zoomType: "inner",
        cursor: "crosshair",
        galleryActiveClass: 'active',
        imageCrossfade: true,
        loadingIcon: ''
    });

    $("#zoom_05").bind("click", function(e) {
        var ez = $('#zoom_05').data('elevateZoom');
        $.fancybox(ez.getGalleryList());
        return false;
    });

});


// Hiệu ứng sản phẩm bay vào giỏ hàng
$(document).on('click', '.add-to-cart', function(event) {
    event.preventDefault();
    /* Act on the event */
    if ($(this).hasClass('disable')) {
        return false;
    }

    $(document).find('.add-to-cart').addClass('disable');

    var parent = $(this).parents('.product-info'); //parents là lấy tất cả các thằng tổ tiên của thằng this
    var src = parent.find('img').attr('src'); //lấy đường dẫn hình ảnh của sản phẩm
    var cart = $(document).find('#shopping-cart');

    var parentTop = parent.offset().top; //hàm offset lấy ra vị trí top, left... của 1 thành phần nào đó
    var parentLeft = parent.offset().left;

    $('<img />', {
        class: 'img-pro-fly',
        src: src,
    }).appendTo('body').css({ //.css() ở đây để hình ảnh xuất hiện bên trong khung của .product-info
        'top': parentTop,
        'left': parentLeft + parent.width() - 50 //vị trí bên trái + chiều rộng của .product-info - chiều rộng của .img-pro-fly
    });; //khi click thì sẽ thêm vào 1 thẻ img vào body

    setTimeout(function() {
        $(document).find('.img-pro-fly').css({
            'top': cart.offset().top,
            'left': cart.offset().left
        });
        setTimeout(function() {
            $(document).find('.img-pro-fly').remove(); //bay vào sau 1s thì nó mất đi
            var countItem = parseInt(cart.find('#count-item').data('count')) + 1;
            cart.find('#count-item').text(countItem + ' sản phẩm').data('count', countItem);
            $(document).find('.add-to-cart').removeClass('disable');
        }, 1000);
    }, 500); //sau 500ms thì .img-pro-fly sẽ xuất hiện ở vị trí giỏ hàng #shopping-cart
});


// Hiệu ứng sroll thì thay đổi header
$(function() {
    $(window).scroll(function(event) {
        /* Act on the event */
        var location = $('body').scrollTop(); //lấy vị trí của phần tử tính từ top
    });
});