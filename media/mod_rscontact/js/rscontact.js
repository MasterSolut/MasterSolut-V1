var RSContact = {
	init : function ( id, params ) {
			var uniqid = id;
			var msg_len = params.msg_len;
			jQuery("#mod-rscontact-container-" + uniqid).find("input,textarea").each(function() {
				jQuery(this).placeholder();
			});
		
			jQuery("#mod-rscontact-container-" + uniqid).find("#mod-rscontact-message-" + uniqid).each(function(){
				jQuery('<label for="mod-rscontact-counter-' + uniqid + '"><span id="mod-rscontact-counter-' + uniqid + '">' + Joomla.JText._('MOD_RSCONTACT_CHARACTERS_LEFT').replace('%d', msg_len) + '</label>').insertAfter(this);
			});
		
			jQuery("#mod-rscontact-container-" + uniqid).find("#mod-rscontact-message-" + uniqid).each(function(){
				jQuery(this).attr('maxlength', msg_len);
				jQuery(this).keyup(function(){
					jQuery(this).nextAll("label").children("#mod-rscontact-counter-" + uniqid).html(Joomla.JText._('MOD_RSCONTACT_CHARACTERS_LEFT').replace('%d', RSContact.textCounter(this, msg_len)));
				});
			});
			jQuery("#mod-rscontact-container-" + uniqid).find("#mod-rscontact-contact-form-" + uniqid).validate();
		},
		
	textCounter : function ( field, maxlimit ) {
			countfield = maxlimit - field.value.length;
			return countfield;
		},
	
	getValueFromVar : function( field ) {
			var currLocation 	= window.location.search;
			var parts 			= [];
			
			if (currLocation.indexOf('?') > -1) {
				parts = currLocation.split('?');
				if (currLocation.indexOf('&') > -1) {
					parts = parts[1].split('&');
				}
				
				for (var i = 0; i < parts.length; i++) {
					var part 	= parts[i].split('=');
					var key 	= decodeURIComponent(part[0]);
					var value 	= part.length > 1 ? decodeURIComponent(part[1]) : '';
					
					if (key == field) {
						return value;
					}
				}
			}
			return false;
		},
	
	setValue : function(fieldId, urlVar) {
		if (RSContact.getValueFromVar(urlVar)) {
			var field = jQuery(fieldId);
			var value = RSContact.getValueFromVar(urlVar);
			field.val(value);
		}
	}
}

jQuery(document).ready(function()
{	
    jQuery.validator.setDefaults({
		errorClass: "error",
		labelErrorClass: "mod-rscontact-error",
		validClass: "success",
		ignore: ".ignore",
		focusInvalid: true,
		highlight: function(element, errorClass) {
			jQuery(element).fadeIn();
		}, 
        rules: {
				mod_rscontact_salutation: "required",
				mod_rscontact_first_name: {				
							required: true,
							minlength: 2
					},
				mod_rscontact_last_name: {				
							required: true,
							minlength: 2
					},
				mod_rscontact_full_name: {				
							required: true,
							minlength: 2
					},
				mod_rscontact_email: "required",
				mod_rscontact_address_1: {				
							required: true,
							minlength: 2
					},
				mod_rscontact_address_2: {				
							required: true,
							minlength: 2
					},
				mod_rscontact_city: {				
							required: true,
							minlength: 2
					},
				mod_rscontact_states: "required",
				mod_rscontact_zip: {
							required: true,
							alphanumeric: true,
							minlength: 2
					},
				mod_rscontact_home_phone: {
						required: true,
						digits: true,
						minlength: 4
					},
				mod_rscontact_mobile_phone: {
						required: true,
						digits: true,
						minlength: 4
					},
				mod_rscontact_work_phone: {
						required: true,
						digits: true,
						minlength: 4
					},
				mod_rscontact_company: "required",
				mod_rscontact_website: {
						required: true,
						url: true
					},
				mod_rscontact_subject: {				
							required: true
					},
				mod_rscontact_message:  {				
							required: true,
							minlength: 2
					},
				mod_rscontact_cf1:  {				
							required: true
					},
				mod_rscontact_cf2:  {				
							required: true
					},
				mod_rscontact_cf3:  {				
							required: true
					},
				recaptcha_response_field: "required"
				},
		messages: {
				mod_rscontact_salutation: Joomla.JText._('MOD_RSCONTACT_SALUTATION_ERROR'),
				mod_rscontact_first_name: { 	
							required: Joomla.JText._('MOD_RSCONTACT_FIRST_NAME_ERROR'),
							minlength: Joomla.JText._('MOD_RSCONTACT_MIN_LENGTH_ERROR')
					},
				mod_rscontact_last_name: {
							required:  Joomla.JText._('MOD_RSCONTACT_LAST_NAME_ERROR'),
							minlength: Joomla.JText._('MOD_RSCONTACT_MIN_LENGTH_ERROR')
					},
				mod_rscontact_full_name: {
							required: Joomla.JText._('MOD_RSCONTACT_FULL_NAME_ERROR'),
							minlength: Joomla.JText._('MOD_RSCONTACT_MIN_LENGTH_ERROR')
					},
				mod_rscontact_email: 		Joomla.JText._('MOD_RSCONTACT_EMAIL_ERROR'),
				mod_rscontact_address_1: {
							required: Joomla.JText._('MOD_RSCONTACT_ADDRESS_1_ERROR'),
							minlength: Joomla.JText._('MOD_RSCONTACT_MIN_LENGTH_ERROR')
					},
				mod_rscontact_address_2: {
							required: Joomla.JText._('MOD_RSCONTACT_ADDRESS_2_ERROR'),
							minlength: Joomla.JText._('MOD_RSCONTACT_MIN_LENGTH_ERROR')
					},
				mod_rscontact_city: {
							required: Joomla.JText._('MOD_RSCONTACT_CITY_ERROR'),
							minlength: Joomla.JText._('MOD_RSCONTACT_MIN_LENGTH_ERROR')
					},
				mod_rscontact_states: 		Joomla.JText._('MOD_RSCONTACT_STATE_ERROR'),
				mod_rscontact_zip: {
						required: Joomla.JText._('MOD_RSCONTACT_ZIP_ERROR'),
						alphanumeric: Joomla.JText._('MOD_RSCONTACT_ZIP_NOT_A_ALPHANUMERIC_ERROR')
					},
				mod_rscontact_home_phone: {
						required: Joomla.JText._('MOD_RSCONTACT_HOME_PHONE_ERROR'),
						digits: Joomla.JText._('MOD_RSCONTACT_PHONE_NOT_A_NUMBER_ERROR')
						},
				mod_rscontact_mobile_phone: {
						required: Joomla.JText._('MOD_RSCONTACT_MOBILE_PHONE_ERROR'),
						digits: Joomla.JText._('MOD_RSCONTACT_PHONE_NOT_A_NUMBER_ERROR')
						},
				mod_rscontact_work_phone: {
						required: Joomla.JText._('MOD_RSCONTACT_WORK_PHONE_ERROR'),
						digits: Joomla.JText._('MOD_RSCONTACT_PHONE_NOT_A_NUMBER_ERROR')
						},
				mod_rscontact_company: {
						required: Joomla.JText._('MOD_RSCONTACT_COMPANY_ERROR'),
						minlength: Joomla.JText._('MOD_RSCONTACT_MIN_LENGTH_ERROR')
					},
				mod_rscontact_website: {
						required: Joomla.JText._('MOD_RSCONTACT_WEBSITE_ERROR'),
						minlength: Joomla.JText._('MOD_RSCONTACT_MIN_LENGTH_ERROR')
					},
				mod_rscontact_subject: {
						required: Joomla.JText._('MOD_RSCONTACT_SUBJECT_ERROR')
					},
				mod_rscontact_message: {
						required: Joomla.JText._('MOD_RSCONTACT_MESSAGE_ERROR'),
						minlength: Joomla.JText._('MOD_RSCONTACT_MIN_LENGTH_ERROR')
					},
				recaptcha_response_field: ''
				},		
		submitHandler: function(validator, event) {
				event.preventDefault();
				var out = {};
				var id = jQuery(validator).find("#mod-rscontact-module-id").val();
				var counter = jQuery(validator).find("#mod-rscontact-message").attr('maxLength');
				var value 	= jQuery(validator).serializeArray();
				jQuery.each(value, function(i, field){
						out[field.name] = field.value;
						});
	
				jQuery(validator).find('#mod-rscontact-submit-btn-' + id).attr("disabled", "disabled");
				jQuery(validator).find('#loading-' + id).fadeIn(4000).fadeOut(500);
					
				request = {
					'option' : 'com_ajax',
					'module' : 'rscontact',
					'data'   : out,
					'format' : 'jsonp'
				};
				jQuery.ajax({
					type   : 'POST',
					data   : request,
					success: function (response){
							response = JSON.parse(response);
							if(response.status == 0) {
								jQuery('#mod-rscontact-error-msg-' + id).hide().html('<div class="alert alert-error">' + response.message + '</div>').fadeIn().delay(1000).fadeOut(5000);
								jQuery(validator).find('#mod-rscontact-submit-btn-' + id).removeAttr("disabled");
								jQuery(validator).find('#loading-' + id).hide();
							}
								
							if(response.status == 1){
								jQuery(validator).nextAll('#mod-rscontact-msg-' + id).hide().html('<div class="alert alert-success">' + response.message + '</div>').delay(500).fadeIn();
								if(response.warnings.length > 0){
									jQuery(validator).nextAll('#mod-rscontact-warning-msg-' + id).hide().html('<div class="alert alert-warning"></div>').delay(500).fadeIn();
									jQuery.each(response.warnings, function(i, value) {
										jQuery(".alert-warning").append(value + '<br />');
									});
								}
								
								jQuery(validator).fadeOut(500, function(){ 
									jQuery(this).remove(); 
								}) ;
								jQuery('html, body').animate({
									scrollTop: jQuery(validator).offset().top-10
								}, 2000);								
							}	
					},
					error: function (response) {
						response = JSON.parse(response);
						jQuery(validator).find('#mod-rscontact-error-msg-' + id).hide().html('<div class="alert alert-error">' + response.message + '</div>').fadeIn().delay(2000).fadeOut(5000);
					}
				});
			return false;
		}
     });
});