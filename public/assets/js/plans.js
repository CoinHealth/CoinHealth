'use strict';
var helpers = {
	findObjectByAttribute: function(items, attr, value) {
		for (var i = 0; i < items.length; i++) {
			if (items[i][attr] === value) {
				return items[i];
			}
		}
	},
	monetary: function(event) {
		$(this).val(function(index, value) {
			return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		});
	},
};
String.prototype.capitalizeFirstLetter = function() {
	return this.charAt(0).toUpperCase() + this.slice(1);
}
var subsidy = {
	household_size: 0,
	income:0,
	state_abbr: '',
	state_pretty: '',
	rating_area: '',
	city: '',
	county : '',
	zip_code: getParameterByName('zip_code'),
	applicants: [],
	plan_chosen: null,
	isFamily: false,
	fpl : null,
};

var applications = {};
// filtering object
var mixFilter = {
	$filters: null,
	$reset: null,
	groups: [],
	// outputArray: [],
	outputString: '',
	outputSort: '',
	activePlanMetal: '#bronze',
	types : [],

	init: function() {
		var self = this;
		self.displayFilter();

		self.$filters = $('.plan-filters');
		self.setContainer();
    // self.$container = $('.plan-container').filter(self.activePlanMetal);
		self.groups.push({
			$checkBox: self.$filters.find('label.filterer'),
			$textBox: self.$filters.find('.filterer[type=text]'),
			$select: self.$filters.find('select.sorter'),
			$order: self.$filters.find('input[type=checkbox].filterer'),
			active: '',
			sort: 'monthly:asc',
		});
		self.bindHandlers();
	},

	setContainer: function() {
		var self = this;
		self.$container = $('.plan-container').filter(self.activePlanMetal);
	},

	initMixitUp: function() {
		var self = this;
		self.setContainer();
		setTimeout(function() {
			$('.plan-container'+self.activePlanMetal).mixItUp();
		},100);
	},

	bindHandlers: function() {
		var self = this;
		self.$filters.on('change', 'label.filterer', function(e) {
			self.parseFilter();
		});
		self.$filters.on('change', 'input[type=checkbox].filterer', function() {
			self.parseSorter();
		});
		self.$filters.on('change', 'select.sorter', function() {
			self.parseSorter();
		});

		self.$filters.on('keyup', '.filterer[type=text]', function() {
			var $this = $(this);
			var val = $this.val();
			$this.attr('data-filter', '[data-issuer-name*='+ plan.slugify(val) +']');

			if (!$this.val())
				$this.attr('data-filter', '');
			self.parseFilter();
		});
	},

	parseSorter: function() {
		var self = this;

		for (var i=0,group;group=self.groups[i];i++) {
			var activeSort = group.$select.find('option:selected').attr('data-filter') || 'monthly';

			var activeOrder = group.$order.is(':checked') ? ':asc' : ':desc';
			var final = activeSort+activeOrder;
			group.sort = final;
		}
		self.sorter();
	},

	parseFilter: function() {
		var self = this;

		var final = "";
		var checkboxes = [];
		for (var i=0,group;group=self.groups[i];i++) {
			var activeText = group.$textBox.length ? group.$textBox.attr('data-filter') || "": '';
			var activeCheckbox = group.$checkBox.length && group.$checkBox.filter('.active').length <= 1 ? group.$checkBox.filter('.active').attr('data-filter') || '':'';
			final = activeText;
			if (group.$checkBox.filter('.active').length) {
				group.$checkBox.filter('.active').each(function(i,v) {
					checkboxes.push($(v).data('filter')+activeText);
				});
				final = checkboxes.join(',');
			}
			group.active = final;
		}
		self.concatenate();
	},
	sorter: function() {
		var self = this;
		self.outputSort = '';
		for(var i=0,group;group = self.groups[i];i++) {
			self.outputSort += group.sort;
		}
		if (!self.outputString.length) {
			self.outputString = 'monthly:asc';
		}
		if (self.$container.mixItUp('isLoaded')) {
			self.$container.mixItUp('sort', self.outputSort);
		}
	},
	concatenate: function() {
		var self = this;
		self.outputString = '';
		for(var i=0,group;group = self.groups[i];i++) {
			self.outputString += group.active;
		}
		if (!self.outputString.length) {
			self.outputString = 'all';
		}
		// !self.outputString.length && (self.outputString == 'all');
		if (self.$container.mixItUp('isLoaded')) {
			self.$container.mixItUp('filter', self.outputString);
		}
	},

	displayFilter: function() {
		var self = this;
		if (self.types.length) {
			var types = plan.uniq(self.types);
			$.each(types, function(i,v) {
				var tmp = $('.plan-type-filters-template').find('label').clone();
				tmp.attr('data-filter','.'+v.toLowerCase());
				tmp.addClass('filterer');
				tmp.find('.plan-type-name').text(v);
				$('.plan-type-filters').append(tmp);
			});
		}
		else {
			$('.plan-type-label').hide();
		}
	},
};

var plan = {
	navListItems: $('.setup-panel div > a'),
	allWells: $('.form-steps'),
	allNextBtn: $('.nextBtn'),
	currentStep: 0,

	coverageType: 0,
	dependents: 0,

	doctors: [],

	isEligible: false,

	isOpenEnrollment: false,

	init: function() {
		var self = this;

		self.initSteps();
		self.initCoverage();
		self.initEligibility();
		self.initEnrollment();
		self.initPreferred();
		self.initCheckout();
		// self.initCitizenship();
		$("body").tooltip({ selector: '[data-toggle=tooltip]' });
		$('[data-toggle=popover]').popover();
		$('[data-toggle=tooltip]').tooltip();
		$('#modalcompare')
			.on('show.bs.modal', self.planCompare);
			// .on('hidden.bs.modal', self.planCompareReset);
		$('.monetary').keyup(helpers.monetary);
		$('#insurer a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			mixFilter.activePlanMetal = $(e.target).attr('href');
			mixFilter.initMixitUp();
		});
		$('.btn-conditions').on('change', '[name="conditions"]#others', function(e) {
			var $this = $(this),
					$specify = $this.parents('.pre-existing-container').find('.specify-container');
			if ($this.is(':checked')) {
				$specify.fadeIn();
			}
			else {
				$specify.hide();
			}
		});

	},

	initPreferred: function() {
		var start = function() {
			doctorDatum.initialize();
			$('#hospitaldoctorInput').typeahead(null, {
				minLength: 3,
				displayKey: 'doctor',
				limit: 10,
				source: doctorDatum.ttAdapter(),
				templates: {
					suggestion: function(data) {

						return '<div class="doctor-list"'+
										'<h3><b>'+data.fullname+'</b></h3>'+
										'<p class="small"><strong>'+data.data.specialization+'</strong></p>'+
										'<p class="small">'+data.data.street+', '+data.data.state+'</p>'+

										'<p class="small"><strong>'+data.data.contact_no+'</strong></p>'+
										'</div>';
					},
					empty: '<div class="empty-message">Sorry, the System cannot find your preferred doctor.</div>',
				}

			}).bind('typeahead:selected', selected);
			$('.add-preferred-doctor').on('click', addDoctor);
			$('[name=recieve]').on('change', check);
		},
		addDoctor = function(e) {
			e.preventDefault();
			var container = $('.add-doctor-container');
			if (container.is(':hidden')) {
				container.fadeIn();
				container.find('.btn-add').on('click', function() {
					$.post('/api/postDoctor', {
						_token: csrf_token,
						name: $('[name="add_doctor_name"]').val(),
						street: $('[name="add_doctor_street"]').val(),
						city: $('[name="add_doctor_city"]').val(),
						state: $('[name="add_doctor_state"]').val(),
						contact_no: $('[name="add_doctor_contact"]').val(),
					}).done(selectedFromAdd);
				});
				container.find('.btn-cancel').on('click', function() {
					container.fadeOut();
				});
			}
 		},
		selectedFromAdd = function(data) {
			var newData = {
				fullname : data.name,
				data: data
			};
			selected(null, newData);
		},
		selected = function(obj, selected) {
			var tmp = $('#added-doctor-template').find('.doctor-wrapper').clone();
			$('#hospitaldoctorInput').typeahead('val', ' ');
			tmp.find('.name').text(selected.fullname);
			tmp.find('.specialization').text(selected.data.specialization);
			tmp.find('.contact_no').text(selected.data.contact_no);
			tmp.find('.street').text(selected.data.street + ', ' +selected.data.state);
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

	initEnrollment: function() {
		var self = this;

		var is_open_enrollment = $('#is_open_enrollment').val(),
		start = function() {
			self.isOpenEnrollment = !is_open_enrollment ? false : true;
			$('.btn-event')
				.on('click', clicked);

			$('.special-enrollment').find('.nextBtn').on('click', checkZip);
			if (!is_open_enrollment) {
				$('#step0_1').fadeIn();
			}
			else {
				self.initLocationTypeahead();
			}
		},
		checkZip = function() {
			self.allWells.hide();
			self.initLocationTypeahead();
		},
		clicked = function() {
			$(this).find('.inner').toggleClass('active');
			$(this).find('input[type=checkbox].qualifying-events').attr('checked', $(this).find('.inner').is('.active') );
			$(this).find('input[type=checkbox].qualifying-events')
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

	initSteps: function() {
		var self = this;

		self.allWells.hide();
		self.navListItems.on('click', function(e) {
			e.preventDefault();
			var $target = $($(this).attr('href')),
					$item = $(this);
			if (!$item.attr('disabled')) {
				self.navListItems.removeClass('btn-primary').addClass('btn-default');
				$item.addClass('btn-success');
				self.allWells.hide();
				$target.show();
				$target.find('input:eq(0)').focus();
			}
		});
	},

	initApplicationForms: function() {
		var start = function() {
			$('#applicants-panel').empty();
			appendApplicant('Me');
			$('.applicant-btns').on('click', initBtn);
		},
		initBtn = function() {
			var $this = $(this),
					value = $this.data('value');
			if (value == 'My Spouse')
				$this.attr('disabled', true);

			$('select#applicant_relationship').val("0");
			appendApplicant( value , true);
		},
		appendApplicant = function(type, collapse) {
			type = typeof type === 'undefined' ? '' : type;
			collapse = typeof collapse !== 'undefined' ? collapse : false;
			var $panel = $('.application-template').find('.panel').clone();
			var uid = window.uid();
			$('#applicationNumber').val(uid);
			$panel.find('.panel-heading').attr('id', 'applicant_heading'+uid);
			$panel.find('.applicant-remove').on('click', function() {
				var conf = confirm("You're about to lose unsaved changes to this applicant, do you wish to continue?");
				if (conf)
					$panel.remove();

			});
			$panel.find('.applicant-type').attr({
				'href': '#applicant_collapse'+uid,
				'aria-controls': '#applicant_collapse'+uid,
				'aria-expanded': true
			}).text(type);
			// .on('click', function(e) {
			// 	if ( !$('.collapse.in').length ) {
			// 		e.stopPropagation();
			// 		e.preventDefault();
			// 	}
			// });
			// TODO:190 subsidy's Age not right.
			$panel.find('.panel-collapse.collapse').attr({
				'id': 'applicant_collapse'+uid,
			}).addClass(!collapse ? 'in': '');
			//preferred language
			var rowPreferredLanguage= $panel.find('.preffered-language');
			if (uid != 0)
				rowPreferredLanguage.hide();
			else
				rowPreferredLanguage.show();
			var rowHealthCoverage= $panel.find('.row-health-coverage');
			rowHealthCoverage.find('.applicant_health_coverage').attr({
				id: 'applicant_health_coverage'+uid,
			});
			rowHealthCoverage.find('[name="applicant_health_coverage[]"]').filter('[value="YES"]').attr('checked', true).parents('label.btn').addClass('active');
			// if (collapse) {
			// 	$panel.find('.panel-collapse.collapse').collapse('show');
			// }
			// fullname
			var rowFullname = $panel.find('.row-fullname');
			rowFullname.find('label').attr({
				for: 'applicant_fullname'+uid,
			});
			rowFullname.find('input').attr({
				id: 'applicant_fullname'+uid,
			}).addClass('applicant-input').on('keyup', function() {
				$panel.find('.panel-title.applicant-type').text($(this).val());
			});
			// mailingaddress
			var rowMailingAddress = $panel.find('.mailing-address-row');
			rowMailingAddress.find('input[name="applicant_address[]"]').attr({
				id: "applicant_address"+uid,
			}).addClass('applicant-input').closest('.form-group').find('label').attr({
				'for': 'applicant_address'+uid
			});
			rowMailingAddress.find('input[name="applicant_apt[]"]').attr({
				id: "applicant_apt"+uid,
			}).addClass('applicant-input').closest('.form-group').find('label').attr({
				'for': 'applicant_apt'+uid
			});
			rowMailingAddress.find('input[name="applicant_city[]"]').attr({
				id: "applicant_city"+uid,
			}).val(subsidy.city).addClass('applicant-input').closest('.form-group').find('label').attr({
				'for': 'applicant_city'+uid
			});
			rowMailingAddress.find('[name="applicant_state[]"]').select2({
				placeholder: 'Select State',
			}).attr({
				id: "applicant_state"+uid,
			}).addClass('applicant-input').val(subsidy.state_abbr).trigger('change').closest('.form-group').find('label').attr({
				'for': 'applicant_state'+uid
			});
			rowMailingAddress.find('input[name="applicant_zipcode[]"]').attr({
				id: "applicant_zipcode"+uid,
			}).val(subsidy.zip_code).addClass('applicant-input').closest('.form-group').find('label').attr({
				'for': 'applicant_zipcode'+uid
			});
			// rowApplicantAddress
			var rowApplicantAddressChecks = $panel.find('.row-applicant-address-checks');
			rowApplicantAddressChecks.find('.chk-separate').on('click', function() {
				if ($(this).is(':checked')) {
					var cloned = rowMailingAddress.clone().addClass('cloned address-row'+uid).hide();
					cloned.find('input[name="applicant_address[]"]').attr({
						name: "mailing_address"+uid,
						id: "applicant_mailing_address"+uid,
						placeholder: 'Mailing Address',
					}).addClass('applicant-input').closest('.form-group').find('label').attr({
						'for': 'mailing_address'+uid,
					}).text('MAILING ADDRESS');
					rowMailingAddress.parent().append(cloned.fadeIn('fast'));
					cloned.find('input[name="applicant_apt[]"]').attr({
						name: "mailing_apt"+uid,
						id: "applicant_mailing_apt"+uid,
					});
					cloned.find('input[name="applicant_city[]"]').attr({
						name: "mailing_city"+uid,
						id: "applicant_mailing_city"+uid,
					});
					cloned.find('input[name="applicant_state[]"]').select2({
						placeholder: 'Select State',
					}).attr({
						name: "mailing_state"+uid,
						id: "applicant_mailing_state"+uid,
					}).addClass('applicant-input').val(subsidy.state_abbr).trigger('change').closest('.form-group').find('label').attr({
						'for': 'applicant_mailing_state'+uid
					});
					cloned.find('input[name="applicant_zipcode[]"]').attr({
						name: "mailing_zipcode"+uid,
						id: "applicant_mailing_zipcode"+uid,
					});
					$(this).attr({
						id: 'separate'+uid,
					});
				}
				else {
					$('.mailing-address-row.cloned.address-row'+uid).remove();
				}
			});
			rowApplicantAddressChecks.find('.same-address').on('change', function() {
				var otherMailingAddress = $('.mailing-address-row').not(rowMailingAddress),
						otherInputs = otherMailingAddress.find('.applicant-input');
				if ($(this).is(':checked'))
					otherInputs.attr('disabled', true);
				else
					otherInputs.attr('disabled', false);
			});

			// row social security
			var rowSSS = $panel.find('.row-social-security');
			rowSSS.find('input[name="applicant_name_sss[]"]').hide();
			rowSSS.find('input[name="applicant_sss[]"]').attr({
				id: "applicant_sss"+uid,
			}).on('keyup', function(){
				var val = this.value.replace(/\D/g, '');
	      var newVal = '';
	      if(val.length > 4) {
	         this.value = val;
	      }
	      if((val.length > 3) && (val.length < 6)) {
	         newVal += val.substr(0, 3) + '-';
	         val = val.substr(3);
	      }
	      if (val.length > 5) {
	         newVal += val.substr(0, 3) + '-';
	         newVal += val.substr(3, 2) + '-';
	         val = val.substr(5);
	       }
	       newVal += val;
	       this.value = newVal;
			}).addClass('applicant-input').closest('.form-group').find('label').attr({
				'for': 'applicant_sss'+uid
			});
			rowSSS.find('.chk-dont-have-sss').on('change', function(e) {
				if ($(this).is(':checked'))
					rowSSS.find('input[name="applicant_sss[]"]').val(null).attr('disabled', true);
				else
					rowSSS.find('input[name="applicant_sss[]"]').attr('disabled', false);
			});
			rowSSS.find('.chk-different-name-sss').on('change', function(e) {
				if ($(this).is(':checked'))
					rowSSS.find('input[name="applicant_name_sss[]"]').fadeIn('fast').attr({
						id: 'applicant_sss_name'+uid,
					});
				else
					rowSSS.find('input[name="applicant_name_sss[]"]').hide();
			});
			rowSSS.find('.chk-different-name-sss').attr({
				id: 'different_name_sss'+uid,
			})
			// row-gender-dob
			var rowGenderDOB = $panel.find('.row-gender-dob'),
					applicant = helpers.findObjectByAttribute(subsidy.applicants, 'applicantId', uid),
					_year = new Date().getFullYear() - (applicant ? applicant.applicantAge : 0),
					_startDate = {
						year: _year,
						month: 0,
						day: 1
					},
					sex = applicant ? applicant.applicantSex : 'M';

			rowGenderDOB.find('[name="applicant_gender[]"]').filter('[value="'+sex+'"]').attr('checked', true).parents('label.btn').addClass('active');
			rowGenderDOB.find('[name="applicant_dob[]"]').dateDropdowns({
				daySuffixes: false,
				// defaultDate: '',
				displayFormat: 'mdy',
				defaultDate: 'mm/dd/yyyy',
				submitFormat: 'mm/dd/yyyy',
				dropdownClass: 'dropDownshit col-xs-4',
				minYear: 1950,
				maxYear: new Date().getFullYear() + 14,
				required: true,
			});
			var dropDowns = rowGenderDOB.find('select.dropDownshit');
			dropDowns.filter('.month').select2({
				placeholder: 'Select Month',
			});
			dropDowns.filter('.day').select2({
				placeholder: 'Select Day',
			});
			dropDowns.filter('.year').select2({
				placeholder: 'Select Year',
			});
			rowGenderDOB.find('[name="applicant_gender[]"]').attr({
				id: 'applicant_gender'+uid,
			});
			rowGenderDOB.find('[name="applicant_dob[]"]').attr({
				id: 'applicant_dob'+uid,
			});


			//row relationship
			var rowRelationship= $panel.find('.row-relationship');
			rowRelationship.find('[name="applicant_relationship[]"]').attr({
				id: 'applicant_relationship'+uid,
			});
				if (uid == 0)
					rowRelationship.hide();
				else
					rowRelationship.show();
			// row taxes
			var rowTaxes = $panel.find('.row-taxes');
			rowTaxes.find('[name="applicant_tax[]"]').select2({
				placeholder: 'Choose Tax Status',
			}).attr({
				'id': 'applicant_tax'+uid,
			}).parent().find('label').attr({
				'for': 'applicant_tax'+uid,
			});

			// row income
			var rowIncome = $panel.find('.row-income');
			rowIncome.find('[name="applicant_income_amount[]"]').attr({
				'id': 'applicant_income_amount'+uid,
			}).keyup(helpers.monetary).keyup(function() {
				var val = Number( $(this).val().replace(/\,/g,"") );
				var amount = Math.round(val * 12).toLocaleString("en");
				rowIncome.find('.applicant-income-approx').find('.applicant-annual-income').text(amount);
				rowIncome.find('.applicant-income-approx').find('.applicant-annual-income').attr({
					id: 'applicant_annual_income'+uid,
				});
			}).closest('.form-group').find('label').attr({
				'for': 'applicant_income_amount'+uid,
			});
			rowIncome.find('.btn-income-approx').on('click', '.btn', function() {
				var radio = $(this).find('input[type=radio]');
				if (radio.val() == 'no') {
					console.log(radio);
					rowIncome.find('[name="applicant_income_amount[]"]').val('');
				}
			});
			rowIncome.find('[name="applicant_income_type[]"]').select2({
				placeholder: 'Choose Income Type',
			}).attr({
				'id': 'applicant_income_type'+uid,
			}).closest('.form-group').find('label').attr({
				'for': 'applicant_income_type'+uid,
			});
			rowIncome.find('[name="applicant_employer[]"]').attr({
				'id': 'applicant_employer'+uid,
			}).closest('.form-group').find('label').attr({
				'for': 'applicant_employer'+uid,
			})
			rowIncome.find('[name="applicant_employer_phone[]"]').attr({
				'id': 'applicant_employer_phone'+uid,
			}).closest('.form-group').find('label').attr({
				'for': 'applicant_employer_phone'+uid,
			});

			var $citizenship = $panel.find('.citizenship-container');
			$citizenship.find('.us-citizen').on('click', '.btn', function() {
				var $this = $(this).find('input[type=radio]');
				if ($this.val() == "no"){
					$citizenship.find('.row-naturalized-citizenship, .naturalized-citizen-condition-container').hide();
					$citizenship.find('.citizenship-condition-container').fadeIn();
				} else {
					$citizenship.find('.citizenship-condition-container').find('#applicant_immigration_documents:visible').select2('val', '');
					$citizenship.find('.citizenship-condition-container').hide();
					$citizenship.find('.immigration-conditions').hide();
					$citizenship.find('.row-naturalized-citizenship, .naturalized-citizen-condition-container').fadeIn();
					if ($citizenship.find('.naturalized-citizen label.btn-no').hasClass('active'))
						$citizenship.find('.naturalized-citizen label.btn-yes').addClass('active');
						$citizenship.find('.naturalized-citizen label.btn-no').removeClass('active');
				}
			}).attr({
				id: 'applicant_us_citizen'+uid,
			});
			$citizenship.find('.indian-alaskan-citizen').attr({
				id: 'applicant_indian_alaskan'+uid,
			});
			$citizenship.find('.naturalized-citizen').on('click', '.btn', function() {
				var $this = $(this).find('input[type=radio]');
				if ($this.val() == "no"){
					$citizenship.find('.naturalized-conditions, .naturalized-citizen-condition-container').hide();
				} else {
					$citizenship.find('.naturalized-citizen-condition-container').fadeIn();
					$citizenship.find('.naturalized-conditions').hide();
				}
			}).attr({
				id: 'applicant_naturalized_citizen'+uid,
			});

			$citizenship.find('[name="applicant_naturalization_documents[]"]').attr({
				'id': 'applicant_naturalization_documents'+uid,
			}).on('change', function() {
				var val = $(this).val();
				$citizenship.find('.naturalized-conditions').hide().filter('#naturalized-con'+val).fadeIn().attr({
					name: 'naturalized-condition'+ val +'-applicant'+uid,
				});
			}).closest('.form-group').find('label').attr({
				'for': 'applicant_naturalization_documents'+uid,
			});

			$citizenship.find('[name="applicant_immigration_documents[]"]').attr({
				'id': 'applicant_immigration_documents'+uid,
			}).select2({
				placeholder: 'Select Immigration Document',
			}).on('select2:select', function(){
				var val = $(this).val();
				$citizenship.find('.immigration-conditions').hide().filter('#immigration-con'+val).fadeIn().attr({
					name: 'immigration-condition' + val + '-applicant'+uid,
				});
			}).closest('.form-group').find('label').attr({
				'for': 'applicant_immigration_documents'+uid,
			});
			//other details
			//helpers.findObjectByAttribute(subsidy.applicants, 'applicantId', uid)
			var rowOtherDetails = $panel.find('.row-other-details'),
					applicantDetails= subsidy.applicants[uid];
			rowOtherDetails.find('#applicant_tobacco').attr({
				'id': 'applicant_tobacco'+uid,
			});
			rowOtherDetails.find('#applicant_parent').attr({
				'id': 'applicant_parent'+uid,
			});
			rowOtherDetails.find('#applicant_job').attr({
				'id': 'applicant_job'+uid,
			});
			rowOtherDetails.find('#applicant_pregnant').attr({
				'id': 'applicant_pregnant'+uid,
			});
			if (applicantDetails) {
				if(applicantDetails.applicantTobacco == 'true')
					rowOtherDetails.find('#applicant_tobacco'+uid).addClass('active');
				if(applicantDetails.applicantParent == 'true')
					rowOtherDetails.find('#applicant_parent'+uid).addClass('active');
				if(applicantDetails.applicantJob == 'true')
					rowOtherDetails.find('#applicant_job'+uid).addClass('active');
				if(applicantDetails.applicantPregnant == 'true')
					rowOtherDetails.find('#applicant_pregnant'+uid).addClass('active');
			}
			// append application form
			$('#applicants-panel').append($panel);
		};

		start();
	},

	initAdditionalInformation: function() {
		var start = function() {
			$('.applicants').hide();
			$('.btn-question').on('click', '.btn', questions);
		},
		questions= function() {
			var qn= $(this).attr('data-answer');
			var qnum= $(this).attr('data-number');
			var $this = $(this).find('input[type=radio]');
				if($this.val() == "yes"){
					$('.applicant-question-'+qn).fadeIn('fast');
						if( !$('.applicant-question-'+qn).hasClass('hasCloned') ){
							$.each(applications.applicants, function(i, v){
								var $applicant = $('.applicant-wrapper:not(.cloned)').clone().addClass('cloned');
								if(v.applying_for_coverage == "YES") {
									$applicant.find('.lbl').text(v.fullname);
									$applicant.find('label.btn').attr({
										id : qn+'-question',
										name: v.fullname,
									});
									$('.applicant-question-'+qn).append($applicant);
									$('.applicant-question-'+qn).addClass('hasCloned');
								}
							});
						}
				}
				else{
					$('.applicant-question-'+qn).hide();
					$('.applicant-question-'+qn).find('.cloned').remove();
					$('.applicant-question-'+qn).removeClass('hasCloned');

				}
		},
		appendApplicants= function() {

		};
		start();
	},



	initHouseholdSize: function() {
		var options = '';
		var size = subsidy.household_size, i=size;
		while(i < size+6) {
			options += '<option value="'+i+'">'+i+'</option>';
			i++;
		}
		$('#household_size').append(options);
	},

	gotoStep: function(step,bypass,isEnd,backStep,gradientDone) {

		var self = this;
		bypass = typeof bypass === 'undefined' ? false : bypass;
		gradientDone = typeof isEnd !== 'undefined' ? gradientDone : '';
		backStep  = typeof isEnd !== 'undefined' ? backStep : '';
		isEnd = typeof isEnd === 'undefined' ? false : isEnd;

		var target = $('div#step'+step+'');
		if (!bypass) {
			if (step == '0_3') {
				var elems = [
					$('#zip_code_hidden'),
				];
				bypass = self.checkpoint(elems);
			}
			else if (step == '2_1') {
				bypass = self.checkpoint($('[name="dependent_age"]:visible'));
			}
			else if (step == '4_1') {
				bypass = self.checkpoint([
					$('[name=applicant_name]:visible'),
					$('[name=applicant_email]:visible'),
				]);
			}

		}

		if (bypass) {

			if (step == '4_1') {
				self.getPlans();
				// return false;
				// console.log('shit');
			}
			else if (step == '0_3') {
				window.history.pushState("", "", "/quote?zip_code="+$('[name=zip_code]:visible').val());
				self.initLocationTypeahead();
			}
			else if (step == '2_1') {
				self.initHouseholdSize();
			}
			else if (step == '5_3') {
				var prepcitystate = $('[name="applicant_city[]"].applicant-input:first').val() + ', ' +
														$('[name="applicant_state[]"].applicant-input:first').val() + ' ' +
														$('[name="applicant_zipcode[]"].applicant-input:first').val(),
						prepaddress = $('[name="applicant_address[]"].applicant-input:first').val() + ' ' + $('[name="applicant_apt[]"].applicant-input:first').val();

				$('.checkout-billing-address').text(prepaddress + ' ' + prepcitystate);
				$('#preffered_address').val(prepaddress);
				$('#preffered_citystate').val(prepcitystate);
				$('#tab1-fullname').val($('[name=applicant_name]').val());
				$('.applicant_name').val($('[name=applicant_name]').val());
			}
			else if (step == '5_4') {

				self.confirmSubmission();
			}

			if (step == '1_1') {
				$('#cp-quote-title').text($('#title1').val());
			}
			else if (step == '3_1') {
				$('#cp-quote-title').text($('#title2').val());
			}
			else if (step == '5_1') {
				self.initApplicationForms();
				$('#cp-quote-title').text($('#title3').val());
			}
			else if (step == '5_2') {
				self.initAdditionalInformation();
				self.getApplicationData();
				$('#cp-quote-title').text($('#title4').val());
			}
			else if (step == '5_3') {
				$('#cp-quote-title').text($('#title5').val());
			}
			else if (step == '5_4') {
				$('#cp-quote-title').text($('#title6').val());
			}
			self.allWells.hide();
			target.fadeIn(800, function() {
			});
			if (isEnd) {
				self.navListItems.removeClass('btn-success active');
				var next = self.navListItems.filter('.stepwizard-step a[href="#step'+step+'"]'),
						prev = self.navListItems.filter('.stepwizard-step a[href="#step'+backStep+'"]');
				next.addClass('btn-success active').attr('disabled', false);
				prev.addClass('btn-success done');
				// $('.stepwizard-row[data-done="'+gradientDone+'"]');
				$('.stepwizard-row').attr('data-done', gradientDone);
			}
			self.curSteps = step;
		}
	},

	scrollTop: function() {
		$('html, body').delay(200).animate({ scrollTop : 0 }, 500);
	},
	/**
	 * Checkpoint
	 * @param {array} elems
	 * @return {Number} sum
	 */
	checkpoint: function(elems) {
		var tmp = [];
		$.each(elems, function(i,v) {
			var type = v instanceof jQuery ? v.get(0).type : v.type;
			v = $(v);
			if (type === 'checkbox') {
				if (!v.is(':checked')) {
					v.closest('div.form-group').find('.xtip').addClass('has-error').tooltip('show');
					tmp.push(v);
				}
				else {
					v.closest('div.form-group').find('.xtip').removeClass('has-error').tooltip('destroy');
				}
			}

			else if (type === 'select-one' || type === 'select-multiple') {
				if (v.val() === 'default' || v.val() === null) {
					v.closest('div.form-group').addClass('has-error').tooltip('show');
					tmp.push(v);
				}
				else {
					v.closest('div.form-group').removeClass('has-error').tooltip('destroy');
				}
			}

			else if (type === 'textarea' || type === 'text' || type === 'number' || type === 'hidden') {
				if (!v.val() || v.val() <= 0 || v.val() == '') {
					v.closest('div.form-group').addClass('has-error').tooltip('show');
					tmp.push(v);
				}
				else {
					v.closest('div.form-group').removeClass('has-error').tooltip('destroy');
				}
			}
		});
		if (tmp.length > 0) {
			$(tmp[0]).focus();
		}

		if (tmp.length <= 0)
			return true;
	},
	//
	initEligibility: function() {
		var self = this;

		var start = function() {
			$('.btnEligibility').on('click', checkEligibility);
		},
		checkEligibility = function() {
			var pass = self.checkpoint($('#household-income'));
			if (pass) {
				subsidy.income = $('#household-income').val();
				subsidy.household_size = $('#household_size').val();
				$('.loader-container').fadeIn("slow");
				$('.calculators-container').hide();
				// createApplicants();
				self.computeEligibility();
			}
		},
		createApplicants = function() {
			$.each(subsidy.applicant, function(i,v) {
			});
		};

		start();
	},

	initCheckout: function() {
		var self = this;
		var payment_method = '1',
		start = function() {
			$('#checkout-tab > li a').on('click', tabClicked);
			$('#payment-type-tab > li a').on('click', paymentTypeTab);
			$('.btn-billing-address').on('click', '.btn', btnClicked);
			$('[data-toggle="subtab"]').on('click', subTab);

			$('#credit_card_type').on('change', creditCardType);
		},
		creditCardType = function() {
			var $this = $(this).find('option:selected');
			console.log($this.val());
			if ($this.val() == 'other')
				$('#credit_card_other').fadeIn();
			else
				$('#credit_card_other').hide();
		},
		paymentTypeTab = function() {
			payment_method = $(this).data('payment-method');
			$('.order-summary-container').show();
			$('[data-next-tab="#order-summary"]').attr('data-bypass', false);
			if (payment_method == 2) {
				$('[data-next-tab="#order-summary"]').attr('data-bypass', true);
				$('.order-summary-container').hide();
			}
		},
		subTab = function() {
			var $this = $(this),
					step = $this.data('next-tab'),
					bypass = $this.attr('data-bypass') == 'true';
			if (!bypass) {
				if (step == '#payment') {
					bypass = self.checkpoint([
						$('#preffered_address:visible'),
						$('#preffered_citystate:visible'),
					]);
				}
				else if (step == '#order-summary') {
					bypass = self.checkpoint([
						$('#tab1-fullname:visible'),
						$('#tab1-zip:visible'),
						$('#tab1-cardno:visible'),
						$('#cvv-cid:visible'),
					]);
				}
			}
			if (bypass) {

				if (step == '#payment') {
					$('#tab1-zip').val(subsidy.zip_code);
					$('#tab1-fname').val($('#applicant_fname').val());
					$('#tab1-lname').val($('#applicant_lname').val());
				}
				else if (step == '#order-summary') {
					plan.generate_order_id();
					$('.checkout-fullname').text($('[name=applicant_name]').val());
					$('.checkout-email').text($('[name="applicant_email"]').val());
					var prepcitystate = $('[name="applicant_city[]"].applicant-input:first').val() + ', ' +
															$('[name="applicant_state[]"].applicant-input:first').val() + ' ' +
															$('[name="applicant_zipcode[]"].applicant-input:first').val(),
							prepaddress = $('[name="applicant_address[]"].applicant-input:first').val() + ' ' + $('[name="applicant_apt[]"].applicant-input:first').val();
					$('.checkout-street-address').text(prepaddress);
					$('.checkout-citystatezip').text(prepcitystate);
					$('.checkout-metal').text(subsidy.plan_chosen.plan_marketing_name || '');
					$('.checkout-discount').text(Number(subsidy.subsidy_amount).toLocaleString('en'));
					$('.order-item-id').text(subsidy.plan_chosen.plan_id_standard_component);
					$('.order-item-amount').text(Number(subsidy.plan_chosen.premium).toLocaleString('en'));
				}

				$('#checkout-tab a[href="'+step+'"]').tab('show').removeClass('disabled');
			}
		},
		btnClicked = function(e) {
			var $this = $(this).find('input[type=radio]');
			$('#checkout-preffered').hide();
			$('.subtab').attr('data-bypass', true);
			if ($this.val() == 'no') {
				$('#checkout-preffered').fadeIn();
				$('.subtab').attr('data-bypass', false);
			}
		},
		tabClicked = function(e) {
			if ($(this).hasClass('disabled')) {
				e.preventDefault();
				return false;
			}
		};

		start();
	},

	confirmSubmission: function() {
		var start = function() {
			$('#agreementModal').modal('toggle');
			$('[name="cmdAgree"]').on('click', agree);
			$('.confirm-action').on('click', toggleImg);
			// $('[name="applicant_fullname[]"].applicant-input').each(fill);
			fill();
		},
		agree = function() {
			$('#agreement').val('1');
		},
		toggleImg = function() {
			var agreed = $('#agreement').val() == 1
			var pass = $('#verify-name').data('value').trim() === $('#verify-input').val().trim()
			if (pass && agreed) {
				var $this = $(this).toggleClass('active');
				$('#verify-input').closest('.form-group').removeClass('has-error');
				if ($this.hasClass('active')) {
					$this.attr('src', '/assets/icons/parrot_mascot1.png');
					plan.getApplicationData();
					//post
					$.post('/quote-finished', {
						_token: csrf_token,
						data: applications,
					}).done(done);
				}
				else {
					$this.attr('src', '/assets/icons/parrot_mascot1-gray.png');
				}


			}
			else if (!agreed) {
				$('#agreementModal').modal('toggle');
			}
			else {
				$('#verify-input').focus().closest('.form-group').addClass('has-error');
			}
		},

		done = function(data) {
			// setTimeout(function() {
				window.location.href = '/quote-finished?name='+ $('[name="applicant_fullname[]"].applicant-input:first').val().capitalizeFirstLetter();
		//	},2000);
		},

		fill = function() {
			var fname = $('#applicant_fname').val(),
					lname = $('#applicant_lname').val();
			var me = helpers.findObjectByAttribute(subsidy.applicants, 'applicantLabel', 'Me');

			//$('.confirm-name').text( $('.applicant_name').val() );
			//$('.confirm-eligibility').text('Yes');
			$('.confirm-name').text($('[name="applicant_fullname[]"].applicant-input:first').val());
			$('.confirm-age').text(me.applicantAge);
			$('.confirm-plan-chosen').text(subsidy.plan_chosen.plan_marketing_name);
			$('#verify-name')
				.text($('[name="applicant_fullname[]"].applicant-input:first').val().toUpperCase())
				.attr('data-value', $('[name="applicant_fullname[]"].applicant-input:first').val().trim().toUpperCase());
		};
		// NOTE:280 fix last step. append all applicants on step 5_1,

		start();
	},

	initLocationTypeahead: function() {
		var self = this;
		var start = function() {
			locationsDatum.initialize();
			if (!getParameterByName('zip_code')){
				$('#step0_2').fadeIn().find('#zip_code').typeahead(null,
				{
					minLength: 1,
					limit: 25,
					displayKey: 'location',
					source: locationsDatum.ttAdapter(),
					templates: {
						suggestion: function(data) {
							return '<div class="location-list"'+
											'<h3>'+data.county+', '+data.state_abbr+' <b>'+data.zip_code+'</b></h3>'+
											'</div>';
						},
						empty: '<div class="empty-message">No matches.</div>',
					}
				}).on('typeahead:selected', selected);
			}
			else {
				$('#step0_3').fadeIn();
				self.initCounties();
			}
		},
		selected = function(obj, selected) {
			$(this).typeahead('val', selected.zip_code);
			$('#zip_code_hidden').val(selected.zip_code);
			subsidy.state_abbr = selected.state_abbr;
			subsidy.state_pretty = selected.pretty_name;
			subsidy.rating_area = selected.rating_area;
			subsidy.zip_code = selected.zip_code;
			subsidy.city = selected.city;
		};
		start();
	},

	initCounties: function() {
		var self = this;

		var zip_code = $('[name=zip_code]').val() ? $('[name=zip_code]').val() : getParameterByName('zip_code');
		$('.counties-container').empty();
		$.getJSON('/api/getLocations/'+zip_code, function(data) {
			var show = data.length > 1 ? true : false;
			$.each(data, function(i,v) {
				var tmp = $('#county_template').find('label').clone();
				tmp.find('.county-title').text(v.county);
				tmp.attr({
					'data-city': v.city,
					'data-state': v.pretty_name,
					'data-state-abbr': v.state_abbr,
					'data-rating-area': v.rating_area,
				});
				tmp.find('.county-city').text(v.city);
				tmp.find('.county-state-abbr').text(v.state_abbr);
				tmp.find('.county-zip').text(v.zip_code);
				if (show) {
					tmp.find('.show-cond').show();
				}
				tmp.addClass('used');
				tmp.on('change','[type=radio]',function() {
					subsidy.zip_code = $(this).parent().find('.county-zip').text();
					subsidy.county = $(this).parent().find('.county-title').text();
					subsidy.city = $(this).parent().find('.county-city').text();
					subsidy.state_abbr = $(this).parent().find('.county-state-abbr').text();
					subsidy.state_pretty = $(this).parent().data('state');
					subsidy.rating_area = $(this).parent().data('rating-area');
				});
				$('.counties-container').append(tmp);
			});
		});
	},

	computeEligibility: function() {
		var self = this;

		var start = function() {
			$('.dependent-used').each(function(i,v) {
				subsidy.applicants.push($(v).data());
			});
			$.post('/api/postEligibility', {
				_token: csrf_token,
				eligibility: subsidy,
			}).done(displayData);
		},
		displayData = function(data) {
			subsidy.isFamily = data.isFamily;
			// self.loadPlans(data.plans); // NOTE:320 separate fetch
			subsidy.state_abbr = data.state.state_abbr;
			subsidy.city = data.state.city;
			subsidy.subsidy_amount = data.subsidy;
			subsidy.state_pretty = data.state.pretty_name;
			subsidy.applicants = data.applicants;
			subsidy.fpl = data.fpl;
			// subsidy.rating_area = data.rating_area;
			var eligibles = {
				eligible: [],
				not_eligible: [],
			};
			var $statusContainer = null;

			$.each(data.applicants, function(i,v) {
				if (!self.isEligible)
					self.isEligible = v.subsidy;

				v.subsidy ? eligibles.eligible.push(v) : eligibles.not_eligible.push(v);
			});
			if (data.status.code == 1) {
				if (eligibles.eligible.length) {
					if (eligibles.not_eligible.length) {
						$statusContainer = $('#step2_1 .disqualified-qualified-template').find('.disqualified-qualified');
						$statusContainer.find('.disqualified-people').show();
						$statusContainer.find('.assistance-people-container').empty();
						$.each(eligibles.not_eligible, function(i,v) {
							var tmp = $('.assistance-people-template').find('.ppl-wrapper').clone(),
									maybe = '';

							if (v.medicaid && !v.chip)
								maybe = 'Medicaid';
							else if (!v.medicaid && v.chip)
								maybe = 'CHIP';
						else if (v.medicaid && v.chip)
								maybe = 'Medicaid or CHIP';

							tmp.find('.ppl-label').text(v.applicantLabel);
							tmp.find('.ppl-status b').text(data.state.state_abbr +' '+maybe);
							$statusContainer.find('.assistance-people-container').append(tmp);
						});
					}
					else {
						$statusContainer = $('#step2_1 .qualified-template').find('.qualified');
				  }
					$statusContainer.find('.qualified-subsidy span').text(data.subsidy); // change this to subsidy;
					$statusContainer.find('.qualified-tax-penalty').text('$'+ Math.round(data.tax_penalty).toLocaleString("en") );
				}
				else if (eligibles.not_eligible.length && !eligibles.eligible.length) {
					$statusContainer = $('#step2_1 .disqualified-template').find('.disqualified');
					$statusContainer.find('.assistance-people-template').empty();
					$.each(eligibles.not_eligible, function(i,v) {
						var tmp = $('.assistance-people-template').find('.ppl-wrapper').clone(),
								maybe = '';
						if (v.medicaid && !v.chip)
							maybe = 'Medicaid';
						else if (!v.medicaid && v.chip)
							maybe = 'CHIP';
						else if (v.medicaid && v.chip)
							maybe = 'Medicaid or CHIP';
						tmp.find('.ppl-label').text(v.applicantLabel);
						tmp.find('.ppl-status b').text(data.state.state_abbr +' '+maybe);
						$statusContainer.find('.assistance-people-container').append(tmp);
					});
				}
			}
			else if (data.status.code == 2) {
				$statusContainer = $('#step2_1 .too-low-template').find('.too-low');
			}
			else if (data.status.code == 3) {
				$statusContainer = $('#step2_1 .too-high-template').find('.too-high');
			}
			// else if (data.s)
		  $statusContainer.find('.qualified-tax-penalty').text('$'+ Math.round(data.tax_penalty).toLocaleString("en") );
			$('.eligibility-status-container').append($statusContainer);

			$('.loader-container').fadeOut("slow");
			$('.eligible-checkpoint-container').fadeOut();
			$('#cp-quote-title').text($('#my_savings').val());
		};
		start();
	},

	initCoverage: function() {
		var self = this;
		var start = function() {
			$('[name=coverage]').on('change', coverageToggle);
			$('.coverage-btn').on('click', coverage);
		},
		coverageToggle = function() {
			var $this = $(this);
			self.coverageType = $this.val();
			$('[name=coverage]').parents('label').removeClass('active');
			$this.parents('label').addClass('active');

			if ($this.val() >= 3 && $this.val() <= 5) {
				$('.dependent-addon-wrapper').fadeIn('fast');
			}
			else {
				$('.dependent-addon-wrapper').fadeOut('fast');
			}
		},
		gender = function() {
			$(this).parent().find('.btn').removeClass('active');
			$(this).addClass('active');
		},
		coverage = function() {
			self.dependents = $('#dependent:visible').val();

			if (typeof self.dependents != 'undefined') {
				if ( (self.dependents == '' || self.dependent == 0) ) {
					$('#dependent').closest('.form-group').addClass('has-error').tooltip('show');
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
			if (!self.coverageType) self.coverageType = 1;

			if (self.coverageType == 1) {
				data.push('Me');
			}
			else if (self.coverageType == 2) {
				data.push('Me', 'My Spouse');
			}
			else if (self.coverageType == 3) {
				data.push('Me', 'My Spouse');
				appendDependent(data);
			}
			else if (self.coverageType == 4) {
				data.push('My Spouse');
				appendDependent(data);
			}
			else if (self.coverageType == 5) {
				appendDependent(data);
			}

			subsidy.household_size = data.length;
			subsidy.applicants = [];
			$.each(data, appendItem);
			$('.dependent-items-container').fadeIn();
			$('.nextBtn-container').fadeIn();
		},
		appendDependent = function(data) {
			var label = 'Dependents';
			if (self.dependents.length <= 1)
				label = 'Dependent';
			for(var i=1;i<=self.dependents;i++) {
				data.push(label+' '+i);
			}
		},
		appendItem = function(i,v) {
			var template = $('.dependent-template').find('.dependent-wrapper').clone();
			template.find('.dependent-title').text(v);
			template.find('.btn-gender button.btn').on('click', gender);
			var applicant = {
				id: i,
				label: v,
				tobacco: false,
				parent: false,
				job: false,
				pregnant: false,
				age: 0,
				sex: 'M',
			};
			$.each(applicant, function(i,v) {
					template.attr('data-applicant-'+i, v);
			});
			template.find('.applicant-tobacco').bind('change', changeAttr);
			template.find('.applicant-parent').bind('change', changeAttr);
			template.find('.applicant-job').bind('change', changeAttr);
			template.find('.applicant-pregnant').bind('change', changeAttr);
			template.find('[name="dependent_age"]').bind('input', changeAge);
			template.find('.btn-gender label.btn').bind('click', changeSex);
			template.addClass('dependent-used');
			$('.dependent-items-container').append(template);
		},
		changeAttr = function() {
			var $this = $(this);
			var name = $this.data('applicant-name');
			$this.parents('.dependent-wrapper').attr('data-applicant-'+name, $this.is(':checked'));
		},
		changeAge = function() {
			var $this = $(this);
			$this.parents('.dependent-wrapper').data('applicantAge', $this.val());
		},
		changeSex = function() {
			var $this = $(this);
			var val = $this.find('input[type=radio]').val()
			$this.parents('.dependent-wrapper').data('applicantSex', val);
		};

		start();
	},

	getPlans: function() {
		var self = this;

		var start = function() {
			$('.loader-container').fadeIn("slow");
			$.post('/api/getPlans', {
				_token: csrf_token,
				applicants: subsidy.applicants,
				rating_area: subsidy.rating_area,
				county_name: subsidy.county,
				state_code: subsidy.state_abbr,
				subsidy: subsidy.subsidy_amount,
				fpl: subsidy.fpl,
			}).done(displayData);
		},
		displayData = function(data) {
			console.log(data);
			self.loadPlans(data.plans);
		};

		start();
	},

	loadPlans: function(plans) {

		if (plans.length <= 0)
			return false;
		var self = this;
		mixFilter.initMixitUp();
		$.each(plans, function(i,v) {
			var tmp = $('.insurer-template').find('.insurer-container').clone(),
					metal = v.metal_level.toLowerCase();
			tmp.find('.insurer-name p.insurer-plan-marketing-name').text(v.plan_marketing_name);
			tmp.find('.insurer-name .insurer-checkbox').addClass('used');
			// tmp.find('.insurer-name > label').attr('for', uuid).find('input[type="checkbox"]').attr('id', uuid);
			tmp.find('.btn-compare').on('click', self.addToCompare);
			tmp.attr('data-plan', JSON.stringify(v));
			tmp.attr('data-monthly', v.subsidy_applied);
			tmp.attr('data-deductible', Number(v.medical_deductible.replace(/[^0-9\.]+/g,"")) );

			if (self.isEligible)
				tmp.find('.insurer.portion > p').show();

			tmp.attr('data-issuer-name',self.slugify(v.issuer_name)).addClass(v.plan_type.toLowerCase());
			tmp.attr('data-metal', metal);
			tmp.find('.insurer-portion > h5 span').text(parseInt(v.subsidy_applied).toLocaleString());

			tmp.find('.insurer-deductible > h5 span').text(parseInt(v.medical_deductible).toLocaleString());
			tmp.find('.btn-enroll').attr('data-plan-id', v.plan_id_standard_component).on('click', self.selectPlan);
			tmp.find('.plan-details').on('click', plan.planDetails);
			tmp.find('.plan-manage-ratings').on('click', self.initRatings);
			tmp.addClass('mix used');
			$('.plans-container > .tab-pane#'+metal).append(tmp);
			mixFilter.types.push(v.plan_type);
		});
		$('.loader-container').fadeOut("fast");
		$('#insurer ul.nav a[data-toggle="tab"]').on('show.bs.tab', function(e) {
			var tab = $(e.target);
			var target = $(tab.attr('href'));
			target.find('.no-plans').hide();
			if (!target.find('> .insurer-container').length) {
				target.find('.no-plans').fadeIn();
			}
		});
		mixFilter.init();
	},

	initRatings: function() {
		var template = $('.plan-rating-template').find('select.plan-rating').clone();

		var btn = $(this),
			parent = btn.parents('.insurer-container.used'),
			_plan = parent.data('plan'),
			container = btn.parent().find('.plan-rating-container'),
			clicked = false,
		start = function() {
			btn.html('<i class="fa fa-spin fa-spinner"></i> Loading..');
			btn.attr('disabled', true);
			getRatings();
		},
		getRatings = function() {
			$.post('/api/getRatings', {
				_token : csrf_token,
				plan_id_standard_component : _plan.plan_id_standard_component,
			}).done(showRatings);
		},
		showRatings = function(data) {
			container.prepend(template);
			template.barrating({
				theme: 'bootstrap-heart',
				allowEmpty: true,
				emptyValue: 0,
				showSelectedRating: false,
				initialRating: data.whole_avg + "",
				onSelect: onRatingSelected,
				readonly: !data.authed,
			});
			container.find('.plan-total-rating').text(data.total_rates);
			btn.hide();
			container.fadeIn();
			// btn.hide();
		},
		onRatingSelected = function(val, data) {
			if (!clicked) {
				clicked = true;
				$.post('/api/postRatings', {
					_token : csrf_token,
					plan_id_standard_component : _plan.plan_id_standard_component,
					value : val,
				}).done(function(data) {
					template.barrating('set', data.whole_avg + "");
					container.find('.plan-total-rating').text(data.total_rates);
				});
			}
		};

		start();
	},

	slugify: function(text) {
		return text.toString().trim().toLowerCase()
			.replace(/[^\w\s-]/g, '') // remove non-word [a-z0-9_], non-whitespace, non-hyphen characters
			.replace(/[\s_-]+/g, '-') // swap any length of whitespace, underscore, hyphen characters with a single -
			.replace(/^-+|-+$/g, ''); // remove leading, trailing -
	},

	uniq: function(a) {
	   return Array.from(new Set(a));
	},

	selectPlan : function() {
		var self = plan;
		var val = $(this).parents('.plan-details-container, .cmp-plan-wrapper,.insurer-container').data('plan');
		subsidy.plan_chosen = val;
		$('.modal').modal('hide');
		self.gotoStep('5_1', true, true, '3_1', '4');
		plan.scrollTop();
		// TODO:180 select plans move to self.initApplicationForms();
	},

	planDetails : function(e) {
		var val = $(this).parents('.plan-details-container, .cmp-plan-wrapper, .insurer-container').data('plan'),
				metal = $(this).parents('.plan-details-container, .cmp-plan-wrapper, .insurer-container').data('metal');
		var start = function() {
			$('#plandetails').modal('show')
				.on('shown.bs.modal', shown);
		},
		shown = function() {

			var el = $(this).find('.modal-content');
			el.find('.modal-header').attr('data-metal',metal);
			el.find('.plan-details-title').text(val.plan_marketing_name);
			el.find('.plan-details-subsidy-applied').text(val.subsidy_applied);
			el.find('.plan-details-premium').text(val.premium);
			el.find('.plan-details-deductible').text(val.medical_deductible);
			el.find('.plan-details-oop').text(val.medical_maximum_out_of_pocket);
			el.find('.plan-details-primary-care').text(val.primary_care_physician);
			el.find('.plan-details-specialist').text(val.specialist);
			// el.find('.plan-details-preventative').text(); // NOTE:290 for now empty muna
			el.find('.plan-details-drugs-generic').text(val.generic_drugs);
			el.find('.plan-details-drugs-brand').text(val.preferred_brand_drugs);
			el.find('.plan-details-drugs-non').text(val.non_preferred_brand_drugs);
			el.find('.plan-details-drugs-deductible').text(val.drug_deductible);
			el.find('.plan-details-drugs-moop').text(val.drug_maximum_out_of_pocket);
			el.find('.plan-details-drugs-specialty').text(val.specialty_drugs);
			// el.find('.plan-details-ambulance').text(); // NOTE:300 for now empty muna
			el.find('.plan-details-rooms').text(val.emergency_room);
			el.find('.plan-details-stay-facility').text(val.inpatient_facility);
			el.find('.plan-details-stay-physician').text(val.inpatient_physician);

			el.find('.plan-details-url-network').attr('href', val.network_url || '#');
			el.find('.plan-details-url-formulary').attr('href', val.drug_formulary_url || '#');
			el.find('.plan-details-url-brochure').attr('href', val.plan_brochure_url || '#');
			el.find('.plan-details-url-summary').attr('href', val.summary_of_benefits_url || '#');

			el.find('.btn-enroll').on('click', plan.selectPlan);
			el.attr('data-plan', JSON.stringify(val));
		};
		start();
	},

	addToCompare: function(e) {
		e.preventDefault();

		var $this = $(this),
				checkBox = $this.parents('.insurer-container').find('.insurer-checkbox');
		var start = function() {
			$this.toggleClass('active');
			// checkBox.trigger('click');
			check();
		},
		check = function() {
			var checkboxes = $('.plan-container .insurer-container .btn-compare.active');
			if (checkboxes.length) {
				$('#modalcompareBtn').fadeIn();
			}
			else {
				$('#modalcompareBtn').hide();
			}
		};
		start();
	},

	planCompare: function() {
		if ($('.plans-container .insurer-container.used .btn-compare.active').length <= 1) {
			alert('You need to select atleast two plans to compare.');
			return false;
		}
		$('.compared-plans-container').empty();
		$('.plans-container .insurer-container.used .btn-compare.active').each(function(i,v) {
			var val = $(v).parents('.insurer-container').data('plan'),
					tmp = $('.cmp-plan-template').find('.cmp-plan-wrapper').clone(),
					metal = val.metal_level.toLowerCase();

			tmp.attr({
				'data-plan': JSON.stringify(val),
				'data-metal' : metal,
			});
			tmp.find('.cmp-plan-insurer').text(val.plan_marketing_name);
			tmp.find('.cmp-plan-premium').text('$'+val.subsidy_applied);
			tmp.find('.cmp-plan-deductible').text(val.medical_deductible);
			tmp.find('.cmp-plan-oop').text(val.medical_maximum_out_of_pocket);
			tmp.find('.cmp-plan-network').text(val.source);
			tmp.find('.cmp-plan-metal-level').text(val.metal_level);
			tmp.find('.cmp-plan-primary-care').text(val.primary_care_physician);
			tmp.find('.cmp-plan-specialist').text(val.specialist);
			tmp.find('.cmp-plan-drugs').text(val.generic_drugs);
			tmp.find('.cmp-plan-rooms').text(val.emergency_room);
			tmp.find('.cmp-plan-urls .summary-of-benefits').attr('href', val.summary_of_benefits_url || '#');
			tmp.find('.cmp-plan-urls .network-url').attr('href', val.network_url || '#');
			tmp.find('.cmp-plan-urls .plan-brochure').attr('href', val.plan_brochure_url || '#');
			tmp.find('.cmp-plan-urls .plan-formulary').attr('href', val.drug_formulary_url || '#');
			tmp.find('.cmp-plan-urls .btn-enroll').on('click', plan.selectPlan);
			tmp.find('.cmp-plan-urls .plan-details').on('click', plan.planDetails)
			$('.compared-plans-container').append(tmp);
			$(v).attr('checked', false);
		});
	},

	getApplicationData: function() {
		var start = function() {
			$('#gotoAdditionalInfo').on('click', applicantData());
			//applicantData();
			otherData();
			console.log(applications);
		},
		applicantData = function() {
			applications.applicants = [];
			/*var mailing_address = {
				address: $('#applicant_mailing_address'+i).val(),
				apt_unit_no: $('#applicant_mailing_apt'+i).val(),
				city: $('#applicant_mailing_city'+i).val(),
				state: $('#applicant_mailing_state'+i).val(),
				zip_code: $('#applicant_mailing_zipcode'+i).val(),
			};*/
			var uid= $('#applicationNumber').val();
			for (var i=0; uid >= i; i++) {
					applications.applicants.push({
						fullname: $('#applicant_fullname'+i).val(),
						preferred_language: $('#preffered_language').val(),
						applying_for_coverage: $('#applicant_health_coverage'+i+' label.active').find('[name="applicant_health_coverage[]"]').val(),
						residential_address : {
							address: $('#applicant_address'+i).val(),
							apt_unit_no: $('#applicant_apt'+i).val(),
							city: $('#applicant_city'+i).val(),
							state: $('#applicant_state'+i).val(),
							zip_code: $('#applicant_zipcode'+i).val(),
						},
						mailing_address: ($('#separate'+i).is(':checked')== true ? {
							address: $('#applicant_mailing_address'+i).val(),
							apt_unit_no: $('#applicant_mailing_apt'+i).val(),
							city: $('#applicant_mailing_city'+i).val(),
							state: $('#applicant_mailing_state'+i).val(),
							zip_code: $('#applicant_mailing_zipcode'+i).val(),
						} : null ),
						separate_mailing_address: $('#separate'+i).is(':checked'),
						social_security_number: $('#applicant_sss'+i).val(),
						ssn_fullname:  ($('#different_name_sss'+i).is(':checked') == true ? $('#applicant_sss_name'+i).val() : $('#applicant_fullname'+i).val()),
						date_of_birth: $('#applicant_dob'+i).val(),
						gender: $('#applicant_gender'+i).val(),
						relationship: (i==0 ? null : $('#applicant_relationship'+i).val()),
						tax_status: $('#applicant_tax'+i).val(),
						income_source: {
							monthly_amount: $('#applicant_income_amount'+i).val(),
							income_type: $('#applicant_income_type'+i).val(),
							employer: $('#applicant_employer'+i).val(),
							employer_phone: $('#applicant_employer_phone'+i).val(),
						},
						annual_income: $('#applicant_annual_income'+i).text(),
						age: (subsidy.applicants[i] ? subsidy.applicants[i].applicantAge : '' ),
						job_offers_insurance: ( $('#applicant_job'+i).hasClass('active') ? true : false ),
						tobacco: ( $('#applicant_tobacco'+i).hasClass('active') ? true : false ),
						pregnant: ( $('#applicant_pregnant'+i).hasClass('active') ? true : false ),
						parent: ( $('#applicant_parent'+i).hasClass('active') ? true : false ),
						chip: (subsidy.applicants[i] ? subsidy.applicants[i].chip : '' ),
						medicaid : (subsidy.applicants[i] ? subsidy.applicants[i].medicaid : '' ),
						medicare: (subsidy.applicants[i] ? subsidy.applicants[i].medicare : '' ),
						subsidy: (subsidy.applicants[i] ? subsidy.applicants[i].subsidy : '' ),
						citizenship : {
							us_citizen: $('#applicant_us_citizen'+i+' label.active').find('[name="us_citizen[]"]').val(),
							american_indian_or_alaskan_native: $('#applicant_indian_alaskan'+i+' label.active').find('[name="indian_alaskan_citizen[]"]').val(),
							naturalized_citizen: $('#applicant_naturalized_citizen'+i+' label.active').find('[name="naturalized_citizen[]"]').val(),
							documents:
								($('#applicant_naturalized_citizen'+i+' label.active').find('[name="naturalized_citizen[]"]').val() == "yes" && $('#applicant_us_citizen'+i+' label.active').find('[name="us_citizen[]"]').val() == "yes" ?
									($('#applicant_naturalization_documents'+i).val() == 1 ?
										{
											alien_number: $('[name="naturalized-condition1-applicant' +i+ '"]').find('[name=alien_number]').val(),
											naturalization_certificate_number: $('[name="naturalized-condition1-applicant' +i+ '"]').find('[name=naturalization_certificate_number]').val(),
										}
									:
										{
											alien_number: $('[name="naturalized-condition2-applicant' +i+ '"]').find('[name=alien_number]').val(),
											citizenship_certificate_number: $('[name="naturalized-condition2-applicant' +i+ '"]').find('[name=citizenship_certificate_number]').val(),
										}
									)
								:
								($('#applicant_us_citizen'+i+' label.active').find('[name="us_citizen[]"]').val() == "no" ?
									( $('#applicant_immigration_documents'+i).val() == 1 ?
										{
											alien_number: $('[name="immigration-condition1-applicant' +i+ '"]').find('#con1_alien_number').val(),
											green_card_number: $('[name="immigration-condition1-applicant' +i+ '"]').find('#i551_green_card_number').val(),
										}
										: $('#applicant_immigration_documents'+i).val() == 2 ?
										{
											alien_number: $('[name="immigration-condition2-applicant' +i+ '"]').find('#con2_alien_number').val(),
										}
										: $('#applicant_immigration_documents'+i).val() == 3 ?
										{
											passport_number: $('[name="immigration-condition3-applicant' +i+ '"]').find('#con3_passport_number').val(),
											passport_country: $('[name="immigration-condition3-applicant' +i+ '"]').find('#con3_passport_country').val(),
											passport_expiration: $('[name="immigration-condition3-applicant' +i+ '"]').find('#con3_passport_expiration').val(),
											alien_number: $('[name="immigration-condition3-applicant' +i+ '"]').find('#con3_alien_number').val(),
										}
										: $('#applicant_immigration_documents'+i).val() == 4 ?
										{
											ead_number: $('[name="immigration-condition4-applicant' +i+ '"]').find('#con4_ead_number').val(),
											ead_category_code: $('[name="immigration-condition4-applicant' +i+ '"]').find('#con4_ead_category').val(),
											ead_expiration: $('[name="immigration-condition4-applicant' +i+ '"]').find('#con4_ead_expiration').val(),
										}
										: $('#applicant_immigration_documents'+i).val() == 5 ?
										{
											i_94_number: $('[name="immigration-condition5-applicant' +i+ '"]').find('#con5_i94_number').val(),
										}
										: $('#applicant_immigration_documents'+i).val() == 6 ?
										{
											passport_number: $('[name="immigration-condition6-applicant' +i+ '"]').find('#con6_passport_number').val(),
											passport_country: $('[name="immigration-condition6-applicant' +i+ '"]').find('#con6_passport_country').val(),
											passport_expiration: $('[name="immigration-condition6-applicant' +i+ '"]').find('#con6_passport_expiration').val(),
											i_94_number: $('[name="immigration-condition6-applicant' +i+ '"]').find('#con6_i94_number').val(),
										}
										: $('#applicant_immigration_documents'+i).val() == 7 ?
										{
											passport_number: $('[name="immigration-condition7-applicant' +i+ '"]').find('#con7_passport_number').val(),
											passport_country: $('[name="immigration-condition7-applicant' +i+ '"]').find('#con7_passport_country').val(),
											passport_expiration: $('[name="immigration-condition7-applicant' +i+ '"]').find('#con7_passport_expiration').val(),
										}
										: $('#applicant_immigration_documents'+i).val() == 8 ?
										{
											alien_number: $('[name="immigration-condition8-applicant' +i+ '"]').find('#con8_alien_number').val(),
										}
										: $('#applicant_immigration_documents'+i).val() == 9 ?
										{
											alien_number: $('[name="immigration-condition9-applicant' +i+ '"]').find('#con9_alien_number').val(),
										}
										:
										{
											alien_number: $('[name="immigration-condition1-applicant' +i+ '"]').find('#con1_alien_number').val(),
											green_card_number: $('[name="immigration-condition1-applicant' +i+ '"]').find('#i551_green_card_number').val(),
										}
										)
								: null )),
						},
					});
			}
		},
		otherData = function() {
			var number= ["one", "two", "three", "four", 'five', 'six', 'seven', 'eight', 'nine'];
			var one =[], two =[], three=[], four=[], five=[], six=[], seven=[], eight=[], nine=[];
			applications.billing_address = ( $('.btn-billing-address label.active').find('input').val() == 'yes' ? $('.checkout-billing-address').text().trim() : $('#preffered_address').val() + ' ' + $('#preffered_citystate').val() );
			applications.email = $('[name="applicant_email"]').val();
			applications.payment_info = {
				fullname: $('#tab1-fullname').val(),
				zip_code: $('#tab1-zip').val(),
				credit_card_number: $('#tab1-cardno').val(),
				credit_card_type: ($('#credit_card_type').val() == "other" ? $('#credit_card_other').val() : $('#credit_card_type').val()),

				expiration_date: $('#expiry_month').val() + "/" + $('#expiry_year').val(),
				cvv_cid: $('#cvv-cid').val(),
			};
			applications.plan = {
				child_only_offering: (subsidy ? subsidy.plan_chosen.child_only_offering : ''),
				issuer_name: (subsidy ? subsidy.plan_chosen.issuer_name : ''),
				metal_level: (subsidy ? subsidy.plan_chosen.metal_level : ''),
				plan_id_standard_component: (subsidy ? subsidy.plan_chosen.plan_id_standard_component : ''),
				plan_marketing_name: (subsidy ? subsidy.plan_chosen.plan_marketing_name : ''),
				plan_type: (subsidy ? subsidy.plan_chosen.plan_type : ''),
			};
			applications.agreements= {
				agreement1:  $('.agreement1 label.active').find('[name="agreement1"]').val(),
				agreement2:  $('.agreement2 label.active').find('[name="agreement2"]').val(),
				agreement3:  $('.agreement3 label.active').find('[name="agreement3"]').val(),
			};

			for (var num= 0; num < number.length; num++) {
				var $qn= number[num];
				$.each($('#'+ number[num] +'-question.active'), function() {
					if($qn=="one")
						one.push($(this).attr('name'));
					if($qn=="two")
						two.push($(this).attr('name'));
					if($qn=="three")
						three.push($(this).attr('name'));
					if($qn=="four")
						four.push($(this).attr('name'));
					if($qn=="five")
						five.push($(this).attr('name'));
					if($qn=="six")
						six.push($(this).attr('name'));
					if($qn=="seven")
						seven.push($(this).attr('name'));
					if($qn=="eight")
						eight.push($(this).attr('name'));
					if($qn=="nine")
						nine.push($(this).attr('name'));
				});
			}
			applications.additional_information= {
				one: one,
				two: two,
				three: three,
				four:  four,
				five: five,
				six: six,
				seven: seven,
				eight: eight,
				nine: nine,
			};
		};
		start();
	},

	// let's see back button
	// TODO:160 need to clear previous actions
	lets_see_back: function(elem) {
		$(elem).parents('.status-wrapper').fadeOut("fast", function() {
			$('.eligible-checkpoint-container').fadeIn();
		});
	},

	generate_order_id: function() {
		$.get('/api/getNewInvoice').done(function(data) {
			$('.checkout-order-number').text(data);
			applications.invoice = data;
		});
		// var date = new Date();
		// var components = [
		// 	date.getYear(),
		// 	date.getMonth(),
		// 	date.getDate(),
		// 	date.getHours(),
		// 	date.getMinutes(),
		// 	date.getSeconds(),
		// 	date.getMilliseconds()
		// ];
		// return components.join("");
	},

};
