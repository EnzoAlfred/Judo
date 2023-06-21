var json = {
    "fadeInLeft" : $('#article')
};

function checkVisible( $elem ) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $elem.offset().top;
    var elemHalfHeight = $elem.height()/2;
    var elemBottom = elemTop + elemHalfHeight;

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

$(window).scroll(function() { 
    for( let key in json ) {
        let elements = json[key];
        
        for( let $el of elements ) {
            if( checkVisible( $el ) ) {
                $el.addClass( key + 'animated' );
                $el.removeClass("hidden");
            }
        }
    };
});