var income = {

	init: function(){
		var self= this;

		$('#basic_calc, #open_calculator').on('click', self.openBasicCalculator);
		$('#calculate').on('click', self.openAdvancedCalculator);
		$('#close, #close2').on('click',self.closeCalculator);
		$('.numberOnly,.incomeInc,.incomeNotInc').on('keypress', self.numberOnlyTextField);
		//$('.monetary').on('keypress', self.monetary);
		$('.estimate').css('text-align', 'center');
		$('.estimate').hide();
	},


	openBasicCalculator: function(){
		$(this).hide();
		$('.income_class').hide();
		$('.calculators-container').slideToggle(300);
		var start = function() {

			$('#term').on('change', term);
			$('#result').on('click', showResult);
		},
		term = function() {

			var selectText = $(this).find('option:selected').text();
			$('#lbl_base_salary').text(selectText);
			$('#base_salary').val('');
			$('#num_hrs_day').val('');
			$('#num_days_week').val('');

		},
		showResult = function() {
			var bs = $('#base_salary').val(),
					num_hrs_day = $('#num_hrs_day').val(),
					num_days_week = $('#num_days_week').val(),
					week = (365/7),
					res = 0,
					h=0,
					d=0,
					w=0,
					w2=0,
					m=0,
					selectVal = $('#term option:selected').val();
			var args = {
				bs: bs,
				num_hrs_day: num_hrs_day,
				num_days_week:num_days_week,
				week:week,
				res:res,
				h:h,
				d:d,
				w:w,
				w2:w2,
				m:m,
				selectVal:selectVal
			};
			income.calculate(args);
		};

		start();

	},

		calculate: function(a) {
		var result = null,
				textFormats = null;
		var res=0 ,
				m=0 ,
					d=0,
						 w=0 ,
						 	 w2=0 ,
						 	 	h=0;

				$(".income_class").show();
		if (a.selectVal == 0) {//hour
				res= a.bs * a.num_hrs_day * a.num_days_week * a.week;
				m= res / 12;
				d= a.bs * a.num_hrs_day;
				w= d * a.num_days_week;
				w2= m / 2;
				h= a.bs;
				$("#f_income, #f_i").hide();
		}
		else if (a.selectVal == 1) {//day
				res= a.bs * a.num_days_week * a.week;
		     	m = res / 12;
		     	w= a.bs * a.num_days_week;
		     	w2= m / 2;
		     	d= a.bs;
		     	h= a.bs / a.num_hrs_day;
				$("#e_income, #e_i").hide();

		}
		else if (a.selectVal == 2) {//week
				res= a.bs * a.week;
		    	m= (a.week / 12) * a.bs;
		    	w= a.bs;
		    	w2= m / 2;
		    	d= a.bs / a.num_days_week;
		    	h= d / a.num_hrs_day;
		    	$("#d_income, #d_i").hide();

		}
		else if (a.selectVal == 3) {//biweekly
				res= a.bs * 12 * 2;
		    	m= a.bs * 2;
		    	w= res/ a.week;
		    	w2= a.bs;
		    	d= w / a.num_days_week;
		    	h= d / a.num_hrs_day;
		    	$("#c_income, #c_i").hide();
		}
		else if (a.selectVal == 4) {//monthly
				res= a.bs * 12;
		    	m= a.bs;
		      	w= res / a.week;
		      	w2= m / 2;
		    	d= w / a.num_days_week;
		    	h= d / a.num_hrs_day;
		  		$("#b_income, #b_i").hide();
		}
		else if (a.selectVal == 5) {//year
				res= a.bs;
		    	m= a.bs / 12;
		    	w= a.bs / a.week;
		    	w2= m / 2;
		    	d= w / a.num_days_week;
		    	h= d / a.num_hrs_day;
		    	$("#a_income, #a_i").hide();
		}


		//console.log(res);
		$("#household-income").val(income.formatPrice(res));
		$("#a_income").text('$' + income.formatPrice(res));
  	$("#b_income").text('$' + income.formatPrice(m));
  	$("#c_income").text('$' + income.formatPrice(w2));
  	$("#d_income").text('$' + income.formatPrice(w));
  	$("#e_income").text('$' + income.formatPrice(d));
  	$("#f_income").text('$' + income.formatPrice(h));

	},

	openAdvancedCalculator: function(){

			var inc = 0,
    			notinc = 0,
    			result= 0;
    	$('.incomeInc').each(function() {
    		if($(this).val()== null){
    			$(this).val(0);
    		}else{
        	inc += Number($(this).val());
        }
    	});


    	$('.incomeNotInc').each(function() {
    		if($(this).val()== null){
    			$(this).val(0);
    		}else{
        	notinc += Number($(this).val());
        }
    	});

    	result= inc- notinc;
	    $('#lbl_estimatedIncome').text(income.formatPrice(result));
			$('.estimate').fadeIn('slow');
	    $("#household-income").val(income.formatPrice(result));

	},

	formatPrice: function(price) {
		return parseFloat(price,10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
	},

	closeCalculator: function() {
		//$('#cal_btn').slideToggle(300);
		$('#open_calculator').slideToggle(300);
		$('.calculators-container').slideToggle(300);

	},

	numberOnlyTextField: function(e){
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && (e.which != 46 && e.which >31)) {
    	return false;
    }
   },

  limitToHour: function(e) {
  	var value = $(this).val();
  },

  monetary: function(event) {
		$(this).val(function(index, value) {
			return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		});

	},



};
