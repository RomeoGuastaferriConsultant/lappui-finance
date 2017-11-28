/* source: http://inspirationalpixels.com/tutorials/creating-tabs-with-html-css-and-jquery */

jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
        
        if (currentAttrValue == '#tab4' || currentAttrValue == '#tab5') {
        	// rapports et budgets désactivés pour l'instant
        	return;
        }
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).fadeIn(400).siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
        
        e.preventDefault();
    });
});