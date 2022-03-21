$(document).ready(function(){	

	$('.scroll-to').click(function() {
       var elementClicked = $(this).attr("title");
       var destination = $('#' + elementClicked).offset().top;
       $("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, 2000, 'easeOutExpo');
       return false;
    });

    
});
