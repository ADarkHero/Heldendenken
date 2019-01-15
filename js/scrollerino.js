var lastscroll = 0;

$(window).scroll(function() {
    var sleft = $(window).scrollLeft();
    var swidth = $(window).width();

    if(lastscroll < sleft){
        var news = sleft + swidth;
        $(window).scrollLeft(news);
        lastscroll = sleft; 
    }
    else if(lastscroll > sleft){
        var news = sleft - swidth;
        $(window).scrollLeft(news);
        lastscroll = sleft;
    }
    
});