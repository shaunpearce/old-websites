$(document).ready(function(){
    
    function headerFullHeight(){
        var windowheight = $( window ).height();
        var windowwidth = $( window ).width();
        var containerheight = $("#header-container").height(); 
        
        if(windowwidth > 1199){
             if( windowheight > 650 && windowheight < 1000) {
                  $("#header-container").css("height", (windowheight - 50));
             }
             else if(windowheight > containerheight && windowheight > 900) {
                  $("#header-container").css("height", "1000px");
             }
             else if(windowheight > containerheight && windowheight < 650) {
                  $("#header-container").css("height", "650px");
             }
        }
        else if(windowwidth <= 1199 && windowwidth > 768){
            $("#header-container").css("height", "600px");
        }
        else if(windowwidth <= 768 && windowwidth > 425){
            $("#header-container").css("height", "400px");
        }
        else if(windowwidth <= 425 && windowwidth > 320){
            $("#header-container").css("height", "300px");
        }
        else if(windowwidth <= 320){
            $("#header-container").css("height", "300px");
        }
    }

    function headerScreenshotSize(){
        var headerPhoneContainerWidth = $("#header-phone-container").width(); 
        var headerPhoneContainerHeight = $("#header-phone-container").height(); 
        
        if(headerPhoneContainerWidth < 434 && headerPhoneContainerHeight > 768){  
            $("#header-screenshot").css("width", "100%");
            $("#header-screenshot").css("height", "auto");
        }
        else {  
            $("#header-screenshot").css("height", "100%");
            $("#header-screenshot").css("width", "auto");
        }
    }
        
    function unsubscribeFullHeight(){
        var windowheight = $( window ).height();
        var windowwidth = $( window ).width();
        var containerheight = $("#unsubscribe-section").height(); 
        
        var unsubscribeHeight = $( window ).height() - $("#nav-bar").height() - $("#footer-container").height();
        
        $("#unsubscribe-section").css("height", unsubscribeHeight);
        
    }
    
    headerFullHeight();
    headerScreenshotSize();
    unsubscribeFullHeight();
    
    $(window).resize(function(){
        headerFullHeight();
        headerScreenshotSize();
        unsubscribeFullHeight();
    });
    
});




