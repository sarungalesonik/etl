var de = {
	ui: {},
	application: {},
	serviceApiUrl: {},
	Validate : {},
};

de.application.AuthUser = null;
de.application.UserProfile = null;

de.serviceApiUrl.webHost = '';


de.Validate.Aplhanumval = function(elem){
	alert();
	return this.optional(elem) || /^[\w.]+$/i.test($(elem).val());
}

jQuery.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^([a-z\d\-_\s]+|[0-9.-]+)+$/i.test(value);
}, "Alphanumeric only please");

jQuery.validator.addMethod("lettersonly", function(value, element) {
	return this.optional(element) || /^[a-zA-Z ]*$/i.test(value);
  }, "Letters only please"); 

jQuery.validator.addMethod("decimal", function(value, element) {
return this.optional(element) || /^\d*\.?\d*$/i.test(value);
}, "Invalid format");

jQuery.validator.addMethod('le', function (value, element, param) {
	return this.optional(element) || parseInt(value) < parseInt($(param).val());
}, 'Invalid value');

jQuery.validator.addMethod('ge', function (value, element, param) {
	return this.optional(element) || parseInt(value) > parseInt($(param).val());
}, 'Invalid value');

jQuery.validator.addMethod(
	"regex",
	function(value, element, regexp) {
		var re = new RegExp(regexp);
		return this.optional(element) || re.test(value);
	},
	"Please check your input."
);
de.application.ajaxWrapper = function (options) {
	try {
		$.ajax({
			url: options.url,
			method: 'POST',
			data: options.data,
			contentType: "application/json; charset=utf-8",
			dataType: "json",
			crossDomain: true,
			success: function (result) {
				options.success(result);			

			},
			error: function (jqXHR, exception) {
				options.error(de.application.ajaxErrorHandler(jqXHR, exception));
			}
		});
	} catch (e) {
		options.error(e.message);
	}
};

de.application.ajaxErrorHandler = function (jqXHR, exception) {
	try {
		var strmessage = '';

		if (jqXHR.status === 0) {
			strmessage = 'Not connect.\n Verify Network.';
		} else if (jqXHR.status == 404) {
			strmessage = 'Requested page not found. [404]';
		} else if (jqXHR.status == 500) {
			strmessage = 'Internal Server Error [500].';
		} else if (exception === 'parsererror') {
			strmessage = 'Requested JSON parse failed.';
		} else if (exception === 'timeout') {
			strmessage = 'Time out error.';
		} else if (exception === 'abort') {
			strmessage = 'Ajax request aborted.';
		} else {
			strmessage = 'Uncaught Error.\n' + jqXHR.responseText;
		}

		return strmessage;
	} catch (e) {
		return e.message;
	}
};

de.application.checkLogin = function () {
	var path = window.location.pathname;
	var thisPath = path.split('/');

	if (localStorage.getItem("AuthUser")) {
		de.application.AuthUser = JSON.parse(localStorage.getItem("AuthUser"));
		if (de.application.AuthUser.IndividualId != '') {
			if (thisPath[thisPath.length - 1] == 'index.php') {
				//$('#btnProfileHome').html('<i class="icon ion-person" ></i><span class="wrap-text">' + de.application.AuthUser.UserName + '</span>');
			} else {
				window.location = 'index.php';
			}
		}
	} else {
		if (thisPath[thisPath.length - 1] == 'registration.html' || thisPath[thisPath.length - 1] == 'login.html' || thisPath[thisPath.length - 1] == 'forgot-password.html') {
			//
		} else {
			window.location = 'login.php';
		}
	}
}

de.ui.notify = function (title, message) {
	swal({
		type: "error",
		title: title,
		text: message
	});

	
};

de.ui.dialog = function (title, message) {
	swal({
		type: "info",
		title: title,
		text: message,
		animation: false,
		showConfirmButton: false,
		html: true,
		allowEscapeKey: false
	});
};

de.application.goBack = function () {
	window.history.back();
}

de.application.logout = function () {

	
		localStorage.removeItem("AuthUser");
		window.location = 'login.html';
	


}
