
; /* Start:"a:4:{s:4:"full";s:100:"/local/templates/webcat/components/bitrix/news.list/new_Slider_For_Services/script.js?15180852444095";s:6:"source";s:85:"/local/templates/webcat/components/bitrix/news.list/new_Slider_For_Services/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(document).ready(function () {
    // переход по слайдам
    var radialBar = document.getElementsByClassName('radial-bar');
    // картинки слайдера
    var sliderItem = document.getElementsByClassName('item-srvises');
    //текст слайдера
    var bannerText = document.getElementsByClassName('banner-text');
    var percent = 0,
        interval = 50,//it takes about 6s, interval=20 takes about 4s
        $bar = $('.transition-timer-carousel-progress-bar'),
        $crsl = $('#myCarousel');

    //событие при клике на ссылки слайдера
    $('.radial-bar').click(function () {
        //обнуление анимации ссылок
        nextAnimateObject($(this).attr('data-slide-to'));

        //смена текста
        nextText($(this).attr('data-slide-to'));
    });

    /*line above just for showing when controls are clicked the bar goes to 0.5% to make more friendly,
    if you want when clicked set bar empty, change on width:0.5 to width:0*/
    $crsl.carousel({//initialize
        interval: false,
        pause: true
    }).on('slide.bs.carousel', function () {
        percent = 0;
    });//This event fires immediately when the bootstrap slide instance method is invoked.
    function progressBarCarousel() {
        percent = percent + 0.5;
        //запуск анимации ссылок
        $(".banner .active .js-radial-mask").css('transform', 'rotate(' + 1.8 * percent + 'deg)');
        $(".banner .active .js-radial-fill").css('transform', 'rotate(' + 1.8 * percent + 'deg)');
        $(".banner .active .js-radial-fill_fix").css('transform', 'rotate(' + 3.6 * percent + 'deg)');

        // $(".js-radial-mask").css('transform', 'rotate(' + 1.8 * percent + 'deg)');
        // $(".js-radial-fill").css('transform', 'rotate(' + 1.8 * percent + 'deg)');
        // $(".js-radial-fill_fix").css('transform', 'rotate(' + 3.6 * percent + 'deg)');

        //пкркход на следующий слайд
        if (percent >= 100) {
            percent = 0;
            $crsl.carousel('next');

            //цикл для определения номера активного объекта
            for (var i = 0; i < sliderItem.length; i++) {
                if (sliderItem[i].classList.contains('active')) {

                    //обнуление анимации ссылок
                    nextAnimateObject(i);

                    //смена текста
                    nextText(i)
                }
            }
        }
    }
    var barInterval = setInterval(progressBarCarousel, interval);//set interval to progressBarCarousel function
    if (!(/Mobi/.test(navigator.userAgent))) {//tests if it isn't mobile
        $crsl.hover(function () {
                clearInterval(barInterval);
            },
            function () {
                barInterval = setInterval(progressBarCarousel, interval);
            }
        );
    }else{
        barInterval = setInterval(progressBarCarousel, interval);
    }

    // function для смены ссылок слайдера
    function nextAnimateObject(objectNumber){
        $(".banner .active .js-radial-mask").css('transform', 'rotate(' + 0 + 'deg)');
        $(".banner .active .js-radial-fill").css('transform', 'rotate(' + 0 + 'deg)');
        $(".banner .active .js-radial-fill_fix").css('transform', 'rotate(' + 0 + 'deg)');
        $('.radial-bar').removeClass('active');
        slidesNumber(radialBar[objectNumber]);
    }


    // function для смены текста
    function nextText(numberTextActive) {
        $('.banner-text').addClass('shutdown_text');
        setTimeout(function() {
            $('.banner-text').removeClass('shutdown_text');
            $('.banner-text').removeClass('active');
            slidesNumber(bannerText[numberTextActive]);
        }, 300);

    }
});

function slidesNumber(number) {
    number.classList.add('active');

}


/* End */
;
; /* Start:"a:4:{s:4:"full";s:83:"/local/templates/webcat/components/bitrix/news.list/partners/script.js?151617099937";s:6:"source";s:70:"/local/templates/webcat/components/bitrix/news.list/partners/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(document).ready(function(){
 
});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:97:"/local/templates/webcat/components/bitrix/news.list/slider_For_Portfolio/script.js?15181585113645";s:6:"source";s:82:"/local/templates/webcat/components/bitrix/news.list/slider_For_Portfolio/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(document).ready(function () {
    // переход по слайдам
    var radialBar = document.getElementsByClassName('radial-bar-portfolio ');
    // картинки слайдера
    var sliderItem = document.getElementsByClassName('lastwork-second-banner-img-container');
    //текст слайдера
    var bannerText = document.getElementsByClassName('lastwork-second-banner-text-conainer');
    var percentPortfolio = 0,
        intervalPortfolio = 80,//it takes about 6s, interval=20 takes about 4s
        $barPortfolio = $('.transition-timer-carousel-progress-bar'),
        $crslPortfolio = $('#myCarousel-for-portfolio');

    //событие при клике на ссылки слайдера
    $('.radial-bar-portfolio').click(function () {
        //обнуление анимации ссылок
        nextAnimateObject($(this).attr('data-slide-to'));

        //смена текста
        nextText($(this).attr('data-slide-to'));
    });

    /*line above just for showing when controls are clicked the bar goes to 0.5% to make more friendly,
    if you want when clicked set bar empty, change on width:0.5 to width:0*/
    $crslPortfolio.carousel({//initialize
        intervalPortfolio: false,
        pause: true
    }).on('slide.bs.carousel', function () {
        percentPortfolio = 0;
    });//This event fires immediately when the bootstrap slide instance method is invoked.
    function progressBarCarouselPortfolio() {
        percentPortfolio = percentPortfolio + 1;
        //запуск анимации ссылок
        //пкркход на следующий слайд
        if (percentPortfolio >= 100) {
            percentPortfolio = 0;
            $crslPortfolio.carousel('next');

            //цикл для определения номера активного объекта
            for (var i = 0; i < sliderItem.length; i++) {
                if (sliderItem[i].classList.contains('active')) {
                    //обнуление анимации ссылок
                    nextAnimateObject(i);
                    //смена текста
                    nextText(i)
                }
            }
        }
    }
    var barIntervalPortfolio = setInterval(progressBarCarouselPortfolio, intervalPortfolio);//set interval to progressBarCarousel function
    if (!(/Mobi/.test(navigator.userAgent))) {//tests if it isn't mobile
        $crslPortfolio.hover(function () {
                clearInterval(barIntervalPortfolio);
            },
            function () {
                barIntervalPortfolio = setInterval(progressBarCarouselPortfolio, intervalPortfolio);
            }
        );
    } else {
        barIntervalPortfolio = setInterval(progressBarCarouselPortfolio, intervalPortfolio);
    }

    // function для смены ссылок слайдера
    function nextAnimateObject(objectNumber) {
        $('.radial-bar-portfolio').removeClass('active');
        slidesNumber(radialBar[objectNumber]);
    }


    // function для смены текста
    function nextText(numberTextActive) {
        $('.lastwork .lastwork-second-banner-text-conainer').addClass('shutdown_text');
        setTimeout(function () {
            $('.lastwork-second-banner-text-conainer').removeClass('shutdown_text');
            $('.lastwork-second-banner-text-conainer').removeClass('active');
            slidesNumber(bannerText[numberTextActive]);
        }, 400);

    }
});

function slidesNumber(number) {
    number.classList.add('active');
}


/* End */
;
; /* Start:"a:4:{s:4:"full";s:81:"/local/templates/webcat/components/bitrix/news.list/team/script.js?15157430895008";s:6:"source";s:66:"/local/templates/webcat/components/bitrix/news.list/team/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
if(document.documentElement.clientWidth > 1600){

    var polzSpeed2 = 50;
    var timer2 = 120;
    var prirost2 = 120;
} else{

    var polzSpeed2 = 50;
    var timer2 = 80;
    var prirost2 = 80;
}
timeForOneSlide2 = polzSpeed2 * timer2;
function nextSlide2(current2, next2){
    slides2[current2].style.animation = "opacityToggleDNone2 0.5s";
    var timeoutVarCurrent2 = current2;

    setTimeout(function () {
        slides2[timeoutVarCurrent2].style.display = "none";
        slides2[timeoutVarCurrent2].style.animation = "";
    }, 400);


    timeoutVarNext2 = next2;

    setTimeout(function () {
        slides2[timeoutVarNext2].style.display = "block";
        slides2[timeoutVarNext2].style.animation = "opacityToggle2 2s";
    }, 400);




    $(slidesImg2[current2]).addClass("animateClass");
    var timeoutImgVarCurrent2 = current2;
    setTimeout(function () {
        slidesImg2[timeoutImgVarCurrent2].style.display = "none";
        $(slidesImg2[current2]).removeClass("animateClass");
    }, 400);

    var timeoutImgVarNext2 = next2;
    setTimeout(function () {
        slidesImg2[timeoutImgVarNext2].style.display = "block";
    }, 400);
}



function slideExtinction2(current2, next2){

    //убираем старый текст
    var timeoutVarCurrent2 = current2;

    slides2[timeoutVarCurrent2].style.animation = "opacityToggleDNone2 0.5s";
    setTimeout(function () {
        slides2[timeoutVarCurrent2].style.display = "none";
        slides2[timeoutVarCurrent2].style.animation = "";
    }, 400);
    var timeoutVarNext2 = next2;

    slides2[timeoutVarNext2].style.animation = "opacityToggleDNone2 0.5s";
    setTimeout(function () {
        slides2[timeoutVarNext2].style.display = "none";
        slides2[timeoutVarNext2].style.animation = "";
    }, 400);
    $(slidesImg2[next2]).addClass("animateClass");

    //убираем старое изображение
    var timeoutImgVarCurrent2 = next2;
    setTimeout(function () {
        slidesImg2[timeoutImgVarCurrent2].style.display = "none";
        $(slidesImg2[timeoutImgVarCurrent2]).removeClass("animateClass");
    }, 400);


    $(slidesImg2[current2]).addClass("animateClass");
    var timeoutImgVarCurrentNew2 = current2;
    setTimeout(function () {
        slidesImg2[timeoutImgVarCurrentNew2].style.display = "none";
        $(slidesImg2[timeoutImgVarCurrentNew2]).removeClass("animateClass");
    }, 400);

}
function slideAppearance2(current2, next2){

    var timeoutImgVarNext2 = next2;
    $(slidesImg2[next2]).removeClass("animateClass");
    setTimeout(function () {
        slidesImg2[timeoutImgVarNext2].style.display = "block";
        slidesImg2[current2].style.display = "none";
    }, 400);


    timeVarNext2 = next2;
    setTimeout(function () {
        slides2[timeVarNext2].style.display = "block";
        slides2[timeVarNext2].style.animation = "opacityToggle2 2s";
    }, 400);
}





function sliderMetka2(a) {
    for(i = 0; i <= count2; i++){
        if (a.id == "slide2punct"+i.toString()) {

            slideExtinction2(current2, next2);

            next2 = count2 - i;
            current2 = next2+1;
            if(current2>count2){
                current2 = 0;
            }


            slideAppearance2(current2, next2);

            timer2 = prirost2*i;

            timePassed2 = timeForOneSlide2*i + 200;


            polz2[1].style.marginLeft = prirost2*i + "px";
            stop2();
        }
    }
}





function stop2(){
    clearInterval(play2);
    s2.style.display = "none";
    p2.style.display = "block";
    pp = timePassed2;
}

function start2() {

    p2.style.display = "none";
    s2.style.display = "block";
    m2 = Date.now();
    play2 = setInterval(move2, 20);
}
function move2() {
    timePassed2 = Date.now() - m2 + pp;
    if (timePassed2 > timeForFullSlider2 - timeForOneSlide2){
        if (g2 == true) {
            polz2[1].style.marginLeft = parseInt(computedStyle2.marginLeft) + 3 + "px";
            g2  = false;
        }
    }

    if (timePassed2 < timeForFullSlider2 - timeForOneSlide2){
        polz2[1].style.marginLeft = timePassed2 / polzSpeed2 + 'px';
    }

    if (timePassed2 > timeForFullSlider2){

        clearInterval(play2);
        pp = 0;
        timer2 = 0;
        polz2[1].style.marginLeft = 0 +"px";
        g2 = true;
        start2();
    }
    if (Math.round(parseInt(computedStyle2.marginLeft))/timer2>=1){
        timer2 = timer2 +prirost2;
        nextSlide2(current2, next2);




            next2  =  Math.round(count2 - Math.round(parseInt(computedStyle2.marginLeft))/prirost2);
            // alert(next2);


        current2 = next2;
         next2 = next2 - 1;
        if (next2<0){
            next2 = count2 ;
        }
        // alert(next2);

    }
    size2 = parseInt(computedStyle2.marginLeft);
}
/* End */
;; /* /local/templates/webcat/components/bitrix/news.list/new_Slider_For_Services/script.js?15180852444095*/
; /* /local/templates/webcat/components/bitrix/news.list/partners/script.js?151617099937*/
; /* /local/templates/webcat/components/bitrix/news.list/slider_For_Portfolio/script.js?15181585113645*/
; /* /local/templates/webcat/components/bitrix/news.list/team/script.js?15157430895008*/
