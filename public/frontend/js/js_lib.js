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
