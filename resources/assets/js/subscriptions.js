var subscriptions = {
	init: function() {
		var self = this;
		self.getPlans();
		self.add_listing();
	},

	getPlans: function() {
		var start = function() {
			$('.plan-select').on('change', setPlans);
		},
		setPlans = function() {
			var subscription = $('.plan-select:checked').val();
			$.get('/api/subscriptions/getPlans/'+subscription).done(function(data) {
				var wrapper = $('.subscription');
				wrapper.empty();
				$.each(data, function(i, v) {
					console.log(v);
					var $el = '<option value="'+v.stripe_plan+'">'+v.name+' - $ '+ (v.amount/100) +'</option>';
					wrapper.append($el);
				});
			});
		};
		start();
	},

	add_listing: function() {
		var start = function() {
			var divEmail = $('#div_co_provider_email');
			divEmail.hide();
			divEmail.find('.error').hide();
			$('#co_provider_email').on('focusout', checkEmail);
			$('.chk-co-provider').on('change', check);
			$('.btn-submit').on('click', submit);

		},
		check = function() {
			var res = $(this).is(':checked'),
				email = $('#div_co_provider_email');
			if (res == true) {
				email.fadeIn();
				email.find('input').prop('required', true);
			}
			else {
				email.fadeOut();
				email.find('input').prop('required', false);
			}

		},
		checkEmail = function() {
			var email = $('#co_provider_email').val();
			var div = $('#div_co_provider_email');
			if(email != '') {
				$.get('/directory/doctors/checkEmail/'+email, function(data) {
					if(data == 0) {
						// hide
						// enable submit button
						div.find('.error').fadeOut();
					}
					else {
						// show alert
						// disable submit or if submitted modal that can't continue process
						div.find('.error').fadeIn();
						div.find('.error').text('To continue the subscription of your co-provider. Please enter email address that is not a registered user of CareParrot.');

					}
				});
			}
			else {
				div.find('.error').fadeIn();
				div.find('.error').text("Please enter your co-provider's email address.");
			}
		},
		submit = function() {
			checkEmail();
			setTimeout(function() {
				if($('.chk-subscription').is(':checked') == true && $('#div_co_provider_email .error').is(':visible') == true) {
					// $('.btn-submit').attr('type', 'button');
					alert('Cannot proceed to subscription!');
				}
				else {
					// $('.btn-submit').attr('type', 'submit');
					$('form').submit();
					// $('#addProviderForm').validate();
					// var validator = $( "#addProviderForm" ).validate();
					// validator.form();
				}
			}, 1500); 
		};	
		start();
	},
};
subscriptions.init();