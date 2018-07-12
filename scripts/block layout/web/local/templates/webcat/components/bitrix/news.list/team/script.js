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