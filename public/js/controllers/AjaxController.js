function AjaxController() {
	
	this.get = function(request, handler) {
		$.ajax({
			type: 'GET',
			url: request,
			dataType: 'json',
			success: handler, 
			error: function(a,status,c) {alert(status);}
		});
	}
}

if (!document.controllers)
	document.controllers = new Object();

// add AJAX controller to document controllers
document.controllers.ajax = new AjaxController();
