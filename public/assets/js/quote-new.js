'use strict';

var checkpointsType = {
	eligible: 1,
	doctor: 2,
};
var checkpointsFunc = {
	eligible: function() {

	},
};

var quote = {
	currentStep: 1,
	currentSubStep: 1,
	formSteps: $('.quote-step-container .stepwiz').find('.form-steps'),
	household_size : 0,

	init : function() {
		var self = this;

		self.initCounties();
		self.initSteps();
		self.initCoverage();
		self.initEligibility();
		self.initPreferred();
		self.initEnrollment();
		self.initCheckout();
		self.initApplications();
		self.initConfirm();
		if ($.fn.datepicker) {
			$('.date').datepicker({
			    todayHighlight: true
			});
		}
		$('.nextBtn').on('click', self.gotoStep);
		$("[data-toggle=popover]").popover();
		$("[data-toggle=tooltip]").tooltip();
	},

	// validate: function(elems) {
	// 	var tmp = {};

	// 	$.each(elems, function(i,v) {
	// 		console.log(v);
	// 	});
	// 	return tmp;
	// },

	initCounties: function() {
		var self = this;

		var zip_code = $('[name=_zip_code]').val();

		$.getJSON('http://localhost:8000/api/getLocations/'+zip_code, function(data) {
			$.each(data, function(i,v) {
				var tmp = $('#county_template').find('label').clone();
				tmp.find('.county-title').text(v.county);
				tmp.on('click', self.gotoStep);
				$('.counties-container').append(tmp);
			});
		});

	},

	initCheckout: function() {

	},

	initConfirm: function() {
		var start = function() {
			$('.confirm-action').on('click', confirm);
		},
		confirm = function() {
			$(this).toggleClass('active');
			if ($(this).hasClass('active'))
				$(this).attr('src', '/assets/icons/careparrot-logo.png');
			else
				$(this).attr('src', '/assets/icons/careparrot-logo-gray.png');
		};
		start();
	},

	initApplications: function() {
		var start = function() {
			$('.btn-add-dependent, .btn-add.spouse').on('click', addSpouse);
		},
		addSpouse = function() {

		};
		start();
	},

	initEligibility: function() {
		var self = this;
		var start = function() {
			$('.btnEligibility').on('click', eligible);
			$('.qualified-amount-popover').popover({
				trigger: "hover",
				animation: 'fade',
				placement: 'bottom',
			});
		},
		eligible = function() {

			var $parent = $(this).parents('.eligible-checkpoint-container');
			var size = $parent.find('#household-size').val() || self.household_size,
					income = $parent.find('#household-income').val(),
					$parents = $parent.parents('.step-parent');


			// quote.validate($('[name=dependent_age]'));
			$parent.hide();
			if ( size > 2 && (income > 0 && income <= 21000 ) )
				$parents.find('.qualified').fadeIn();
			else if ( ((size && size <= 2) && (income && income > 21000 )) || (!size || !income))
				$parents.find('.disqualified').fadeIn();
			else
				$parents.find('.disqualified').fadeIn();
		};
		start();
	},

	initPreferred: function() {
		var start = function() {
			doctorDatum.initialize();
			$('#hospitaldoctorInput').typeahead(null, {
				minLength: 3,
				displayKey: 'doctor',
				source: doctorDatum.ttAdapter(),
				templates: {
					suggestion: function(data) {
						console.log(data);
						return '<div class="doctor-list"'+
										'<h3><b>'+data.doctor_name+'</b></h3>'+
										'<p class="small">'+data.hospital_name+'</p>'+
										'<p class="small">'+data.street_address+'</p>'+
										'<p class="small">'+data.zip_code+'</p>'+
										'</div>';
					},
					empty: '<div class="empty-message">No matches.</div>',
				}

			}).bind('typeahead:selected', selected);
			$('[name=recieve]').on('change', check);
		},
		selected = function(obj, selected) {
			var tmp = $('#added-doctor-template').find('.doctor-wrapper').clone();
			$('#hospitaldoctorInput').typeahead('val', ' ');
			tmp.find('.doctor').text(selected.doctor_name);
			tmp.find('.hospital').text(selected.hospital_name);
			tmp.find('.street_address').text(selected.street_address);
			tmp.find('.zip_code').text(selected.zip_code);
			tmp.find('.remove').on('click', function() {
				$(this).parents('.doctor-wrapper').remove();
			});
			$('.doctors-selected:hidden').fadeIn('fast')
			$('.doctors-selected').append(tmp);
		},
		check = function() {
			var $this = $(this);
			$('.hospital-container').hide();
			if ($this.attr('id') == 'recieve_yes' && $this.is(':checked'))
				$('.hospital-container').fadeIn();
		};
		start();
	},

	initCoverage: function(e) {
		var self = this;
		var dependents = 0,
			coverageType = 0,
		start = function() {
			$('[name=coverage]').on('change', coverageToggle);
			$('.coverage-btn').on('click', coverage);
			$('#dependent').on('input', dependent);
		},
		dependent = function(e) {
			if ($(this).val()) {
				$(this).closest('.form-group').removeClass('has-error');
			}
			else {
				$(this).closest('.form-group').addClass('has-error');
			}
		},
		gender = function() {
			$(this).parent().find('.btn').removeClass('active');
			$(this).addClass('active');
		},
		coverageToggle = function() {
			var $this = $(this);
			coverageType = $this.val();
			$('[name=coverage]').parents('label').removeClass('active');
			$this.parents('label').addClass('active');

			if ($this.val() >= 3 && $this.val() != 5) {
				$('.dependent-addon-wrapper').fadeIn('slow');
			}
			else {
				$('.dependent-addon-wrapper').fadeOut('fast');
			}
		},
		coverage = function() {
			dependents = $('#dependent:visible').val();
			if (typeof dependents != 'undefined') {
				if ( (dependents == '' || dependent == 0) ) {
					$('#dependent').closest('.form-group').addClass('has-error');
				}
				else {
					$('.dependent-selector-container').fadeOut('fast',fadeOutCallback);
				}
			}
			else {
				$('.dependent-selector-container').fadeOut('fast',fadeOutCallback);
			}
		},
		fadeOutCallback = function() {
			var data = [];
			if (!coverageType)
				coverageType = 1;
			if (coverageType == 1) {
				data.push('Me');
			}
			else if (coverageType >= 2 && coverageType != 5) {
				data.push('Me', 'My Spouse');
				if (coverageType >= 3) {
					for(var i=1; i<=dependents;i++) {
						data.push('Dependents '+i);
					}
				}
			}
			else if (coverageType == 5) {
				data.push('Me', 'Dependent');
			}
			self.household_size = data.length;
			$.each(data, appendItem);
			$('.dependent-items-container').fadeIn();
			$('.nextBtn-container').fadeIn();
		},
		appendItem = function(i,v) {

			var template = $('.dependent-template').find('.dependent-wrapper').clone();
			template.find('.dependent-title').text(v);
			template.find('.btn-gender button.btn').on('click', gender);
			$('.dependent-items-container').append(template);
		};
		start();
	},

	initEnrollment: function() {
		var start = function() {
			$('.btn-event')
				.on('click', clicked);
		},
		clicked = function() {
			$(this).find('.inner').toggleClass('active');
			changed();
		},
		changed = function() {
			if ( $('.btn-event .inner').hasClass('active') )
				$('[data-step="#step4_1:not(.stepBtn)"]').text('Continue');
			else
				$('[data-step="#step4_1"]:not(.stepBtn)').text('None of these apply, Continue');

		};
		start();
	},

	gotoStep : function() {
		var elem = $(this),
			step = elem.data('step'),
			next = $(step),
			parent = elem.parents('.step-parent').parent(),
			checkpoint = elem.data('checkpoint'),
			stepBtn = elem.data('step-btn') || false;

		if (elem.hasClass('stepBtn')) {
			// parent = $('[data-step="'+step+'"]:not(.stepBtn)').parents('.step-parent').parent();
			$('[data-step="'+step+'"]:not(.stepBtn)').trigger('click');
		}
		else {
			if (checkpoint) {
				var checkpointStep = $(elem.data('checkpoint-step')),
					type = elem.data('checkpoint-type');
				if (type == checkpointsType.eligible) {
					checkpointsFunc.eligible();
				}
			}
			parent.fadeOut('fast', function() {
				next.fadeIn('fast').addClass('active');
			}).removeClass('active');
		}

	},

	initSteps: function() {
		var self = this,
			start = function() {
				self.formSteps.hide();
				self.formSteps.filter('.form-steps#step1_1').fadeActive();
			};
		start();
	},

	checkpoint: function(elems) {
		var tmps = [];
		$.each(elems, function(e) {

		});
		return tmps;
	},


};
