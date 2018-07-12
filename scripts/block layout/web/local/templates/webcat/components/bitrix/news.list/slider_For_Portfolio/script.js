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

