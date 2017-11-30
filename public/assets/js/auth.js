'use strict';

var auth = {

	init : function() {
		var self = this;
		self.initTypeahead();
		self.registration();
		$('.numberOnly').on('keypress', self.numberOnlyTextField);
	},

	initTypeahead: function() {
		var start = function() {
			locationsDatum.initialize();
			$('#zip_code').typeahead(null, {
				minLength: 1,
				limit: 15,
				displayKey: 'location',
				source: locationsDatum.ttAdapter(),
				templates: {
					suggestion: function(data) {
						return '<div class="agent-list"'+
										'<h3>'+data.county+', '+data.state_abbr+' <b>'+data.zip_code+'</b></h3>'+
										'</div>';
					},
					empty: '<div class="empty-message">No matches.</div>',
				}
			}).on('typeahead:select', selected);
		},
		selected = function(obj, selected) {
			$(this).typeahead('val', selected.zip_code);
			$('[name="address[city]"]').val(selected.city);
			$('[name="address[county]"]').val(selected.county);
			$('[name="address[state]"]').val(selected.state_abbr);
			$('[name="address[location_id]"]').val(selected.id);
		};

		start();
	},

	initRegistration: function() {
		var data = [
			$('[name=username]'),
			$('[name=password]'),
			$('[name=password_confirmation]'),
			$('[name=email]'),
			$('[name=license_number]'),
		],
		start = function() {
			$('#btnSignUp').on('submit', submit);
		},
		submit = function(e) {
			e.preventDefault();

		};
		start();
		// $('#btnSignUp').on('submit',)
	},

	validate : function() {
		var elem = $(this),
			dataRules = elem.data('authRule').split('|'),
			rules = {},
			_rules = null;
		var start = function() {
			if (dataRules.length)
				$.each(dataRules, each);

			validate();

		},
		each = function(i,v ) {
			var r = v.split(':');
			if (r[0] == 'unique') {
				rules[r[0]] = {
					'table' : r[1].split(',')[0],
					'field'	: r[1].split(',')[1],
					'value'	: elem.val(),
				};
			}
			else {
				rules[r[0]] = r[1];
			}
		},
		validate = function() {
			_rules = rules;
			if (rules.unique) {
				$.get('/auth/checkValidate', rules.unique).done(function(data) {
					_rules.unique = data == 0;
				});
			}

			if (rules.min)
				rules.min >= elem.val().length ? _rules.min = true : _rules.min = true;

			if (rules.max)
				rules.max <= elem.val().length ? _rules.max = true : _rules.max = false;
			getErrors(rules)
		},
		getErrors = function(r) {
			console.log(r);
		};

		start();

	},

	registration: function() {
		var agent_form = $('.agent-form'),
			provider_form = $('.provider-form'),
			start = function() {
			agent_form.hide();
			provider_form.hide();
			$('[name="role"]').on('change', change);
		},

		change = function() {
			var role = $('[name="role"]:checked').val();
			if (role == 2) {
				provider_form.slideToggle(300);
				provider_form.find('[name="sub_role"]').prop('required', true);
				agent_form.slideUp();
				$.each(agent_form.find('input'), function() {
					$(this).prop('required', false);
				});
			}
			else if (role == 3) {
				agent_form.slideToggle(300);
				$.each(agent_form.find('input'), function() {
					$(this).prop('required', true);
				});
				provider_form.slideUp();
				provider_form.find('[name="sub_role"]').prop('required', false);

			} 
			else {
				agent_form.slideUp();
				$.each(agent_form.find('input'), function() {
					$(this).prop('required', false);
				});
				provider_form.slideUp();
				provider_form.find('[name="sub_role"]').prop('required', false);
			}
		};
		start();
	},

	numberOnlyTextField: function(e){
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && (e.which != 46 && e.which >31)) {
    		return false;
    	}
    },

};
