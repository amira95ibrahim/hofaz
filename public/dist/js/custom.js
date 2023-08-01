if($(".list-slides").length > 0){
    var owl = $(".list-slides").owlCarousel({
        items:1,
        loop:true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin:0,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        rtl:true,
        nav:false,
        dots:true,
        video: true,
        videoWidth: false, // Default false; Type: Boolean/Number
        videoHeight: false, // Default false; Type: Boolean/Number
        // videoWidth: 300,
        // videoHeight: 300,
    });

    owl.on('changed.owl.carousel', function(event) {
        if( $(this).find('.owl-item.active').next().find('div').hasClass('item-video') ){
            let video = $(this).find('.owl-item.active').next().find('.item-video video')
            video.get(0).play();
            owl.trigger('stop.owl.autoplay');

            $(video).bind('stop pause', function(e) {
                owl.trigger('play.owl.autoplay');
            });
        }
    })

    // $('.item-video video').on('play', function() {
    //     owl.trigger('owl.stop');
    //     console.log('video -> play')
    // });
    // $('.item-video video').on('ended',function(){
    //     owl.trigger('owl.play', 5000);
    //     console.log('video -> ended')
    // });

    // owl.on('changed.owl.carousel', function(event) {
    //     if( $(this).find('.owl-item.active > div').hasClass('item-video') ){
    //         console.log('video ->')
    //     }else{
    //         console.log('photo ->')
    //     }
    // })
}


if($(".list-projects").length > 0){
    $(".list-projects").owlCarousel({
        items:1,
        loop:true,
        margin:0,
        autoplay:true,
        autoplayTimeout:9000,
        autoplayHoverPause:true,
        rtl:true,
        nav:true,
        dots:true,
    });
}


if($(".list-news").length > 0){
    $(".list-news").owlCarousel({
        items:1,
        loop:true,
        margin:0,
        autoplay:true,
        autoplayTimeout:9000,
        autoplayHoverPause:true,
        rtl:true,
        nav:true,
        dots:false,
    });
}
if($(".list-achievements").length > 0){
    $(".list-achievements").owlCarousel({
        items:2,
        loop:true,
        margin:0,
        autoplay:true,
        autoplayTimeout:9000,
        autoplayHoverPause:true,
        rtl:true,
        nav:true,
        dots:true,
    });
}
if($(".list-publications").length > 0){
    $(".list-publications").owlCarousel({
        items:1,
        loop:true,
        margin:0,
        autoplay:true,
        autoplayTimeout:9000,
        autoplayHoverPause:true,
        rtl:true,
        nav:true,
        dots:true,
    });
}


if($(".open-search").length > 0){
    $(".open-search").on('click', function(){
        $(this).closest(".search").find("form").toggleClass('active');
    });
}



if ($(window).width() < 786) {
    var list = $("ul.menu li  a");
        list.click(function (event) {
        var submenu = this.parentNode.getElementsByTagName("ul").item(0);
        if(submenu!=null){
            event.preventDefault();
            $(submenu).slideToggle('fast');
            $(submenu).closest("li").toggleClass("active");
        }
    });

    $('.toggleMenu').on('click', function(){
        $('.menu').toggleClass('open');
    });
}
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 300) {
        $("header").addClass("scroll-fixed");
    } else {
        $("header").removeClass("scroll-fixed");
    }
});

$(".numberOnly").on("keypress keyup blur", function (event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});