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

