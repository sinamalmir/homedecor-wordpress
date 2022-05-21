
    jQuery(document).ready(function($){
    $('.countdown_time').each(function() {
        var endTime = $(this).data('time');
        $(this).countdown(endTime, function(tm) {
            $(this).html(tm.strftime('<div class="countdown_box"><div class="countdown-wrap"><span class="countdown days">%D </span><span class="cd_text"> Days </span></div></div><div class="countdown_box"><div class="countdown-wrap"><span class="countdown hours">%H</span><span class="cd_text"> Hours </span></div></div><div class="countdown_box"><div class="countdown-wrap"><span class="countdown minutes">%M</span><span class="cd_text"> Minute </span></div></div><div class="countdown_box"><div class="countdown-wrap"><span class="countdown seconds">%S</span><span class="cd_text"> Second </span></div></div>'));
        });
    });

    /*data image src*/
    $(".background_bg").each(function() {
    var attr = $(this).attr('data-img-src');
    if (typeof attr !== typeof undefined && attr !== false) {
    $(this).css('background-image', 'url(' + attr + ')');
}
});

});

    jQuery(document).ready(function ($){
    $('.product-carousel').owlCarousel({
        dots: false,
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            576:{
                items:2,
                nav:true
            },
            768:{
                items:3,
                nav:true
            },
            1000:{
                items:4,
                nav:true,
                loop:false
            }
        }
    });

    $('.insta-feed-carousel').owlCarousel({
    dots: false,
    nav:false,
    loop:true,
    responsiveClass:true,
    responsive:{
    0:{
    items:2,
},
    600:{
    items:4,
},
    992:{
    items:6,
}
}
});
    $('.client-logo-carousel').owlCarousel({
    dots: false,
    nav:false,
    loop:true,
    margin: 50,
    responsiveClass:true,
    responsive:{
    0:{
    items:2,
},
    576:{
    items:4,
},
    1000:{
    items:5,
}
}
});
    $('.blog-carousel').owlCarousel({
    dots: false,
    nav:true,
    loop:true,
    margin:30,
    responsiveClass:true,
    responsive:{
    0:{
    items:1,
},
    768:{
    items:2,
},
    1000:{
    items:3,
}
}
});

    //    sticky header
    $(window).on('scroll', function (){
    var scroll = $(window).scrollTop();

    if ( scroll >= 180 ){
    $('.bottom-header').addClass('fixed-top');

}
    else{
    $('.bottom-header').removeClass('fixed-top');
}
})

});


//     js for grid and list in product page

    jQuery(document).ready(function($){

    $(".shorting-icon").on("click" , function () {
         if ($(this).hasClass("grid")){
             $(".shop-container").removeClass("list").addClass("grid");
             $(this).addClass("active").siblings().removeClass("active");
         }
         else if ($(this).hasClass("list")){
             $(".shop-container").removeClass("grid").addClass("list");
             $(this).addClass("active").siblings().removeClass("active");
         }
    });

//     javascript for click and active for product size
    $(".pro-size-wrap span").on('click' , function () {
        $(this).addClass("active").siblings().removeClass("active");
    })

//    javascript for price plugin
        $('#price_filter').each( function() {
        var $filter_selector = $(this);
        var a = $filter_selector.data("min-value");
        var b = $filter_selector.data("max-value");
        var c = $filter_selector.data("price-sign");
        $filter_selector.slider({
            range: true,
            isRTL: true,
            min: $filter_selector.data("min"),
            max: $filter_selector.data("max"),
            values: [ a, b ],
            slide: function( event, ui ) {
                $( "#flt_price" ).html( ui.values[ 0 ] + c + " - " + ui.values[ 1 ] + c );
                $( "#price_first" ).val(ui.values[ 0 ]);
                $( "#price_second" ).val(ui.values[ 1 ]);
            }
        });
        $( "#flt_price" ).html( $filter_selector.slider( "values", 0 ) +  c  + " - " + $filter_selector.slider( "values", 1 ) +  c  );
    });


});