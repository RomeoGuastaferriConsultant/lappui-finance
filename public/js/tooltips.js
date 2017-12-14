// inspired from: https://css-tricks.com/bubble-point-tooltips-with-css3-jquery/
var tooltips = function(list) {
    var $tooltip,
    $body = $('body'),
    $el;
    
    //console.log('tooltips called: ' + list);
    
    return list.each(function(i, el) {
		  
    	  $el = $(el);
	      // fetch tooltip content
	      var content = $el.attr('title');
	      if (!content) {
	    	  // nothing to process (or it has already been done)
	    	  return true;
	      }

	      // make sure DIV not already there
	      // need this ??
	      $('div[data-tooltip-id=' + $el.data('tooltip-id') + ']').remove();
	      
	      // Make DIV and append to page 
	      var $tooltip = $('<div class="tooltip" data-tooltip-id="' 
	    		       + $el.data('tooltip-id') + '">' 
	    		       + content + '<div class="arrow"></div></div>').appendTo("body");

	      // Position right away, so first appearance is smooth
	      var linkPosition = $el.position();
    	  var horizontalOffset = $tooltip.width()/2 - 30;

	      $tooltip.css({
	        top: linkPosition.top - $tooltip.outerHeight() - 18,
	        left: linkPosition.left - horizontalOffset
	      });

	      $el
	      // Get rid of yellow box popup
	      .removeAttr("title")

	      // Mouseenter
	      .hover(function() {

	        $el = $(this);

	        $tooltip = $('div[data-tooltip-id=' + $el.data('tooltip-id') + ']');

	        // Reposition tooltip, in case of page movement e.g. screen resize                        
	        var linkPosition = $el.position();

	        $tooltip.css({
	          top: linkPosition.top - $tooltip.outerHeight() - 18,
	          left: linkPosition.left - horizontalOffset
	        });

	        // Adding class handles animation through CSS
	        $tooltip.addClass("active");

	        // Mouseleave
	      }, function() {

	        $el = $(this);

	        // Temporary class for same-direction fadeout
	        $tooltip = $('div[data-tooltip-id=' + $el.data('tooltip-id') + ']').addClass("out");

	        // Remove all classes
	        setTimeout(function() {
	          $tooltip.removeClass("active").removeClass("out");
	          }, 300);

	        });
	});
}
