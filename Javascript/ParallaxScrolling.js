var velocity = 0.5;

function update(){ 
    var pos = $(window).scrollTop(); 
    $('.our-baker').each(function() { 
        var $element = $(this);
        // Levon valamennyit a magasságból a padding miatt.
        var height = $element.height()-18;
        $(this).css('backgroundPosition', '50% ' + Math.round((height - pos) * velocity) + 'px'); 
    }); 
};

$(window).bind('scroll', update);