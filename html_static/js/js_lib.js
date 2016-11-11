/*===============================================================================================================	
Author     : Muhammad Febriansyah
Date       : September 2016
 =============================================================================================================== */

 function newsSlider() {
    var sliderhome = $('#newsSlider').bxSlider({
        speed: 1000,
        pause: 5000,
        auto: true,
        pager:false,
        onSliderLoad: function (currentSlide) {
            animCaption("in");
        },
        onSlideBefore: function (currentSlide) {
            animCaption("out");
        },
        onSlideAfter: function (currentSlide) {
            animCaption("in");
        }
    });   
};
function animCaption(type) {
    if (type === "in") {
        TweenMax.to($('#homeSlider .captions'), 1, {
            css: {
                'opacity': '1',
                'left': '0px'
            },
            delay: 0,
            ease: Quart.easeOut
        });
        TweenMax.to($('#homeSlider .text-caption'), 1, {
            css: {
                'opacity': '1',
                'left': '0'
            },
            delay: 0.5,
            ease: Quart.easeOut
        });
    } else {
        TweenMax.to($('#homeSlider .captions'), 1, {
            css: {
                'opacity': '0',
                'left': '-300px'
            },
            delay: 0,
            ease: Quart.easeOut
        });
        TweenMax.to($('#homeSlider .text-caption'), 1, {
            css: {
                'opacity': '0',
                'left': '-100px'
            },
            delay: 0.5,
            ease: Quart.easeOut
        });
    }
};
$.fn.accordion_custom = function () {
    $(".page").click(function (e) {
        if (!$(this).is('.active')) {
            $(".page,.content").removeClass('active');
            $(".page").siblings('.content:visible').slideUp("slow");
            $(this).addClass('active');
            $(this).siblings('.content').slideDown("slow");
            $(this).siblings('.content').addClass("active");
        } else {
            $(this).removeClass('active');
            $(this).siblings('.content').slideUp("slow");
        }
    });
}
function galleryDetail() {
    var b = $(".slidegal").bxSlider({
        mode: "horizontal",
        captions: true,
        auto: false,
        controls: false,
        pager: true,
        pagerCustom: ".pager-album",
        speed: 1100,
        infiniteLoop: false
    });
    var a = $(".pager-album").bxSlider({
        minSlides: 1,
        maxSlides: 6,
        slideWidth: 150,
        slideMargin: 10,
        moveSlides: 1,
        auto: false,
        pager: false,
        infiniteLoop: false
    });
    $(".pager-album li").on("click", "a", function(c) {
        c.preventDefault();
        b.stopAuto();
        b.goToSlide($(this).attr("data-slideIndex"))
    })
}

function productHome(){    
    $('.capSub').click(function(e){
         e.preventDefault()
        var recentId = $(this).attr('data-kanalId');
        var imageUrl = $(this).attr('data-imageUrl');
        console.log(recentId);
        $('#productBgnya').css('background-image', 'url(' + imageUrl + ')');
        $('.left-capProduct').addClass('hide');
        $('#'+recentId).removeClass('hide');

    });
}

function productDetail(){    
    $('.tableClick').click(function(e){
         e.preventDefault()
        var recenttableId = $(this).attr('data-tableID');
        console.log(recenttableId);
        $('.table-data').addClass('hide');
        $('#'+recenttableId).removeClass('hide');

    });
}
function tabSearch(){ 
    $('.tabsSearch').click(function(event){
         event.preventDefault()
        var recentId = $(this).attr('data-tabId');
        console.log(recentId);
        $('.tabsSearch').removeClass('active');
        $(this).addClass('active');
        $('.content-tab').addClass('hide');
        $('#'+recentId).removeClass('hide');
    });
}
