// inspired from: https://css-tricks.com/bubble-point-tooltips-with-css3-jquery/
var tooltips = function(list) {
    var $tooltip,
    $body = $('body'),
    $el;
    
    //console.log('tooltips called: ' + list);
    
    return list.each(function(i, el) {
		
	      $el = $(el).attr("data-tooltip", i);

	      // fetch tooltip content
	      var content = $el.attr('title');
	      if (!content) {
	    	  // nothing to process
	    	  // console.log('tooltip: nothing to process - bye bye!');
	    	  return;
	      }
	      
	      // Make DIV and append to page 
	      var $tooltip = $('<div class="tooltip" data-tooltip="' + i + '">' + content + '<div class="arrow"></div></div>').appendTo("body");

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

	        $tooltip = $('div[data-tooltip=' + $el.data('tooltip') + ']');

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
	        $tooltip = $('div[data-tooltip=' + $el.data('tooltip') + ']').addClass("out");

	        // Remove all classes
	        setTimeout(function() {
	          $tooltip.removeClass("active").removeClass("out");
	          }, 300);

	        });
	});
    
    // remove marker
}

var tooltipsRemove = function(list) {
    var $el;
	// first remove all current tooltip divs
	$('div[data-tooltip]').remove();

    return list.each(function(i, el) {
    	// remove data-tooltip attribute
    	$el = $(el).removeAttr("data-tooltip");
    	
    	// remove event handlers
    	$el.off();
	});
}
