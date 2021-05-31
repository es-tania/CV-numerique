var parallax = $('.parallax');

$(window).scroll(function(){
    let offset = $(window).scrollTop();
    $(parallax).css('background-position-y' , offset*0.7+'px');
})
