$(document).ready(function () {
    $(".Send-Message-One-Product").click(function (){
       $(this).parents('li').find('form').stop().slideToggle(200);
    });
    $("#ItemRightToRight").hover(function (){
        $(this).find('div').stop().slideDown(200);
    },function (){
        $(this).find('div').stop().slideUp(200);

    })
    $("#Btn-View-Message").click(function (){
        $(this).css({'border-bottom' : '2px solid #ff6a6a'})
        $("#Btn-View-Attr").css({'border-bottom' : '2px solid #ececec'})
        $("#Top-Panel-Pne_product-Attr").stop().slideUp(200)
        $("#Top-Panel-Pne_product-Message").stop().slideDown(200)
    })
    $("#Btn-View-Attr").click(function (){
        $(this).css({'border-bottom' : '2px solid #ff6a6a'})
        $("#Btn-View-Message").css({'border-bottom' : '2px solid #ececec'})
        $("#Top-Panel-Pne_product-Attr").stop().slideDown(200)
        $("#Top-Panel-Pne_product-Message").stop().slideUp(200)
    })
    $(".ItemSearch i").click(function (){
       $(this).parent('span').animate({'height' : '54px' },500)
        $(this).css({'transform': 'rotate(90deg)'} , 200)
    });
    $(".ViewProductM i").click(function (){
        $(".ViewProductM").stop().fadeOut(200);
        $("#ViewErr").stop().fadeOut(200);
    });
    $(".BackIconZoom").click(function (){
       var id = $(this).attr('id');
        $(".ViewProductM"+id).stop().fadeIn(200);
        $("#ViewErr").stop().fadeIn(200);
    });
    $(".ItemMenuName").hover(function (){
        var id=$(this).attr('id');
        $('#YouMenuItemShit'+id).stop().slideDown();
        $("#YouMenuItemShit"+id).hover(function (){
            $(this).stop().slideDown();
        },function (){
            $(this).stop().slideUp();
        })
    },function (){
        var id=$(this).attr('id');
        $('#YouMenuItemShit'+id).stop().slideUp();
    })
    $('#ViewSliderShit').cycle();
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,

        responsiveClass:true,
                    responsive:{
                        0:{
                            items:1,
                            nav:true
                        },
                        600:{
                            items:3,
                            nav:false
                        },
                        1000:{
                            items:5,
                        }
                    }
    })
    $('.center').slick({
        centerMode: true,
        centerPadding: '10px',
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1285,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 1019,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 881,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    })

})
