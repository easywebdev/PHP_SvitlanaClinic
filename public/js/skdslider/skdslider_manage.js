$(document).ready(function(){
    $('#slider').skdslider({
        slideSelector: '.slide',
        delay:5000,
        animationSpeed:2000,
        showNextPrev:true,
        showPlayButton:false,
        autoSlide:true,
        animationType:'fading',
        pauseOnHover: true
    });
});