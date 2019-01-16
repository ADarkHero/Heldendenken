var lastscroll = 0;

$(window).scroll(function() {
    var sleft = $(window).scrollLeft(); //Where is the scroll-bar currently?
    var swidth = $(window).width(); //How big is the users window?
    var maxscroll = window.scrollMaxX || (document.documentElement.scrollWidth - document.documentElement.clientWidth);
    var news = 0;
    
    console.log("sleft " + sleft + " swidth " + swidth + " lastscroll " + lastscroll + " maxscroll " + maxscroll);
    
    if((sleft % swidth !== 0 && sleft !== maxscroll) || sleft === 0){ //Prevents the event from triggering itself
        if(lastscroll < sleft){ //Scroll right
            news = swidth * (Math.floor(sleft/swidth) + 1);
        }
        else if(lastscroll > sleft){ //Scroll left
            news = swidth * (Math.floor(sleft/swidth));  
        }
        $(window).scrollLeft(news);
        lastscroll = news;
    }
    
});