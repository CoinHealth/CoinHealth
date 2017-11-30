'use strict';
var quote = {
	_selector: null,
	_prev : null,
	_isEligible : false,
	_tableLoaded : false,
	_planChosen: false,
	_currentStep: 1,
	_covers: {
		type: 0,
		people: [],
	},
	_tabs : {
		1 : 'Bronze',
		2 : 'Silver',
		3 : 'Gold',
		4 : 'Platinum',
		5 : 'Catastrophic',
	},
	init: function() {
		$('.cp-step-county').on('click', quote.counties);
		$('.cp-step').on('click', quote.click);
		$('.btn-steps').on('click', quote.step);
		$('[name=employee_name]').on('input', function(e) {
			$('[name=employee_name]').val($(this).val());
			$('.checkout-fullname').text($(this).val());
		});
		quote.gotoStep(1);

		quote.initCoverageSelection();
		quote.initImmigration();
		quote.initComparePlans();

	},

	initComparePlans: function() {
		var activeTab = $('[data-toggle=tab]').parent().not(':not(.active)'),
		target = activeTab.find('a').attr('href'),
		selectedPlan = [],
		start = function() {
			$('.insurer-compare').off().on('click', compare);
			$('[data-toggle=tab]').off().on('click', tab);
			$('#modal-plan').on('shown.bs.modal', shownModal).on('hide.bs.modal', hideModal);
		},
		hideModal = function() {
			$(this).find('.modal-body > .row').empty();
		},
		shownModal = function() {
			var body = $(this).find('.modal-body > .row');
			$.each(selectedPlan, function(i,v) {
				var planTemplate = $('#template-plan-chosen').find('.plan-chosen-template').clone();
				planTemplate.hide();
				planTemplate.find('.insurer').html(
					v.find('.insurer-icon').find('img')
				);
				planTemplate.attr({
					'data-bg': 'chosen-'+target.substring(1,target.length),
				}).css({
					margin: '5px 0',
				}).fadeIn();
				planTemplate.find('.plan-enroll').on('click', choosePlan);
				body.append(planTemplate);
			});
		},
		choosePlan = function() {
			var parent = $(this).parents('.plan-chosen-template'),
				type = target.substring(1,target.length),
				planChosen = $('.plan-chosen');
			$('.insurers').find('.insurer-icon').find('input').attr('checked',false);
			planChosen.find('.insurer').html(parent.find('.insurer').find('img').clone());
			planChosen.attr({
				'data-bg': 'chosen-'+type
			});
			parent.find('.insurer-icon').find('input').attr('checked', true);
			quote.gotoStepBtn(4);

			// planChosen.find('.portion').html(parent.find('.assistance'));
		},
		compare = function() {
			selectedPlan = [];
			var planSelected = $(target).find('input[type=checkbox]:checked');
			planSelected.each(function(i,v) {
				var parentTR = $(v).parents('tr').clone();
				selectedPlan.push(parentTR);
			});
			$('#modal-plan').modal('show');
		},
		tab = function() {
			activeTab = $(this).parent();
			target = activeTab.find('a').attr('href');
		};
		start();

	},
	initCoverageSelection: function() {
		var start = function() {
			$('#coverage_selection').select2({
				placeholder: 'Select who needs coverage',
				templateResult: formatCover,
			}).on('select2:select', initTable);
			$('#quote-add-child').off().on('click', addChild);
		},
		formatCover = function(state) {
			var $state = $(
					'<span>'+
						'<img class="cover-image" src="'+$(state.element).data('src')+'" /> '+
						state.text +'</span>'
				);
			return $state;
		},
		removeChild = function(e) {
			e.preventDefault();
			var _this = $(this);
			console.log(_this);
			_this.parents('tr').fadeOut('fast', function() {
				$(this).remove();
			});
		},
		addChild = function() {
			var _p = [{owner: 'Dependent', gender: 'M', pregnant: false, tobacco: false}];
			$.each(_p, addRow);
		},
		initTable = function() {
			$('.coverage-table-container').fadeIn();
			$('#quote-add-child').hide();
			var elem = $(this),
				val = elem.val();
			applyCondition(val);
		},
		applyCondition = function(val) {
			var data = {
				canHaveChild : false,
				people: []
			};
			quote._covers.people = [];
			quote._covers.type = val;
			if (val >= 4)
				data.canHaveChild = true;

			if (val == 1) {
				var _p = {owner: 'Me', gender: 'M',pregnant: false,tobacco: false};
				data.people.push(_p);
			}
			else if (val == 2) {
				var _p = {owner: 'Me',gender: 'F',pregnant: false,tobacco: false};
				data.people.push(_p);
			}
			else if (val == 3) {
				var _p = [
					{owner: 'Me',gender: 'M',pregnant: false,tobacco: false},
					{owner: 'Spouse',gender: 'F',pregnant: false,tobacco: false},
				];
				$.each(_p, function(i,v) {
					data.people.push(v);
				});
			}
			else if (val == 4) {
				var _p = [
					{owner: 'Me',gender: 'M',pregnant: false,tobacco: false},
					{owner: 'Spouse',gender: 'F',pregnant: false,tobacco: false},
				];
				$.each(_p, function(i,v) {
					data.people.push(v);
				});2
			}
			else if (val == 5) {
				var _p = {owner: 'Me',gender: 'F',pregnant: false,tobacco: false};
				data.people.push(_p);
			}

			fill(data);
		},
		fill = function(data) {
			if (data.canHaveChild)
				$('#quote-add-child').fadeIn();
			$('#step1_2').find('.coverage-table').find('tbody').empty().hide();
			$.each(data.people, addRow);
		},
		addRow = function(i,v) {
			quote._covers.people.push(v);
			var tr = $('#step1_2').find('.table-data-template').find('tr').clone(),
				_uid = uid();
			if (v.owner == 'Dependent') {
				tr.find('.rmv').on('click', removeChild).show();
			}
			tr.find('.gender')
				.find('#'+v.gender)
					.attr('checked',true)
				.parent()
					.addClass('active');

			tr.find('.pregnant')
				.find(!v.pregnant ? '#N' : '#Y')
					.attr('checked',true)
				.parent()
					.addClass('active');

			tr.find('.tobacco')
				.find(!v.tobacco ? '#N' : '#Y')
					.attr('checked',true)
				.parent()
					.addClass('active');

			$('#step1_2').find('.coverage-table')
				.find('tbody')
					.fadeIn()
					.append(tr);
			tr.hide().fadeIn();
		};
		start();
	},
	initImmigration: function() {
		var start = function() {
			$('.citizenship').on('change','.input-citizenship', applyCondition);
		},
		applyCondition = function() {
			var $this = $(this);
			$('.immigration-container').hide('fast')
				.find('.btn-solo label').hide();
			$('.immigration-container').hide('fast')
				.find('.form-group > input').hide();

			// if ($this.val() >= 2)
			// 	$('.immigration-container').fadeIn();
			$('.immigration-container').fadeIn();
			if ($this.val() == 2)  {
				$('.for-resident').fadeIn();
			}
			else if ($this.val() == 3) {
				$('.for-non-resident').fadeIn();
			}
		};
		start();
	},
	validateEmail: function() {
		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		if (!re.test($(this).val())) {
			$(this).closest('.form-group').addClass('has-error').find('p').show();
		}
		else {
			$(this).closest('.form-group').removeClass('has-error').find('p').hide();
		}
	},
	/***
		Steps
	***/
	step: function() {
		var step = $(this).data('step');
		console.log(quote._currentStep);
		quote.gotoStep(step);
		$('.btn-steps').removeClass('active');
		$(this).addClass('active');
	},

	step1: function() {

		var start = function() {
			// $('.quote-sub-header > div').hide();
			$('#cp-quote-title').text('Insuree Details');
			$('.cp-step-eligible').on('click', eligible);
			$('#step1')
				.addClass('active')
				.find('.form-steps')
					.removeClass('active')
					.first()
					.addClass('active');
		},
		eligible = function() {
			var income = $('#annual_income'),
				next = $($(this).data('step')),
				pass = false;
			// if (income.val())
				// pass = true;
			quote._isEligible = false;
			$(this).parents('.form-steps').removeClass('active').parents('.step-parent').hide();
			if (income.val() && (income.val() <= 1000 && income.val() >= 0)) {
				$('#step1_eligible').addClass('active').fadeIn('slow')
				quote._isEligible = true;
			}
			else {
				next.addClass('active').fadeIn('slow');
			}
		};
		start();
	},

	step2: function() {
		var start = function() {
			if (quote._isEligible)
				$('.quote-sub-header').find('.subsidy').fadeIn(500);
			$('#cp-quote-title').text('Health Details');
			$('#step2')
				.addClass('active')
				.find('.form-steps')
					.removeClass('active')
					.first()
					.addClass('active');
			$('.email').on('change', quote.validateEmail);

			$('#step2_doctor').hide();

			$('.cp-step-doctor').on('click', doctor);

			$('#doctor').select2({
				placeholder: 'Select Doctor',
			});
			$('#hospital').select2({
				placeholder: 'Select Hospital',
			});
			$('[name=recieve]').on('change', doctor2);
		},
		doctor2 = function() {
			if ($(this).val() == 'yes') {
				$('#step2_doctor').fadeIn('slow');
			}
		},
		doctor = function() {
			var btn = $('[name=recieve]').first(),
				next = $($(this).data('step'));

			// if (btn.first().is(':checked')) {console.log(btn);
			// 	$('#step2_doctor').fadeIn('slow');
			// }
			// else
			$(this).parents('.form-steps').removeClass('active').parents('.step-parent').hide();
			next.addClass('active').fadeIn("slow");


		};
		start();
	},

	step3: function() {
		var start = function() {
			$('#cp-quote-title').text('Plan Details');
			$('#step3')
				.addClass('active')
				.find('.form-steps')
					.removeClass('active')
					.first()
					.addClass('active');
			$('.plan-enroll').off().on('click', choosePlan);
		},
		choosePlan = function() {
			var parent = $(this).parents('tr'),
				type = parent.parents('.tab-pane').attr('id'),
				planChosen = $('.plan-chosen');
			$('.insurers').find('.insurer-icon').find('input').attr('checked',false);
			planChosen.find('.insurer').html(parent.find('.insurer-icon').find('img').clone());
			planChosen.attr({
				'data-bg': 'chosen-'+type
			});
			parent.find('.insurer-icon').find('input').attr('checked', true);
			quote.gotoStepBtn(4);

			// planChosen.find('.portion').html(parent.find('.assistance'));
		};

		start();
	},

	step4: function() {
		var start = function() {
			$('.quote-sub-header')
				.find('.subsidy').hide()
			$('.quote-sub-header')
				.find('.plan-chosen').fadeIn(500);

			$('#cp-quote-title').text('Your Details');
			$('#step4_street_address').on('change', setCheckoutDetail);
			$('#step4_city_state_zip').on('change', setCheckoutDetail);
			$('#step4')
				.addClass('active')
				.find('.form-steps')
					.first()
					.addClass('active');
			setCoverage();
		},
		setCheckoutDetail = function() {
			var elem = $(this).data('checkout');
			$(elem).text($(this).val());
		},
		setCoverage = function() {
			var text = $('#coverage_selection option:selected').text(),
				$iconContainer = $('.coverage-container').find('.icon-container').empty();
			$('.coverage-container').find('h4').text(text);

			$.each(quote._covers.people, function(i,v){
				var template = $('#smiley-template').find('.cp-smiley').clone();
				template.find('p').text(v.owner);
				$iconContainer.append(template);
			});
		};
		start();
	},
	step5: function() {
		var start = function() {
			$('[data-toggle="tooltip"]').tooltip();
			$('#cp-quote-title').text('Checkout Details');
			$('#step5')
				.addClass('active')
				.find('.form-steps')
					.first()
					.addClass('active');
			$('[name="checkout-address"]').change('change', newAddress);
			$('#checkout-tab>li>a').on('click', function(e) {
				if ($(this).hasClass('disabled')) {
					e.preventDefault();
					return false;
				}
			})
			$('.action-btn .btn:last-chilzd:not(.btn-nextStep)').on('click', nextTab);
		},
		nextTab = function() {
			var next = $(this).data('next-tab');
			$('a[href="'+next+'"]').tab('show');
			$('a[href="'+next+'"]').removeClass('disabled');
		},
		newAddress = function() {
			if ($(this).val() == 'yes') {
				$('#checkout-preffered').fadeIn('slow');
			}
		};
		start();
	},
	step6: function() {
		var start = function() {
			$('#cp-quote-title').text('Checkout Details');
			$('#step6')
				.addClass('active')
				.find('.form-steps')
					.first()
					.addClass('active');
		};
		start();
	},
	/***
		end steps
	***/
	gotoStepBtn: function(step) {
		switch(step) {
			case 1:
				// $('#btn-step1').addClass('done')
				$('#btn-step1').trigger('click');
				break;
			case 2:
				$('#btn-step1').addClass('done')
				$('#btn-step2').trigger('click');
				break;
			case 3:
				$('#btn-step2').addClass('done')
				$('#btn-step3').trigger('click');
				break;
			case 4:
				$('#btn-step3').addClass('done')
				$('#btn-step4').trigger('click');
				break;
			case 5:
				$('#btn-step4').addClass('done')
				$('#btn-step5').trigger('click');
				break;
			case 6:
				$('#btn-step5').addClass('done')
				$('#btn-step6').trigger('click');
				break;
		}
	},

	gotoStep: function(step) {
		$('.stepwiz').removeClass('active');
		switch(step) {
			case 1:
				quote.step1();
				break;
			case 2:
				quote.step2();
				break;
			case 3:
				quote.step3();
				break;
			case 4:
				quote.step4();
				break;
			case 5:
				quote.step5();
				break;
			case 6:
				quote.step6();
				break;
		}
	},

	click: function() {
		var next = $($(this).data('step'));
		$(this)
			.parents('.form-steps')
			.removeClass('active')
			.parents('.step-parent').hide();
		next.addClass('active').fadeIn('slow');
	},

	counties: function() {
		var $this = $(this),
			next = $($this.data('step'));
		// $this.find('.fa').removeClass('hidden');
		setTimeout(function(e) {
			$this.parents('.form-steps')
				.removeClass('active')
				.parents('.step-parent').hide();
			next.addClass('active').fadeIn('slow');
			$('#disclaimer').fadeIn('slow');
		},500);
	},

};
