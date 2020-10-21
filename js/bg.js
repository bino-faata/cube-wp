(function($) {
    $( document ).ready(function() {

    	var classnum = 13;
	    var random = Math.floor(Math.random()*classnum);

		$("body").addClass("body_background_"+random);
		$("body").addClass("body_background_all");
  });
})(jQuery)  